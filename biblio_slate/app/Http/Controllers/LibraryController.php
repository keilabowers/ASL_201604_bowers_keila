<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Book;
use App\UserBook;
use App\Loan;
use App\Http\Requests;

class LibraryController extends Controller
{
    
    public function index(){

        $user = Auth::user()->id;
        $loans = Loan::where('user_book.user', '=', $user)->where('returned', '=', '0')
                    ->join('user_book', 'loan.userbook_id', '=', 'user_book.id')
                    ->get();
     
        return view('library.library', compact('loans'));
    }

    public function search(Request $request){
    	$keyword = $request->keyword;
    	$user = Auth::user()->id;
    	$userbooks = UserBook::where(
    		'user', '=', $user)
    		->where('owned', '=', '1')
    		->where('book.title', 'LIKE', '%'. $keyword . '%')
    		->join('book', 'user_book.book', '=', 'book.id')
    		->paginate(10);

    	return view('library.search', compact('userbooks'));
    }

    public function show($userbook){

    	return view('library.loan', compact('userbook'));
    }

    public function store(Request $request){
        
        $loan = new Loan(['userbook_id' => $request->userbook_id, 'requested_user' => $request->requested_user, 'loan_start_date' => \Carbon\Carbon::today(), 'due_date' => $request->due_date]);
        $loan->save();

        return redirect('library');
    }


}
