@extends('layouts.main')
@section('content')

<style>
  ::placeholder{
    color:#333 !important;
  }
  .modal .modal-dialog {
    margin-top: calc(10px + 10px);
}
.modal .modal-dialog .modal-content .modal-header {
    padding: 20px 26px;
}
</style>

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
      
      <div class="card">
        <div class="card-body">

        <div class="pull-right" style="margin-bottom: 2%;">
        <a class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal13"><i class="fa fa-plus-circle"></i> Create New Service</a>
          <!-- <a href="{{url('queues/queue-add')}}" class="btn btn-outline-success btn-fw"><i class="fa fa-plus-circle"></i> Create New Queue</a> -->
    
      </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Title</th>
                        <th>Icon</th>

                        <th style ="width: 20%;">Actions</th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($service as $key=>$serve)
                    <tr >
                        <td>{{$key+1}}</td>
                        <td>{{$serve->title}}</td>
                        <td><img src="{{$serve->icon}}" style ="height:60px;width:60px;border-radius:50px"/></td>
                         <td>
                        <a href="{{$serve->id}}" onclick="getInfo('{{$serve->id}}','{{$serve->title}}','{{$serve->icon}}')" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal"> Edit</a>
                          <a href="{{url('service/service-delete')}}/{{$serve->id}}" class="btn btn-outline-danger">Delete</a>

                        </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

   <!-- Modal -->


   <div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('service-store')}}" method="post" enctype="multipart/form-data"> @csrf
            <div class="form-group row">
              <!-- <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title</label> -->
              <div class="col-sm-12">
                <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Title" name="title" required > </div>
            </div>
            <div class="form-group col-md-12">
                <div class="card">
                
                  <div class="card-body">
                    <h3 class="card-title d-flex">Icon</h3>
                      <small class="ml-auto align-self-end">
                      <small class="text-danger">JPG, PNG </small>
                      </small>
                    </h4>
                    <input type="file" name="icon" class="dropify" required/>
                  </div>
                </div>
              </div>
                <button type="submit" class="btn  btn-outline-success btn-fw mr-2">Submit</button>
                <button type="button" class="btn  btn-outline-danger btn-fw mr-2" data-dismiss="modal">Cancel</button>
  
          </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('service-edit-store')}}" method="post"
                      enctype="multipart/form-data">
                      @csrf
              
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="form_title" placeholder="title" name="title" required>
                  <input type="text" class="form-control" id="form_id" name="id" hidden>
                </div>
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Icon</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control" id="exampleInputEmail2" placeholder="icon" name="icon">
                </div>
                <img src="#" class="service_icon" style ="margin-left: 216px;margin-top: 12px;height: 60px;width: 60px;"/>
              </div>
              <button type="submit" class="btn  btn-outline-success btn-fw mr-2">Submit</button>
              <button type="button" class="btn  btn-outline-danger btn-fw mr-2" data-dismiss="modal">Cancel</button>
            </form>
      </div>
    </div>
  </div>
</div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
<script>
  const getInfo = (id,title,imgPath)=>{
      $('#form_id').val(id);
      $('#form_title').val(title);
      $('.service_icon').attr('src',imgPath);
  }
  </script>
  @endsection