@extends('home')

@section('dashboard')

<h1>Dashboard</h1>
	
	<div class="row inline text-center" id="randomRead">
    	<h2>Need something to read?</h2><p>{{ $random_read->title }}</p><small>by {{ $random_read->author}}</small>
    </div>

    <div class="row">
	    <div class="col-md-6">
			<h2>Books Due <small>(week)</small>:</h2>
			<div class="shelf">
		   @foreach($loans as $loan)
		        <dl>
		            <dd>{{ $loan->userbook->books->title }}</dd> 
		            <dd>Loanee: {{ $loan->requested_user }}</dd>
		            <dd>Due Date: {{ $loan->due_date }}</dd>
		        </dl>
		    @endforeach
		    </div>
		</div>


	    <div id="calendar" class="col-md-2 col-md-offset-1"></div>
	</div>
	<script type="text/javascript">
	 $(function() {
	    $( "#calendar" ).datepicker();
	  });
	</script>




@endsection