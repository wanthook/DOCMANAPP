<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateDokumenRequest;
use App\Http\Controllers\Controller;

use Storage;

use App\Dokumen as Dokumen;
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
        $departemen = Departemen::where('hapus',1)->get()->toArray();
        $user       = User::where('hapus',1)->get()->toArray();
        
        return view('admin.dokumen.create',['menu'=>$this->menu,'departemenlist'=>$departemen,'userlist'=>$user]);
    }
    
    public function edit($id)
    {
        $dokumen   = Dokumen::with('departemen','users')->whereId($id)->first();
        
        $departemen    = $dokumen->departemen->toArray();
        $users         = $dokumen->users->toArray();
        
        $dep    = array();
        $usr    = array();
//        print_r($departemen);
        foreach($departemen as $v)
        {
            $dep[$v['id']]  = $v['pivot']['role'];
        }
        
        foreach($users as $v)
        {
            $usr[$v['id']]  = $v['pivot']['role'];
        }
        
        $dokumen->usr  = $usr;
        $dokumen->dep  = $dep;
//        
        $departemenlist = Departemen::where('hapus',1)->get()->toArray();
        $userlist       = User::where('hapus',1)->get()->toArray();
        
        return view('admin.dokumen.edit',compact('dokumen'))->with(['menu'=>$this->menu,'departemenlist'=>$departemenlist,'userlist'=>$userlist]);
    }
    
    public function save(CreateDokumenRequest $request)
    {
        $data   = $request->all();
        
        if ($request->hasFile('dokumen_file')) 
        {
            $file = $request->file('dokumen_file');
            $filename   = base64_encode(bcrypt(uniqid('TpK_')));
            $file->move(storage_path('uploads/dokumen/'), $filename);
            
            $data['dokumen_file']   = $file->getClientOriginalName();
            $data['dokumen_store']  = $filename;
            $data['dokumen_ukuran']  = (int)$file->getClientSize()/1048576;
            
            //print_r($data);
        }
        else
        {
            unset($data['dokumen_file']);
        }
        
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        
        $doc = Dokumen::create($data);
        
        
        
        if($request->dep)
        {
            $docSel = Dokumen::find($doc->id);
            $docSel->departemen()->detach();
            foreach($request->dep as $k => $v)
            {
                $docSel->departemen()->attach($k,['role'=>$v]);
            }
        }
        
        if($request->usr)
        {
            $usrSel = Dokumen::find($doc->id);
            $usrSel->users()->detach();
            foreach($request->usr as $k => $v)
            {
                $docSel->users()->attach($k,['role'=>$v]);
            }
        }
        return redirect()->route('dokumen.tabel');
    }
    
    public function update($id, Request $request)
    {
        $edit    = Dokumen::whereId($id)->first();
//       
        $data   = $request->all();
        
        if ($request->hasFile('dokumen_file')) 
        {
            $file = $request->file('dokumen_file');
            $filename   = base64_encode(bcrypt(uniqid('TpK_')));
            $file->move(storage_path('uploads/dokumen/'), $filename);
            
            $data['dokumen_file']   = $file->getClientOriginalName();
            $data['dokumen_store']  = $filename;
            $data['dokumen_ukuran']  = (int)$file->getClientSize()/1048576;
            
        }
        else
        {
            unset($data['dokumen_file']);
        }
           
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;

        $edit->fill($data)->save();
        
        if($request->dep)
        {
            $docSel = Dokumen::find($id);
            $docSel->departemen()->detach();
            foreach($request->dep as $k => $v)
            {
                $docSel->departemen()->attach($k,['role'=>$v]);
            }
        }
        
        if($request->usr)
        {
            $usrSel = Dokumen::find($id);
            $usrSel->users()->detach();
            foreach($request->usr as $k => $v)
            {
                $docSel->users()->attach($k,['role'=>$v]);
            }
        }
//
//        $this->saveDetail($id, $data['modules']);

        return redirect()->route('dokumen.tabel');
    }
    
    public function softdelete($id, Request $request)
    {
        $edit    = Dokumen::whereId($id)->first();
        
        $data    = $request->input();
        
        $data['hapus']    = '0';
        $data['updated_by'] = Auth::user()->id;
        
        $edit->fill($data)->save();
        
        echo json_encode(array('status' => 1, 'msg' => 'Data berhasil dihapus!!!'));
    }
    
    public function dataTables(Request $request)
    {
        $data   =    null;
        
        if(Auth::user()->id>1)
        {
//            if(Auth::user()->type == "ADMIN")
//            {
//                
//            }
//            else
//            {
                $data  = Departemen::find(Auth::user()->departemen_id)->dokumen()
                            ->wherePivot('role','>',0)
                            ->where('dokumen.hapus',1)
                            ->where('dokumen.dokumen_publish','>',0)
                            ->orderBy
                            ->get();
            
                if(!$data->isEmpty())
                {
                    $data = $data->merge(
                                User::find(Auth::user()->id)->dokumen()
                                    ->wherePivot('role','>',0)
                                    ->where('dokumen.hapus',1)
                                    ->where('dokumen.dokumen_publish','>',0)
                                    ->get()
                            );
                }
                else
                {
                    $data  = User::find(Auth::user()->id)->dokumen()
                                    ->wherePivot('role','>',0)
                                    ->where('dokumen.hapus',1)
                                    ->where('dokumen.dokumen_publish','>',0)
                                    ->get();

                }
//            }
        }
        else
        {
            $data   = Dokumen::where('hapus',1);
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
    
    public function selectdua(Request $request)
    {
        $ret    = array();
        $datas  = array();
        if($request->input('id'))
        {
            $datas = Dokumen::where('id',$request->input('id'));
        }
        else
        {
            $datas = Dokumen::where(function($query) use ($request)
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
