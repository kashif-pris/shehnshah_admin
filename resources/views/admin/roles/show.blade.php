@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            {{strtoupper(Request::segment(1))}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin-dashboard-panel')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{strtoupper(Request::segment(1))}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-bottom: 1%;">
            <div class="pull-left">
                {{-- <h3>Edit permissions</h3> --}}
            </div>
            <div class="pull-right mt-3">
                <a class="btn  btn-outline-success btn-fw" 
                   href="{{ route('all-roles') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card basic-form">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{!! route('roles.update',$role->id) !!}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Name</label>
                                        </div>
                                        <input type="text" required class="form-control" value="{!! $role->name !!}"
                                               name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-4">
                                <div class="row">

                                    <table class="table table-bordered">
                                        <thead>
                                        <th>Name</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{!! $permission->name !!}</td>
                                                <td>
                                                    <input @if(isset($AllowedPermissions[$permission->id])) checked="true"
                                                           @endif type="checkbox" value="{!! $permission->id !!}"
                                                           name="permisions[]"></td>
                                            </tr>@endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            {{-- <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                <a href="{!! route('roles.index') !!}"
                                   class=" btn btn-sm btn-danger">Cancel </a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
@endsection