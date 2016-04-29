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

class LibraryController extends Controller
{
    
    public function index(Loan $loan){

        $user = Auth::user()->id;
        $loans = Loan::with(['userbook'])->select('loan.*')->join('user_book', 'user_book.id', '=', 'loan.userbook_id')
                ->where('user_book.user', '=', $user)
                ->where('returned', '=', 0)
                ->get();

        return view('library.library', compact('loans'));
    }

    public function search(Request $request){
    	$keyword = $request->keyword;
    	$user = Auth::user()->id;
    	$userbooks = UserBook::select('user_book.*', 'isbn', 'author', 'title')
            ->join('book', 'user_book.book', '=', 'book.id')
            ->where('user', '=', $user)
            ->where('owned', '=', '1')
            ->where('book.title', 'LIKE', '%'. $keyword . '%')
    		->paginate(10);

    	return view('library.search', compact('userbooks'));
    }

    public function loan($userbook){
    	return view('library.loan', compact('userbook'));
    }

    public function store(Request $request){
        
        $loan = new Loan(['userbook_id' => $request->userbook_id, 'requested_user' => $request->requested_user, 'loan_start_date' => \Carbon\Carbon::today(), 'due_date' => $request->due_date]);
        $loan->save();

        return redirect('library');
    }

    public function return(Loan $loan){
        $loan->update(['returned' => 1]);

        return redirect('library');
    }


}
