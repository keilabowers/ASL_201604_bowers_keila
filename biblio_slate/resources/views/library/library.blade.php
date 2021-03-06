@extends('home')

@section('library')
<h1>Library</h1>

    <p>Search for books you own to lend to others!</p>
    <form action="{{ url('/search') }}" method="POST">
        {!! csrf_field() !!}
        <label>Search By Book Title</label>
        <input type="text" class="form-control" name="keyword" value="">

        <button type="submit" class="btn">
            <i class="fa"></i> Search
        </button>
    </form>

    <div class="shelf">
       @foreach($loans as $loan)
            <dl>
                <dt>{{ $loan->userbook->books->title }}</dt> 
                <dd>Loanee: {{ $loan->requested_user }}</dd>
                <dd>Due Date: {{ $loan->due_date }}</dd>
                <a href="/library/{{ $loan->id }}/return">Return Book</a>      
            </dl>
        @endforeach
    </div>



@endsection
