<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','type','created_by','updated_by','hapus', 'departemen_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function departemen()
    {
        return $this->belongsTo('App\Departemen');
    }
    
    public function modules()
    {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }
    
    public function dokumen()
    {
        return $this->belongsToMany('App\Dokumen')->withTimestamps()->withPivot('role');
    }
}
