@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('admin.users.index')}}" class="btn-block"> List All Clients  </a>
                    <a href="{{route('admin.companies.index')}}" class="btn-block"> List All Companies  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
