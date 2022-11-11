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
            <form action="{{route('vehicle-type-store')}}" method="post"
                      enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Select Business *</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="business" id="business_id">
                      <option value="" selected disabled>--Select--</option>
                      @php      $role = auth()->user()->getRoleNames(); @endphp


                      @forelse($business as $b)
                          @if ($role[0] == "admin")
                              @if(isset($vendor_id ))
                                  <option {{ $vendor_id->id == $b->id ? "selected" : "" }}      value="{{ $b->id }}">{{$b->title}}</option>

                              @else
                                  <option {{ old('business') == $b->id ? "selected" : "" }}      value="{{ $b->id }}">{{$b->title}}</option>

                              @endif
                          @else
                              <option {{ $vendor_id->id == $b->id ? "selected" : "selected" }}      value="{{ $b->id }}">{{$b->title}}</option>

                          @endif
                      @empty

                      @endforelse
                  </select>
                  </div>
         
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name </label>
                <div class="col-sm-9">
                  <input type="text" required class="form-control" id="exampleInputEmail2" placeholder="Name" name="name">
                </div>
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Walk In </label>
                <div class="col-sm-9">
                  <input type="text" required class="form-control" id="exampleInputEmail2" placeholder="Walk In" name="walkin">
                </div>

                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title </label>
                <div class="col-sm-9">
                  <input type="text" required class="form-control" id="exampleInputEmail2" placeholder="Title" name="title">
                </div>

                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alias </label>
                <div class="col-sm-9">
                  <input type="text" required class="form-control" id="exampleInputEmail2" placeholder="Alias" name="alias">
                </div>

 
                            <label class="col-sm-3 col-form-label" for="serviceProvissioning">Offerings<label>
                            <select onchange="findProvissioning()" id="serviceProvissioning" class="provissioningData js-example-basic-multiple  w-100" multiple name="service_provissioning">
                              @forelse($business_name as $s)
                              <option value="{{$s->id}}" >{{$s->title}}</option>
                              @empty  
  
                              @endforelse
                            </select>
                           
                            
                      
                            <div class="row">
                    
                    <div class="col-lg-7">
                     
                    <h3 >Business Hours</h3>
                        <div class="form-inline repeater">
                              <div data-repeater-list="group_b">
                                <div data-repeater-item class="d-flex mb-2">
                               
                                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-prepend">
                                  
                                    </div>
                                    <input style="width: 250px;" type="text" class="form-control form-control-sm" name="hours" id="inlineFormInputGroup1" placeholder="Choose File">
                                  </div>
                                
                                  <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                    <i class="fas fa-trash"></i>
                                  </button>
                                </div>
                              </div>
                              <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                <i class="fa fa-plus"></i>
                              </button>
                            </div>
                      
                     
                  </div>
              </div>
              <button type="submit" class="btn  btn-outline-success btn-fw">Submit</button>
              <button class="btn  btn-outline-danger btn-fw">Cancel</button>
            </form>
          </div>
        </div>
      </div>


<script>
        const findProvissioning = ()=>{
          var items = [];
          
          $('.provissioningData option:selected').each(function(){
             items.push($(this).val()); 
             console.log($(this).val());
          });
         
          $.ajax({
                type:'GET',
                url:'{{route("service-list")}}',
                data:{ajax:items,_token: "{{ csrf_token() }}"
                },
                success: function( services ) {
                  $('.defaultService').html('');
                  for (let index = 0; index < services.length; index++) {
                    $('.defaultService').append('<option value=' + services[index].id  +'>' + services[index].title  +'</option>');              
                  }
                }
            });
          
        }
      </script>
  @endsection