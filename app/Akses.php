<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $fillable = [
        'nama'
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }
}
