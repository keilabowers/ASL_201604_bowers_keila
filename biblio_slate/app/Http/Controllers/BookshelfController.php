<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Book;
use App\UserBook;
use App\Http\Requests;

class BookshelfController extends Controller
{
    public function index(){

        $user = Auth::user()->id;
        $userbooks = UserBook::with(['users', 'books'])->where('user', '=', $user)->get();
    	return view('bookshelf.bookshelf', compact('userbooks'));
    }

    public function show(UserBook $userbook){

    	return $userbook;

    }

    public function store(Request $request){

    	$book = new Book(['title' => $request->title, 'author' => $request->author, 'isbn' => $request->isbn]);
    	$book->save();

    	$userbook = new UserBook(['user' => Auth::user()->id, 'book' => $book->id, 'owned' => $request->own, 'read' => $request->read, 'wishlist' => $request->wishlist]);
    	$userbook->save();

    	return back();
    }

    public function edit(UserBook $userbook){
    	$id = $userbook->id;
    	$userbooks = Userbook::with(['books'])->where('id', '=', $id)->get();
    	return view('bookshelf.edit', compact('userbooks'));
    }

    public function update(Request $request, UserBook $userbook){
    	$userbook->books->update(['title' => $request->title, 'author' => $request->author, 'isbn' => $request->isbn]);
    	$userbook->update(['owned' => $request->own, 'read' => $request->read, 'wishlist' => $request->wishlist]);

    	return redirect('bookshelf');
    }

    public function delete(UserBook $userbook){
    	$userbook->delete();

    	return redirect('bookshelf');
    }
}
