<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateDokumenRequest;
use App\Http\Controllers\Controller;

use App\Dokumen;
use App\Departemen as Departemen;
use App\User as User;
use Auth;
use Yajra\Datatables\Datatables;

class DokumenController extends Controller
{
    private $menu;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->menu   = $this->parentMenu('dokumen');
    }
    
    /**
     * Show list dokumen
     * 
     * @return void
     */
    public function show()
    {
        return view('admin.dokumen.show',['menu'=>$this->menu]);
    }
    
    
    /**
     * Show form create
     * 
     * @return void
     */
    public function create()
    {
        
        
        return view('admin.dokumen.create',['menu'=>$this->menu]);
    }
    
    public function edit($id, Dokumen $dokumen)
    {
        $dokumen   = $dokumen->with('modules')->whereId($id)->first();
        
        $mod    = $dokumen->modules->toArray();
        
        $modules    = array();
        
        foreach($mod as $v)
        {
            $modules[]  = $v['id'];
        }
        
        $dokumen->modules  = implode(",", $modules);
        
        return view('admin.dokumen.edit',compact('dokumen'))->with(['menu'=>$this->menu]);
    }
    
    public function save(CreateDokumenRequest $request, Dokumen $dokumen)
    {
        $data   = $request->all();
        $data['password']   = bcrypt($data['password']);
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        
        $save = $dokumen->create($data);
        
        $this->saveDetail($save->id, $data['modules']);
        
        return redirect()->route('dokumen.tabel');
    }
    
    public function update($id, Request $request, Dokumen $dokumen)
    {
        $edit    = $dokumen->whereId($id)->first();
       
        $data   = $request->all();
       
        if($data['password'])
            $data['password']   = bcrypt($data['password']);
        else
            unset($data['password']);
           
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;

        $edit->fill($data)->save();

        $this->saveDetail($id, $data['modules']);

        return redirect()->route('dokumen.tabel');
    }
    
    public function softdelete($id, Request $request, Dokumen $dokumen)
    {
        $edit    = $dokumen->whereId($id)->first();
        
        $data    = $request->input();
        
        $data['hapus']    = '0';
        $data['updated_by'] = Auth::user()->id;
        
        $edit->fill($data)->save();
        
        echo json_encode(array('status' => 1, 'msg' => 'Data berhasil dihapus!!!'));
    }
    
    public function dataTables(Request $request, Dokumen $dokumen)
    {
        $data   =    null;
        if(Auth::user()->id==1)
        {
            $dData   = Departemen::find(1)->dokumen()->wherePivot('role','>',0)->where('id',Auth::user()->departemen_id)->where('dokumen.hapus',1)->get();
            $data  = $dData->merge(User::find(1)->dokumen()->wherePivot('role','>',0)->where('id',Auth::user()->id)->where('dokumen.hapus',1)->get());
            
        }
        else
        {
            $data   = Departemen::find(1)->dokumen()->wherePivot('role','>',0)->where('id',Auth::user()->departemen_id);
        }
        
        return  Datatables::of($data)
                ->addColumn('action',function($data)
                {
                    $str     = "";
                    if(Auth::user()->id==1)
                    {
                        $str    .= '<a href="'.route("dokumen.ubah",$data->id).'" class="downloadrow btn btn-default"><span class="icon-eye-open"></span></a>&nbsp;';
                        $str    .= '<a href="'.route("dokumen.ubah",$data->id).'" class="downloadrow btn btn-default"><span class="icon-download"></span></a>&nbsp;';
                        $str    .= '<a href="'.route("dokumen.ubah",$data->id).'" class="editrow btn btn-default"><span class="icon-edit"></span></a>&nbsp;';
                        $str    .= '<a href="'.route("dokumen.hapus",$data->id).'" class="deleterow btn btn-default"><span class="icon-remove"></span></a>&nbsp;';
                    }
                    else
                    {
                        $role   = $data->pivot->role;
                        
                        if($role>=1)
                            $str    .= '<a href="'.route("dokumen.ubah",$data->id).'" class="downloadrow btn btn-default"><span class="icon-eye-open"></span></a>&nbsp;';
                        if($role>=2)
                            $str    .= '<a href="'.route("dokumen.ubah",$data->id).'" class="downloadrow btn btn-default"><span class="icon-download"></span></a>&nbsp;';
                        if($role>=3)
                            $str    .= '<a href="'.route("dokumen.ubah",$data->id).'" class="editrow btn btn-default"><span class="icon-edit"></span></a>&nbsp;';
                        if($role>=4)
                            $str    .= '<a href="'.route("dokumen.hapus",$data->id).'" class="deleterow btn btn-default"><span class="icon-remove"></span></a>&nbsp;';
                    }
                    
                    return $str;
                })
                ->addColumn('created',function($data)
                {
                    return $data->createdby->name;
                })
                ->addColumn('dokumen_author',function($data)
                {
                    return $data->assignto->name.', '.$data->assignto->type;
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->make(true);
    }
    
    public function selectdua(Request $request, Dokumen $dokumen)
    {
        $ret    = array();
        $datas  = array();
        if($request->input('id'))
        {
            $datas = $dokumen->where('id',$request->input('id'));
        }
        else
        {
            $datas = $dokumen->where(function($query) use ($request)
                               {
                                    $query->where('name','like','%'.$request->input('q').'%');
                               });
        }
        $datas = $datas->get()->toArray();
        
        foreach($datas as $data)
        {
            $ret[] = array('id' => $data['id'], 'text' => $data['name']);
        }
        
        echo json_encode($ret);
    }
    
    
    private function saveDetail($dokumenId,$moduleId)
    {
        $dokumen = new Dokumen;
        
        $usr = $dokumen->whereId($dokumenId)->first();
        
        $mod = explode(',',$moduleId);
        
        $usr->modules()->detach();
        
        $usr->modules()->attach($mod);
        
    }
}
