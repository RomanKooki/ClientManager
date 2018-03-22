@extends('layouts.admin')

@section('header')
@stop

@section('footer')
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="panel-heading">Companies</div>

            <div class="panel-body table-responsive">
                <router-view name="companiesIndex"></router-view>
                <router-view></router-view>
            </div>
        </div>
    </div>
@endsection
