<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    public $table = 'user_book'; 

    protected $fillable = [
        'user', 'book', 'owned', 'read', 'wishlist',
    ];

    public function users(){
        return $this->belongsTo('App\User', 'user');
    } 

    public function books(){
    	return $this->belongsTo('App\Book', 'book');
    }




}
