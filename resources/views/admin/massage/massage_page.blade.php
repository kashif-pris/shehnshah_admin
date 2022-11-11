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
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"></h4>
        <p class="card-description">
 
        </p>
        <form class="forms-sample">
          
          <div class="form-group">
            <label for="exampleInputEmail3"> Firs Name</label>
            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Email">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword4"> Last Name</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Email</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Phone No</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
         
          <div class="form-group">
            <label for="exampleInputPassword4">Massage</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
      
       
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

@endsection