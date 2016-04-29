@extends('home')

@section('search')
	<h2>Search Results</h2>
    @if (count($userbooks) === 0)
    	<h3>No Results</h3>
    @elseif (count($userbooks) >= 1)
    	@foreach($userbooks as $userbook)
    		<ul class="list-unstyled">
    			<a href="/library/{{ $userbook->id }}"><li>{{ $userbook->title }}</li></a>
			</ul>
    	@endforeach
    @endif

@endsection 