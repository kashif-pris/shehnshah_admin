@extends('layouts.main')
@section('content')
    <style>
        input[type=checkbox]:before {
            border: 1px solid black;
        }

        .wizard > .content {
            min-height: 0 !important;
        }
    </style>
    <div class="page-header">
        <h3 class="page-title">
            New Coupons
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(1)}}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <form name="myForm" onsubmit="return validateForm()" id="example-form"
                          action="{{route('coupon-save')}}" method="post" enctype="multipart/form-data">@csrf

                        <div>
                            <h3>General Information</h3>
                            {{-- tab one --}}
                            <section>
                                <div class="form-group">

                                    <h5 class="sr-only-01" for="inlineFormInputGroup2">Coupon Type</h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="coupon_type">
                                                <option>Select option</option>
                                                <option value="0">Normal</option>
                                                <option value="1">Instant</option>

                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coupon_type"
                                               id="flexRadioDefault1" value="3">
                                        <label>
                                            Special
                                        </label>
                                    </div> --}}


                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business</label>
                                            <select class="form-control" name="business" id="business_id">
                                                <option value="" selected disabled>--Select--</option>


                                                @forelse($business as $b)
                                                    @if (session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')
                                                        {
                                                        @if(isset($vendor_id ))
                                                            <option {{ $vendor_id->id == $b->id ? "selected" : "" }}      value="{{ $b->id }}">{{$b->title}}</option>

                                                        @else
                                                            <option {{ old('business') == $b->id ? "selected" : "" }}      value="{{ $b->id }}">{{$b->title}}</option>

                                                        @endif
                                                    @else
                                                        <option {{ @$vendor_id->id == $b->id ? "selected" : "selected" }}      value="{{ @$b->id }}">{{@$b->title}}</option>

                                                    @endif
                                                @empty

                                                @endforelse
                                            </select>
                                            <div class="alert-danger">{{$errors->first('business')}}</div>

                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Title </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{old('title')}}" placeholder="About" name="title">
                                            <div class="alert-danger">{{$errors->first('title')}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> About <small
                                                        style="color:green;">(150 character allowed)</small> </label>

                                            <textarea type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                      placeholder="About" name="about" rows="8"
                                                      cols="50">{{Request::old('about')}}</textarea>
                                            <div class="alert-danger">{{$errors->first('about')}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Price </label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" value="{{old('price')}}" name="price">
                                            <div class="alert-danger">{{$errors->first('price')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="discount_value">Discount Value</label>
                                            <input type="number" class="form-control" id="discount_value"
                                                   placeholder="" value="{{old('discount_value')}}"
                                                   name="discount_value">
                                            <div class="alert-danger">{{$errors->first('discount_value')}}</div>

                                        </div>

                                        <div class="form-group">
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
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label>Service</label>
                                            <select class="form-control" name="service" id="service_id">
                                                <option value="" selected disabled>--Select--</option>

                                                @forelse($service as $s)

                                                    <option {{ old('service') == $s->id ? "selected" : "" }} value="{{ $s->id }}">{{$s->title}}</option>

                                                @empty

                                                @endforelse
                                            </select>
                                            <div class="alert-danger">{{$errors->first('service')}}</div>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Subtitle </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" value="{{old('subtitle')}}" name="subtitle">
                                            <div class="alert-danger">{{$errors->first('subtitle')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Description <small
                                                        style="color:green">(150 character allowed)</small></label>

                                            <textarea class="form-control" id="exampleInputConfirmPassword1"
                                                      placeholder="About" name="description" rows="8"
                                                      cols="50">{{Request::old('description')}}</textarea>
                                            <div class="alert-danger">{{$errors->first('description')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="discount_rate">Discount Rate (%) </label>
                                            <input type="number" class="form-control" id="discount_rate"
                                                   placeholder="" value="{{old('discount_rate')}}"
                                                   name="discount_rate">
                                            <div class="alert-danger">{{$errors->first('discount_rate')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Highlight</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="" value="{{old('highlight')}}" name="highlight">
                                            <div class="alert-danger">{{$errors->first('highlight')}}</div>

                                        </div>


                                    </div>
                                </div>

                            </section>
                            {{-- Tab two --}}
                            <h3>Sale Condition</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">From </label>
                                            <input type="date" class="form-control" id="fromdate"
                                                   placeholder="About" name="salecondition[from]">
                                            <div class="alert-danger">{{$errors->first('start_date')}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="number">Daily Limit </label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="salecondition[dailyLimit]">


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Total Limit</label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="salecondition[totalLimit]">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Yearly Limit</label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="salecondition[yearlyLimit]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">To </label>
                                            <input type="date" class="form-control" id="todate"
                                                   placeholder="About" name="salecondition[to]" required>
                                            <div class="alert-danger">{{$errors->first('finish_date')}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Weekly Limit</label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="salecondition[weeklyLimit]">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Monthly Limit</label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="salecondition[monthlyLimit]">
                                        </div>


                                    </div>
                                </div>
                            </section>
                            {{-- Tab three --}}
                            <h3>Use COndition</h3>

                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">From </label>
                                            <input type="date" class="form-control" id="condationfromdate"
                                                   placeholder="About" name="usecondition[from]" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Daily Limit </label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="usecondition[dailyLimit]">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Total Limit</label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="usecondition[totalLimit]" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Yearly Limit </label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="usecondition[yearlyLimit]" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Value Limit</label>
                                            <input type="number" class="form-control"
                                                   id="exampleInputConfirmPassword1" placeholder="About"
                                                   name="usecondition[valueLimit]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">To </label>
                                            <input type="date" class="form-control"
                                                   id="condationtodate" placeholder="
                                                   About" name="usecondition[to]" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Weekly Limit</label>
                                            <input type="number" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="usecondition[weeklyLimit]">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Monthly Limit</label>
                                            <input type="number" class="form-control"
                                                   id="exampleInputConfirmPassword1" placeholder="About"
                                                   name="usecondition[monthlyLimit]">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> Discount Limit</label>
                                            <input type="number" class="form-control"
                                                   id="exampleInputConfirmPassword1" placeholder="About"
                                                   name="usecondition[discountLimit]">
                                        </div>


                                    </div>
                                    <div class="col-md-12">
                                        <div style="border: 1px solid #e0e0ef; padding: 8px;">
                                            <label style="margin-right:20px; font-weight:bold;"
                                                   for="exampleInputConfirmPassword1">Days: </label>

                                            @forelse ($week as $key=>$day)
                                                <input class="day" type="checkbox" id="day_{{$key}}" value="{{$day}}"
                                                       name="usecondition[days][]" checked>
                                                <label for="day_{{$key}}"> {{$day}}</label>
                                            @empty

                                            @endforelse


                                        </div>

                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <div style="border: 1px solid #e0e0ef; padding:8px;">
                                            <label style="margin-right:20px; font-weight:bold;"
                                                   for="exampleInputConfirmPassword1">Shifts: </label>


                                            <input class="shift_check" type="checkbox" id="vehicle3" value="Morning"
                                                   name="usecondition[shifts][]" checked>
                                            <label for="vehicle3"> Morning</label>

                                            <input class="shift_check" type="checkbox" id="vehicle1" value="Evening"
                                                   name="usecondition[shifts][]" checked>
                                            <label for="vehicle1"> Evening</label>

                                            <input class="shift_check" type="checkbox" id="vehicle1" value="afternoon"
                                                   name="usecondition[shifts][]" checked>
                                            <label for="vehicle1"> Afternoon</label>

                                        </div>

                                    </div>
                                </div>
                            </section>

                            <h3>Others</h3>
                            <!-- <section>
                               <div class="row">

                                <div class="col-md-4">

                                  <h3 >Others</h3>
                                      <div class="form-inline repeater">
                                            <div data-repeater-list="group_b">
                                              <div data-repeater-item class="d-flex mb-2">

                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                  <div class="input-group-prepend">

                                                  </div>
                                                  <input style="width: 250px;" type="text" class="form-control form-control-sm" name="othercondition" id="inlineFormInputGroup1" placeholder="Choose File">
                                                </div>

                                                <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                                  <i class="fas fa-trash"></i>
                                                </button>
                                              </div>
                                            </div>
                                            <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn  mb-2">
                                              <i class="fa fa-plus"></i>
                                            </button>
                                 </div>



                                </div>



                            </section> -->
                            <section>
                                <div class="row">

                                    <div class="col-lg-4">

                                        <h3>Other</h3>
                                        <div class="form-inline repeater">
                                            <div data-repeater-list="group_b">
                                                <div data-repeater-item class="d-flex mb-2">

                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-prepend">

                                                        </div>
                                                        <input style="width: 250px;" type="text"
                                                               class="form-control form-control-sm"
                                                               name="othercondition" id="inlineFormInputGroup1"
                                                               placeholder="Choose File">
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


                                    <div class="col-lg-4">
                                        <h3 class="sr-only-01" for="inlineFormInputGroup2">Status</h3>
                                        <div class="form-check">
                                            <input disabled class="form-check-input" type="radio" name="status_type"
                                                   id="flexRadioDefault1" value="1">
                                            <label>
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status_type"
                                                   id="flexRadioDefault1" value="0" checked>
                                            <label>
                                                In-Active
                                            </label>
                                        </div>
                                    </div>

                                    <!--
                                                      <div class="col-lg-4">
                                                          <h3 class="sr-only-01" for="inlineFormInputGroup2">Contact Information</h3>
                                                          <label>Website</label>
                                                          <input type="text" name="contactInfo[webiste]" class="form-control">
                                                          <label>Phone</label>
                                                          <input type="text" name="contactInfo[phone]" class="form-control">
                                                          <label>Email</label>
                                                          <input type="text" name="contactInfo[email]" class="form-control">
                                                      </div> -->
                                </div>


                            </section>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>



        @if (session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')
        $(document).ready(function () {
            var value = $('#business_id').val();
            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route( 'business_service' ) }}',
                data: {
                    id: value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    $('#service_id').html(data);
                },

            });
        });






          @endif

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
        $("#todate").change(function () {
            var todate = $('#todate').val();
            var fromdate = $('#fromdate').val();
            if (fromdate > todate) {
                alert("Date should not be less than from current date.");
                $('#todate').val(null);
            }
        });
        $("#condationtodate").change(function () {
            var todate = $('#condationtodate').val();
            var fromdate = $('#condationfromdate').val();
            if (fromdate > todate) {
                alert("Date should not be less than from current date.");
                $('#condationtodate').val(null);
            }
        });

        function validateForm() {
            // let x = document.forms["myForm"]["fname"].value;
            // if (x == "") {
            //     alert("Name must be filled out");
            //     return false;
            // }
            const errors = [];


            // todate
            // fromdate

            // checked = $("input[type=checkbox]:checked").length;
            checked = $(".shift_check:checked").length;
            checked_day = $(".day:checked").length;

            if (!checked) {
                // alert("You must check at least one shift.");
                errors.push("You must check at least one shift.");
            }
            if (!checked_day) {
                // alert("You must check at least one Day.");
                errors.push("You must check at least one Day");
            }
            if (errors.length > 0) {

                var i;
                for (i = 0; i < errors.length; ++i) {
                    alert(errors[i]);
                }
                return false;

            }


        }

        $("#discount_rate").change(function () {
            var discount_rate = $('#discount_rate').val();
            if (discount_rate && discount_rate != "") {
                $("#discount_value").attr('readonly', 'readonly');
            } else {
                $("#discount_value").attr('readonly', false);
            }
        });
        $("#discount_value").change(function () {
            var discount_value = $('#discount_value').val();
            if (discount_value && discount_value != "") {
                $("#discount_rate").attr('readonly', 'readonly');
            } else {
                $("#discount_rate").attr('readonly', false);
            }
        });

    </script>

@endsection