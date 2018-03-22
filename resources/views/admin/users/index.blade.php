@extends('layouts.admin')

@section('header')
@stop

@section('footer')
    {!! HTML::script('/js/admin/table.js') !!}
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users</h2>
                </div>
                <div class="pull-right">
                    {!! Form::open(['method' => 'POST','route' => ['admin.users.index']]) !!}
                    <div class="input-group mb-3">
                        <input id="query" type="text" class="form-control" name="query"
                               value="{{ old('query', $query) }}">
                        {{--<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">--}}
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
                        </div>
                        {{--<button id="btn_advanced_clear" title="Clear field" class="btn btn-default" type="button"><i class="fa fa-close"></i></button>--}}
                        {{--<button id="btn_advanced_reset" title="Reset search" class="btn btn-default" type="button"><i class="fa fa-refresh"></i></button>--}}

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>


        <!-- content wrapper -->
        <div class="content-wrap bg-default bar-top">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>ID Number</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($records))

                        @foreach($records AS $record)
                            <tr>
                                <td><img src="{{$record->image_url}}" class="profile-image" alt="User Profile Image"></td>
                                <td>{{$record->name}}</td>
                                <td><a href="mailto:{{$record->email}}">{{$record->email}}</a></td>
                                <td>{{$record->contact}}</td>
                                <td>{{$record->id_number}}</td>
                                <td>
                                    @if(($record->is_active))
                                        <h2><span class="badge badge-success">Active</span></h2>
                                        @else
                                        <h2><span class="badge badge-danger">Non-Active</span></h2>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actions to Preform">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                {{--<i class="fas fa-bars"></i>--}}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                                                <a class="dropdown-item" href="javascript: info_window('/admin/user/view/{!!$record->id!!}');">
                                                    <i class="fa fa-search "></i> View
                                                </a>

                                                <a
                                                   href="{{ route('admin.users.show',$record->id) }}">
                                                    View
                                                </a>
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.users.edit',$record->id) }}">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.users.destroy', $record->id) }}"
                                                   onclick="event.preventDefault(); document.getElementById('delete-user').submit();">
                                                    {{ __('Delete') }}
                                                </a>

                                                <form id="delete-user"
                                                      action="{{ route('admin.users.destroy', $record->id) }}"
                                                      method="DELETE" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">No records listed!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="pagination pagination-narrow pagination-right pull-right">
                {!!$records->appends(Request::All())->links()!!}
            </div>
        </div>


    </div>



@endsection
