<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
	public $table = 'loan'; 

    protected $fillable = [
        'userbook_id', 'requested_user', 'loan_start_date', 'due_date', 'returned',
    ];



}
