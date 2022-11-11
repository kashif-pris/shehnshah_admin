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
                <form action="{{route('offering-store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row border">
                        <div class="col-md-6 mt-2">
                            <div class="form-group row">
                                <label required for="exampleInputEmail2" class="col-sm-3 col-form-label">Service</label>
                                <div class="col-sm-9">
                                    <select required class="form-control" id="service" name="serviceId" >
                                        <option value="">Select option</option>
                                        @foreach($Service as $item)
                                            <option  value="{!! $item->id  !!}">{!! $item->title !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" placeholder="Icon" name="title"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Sub Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" placeholder="" name="sub_Title"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">About</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" placeholder="" name="about" required>
                                </div>
                            </div>

                        </div>


                        <div class="form-group col-lg-6 mt-2">
                            <div class="card">

                                <div class="card-body">
                                    <h4 class="card-title d-flex">Cover
                                        <small class="ml-auto align-self-end">
                                            <small class="text-danger">JPG, PNG </small>
                                        </small>
                                    </h4>
                                    <input type="file" name="cover" class="dropify" required/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-12 mt-3  ">
                                    <h3>Specification</h3>
                                    <div class="form-inline repeater">
                                        <div data-repeater-list="specification">
                                            <div data-repeater-item class="d-flex mb-2">

                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <div class="input-group-prepend">

                                                    </div>
                                                    <input required style="width: 250px;" type="text"
                                                           class="form-control form-control-sm" name="specification"
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

                                <div class="col-lg-12   ">

                                    <h3>Options</h3>
                                    <div class="form-inline repeater">
                                        <div data-repeater-list="options">
                                            <div data-repeater-item class="d-flex mb-2">

                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <div class="input-group-prepend">

                                                    </div>
                                                    <input required style="width: 250px;" type="text"
                                                           class="form-control form-control-sm" name="option"
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
                                <div class="col-lg-12  ">

                                    <h3>Gallery</h3>
                                    <div class="form-inline repeater">
                                        <div data-repeater-list="gallery">
                                            <div data-repeater-item class="d-flex mb-2">

                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    <div class="input-group-prepend">

                                                    </div>
                                                    <input required style="width: 250px;" type="file"
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
                        </div>

                        <div class="col-lg-6">

                            <div class="row ">
                                <div class="col-md-12 mt-3  ">
                                    <h3 class="sr-only-01" for="inlineFormInputGroup2">Conditions</h3>
                                    <label><b>Cash on Delivery</b></label><br>
                                    <!-- <input type="text" name="conditions[cashOnDelivery]" class="form-control"> -->
                                    <input type="radio" value="true" name="conditions[cashOnDelivery]" id="">
                                    <label for="">Yes</label>
                                    <input type="radio" value="false" name="conditions[cashOnDelivery]" id=""
                                           class="ml-2" checked>
                                    <label for="">No</label>

                                </div>
                                <div class="col-md-12 ">
                                    <label class="mt-3"><b>Advance Cancellation</b></label>
                                    <input required type="text" name="conditions[advanceCancellation]" class="form-control">

                                    <label class="mt-3"><b>Cancellation Allowed</b></label><br>
                                    <!-- <input type="text" name="conditions[cancellationAllowed]" class="form-control"> -->
                                    <input type="radio" value="true" name="conditions[cancellationAllowed]" id="">
                                    <label for="">Yes</label>
                                    <input type="radio" value="false" name="conditions[cancellationAllowed]" id=""
                                           class="ml-2" checked>
                                    <label for="">No</label>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3">
                                <div class="col-md-12">
                                    <h4 class="sr-only-01" for="inlineFormInputGroup2">Status</h4>


                                    <input disabled style="margin-left:10px;" class="form-check-input" type="radio"
                                           name="status_type" id="flexRadioDefault1" value="1"  >



                                    <label style="margin-left:30px;">
                                        Active
                                    </label>


                                    <input style="margin-left:10px;" class="form-check-input" type="radio"
                                           name="status_type" id="flexRadioDefault1" value="0" checked>


                                    <label style="margin-left:30px;">
                                        In-Active
                                    </label></div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn  btn-outline-success btn-fw  mt-3">Submit</button>
                    <!-- <button class="btn btn-light mt-3">Cancel</button> -->
                    <a href="{{url('service/offering-list')}}"
                       class="btn btn-light mt-3 btn  btn-outline-danger btn-fw ">Cancel</a>

                </form>
            </div>
        </div>
    </div>

@endsection