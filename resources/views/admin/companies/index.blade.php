@extends('layouts.admin')

@section('header')
@stop

@section('footer')
@stop

@section('content')
    <div class="container">
        <router-view name="companiesIndex"></router-view>
        <router-view></router-view>
    </div>
@endsection
