<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    
    protected $fillable = [
        'kategori_nama', 'created_by', 'updated_by', 'hapus'
    ];


    protected $dates = ['created_at','modified_at'];
    
//    public function karyawan()
//    {
//        return $this->hasMany('App\Dokumen');
//    }
}
