<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Book;
use App\UserBook;
use App\Loan;
use View;
use App\Http\Requests;

class DashboardController extends Controller 
{


    public function index(){
        $user = Auth::user()->id;
        $loans = Loan::with(['userbook'])->select('loan.*')->join('user_book', 'user_book.id', '=', 'loan.userbook_id')
                ->where('user_book.user', '=', $user)
                ->where('returned', '=', 0)
                ->whereBetween('due_date', array(\Carbon\Carbon::now(), \Carbon\Carbon::now()->addWeek()))
                ->orderBy('due_date')
                ->get();

        $wishlist = UserBook::select('user_book.*', 'isbn', 'author', 'title')
            ->join('book', 'user_book.book', '=', 'book.id')
            ->where('user', '=', $user)
            ->where('wishlist', '=', '1')
            ->paginate(10); 

        $random_read = $wishlist->random(1);

        return view('dashboard', compact('loans', 'random_read'));

    }



}