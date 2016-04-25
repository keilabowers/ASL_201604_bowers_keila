<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   	public $table = 'book'; 

    protected $fillable = [
        'title', 'author', 'isbn',
    ];

    public function userbook(){
    	return $this->hasMany('App\UserBook');
    }



}
