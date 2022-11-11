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
                    <div>
                      <form action="{{route('service-store')}}" method="post" enctype="multipart/form-data"> @csrf
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Title" name="title"> </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="card">
                            
                              <div class="card-body">
                                <h3 class="card-title d-flex">Icon</h3>
                                  <small class="ml-auto align-self-end">
                                  <small class="text-danger">JPG, PNG </small>
                                  </small>
                                </h4>
                                <input type="file" name="icon" class="dropify" />
                              </div>
                            </div>
                          </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
            </div>
        </div>
    </div>

@endsection