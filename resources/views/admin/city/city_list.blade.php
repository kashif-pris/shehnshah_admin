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
      
      <div class="card">
        <div class="card-body">
        <div class="pull-right" style="margin-bottom: 14px;">
                        <a class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Create New City</a>
                    </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Name</th>
                        <th>Created By</th>
                        <!-- <th>Status</th>     -->
                        <th>Time</th>
                     
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($make as $key=>$make_list)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$make_list->name}}</td>
                        <td>
                            <?php $user = DB::table('users')->where('id' , $make_list->created_by)->first();?>
                                {{$user->name}}
                        </td>
                        <!-- <td>
                          @if($make_list->status == 'Active')
                          <div class="badge badge-success badge-pill">{{$make_list->status}}</div>
                          @else 
                          <div class="badge badge-warning badge-pill">{{$make_list->status}}</div>
                          @endif
                        </td> -->
                        <td>{{ \Carbon\Carbon::parse($make_list->created_at)->diffForhumans() }}</td>
                      
                      
                        
                       
                        <td style ="width: 20%;">
                          <!-- <a href="{{url('lookup/city-view')}}/{{$make_list->id}}" class="btn btn-sm btn-outline-primary">View</a> -->

                          {{-- <a onclick="getdata('{{$make_list->id}}','{{$make_list->name}}','{{$make_list->status}}')" class="btn btn-sm btn-outline-success" data-toggle="modal"  data-target="#exampleModal3"> View</a> --}}

                          <!-- <a href="{{url('lookup/city-edit')}}/{{$make_list->id}}" class="btn btn-sm btn-outline-success">Edit</a> -->
                          <a onclick="getInfo('{{$make_list->id}}','{{$make_list->name}}')" class="btn btn-sm btn-outline-warning" data-toggle="modal"  data-target="#exampleModal2"> Edit</a>

                          <a href="{{url('lookup/city-delete')}}/{{$make_list->id}}" class="btn btn-sm btn-outline-danger">Delete</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('city-store')}}" method="post"
                      enctype="multipart/form-data">
                      @csrf
              
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputEmail2"  required="required" placeholder="Name" name="name">
                </div>
              </div>
              <button type="submit" class="btn  btn-outline-success btn-fw">Submit</button>
              <button type="button" class="btn  btn-outline-danger btn-fw" data-dismiss="modal">Cancel</button>

            </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('city-edit-store')}}" method="post"
                      enctype="multipart/form-data">
                      @csrf
              
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name *</label>
                <div class="col-sm-9">
                  <input type="text" required class="form-control" id="formName" placeholder="Name" required name="name">
                  <input type="text" required class="form-control" id="formId"   name="id" hidden>
                </div>
                <!-- <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status *</label>
                
                <div class="col-sm-9">
                  <select  name="status" class="form-control" id="formStatus" >
                      

                  </select>

                </div> -->
   
              </div>
              <button type="submit" class="btn  btn-outline-success btn-fw">Submit</button>
              <button type="button" class="btn  btn-outline-danger btn-fw" data-dismiss="modal">Cancel</button>

          
            </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name *</label>
                <div class="col-sm-9">
                  <input type="text" required class="form-control" id="formNameView" required placeholder="Name" name="name" readonly>
                  <input type="text" required class="form-control" id="formIdView"  name="id" hidden>
                </div>
              </div>
              <button type="button" class="btn btn-primary mr-2" data-dismiss="modal">Cancel</button>

          
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->

    <script>
  const getInfo = (id,name,status)=>{
      $('#formStatus').html('');
      $('#formId').val(id);
      $('#formName').val(name);
      if(status == 'Active'){
        var htmlOptions = `<option value="Active" selected>Active</option>
        <option value="In-Active">In-Active</option>`;
      }else{
        var htmlOptions = `<option value="Active">Active</option>
        <option value="In-Active" selected>In-Active</option>`;
      }
      $('#formStatus').append(htmlOptions);
      $('.service_icon').attr('src',imgPath);
  }
  </script>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->

    <script>
  const getdata = (id,name,status)=>{
      // $('#formStatus').html('');
      $('#formIdView').val(id);
      $('#formNameView').val(name);
      $('#formStatusView').val(status);
      // if(status == 'Active'){
      //   var htmlOptions = `<option value="Active" selected>Active</option>
      //   <option value="In-Active">In-Active</option>`;
      // }else{
      //   var htmlOptions = `<option value="Active">Active</option>
      //   <option value="In-Active" selected>In-Active</option>`;
      // }
      // $('#formStatus').append(htmlOptions);
    
  }
  </script>

  @endsection