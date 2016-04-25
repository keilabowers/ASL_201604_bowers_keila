@extends('home')
@section('edit')
@foreach ($userbooks as $userbook)
	<h2>Update Book:</h2>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/bookshelf/'.$userbook->id) }}">
		{{ method_field('PATCH') }}
		{!! csrf_field() !!}
		<label>Title</label>
		<input type="text" class="form-control" name="title" value="{{ $userbook->books->title }}">

		<label>Author</label>
		<input type="text" class="form-control" name="author" value="{{ $userbook->books->author }}">

		<label>ISBN</label>
		<input type="text" class="form-control" name="isbn" value="{{ $userbook->books->isbn }}">

		<div class="radio">
			<h4>Own</h4>
			<label><input type="radio" name="own" value="0" {{ $userbook->owned == 0 ? 'checked' : '' }} >No</label>
			<label><input type="radio" name="own" value="1" {{ $userbook->owned == 1 ? 'checked' : '' }}>Yes</label>
		</div>

		<div class="radio">
			<h4>Read</h4>
			<label><input type="radio" name="read" value="0" {{ $userbook->read == 0 ? 'checked' : '' }}>No</label>
			<label><input type="radio" name="read" value="1" {{ $userbook->read == 1 ? 'checked' : '' }}>Yes</label>
		</div>

		<div class="radio">
			<h4>Want to Read</h4>
			<label><input type="radio" name="wishlist" value="0" {{ $userbook->wishlist == 0 ? 'checked' : '' }}>No</label>
			<label><input type="radio" name="wishlist" value="1" {{ $userbook->wishlist == 1 ? 'checked' : '' }}>Yes</label>
		</div>

		<div class="form-group">
		<button type="submit" class="btn btn-primary">Update Book</button>
		</div>
	</form>

	<form class="form-horizontal" role="form" action="{{ url('/bookshelf/'.$userbook->id) }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}

            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> Delete
            </button>
    </form>
@endforeach
@endsection


 

