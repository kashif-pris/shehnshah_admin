@extends('layouts.main')
@section('content')

    <style>
        .modal-header-1 {
            padding: 10px 26px !important;
        }

        .modal-dialog-1 {
            margin-top: calc(10px + 0px) !important;
        }

        .modal-dialog-1 {
            max-width: 850px;
            margin: 30px auto;
        }

        .form-padding {
            padding-top: 10px;
        }

        .card-body {
            padding: 10px !important;
        }

        .card .card-title {
            margin-bottom: 0.25rem !important;
        }

        .dropify-wrapper {
            height: 117px !important;
        }

        .modal-body-1 {
            padding: 5px 26px !important;
            overflow: hidden;
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

    <div class="card ">
        <div class="card-body ">
            @can('discount_add')
                <div class="pull-right " style=" margin-top:20px; margin-bottom:10px; margin-left:12px;">
                    <a class="btn btn-outline-success btn-fw " data-toggle="modal" data-target="#exampleModal"><i
                                class="fa fa-plus-circle"></i> Create New Discount</a>
                <!-- <a href="{{url('discounts/discount-list')}}" class="btn btn-outline-success btn-fw"><i class="fa fa-plus-circle"></i> Create New Queue</a> -->

                </div>
        @endcan

        <!-- <div class="row pb-3">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2></h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Create New Model</a>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Sr #</th>
                                <th>Service</th>
                                <th>Business</th>
                                <th>Title</th>
                                <th>Highlight</th>
                                <!-- <th>Description</th> -->
                                <th>Rate</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($make as $key=>$make_list)
                                <tr>
                                    <td>{{$key+1}}</td>

                                    <td>{{@$make_list->service_name->title}}</td>
                                    <td>{{@$make_list->business_name->title}}</td>
                                    <td>{{$make_list->title}}</td>
                                    <td>{{$make_list->highlight}}</td>
                                <!-- <td>{{$make_list->description}}</td> -->
                                    <td>{{$make_list->rate}}</td>
                                    <td> @if($make_list->active == '1')
                                            <div class="badge badge-success badge-pill">Active</div>
                                        @else
                                            <div class="badge badge-warning badge-pill">In-Active</div>
                                        @endif</td>


                                    <td>
                                    @can('discount_view')
                                        <!-- <a href="{{url('lookup/model-view')}}/{{$make_list->id}}" class="btn btn-sm btn-outline-primary">View</a> -->

                                            <a onclick="getdata('{{@$make_list->id}}','{{@$make_list->business_name->title}}','{{@$make_list->service_name->title}}','{{$make_list->title}}','{{$make_list->highlight}}','{{$make_list->description}}','{{$make_list->rate}}','{{$make_list->value}}','{{$make_list->active}}','{{$make_list->cover}}')"
                                               class="btn btn-sm btn-outline-success" data-toggle="modal"
                                               data-target="#exampleModal3"> View</a>
                                    @endcan
                                    @can('discount_edit')
                                        <!-- <a href="{{url('lookup/model-edit')}}/{{$make_list->id}}" class="btn btn-sm btn-outline-success">Edit</a> -->

                                            <a onclick="getInfo('{{@$make_list->id}}','{{@$make_list->business_name->id}}','{{@$make_list->service_name->id}}','{{$make_list->title}}','{{$make_list->highlight}}','{{$make_list->description}}','{{$make_list->rate}}','{{$make_list->value}}','{{$make_list->active}}','{{$make_list->cover}}' ,'{!! $make_list->make_id !!}')"
                                               class="btn btn-sm btn btn-outline-warning" data-toggle="modal"
                                               data-target="#exampleModal2">Edit</a>
                                        @endcan
                                        @can('discount_delete')
                                            <a href="{{url('discounts/discount-delete')}}/{{$make_list->id}}"
                                               class="btn btn-sm btn-outline-danger">Delete</a>
                                        @endcan
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-1" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-1">
                    <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('discount-store')}}" onsubmit="return validateForm()" name="myForm" id="myForm" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">


                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Select Business *</label>
                            <div class="col-sm-4">
                                <select required class="form-control" id="business_id" name="business_id">
                                    <option value="" disabled selected>--Select Business--</option>
                                    @forelse($makeData  as $key=>$m)
                                        <option value="{{$m->id}}">{{$m->title}}</option>
                                    @empty

                                    @endforelse

                                </select>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Select Service *</label>
                            <div class="col-sm-4">
                                <select required class="form-control" id="service_id" name="service_id">
                                    <option value="" disabled selected>--Select Service--</option>
                                    {{--                            @forelse($makeService  as $key=>$m) --}}
                                    {{--                            <option  value="{{$m->id}}">{{$m->title}}</option>--}}
                                    {{--                            @empty --}}

                                    {{--                            @endforelse--}}

                                </select>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Title *</label>
                            <div class="col-sm-4">
                                <input type="text" required class="form-control" id="exampleInputEmail2"
                                       placeholder="Title" name="title">
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Heighlight *</label>
                            <div class="col-sm-4">
                                <input type="text" required class="form-control" id="exampleInputEmail2"
                                       placeholder="Heighlight" name="heighlight">
                            </div>


                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Rate *</label>
                            <div class="col-sm-4 form-padding">
                                {{-- <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Rate"
                                       name="rate"> --}}
                                <input type="number" onFocusOut="disableOther('add')" class="form-control discount_rate_add" id="discount_rate"
                                       placeholder="" name="rate">
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Value *</label>
                            <div class="col-sm-4 form-padding ">
                                {{-- <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Value"
                                       name="value"> --}}
                                       <input type="number" onFocusOut="disableOther('add')" class="form-control discount_value_add" id="discount_value"
                                       placeholder="" value=""
                                       name="value">
                            </div>

                            <!-- <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Cover *</label>
                            <div class="col-sm-9">
                              <input type="file" required class="form-control" id="exampleInputEmail2" placeholder="Cover" name="cover">
                            </div> -->
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Description *</label>
                            <div class="col-sm-4 form-padding mt-2">
                                <textarea required class="form-control" id="exampleInputEmail2"
                                          placeholder="Description" name="description" rows="10" cols="50"></textarea>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <div class="card">

                                    <div class="card-body">
                                        <h4 class="card-title d-flex">Cover
                                            <small class="ml-auto align-self-end">
                                                <small class="text-danger">JPG, PNG </small>
                                            </small>
                                        </h4>
                                        <input required type="file" name="cover" class="dropify"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn  btn-outline-success btn-fw ">Submit</button>
                        <button type="button" class="btn  btn-outline-danger btn-fw" data-dismiss="modal">Cancel
                        </button>

                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel">View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">


                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Select Business *</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="formBusinessView" placeholder="Title"
                                   name="title" readonly>
                        </div>
                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Select Service *</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="formServiceView" placeholder="Title"
                                   name="title" readonly>
                        </div>
                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Title *</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="formTitleView" placeholder="Title"
                                   name="title" readonly>
                        </div>
                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Heighlight *</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="formHeighlightView"
                                   placeholder="Heighlight" name="heighlight" readonly>
                        </div>

                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Description *</label>
                        <div class="col-sm-4">
                            <textarea required id="formDescriptionView" placeholder="Description" name="description"
                                      rows="4" cols="25" readonly></textarea>
                        </div>

                        <label for="exampleInputEmail2" class="col-sm-2 col-form-labelView">Cover *</label>
                        <div class="col-sm-4">
                            <img src="" id="formCoverView"
                                 style="height:85px;width:100%;border-radius:none !important"/>
                        </div>

                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Rate *</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="formRateView" placeholder="Rate"
                                   name="rate" readonly>
                        </div>
                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Value *</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="formValueView" placeholder="Value"
                                   name="value" readonly>
                        </div>


                    </div>


                    <button type="button" class="btn btn-primary mr-2" data-dismiss="modal">Cancel</button>


                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-1" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-1">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-body-1">
                    <form action="{{route('discount-edit-store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">


                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Select Business *</label>
                            <div class="col-sm-4">
                                <select required class="form-control" id="business_id_edit" name="business_id">
                                    <option value="" disabled selected>--Select Business--</option>

                                    @forelse($makeData  as $key=>$m)

                                        <option value="{{$m->id}}">{{$m->title}}</option>
                                    @empty

                                    @endforelse

                                </select>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Select Service *</label>
                            <div class="col-sm-4">
                                <select required class="form-control" id="service_id_edit" name="service_id">
                                    <option value="" disabled selected>--Select Service--</option>
                                    @forelse($makeService  as $key=>$m)
                                        <option value="{{$m->id}}">{{$m->title}}</option>
                                    @empty

                                    @endforelse

                                </select>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Title *</label>
                            <div class="col-sm-4">
                                <input type="text" required class="form-control" id="formTitle" placeholder="Title"
                                       name="title">
                                <input type="text" required class="form-control" id="formIdView" placeholder="Title"
                                       name="id" hidden>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Heighlight *</label>
                            <div class="col-sm-4">
                                <input type="text" required class="form-control" id="formHeighlight"
                                       placeholder="Heighlight" name="heighlight">
                            </div>


                            {{-- <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Cover *</label>
                            <div class="col-sm-4 pt-1">
                              <input type="file" required class="form-control" id="exampleInputEmail2" placeholder="Cover" name="cover">
                            </div> --}}

                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Rate *</label>
                            <div class="col-sm-4 pt-1">
                                {{-- <input type="text" required class="form-control" id="formRate" placeholder="Rate"
                                       name="rate"> --}}
                                       <input type="number" onFocusOut="disableOther('edit')"  class="form-control discount_rate_edit" id="formRate"
                                       placeholder="" name="rate">
                            </div>

                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Value *</label>
                            <div class="col-sm-4">
                                {{-- <input type="text" required class="form-control" id="formValue" placeholder="Value"
                                       name="value"> --}}
                                       <input type="number" onFocusOut="disableOther('edit')" class="form-control discount_value_edit" id="formValue"
                                       placeholder="" value=""
                                       name="value">
                                       
                            </div>

                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Description *</label>
                            <div class="col-sm-4 pt-3">
                                <textarea required id="formDescription" placeholder="Description" name="description"
                                          rows="7" cols="25"></textarea>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <div class="card">

                                    <div class="card-body">
                                        <h4 class="card-title d-flex">Cover
                                            <small class="ml-auto align-self-end">
                                                <small class="text-danger">JPG, PNG </small>
                                            </small>
                                        </h4>
                                        <input type="file" name="cover" class="dropify"/>
                                    </div>
                                </div>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Status *</label>

                            <div class="col-sm-4 pt-1">
                                <select name="status" class="form-control" id="formStatus">
                                </select>
                            </div>
                            <div class="col-sm-4 pt-1">
                                <img id="cover_img" src="" class="img-fluid" alt="img"/>
                            </div>
                        </div>


                        <div class="col-sm-12 mt-5">
                            <button type="submit" class="btn  btn-outline-success btn-fw">Submit</button>
                            <button type="button" class="btn  btn-outline-danger btn-fw" data-dismiss="modal">Cancel
                            </button>

                        </div>
                    </form>
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
        //  $("#discount_rate").change(function () {

        //     if (discount_rate && discount_rate != "") {
        //         $("#discount_value").attr('readonly', 'readonly');
        //     } else {
        //         $("#discount_value").attr('readonly', false);
        //     }
        // });
        // $("#discount_value").change(function () {
            
        //     if (discount_value && discount_value != "") {
        //         $("#discount_rate").attr('readonly', 'readonly');
        //     } else {
        //         $("#discount_rate").attr('readonly', false);
        //     }
        // });
        const disableOther = (model_type)=>{
            var discount_rate = $('.discount_rate_'+model_type).val();
            var discount_value = $('.discount_value_'+model_type).val();
            if(discount_rate != ''){
                $(".discount_value_"+model_type).attr('readonly', true); 
                $(".discount_rate_"+model_type).attr('readonly', false); 
            }
            if(discount_value != ''){
                $(".discount_rate_"+model_type).attr('readonly', true); 
                $(".discount_value_"+model_type).attr('readonly', false); 

            }
            if(discount_rate =='' && discount_value == ''){
                $(".discount_rate_"+model_type).attr('readonly', false); 
                $(".discount_value_"+model_type).attr('readonly', false);  
            }
        }

    </script>
    <script>
        const getInfo = (id, business, service, name, heighlight, description, rate, value, status, image) => {
            // alert(image);
            $('#formStatus').html('');
            $('#formIdView').val(id);
            $("#business_id_edit").val(business);
            $("#service_id_edit").val(service);
            $('#formTitle').val(name);
            $('#formHeighlight').val(heighlight);
            $('#formDescription').val(description);
            $('#formDescription').val(description);
            $('#cover_img').attr("src", image);
            $('#formRate').val(rate);
            $('#formValue').val(value);
            if (status == '1') {
                var htmlOptions = `<option value="1" selected>Active</option>
        <option value="0">In-Active</option>`;
            } else {
                var htmlOptions = `<option value="1">Active</option>
        <option value="0" selected>In-Active</option>`;
            }
            $('#formStatus').append(htmlOptions);
            // $('.service_icon').attr('src',imgPath);
        }
    </script>

    <script>
        const getdata = (id, business, service, name, heighlight, description, rate, value, status, cover) => {

            $('#formStatus').html('');
            $('#formStatusView').html('');
            // alert(business);
            $('#formIdView').val(id);
            $("#formBusinessView").val(business);
            $("#formServiceView").val(service);
            $('#formTitleView').val(name);
            $('#formHeighlightView').val(heighlight);
            $('#formDescriptionView').val(description);
            $('#formDescriptionView').val(description);
            $('#formRateView').val(rate);
            $('#formValueView').val(value);
            $("#formCoverView").attr('src', '' + cover);
            // document.getElementById('formCoverView').style.display='block';
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



@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $('#business_id').on('change', function () {
            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route( 'business_service' ) }}',
                data: {
                    id: this.value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {

                    $('#service_id').html(data);
                },

            });


        });
        $('#business_id_edit').on('change', function () {


            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route( 'business_service' ) }}',
                data: {
                    id: this.value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {

                    $('#service_id_edit').html(data);
                },

            });


        });

        function validateForm() {
            // let x = document.forms["myForm"]["fname"].value;
            // if (x == "") {
            //     alert("Name must be filled out");
            //     return false;
            // }
            const errors = [];

            // checked = $("input[type=checkbox]:checked").length;

            let Service = document.forms["myForm"]["service_id"].value;
            if (Service == " ") {

                alert("Service  must be filled out");
                return false;
            }
            let cover = document.forms["myForm"]["cover"].value;
            if (cover == " ") {

                alert("Cover  must be filled out");
                return false;
            }


        }

    </script>
@endsection