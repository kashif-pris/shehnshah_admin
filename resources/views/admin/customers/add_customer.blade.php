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
            <label for="exampleInputName1">Id</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
          </div>
          <div class="form-group">
            <label for=""> Owner Business Id</label>
            {{-- <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Email"> --}}
            <select  class="form-control" id="" placeholder="" > 
              <option > Owner Business 1</option>
              <option > Owner Business 2</option>
              <option > Owner Business 3</option>
         </Select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Name</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Mobile</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Email</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Image</label>
            <input type="file" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Vehicle</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Balance</label>
            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div>
       
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>


@endsection