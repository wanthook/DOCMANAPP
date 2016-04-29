<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    
    protected $fillable = [
        'dokumen_file', 
        'dokumen_store', 
        'dokumen_ukuran', 
        'dokumen_deskripsi', 
        'dokumen_komentar', 
        'dokumen_publish', 
        'dokumen_author', 
        'created_by', 
        'updated_by', 
        'hapus'
    ];


    protected $dates = ['created_at','modified_at'];
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('role');
    }
    
    public function departemen()
    {
        return $this->belongsToMany('App\Departemen')->withTimestamps()->withPivot('role');
    }
    
    public function createdby()
    {
        return $this->belongsTo('App\User','created_by');
    }
    
    public function assignto()
    {
        return $this->belongsTo('App\User','dokumen_author');
    }
}
