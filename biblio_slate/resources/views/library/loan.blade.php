@extends('home')

@section('library')

	<h2>Loan Book:</h2>
	<form class="form-inline container-fluid" role="form" method="POST" action="{{ url('/library/'.$userbook) }}">
		{!! csrf_field() !!}

		<div class="form-group row">
		<input type="hidden" class="form-control" name="userbook_id" value="{{ $userbook }}" >
		<input type="text" class="form-control" name="requested_user" placeholder="Loanee" value="">

		<input type="date" class="form-control" name="due_date" placeholder="Due Date" value="">

		<button type="submit" class="btn btn-primary">Loan Book</button>
		</div>
	</form>

@endsection