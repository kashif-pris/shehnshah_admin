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


      <div class="form-group row">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="exampleInputEmail2"  value ="{{$view->name}}" readonly>
          </div>
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="exampleInputEmail2" value ="{{$view->status}}" readonly>
          </div>
          <a href="{{url('lookup/city-list')}}" class="btn btn-outline-primary">Back</a>
      </div>
      

  @endsection