<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    
    protected $fillable = [
        'departemen_nama', 'created_by', 'updated_by', 'hapus'
    ];


    protected $dates = ['created_at','modified_at'];
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function dokumen()
    {
        return $this->belongsToMany('App\Dokumen')->withTimestamps()->withPivot('role');
    }
}
