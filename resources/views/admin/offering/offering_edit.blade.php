@extends('layouts.main')
@section('content')



    <div class="page-header">
        <h3 class="page-title">
            {{strtoupper(Request::segment(2))}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin-dashboard-panel')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{strtoupper(Request::segment(2))}}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description">

                </p>
                <form action="{{route('offering-edit-store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row mt-4 border">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Service</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="service" name="serviceId" required>

                                        @foreach($Service as $item)

                                            <option value="{!! $item->id !!}"
                                                    @if($offering_data->service_name->id == $item->id) selected @endif >{!! $item->title !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{$offering_data->title}}" id=""
                                           placeholder="Icon" name="title">
                                    <input type="text" class="form-control" value="{{$offering_data->id}}" id=""
                                           placeholder="id" name="id" hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Sub Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{$offering_data->subTitle}}" id=""
                                           placeholder="" name="sub_Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">About</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{$offering_data->about}}" id=""
                                           placeholder="" name="about">
                                </div>
                            </div>

                        </div>


                        <div class="form-group col-lg-6">

                            <div class="card">

                                <div class="card-body">
                                    <h4 class="card-title d-flex">Cover
                                        <small class="ml-auto align-self-end">
                                            <small class="text-danger">JPG, PNG </small>
                                        </small>
                                    </h4>
                                    <input type="file" name="cover" class="dropify"/>
                                    <img src="{{$offering_data->cover}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 border">
                        <div class="col-md-6">
                            <div class="col-lg-12 mt-3">

                                <h4>Specification</h4>
                                {{-- <div class="form-inline repeater">
                                    <div data-repeater-list="specification">
                                        <div data-repeater-item class="d-flex mb-2">

                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-prepend">

                                                </div>
                                                @foreach(json_decode($offering_data->specs) as $data)
                                                    <input style="width: 250px;" value="{{$data}}" type="text"
                                                           class="form-control form-control-sm" name="specification"
                                                           id="inlineFormInputGroup1" placeholder="Choose File">
                                                @endforeach
                                            </div>

                                            <button data-repeater-delete type="button"
                                                    class="btn btn-danger btn-sm icon-btn ml-2">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button data-repeater-create type="button"
                                            class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div> --}}

                            
                            <div class="form-inline repeater">
                                  
                                <div data-repeater-list="specification">
                                  @foreach(json_decode($offering_data->specs) as $key=>$data)
                                  <div data-repeater-item class="d-flex mb-2">
                                
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                      <div class="input-group-prepend">
                                      </div>
                                        <input style="width:250px;" value="{{$data}}" type="text" class="form-control form-control-sm" name="group_b['{{$key}}'][othercondition]" id="inlineFormInputGroup1" placeholder="Choose File" >
                                      </div>
                                   
                                    <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    
                                  </div>
                                  @endforeach
                                 
                                </div>
                              
                                <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                  <i class="fa fa-plus"></i>
                                </button>
                              
                              </div> 
                              
                          </div>

                            <div class="col-lg-12">

                                <h4>Options</h4>
                                {{-- <div class="form-inline repeater">
                                    <div data-repeater-list="options">
                                        <div data-repeater-item class="d-flex mb-2">

                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-prepend">

                                                </div>
                                                @foreach(json_decode($offering_data->options) as $data)
                                                    <div class="row mt-1">
                                                        <input style="width: 250px;" value="{{$data}}" type="text"
                                                               class="form-control form-control-sm" name="option"
                                                               id="inlineFormInputGroup1" placeholder="Choose File">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <button data-repeater-delete type="button"
                                                    class="btn btn-danger btn-sm icon-btn ml-2">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button data-repeater-create type="button"
                                            class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div> --}}
                            
                            <div class="form-inline repeater">
                                  
                                <div data-repeater-list="options">
                                  @foreach(json_decode($offering_data->options) as $key=>$data)
                                  <div data-repeater-item class="d-flex mb-2">
                                
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                      <div class="input-group-prepend">
                                      </div>
                                        <input style="width:250px;" value="{{$data}}" type="text" class="form-control form-control-sm" name="group_b['{{$key}}'][othercondition]" id="inlineFormInputGroup1" placeholder="Choose File" >
                                      </div>
                                   
                                    <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    
                                  </div>
                                  @endforeach
                                 
                                </div>
                              
                                <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                  <i class="fa fa-plus"></i>
                                </button>
                              
                              </div> 
                              
                          </div>
                            <div class="col-lg-12">

                                <h4>Gallery</h4>
                                <div class="form-inline repeater">
                                    <div data-repeater-list="gallery">
                                        <div data-repeater-item class="d-flex mb-2">

                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-prepend">

                                                </div>
                                                <input style="width: 250px;" type="file"
                                                       class="form-control form-control-sm dropify" name="gallery_img"
                                                       id="inlineFormInputGroup1" placeholder="Choose File">
                                            </div>

                                            <button data-repeater-delete type="button"
                                                    class="btn btn-danger btn-sm icon-btn ml-2">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button data-repeater-create type="button"
                                            class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h3 class="sr-only-01" for="inlineFormInputGroup2">Conditions</h3>
                                    <label><b>Cash on Delivery</b></label><br>
                                    @if((json_decode($offering_data->conditions)->cashOnDelivery) == 'true')
                                        <label for="">Yes</label>
                                        <input type="radio" value="true" name="conditions[cashOnDelivery]" id=""
                                               checked>
                                        <label for="">No</label>
                                        <input type="radio" value="false" name="conditions[cashOnDelivery]" id="">
                                    @else
                                        <label for="">Yes</label>
                                        <input type="radio" value="true" name="conditions[cashOnDelivery]" id="">
                                        <label for="">No</label>
                                        <input type="radio" value="false" name="conditions[cashOnDelivery]" id=""
                                               checked>

                                    @endif
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label class="mt-3"><b>Advance Cancellation</b></label>
                                    <input type="text"
                                           value="{{json_decode($offering_data->conditions)->advanceCancellation}}"
                                           name="conditions[advanceCancellation]" class="form-control">

                                    <label class="mt-3"><b>Cancellation Allowed</b></label><br>
                                    <!-- <input type="text" name="conditions[cancellationAllowed]" class="form-control"> -->
                                    @if((json_decode($offering_data->conditions)->cancellationAllowed) == "true")
                                        <label for="">Yes</label>
                                        <input type="radio" value="true" name="conditions[cancellationAllowed]" id=""
                                               checked>
                                        <label for="">No</label>
                                        <input type="radio" value="false" name="conditions[cancellationAllowed]" id="">

                                    @else
                                        <label for="">Yes</label>
                                        <input type="radio" value="true" name="conditions[cancellationAllowed]" id=""
                                               class="ml-2">
                                        <label for="">No</label>
                                        <input type="radio" value="false" name="conditions[cancellationAllowed]" id=""
                                               class="ml-2" checked>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4 class="sr-only-01" for="inlineFormInputGroup2">Status</h4>

                                    @if($offering_data->active == 1)
                                        <input style="margin-left:10px;" class="form-check-input" type="radio"
                                               name="status_type" id="flexRadioDefault1" value="1" checked>
                                    @else
                                        <input  style="margin-left:10px;" class="form-check-input" type="radio"
                                               name="status_type" id="flexRadioDefault1" value="1">
                                    @endif

                                    <label style="margin-left:30px;">
                                        Active
                                    </label>


                                    @if($offering_data->active != 1)
                                        <input style="margin-left:10px;" class="form-check-input" type="radio"
                                               name="status_type" id="flexRadioDefault1" value="0" checked>
                                    @else
                                        <input style="margin-left:10px;" class="form-check-input" type="radio"
                                               name="status_type" id="flexRadioDefault1" value="0">
                                    @endif

                                    <label style="margin-left:30px;">
                                        In-Active
                                    </label></div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4 class="sr-only-01" for="inlineFormInputGroup2">Gallery</h4>


                                    @if($offering_data->gallery)
                                        @foreach(json_decode($offering_data->gallery)  as $item)

                                            <div class="row mt-3 col-md-8">   <img src="{{$item}}" id="offeringCover" class="img-fluid"
                                                /> </div>
                                        @endforeach
                                    @endif


                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn  btn-outline-success btn-fw mt-3">Submit</button>
                        <!-- <button class="btn btn-light mt-3">Cancel</button> -->
                        <a href="{{url('service/offering-list')}}"
                           class="btn btn-light mt-3 btn  btn-outline-danger btn-fw">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection