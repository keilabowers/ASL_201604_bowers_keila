@extends('layouts.app')
@section('welcome')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron clearfix">
                <h1>The reading log is all grown up</h1>
                <p class="pull-right"><a class="btn btn-primary btn-lg" href="{{ url('/register') }}" role="button">Sign Up!</a></p>
            </div>
        </div>
<!--     </div>
</div> -->

@endsection 
 
@include('auth.login')

