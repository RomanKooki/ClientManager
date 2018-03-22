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
                        <h2>Create User</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('admin.users.index') }}"> Go Back</a>
                    </div>
                </div>
            </div>

            {!! Form::open(['method' => 'POST','route' => ['admin.users.create']]) !!}
            @include('admin.users.form')
            {!! Form::close() !!}

    </div>
@endsection
