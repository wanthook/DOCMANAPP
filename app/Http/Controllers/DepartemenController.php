<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateDepartemenRequest;
use App\Http\Controllers\Controller;

use App\Departemen;
use Auth;
use Yajra\Datatables\Datatables;

class DepartemenController extends Controller
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
        
        $this->menu   = $this->parentMenu('departemen');
    }
    
    public function show()
    {
        return view('admin.departemen.show',['menu'=>$this->menu]);
    }
    
    public function create()
    {
        return view('admin.departemen.create',['menu'=>$this->menu]);
    }
    
    public function edit($id, Departemen $departemen)
    {
        $departemen   = $departemen->whereId($id)->first();
        
        return view('admin.departemen.edit',compact('departemen'))->with(['menu'=>$this->menu]);
    }
    
    public function save(CreateDepartemenRequest $request, Departemen $departemen)
    {
        $data   = $request->all();
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $departemen->create($data);
        
        return redirect()->route('departemen.tabel');
    }
    
    public function update($id, Request $request, Departemen $departemen)
    {
       $edit    = $departemen->whereId($id)->first();
       
       $edit->fill($request->input())->save();
       
       return redirect()->route('departemen.tabel');
    }
    
    public function softdelete($id, Request $request, Departemen $departemen)
    {
        $edit    = $departemen->whereId($id)->first();
        
        $data    = $request->input();
        
        $data['hapus']    = '0';
        $data['updated_by'] = Auth::user()->id;
        
        $edit->fill($data)->save();
        
        echo json_encode(array('status' => 1, 'msg' => 'Data berhasil dihapus!!!'));
    }
    
    public function dataTables(Request $request, Departemen $departemen)
    {
        $data   = $departemen->where('hapus','1')
                             ->where('id','<>','1');
        
        return  Datatables::of($data)
                ->addColumn('action',function($data)
                {
                    $str  = '<a href="'.route("departemen.ubah",$data->id).'" class="editrow btn btn-default"><span class="icon-edit"></span></a>&nbsp;';
                    $str .= '<a href="'.route("departemen.hapus",$data->id).'" class="deleterow btn btn-default"><span class="icon-remove"></span></a>&nbsp;';
                    return $str;
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->make(true);
    }
    
    public function selectdua(Request $request, Departemen $departemen)
    {
        $ret    = array();
        $datas  = array();
        if($request->input('id'))
        {
            $datas = $departemen->where('id',$request->input('id'))
                                ->where('id','<>','1');
        }
        else
        {
            $datas = $departemen->where(function($query) use ($request)
                               {
                                    $query->where('departemen_nama','like','%'.$request->input('q').'%')
                                          ->where('id','<>','1');
                               });
        }
        $datas = $datas->get()->toArray();
        
        foreach($datas as $data)
        {
            $ret[] = array('id' => $data['id'], 'text' => $data['departemen_nama']);
        }
        
        echo json_encode($ret);
    }
}
