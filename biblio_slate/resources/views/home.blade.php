@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2 sidebar" data-spy="affix" data-offset-top="0" id="myAffix" >

                <div class="thumbnail">
                    <img class="img-responsive center-block" src="assets/images/test_profile.png" alt="profile_picture">
                    
                    <h3 class="text-center">{{ Auth::user()->first_name }}</h3>
                   
                </div>

                <ul class="list-unstyled">
                    <li ><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li ><a href="{{ url('/bookshelf') }}">Bookshelf</a></li>
                    <li ><a href="{{ url('/library') }}">Library</a></li>
                </ul>               
            </div>

            <div class="col-md-8 test pull-right container-fluid">
                
                @if (Auth::user())
                    @yield('bookshelf')
                    @yield('library')
                    @yield('edit')
                    @yield('dashboard')
                    @yield('search')

                @endif
            
            </div>

        </div>
    </div>
</div>


@endsection


