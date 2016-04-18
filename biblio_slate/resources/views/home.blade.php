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
                    <li ><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li ><a href="{{ url('/bookshelf') }}">Bookshelf</a></li>
                    <li ><a href="{{ url('/library') }}">Library</a></li>
                </ul>               
            </div>

            <div class="col-md-8 test pull-right">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
 
            </div>

        </div>
    </div>
</div>


@endsection
