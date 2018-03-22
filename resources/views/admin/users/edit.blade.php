@extends('layouts.admin')

@section('header')
@stop

@section('footer')
@stop

@section('content')

    <div class="container">
        @include('partials.alert-messages')

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('admin.users.index') }}"> Go Back</a>
                </div>
            </div>
        </div>

        {!! Form::model($user , ['method' => 'PATCH','route' => ['admin.users.update' , $user->id]]) !!}
        @include('admin.users.form')
        {!! Form::close() !!}
    </div>
@endsection
