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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description">
              
                </p>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="">Id</label>
                    <input type="text" class="form-control" id="" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Business Id</label>
                    {{-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> --}}
                    <select  class="form-control" id="" placeholder="" > 
                      <option >  Business 1</option>
                      <option >  Business 2</option>
                      <option >  Business 3</option>
                 </Select>     
                  </div>
                  <div class="form-group">
                    <label for="">Service Id</label>
                    {{-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> --}}
                    <select  class="form-control" id="" placeholder="" > 
                      <option >Service 1</option>
                      <option > Service 2</option>
                      <option > Service 3</option>
                 </Select>
                  </div>
                  <div class="form-group">
                    <label for="">Title </label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="">Image </label>
                    <input type="file" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="">Phone </label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                  </div>
                
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>

  @endsection