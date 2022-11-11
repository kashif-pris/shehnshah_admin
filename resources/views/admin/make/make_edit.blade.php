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


      <form action="{{route('make-edit-store')}}" method="post"
                      enctype="multipart/form-data">
                      @csrf
              
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Name" name="name" value ="{{$edit->name}}">
                </div>
               
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                <select  class="form-control" id="exampleInputUsername1" placeholder="Status" name ="status" >
                    <!-- <input type="text" class="form-control" id="exampleInputEmail2" placeholder="status" name="status" value ="{{$edit->status}}"> -->
                    @if($edit->status == 'In-Active')
                      <option  value="{{$edit->status}}">{{$edit->status}}</option>
                      <option  value="Active">Active</option>
                    @elseif($edit->status == 'Active')
                      <option  value="{{$edit->status}}">{{$edit->status}}</option>
                      <option  value="In-Active">In-Active</option>
                    @endif
                </select>
                </div>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputEmail2" name="id" value ="{{$edit->id}}" hidden>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
      

  @endsection