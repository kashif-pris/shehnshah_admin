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
   <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card basic-form">
                    <div class="">
                        {{-- <h4 class="text-22 text-midnight text-bold mb-4">Create Role </h> --}}
                    </div>
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
                        <form method="post" action="{!! route('roles.store') !!}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Name</label>
                                        </div>
                                        <input type="text" required="required" class="form-control"  name="name">
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
                                                        <input type="checkbox" value="{!! $permission->id !!}"
                                                               name="permisions[]">
                                                            </td>
                                                </tr>@endforeach
                                            </tbody>

                                        </table>

                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn  btn-outline-success btn-fw">Save</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
@endsection
