@extends('layouts.user')

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

                    @if(count($record['companies']) == 0)
                        <div class="alert-danger alert">No Linked Companies</div>
                        @else
                        <div>
                            <table>
                                <thead>
                                <tr>
                                    <td>Company Name</td>
                                    <td>Date Added</td>
                                    <td>Remove Company</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($record['companies'] as $company)
                                <tr>
                                    <td>{{$company['name']}}</td>
                                    <td>{{$company['created_at']}}</td>
                                    <td><a href="{{route('user.user_company.remove')}}"> Remove </a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
