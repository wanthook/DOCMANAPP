<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateKategoriRequest;
use App\Http\Controllers\Controller;

use App\Kategori;
use Auth;
use Yajra\Datatables\Datatables;

class KategoriController extends Controller
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
        
        $this->menu   = $this->parentMenu('kategori');
    }
    
    public function show()
    {
        return view('admin.kategori.show',['menu'=>$this->menu]);
    }
    
    public function create()
    {
        return view('admin.kategori.create',['menu'=>$this->menu]);
    }
    
    public function edit($id, Kategori $kategori)
    {
        $kategori   = $kategori->whereId($id)->first();
        
        return view('admin.kategori.edit',compact('kategori'))->with(['menu'=>$this->menu]);
    }
    
    public function save(CreateKategoriRequest $request, Kategori $kategori)
    {
        $data   = $request->all();
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $kategori->create($data);
        
        return redirect()->route('kategori.tabel');
    }
    
    public function update($id, Request $request, Kategori $kategori)
    {
       $edit    = $kategori->whereId($id)->first();
       
       $edit->fill($request->input())->save();
       
       return redirect()->route('kategori.tabel');
    }
    
    public function softdelete($id, Request $request, Kategori $kategori)
    {
        $edit    = $kategori->whereId($id)->first();
        
        $data    = $request->input();
        
        $data['hapus']    = '0';
        $data['updated_by'] = Auth::user()->id;
        
        $edit->fill($data)->save();
        
        echo json_encode(array('status' => 1, 'msg' => 'Data berhasil dihapus!!!'));
    }
    
    public function dataTables(Request $request, Kategori $kategori)
    {
        $data   = $kategori->where('hapus','1');
        
        return  Datatables::of($data)
                ->addColumn('action',function($data)
                {
                    $str  = '<a href="'.route("kategori.ubah",$data->id).'" class="editrow btn btn-default"><span class="icon-edit"></span></a>&nbsp;';
                    $str .= '<a href="'.route("kategori.hapus",$data->id).'" class="deleterow btn btn-default"><span class="icon-remove"></span></a>&nbsp;';
                    return $str;
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->make(true);
    }
    
    public function selectdua(Request $request, Kategori $kategori)
    {
        $ret    = array();
        $datas  = array();
        if($request->input('id'))
        {
            $datas = $kategori->where('id',$request->input('id'));
        }
        else
        {
            $datas = $kategori->where(function($query) use ($request)
                               {
                                    $query->where('kategori_nama','like','%'.$request->input('q').'%');
                               });
        }
        $datas = $datas->get()->toArray();
        
        foreach($datas as $data)
        {
            $ret[] = array('id' => $data['id'], 'text' => $data['kategori_nama']);
        }
        
        echo json_encode($ret);
    }
}
