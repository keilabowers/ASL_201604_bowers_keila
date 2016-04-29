@extends('home')


@section('bookshelf')
	<h1>Bookshelf</h1>

	<h2>Add a New Book:</h2>
	<form class="form-inline container-fluid" role="form" method="POST" action="{{ url('/bookshelf') }}">
		{!! csrf_field() !!}

		<div class="form-group row">
		<input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">

		<input type="text" class="form-control" name="author" placeholder="Author" value="{{ old('author') }}">

		<input type="text" class="form-control" name="isbn" placeholder="ISBN" value="{{ old('isbn') }}">
		</div>

		<div class="col-md-12 form-inline form-group row">
			<div class="radio">
				<h4>Own</h4>
				<label><input type="radio" name="own" value="0" >No</label>
				<label><input type="radio" name="own" value="1" >Yes</label>
			</div>

			<div class="radio">
				<h4>Read</h4>
				<label><input type="radio" name="read" value="0" >No</label>
				<label><input type="radio" name="read" value="1" >Yes</label>
			</div>

			<div class="radio">
				<h4>Want to Read</h3>
				<label><input type="radio" name="wishlist" value="0" >No</label>
				<label><input type="radio" name="wishlist" value="1" >Yes</label>
			</div>
		

		<button type="submit" class="btn btn-primary">Add Book</button>
		</div>
	</form>

	<div class="shelf">
		@foreach ($userbooks as $userbook)
			<dl>
				<dt>{{ $userbook->books->title }}</dt> 
				<dd>Author: {{ $userbook->books->author }}</dd>
				<dd>ISBN: {{ $userbook->books->isbn }}</dd>
				<dd>Own: {{ $userbook->owned ? 'Yes' : 'No' }}</dd> 
				<dd>Read: {{ $userbook->read ? 'Yes' : 'No' }}</dd>
				<dd>Wish to Read: {{ $userbook->wishlist ? 'Yes' : 'No' }}</dd><a href="/bookshelf/{{ $userbook->id }}/edit">Update | Remove</a></li>		
			</dl>
		@endforeach
	</div>

@endsection

