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
                          action="{{route('coupon-edit-store')}}" method="post"
                          enctype="multipart/form-data">@csrf

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
                                                <option  @if($coupons_list->isInstant =='0') selected @endif value="0">Normal</option>
                                                <option @if($coupons_list->isInstant =='1') selected @endif  value="1">Instant</option>

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
                                            <select class="form-control" id="business_id" name="business">
                                                <option value="" selected disabled>--Select--</option>

                                                @forelse($business as $item)

                                                    <option value="{!! $item->id !!}"
                                                            @if($coupons_list->business_name->id == $item->id) selected @endif >{!! $item->title !!}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                            <div class="alert-danger">{{$errors->first('business')}}</div>

                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Subtitle </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="Subtitle" value="{{$coupons_list->subTitle}}"
                                                   name="subtitle">
                                            <div class="alert-danger">{{$errors->first('subtitle')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Description <small
                                                        style="color:green">(150 character allowed)</small></label>

                                            <textarea class="form-control" id="exampleInputConfirmPassword1"
                                                      placeholder="About" name="description" rows="8"
                                                      cols="50">{{$coupons_list->description}}</textarea>
                                            <div class="alert-danger">{{$errors->first('description')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Discount Rate </label>
                                            <input type="number" class="form-control" id="discount_rate"
                                                   placeholder="  " value="{{$coupons_list->discountRate}}"
                                                   name="discount_rate">
                                            <div class="alert-danger">{{$errors->first('discount_rate')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Highlight</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="Highlight" value="{{$coupons_list->highlight}}"
                                                   name="highlight">
                                            <div class="alert-danger">{{$errors->first('highlight')}}</div>

                                        </div> <div class="form-group">
                                            <div class="card">

                                                <div class="card-body">
                                                    <img src="{!! $coupons_list->cover !!}" alt="cover image "
                                                         class="img-fluid"/>


                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Service</label>
                                            <select id="service_id" class="form-control" name="service">
                                                <option value="" selected disabled>--Select--</option>
                                                @if(isset($coupons_list->service_name))
                                                    <option value="{{$coupons_list->service_name->id}}"
                                                            selected> {{$coupons_list->service_name->title}}</option>
                                                @endif
                                                @forelse($service as $s)

                                                    <option {{ old('service') == $s->id ? "selected" : "" }} value="{{ $s->id }}">{{$s->title}}</option>

                                                @empty

                                                @endforelse
                                            </select>
                                            <div class="alert-danger">{{$errors->first('service')}}</div>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Title </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$coupons_list->title}}" placeholder="About" name="title">
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$coupons_list->id}}" placeholder="About" name="id" hidden>
                                            <div class="alert-danger">{{$errors->first('title')}}</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> About <small
                                                        style="color:green;">(150 character allowed)</small> </label>

                                            <textarea type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                      placeholder="About" name="about" rows="8"
                                                      cols="50">{{$coupons_list->about}}</textarea>
                                            <div class="alert-danger">{{$errors->first('about')}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Price </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" value="{{$coupons_list->price}}" name="price">
                                            <div class="alert-danger">{{$errors->first('price')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Discount Value</label>
                                            <input type="number" class="form-control" id="discount_value"
                                                   placeholder=" " value="{{$coupons_list->discount_value}}"
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
                                                    <input type="file" name="cover" class="dropify"/>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </section>

                            <h3>Sale Condition</h3>

                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">From </label>
                                            @if(isset(json_decode($coupons_list->saleConditions)->from))
                                                <input type="date" class="form-control"
                                                       id="fromdate"
                                                       value="{{json_decode($coupons_list->saleConditions)->from}}"
                                                       placeholder="About" name="salecondition[from]">
                                            @else
                                                <input type="date" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="salecondition[from]">

                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Daily Limit </label>
                                            @if(isset(json_decode($coupons_list->saleConditions)->dailyLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->saleConditions)->dailyLimit}}"
                                                       placeholder="About" name="salecondition[dailyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="salecondition[dailyLimit]">
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Weekly Limit</label>

                                            @if(isset(json_decode($coupons_list->saleConditions)->weeklyLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->saleConditions)->weeklyLimit}}"
                                                       placeholder="About" name="salecondition[weeklyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="salecondition[weeklyLimit]">
                                            @endif
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputConfirmPassword1">Monthly Limit</label>
                                            @if(isset(json_decode($coupons_list->saleConditions)->monthlyLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->saleConditions)->monthlyLimit}}"
                                                       placeholder="About" name="salecondition[monthlyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="salecondition[monthlyLimit]">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">To </label>
                                            @if(isset(json_decode($coupons_list->saleConditions)->to))
                                                <input type="date" class="form-control"
                                                       id="todate"
                                                       value="{{json_decode($coupons_list->saleConditions)->to}}"
                                                       placeholder="About" name="salecondition[to]" required>
                                            @else
                                                <input type="date" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="salecondition[to]" required>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Total Limit</label>
                                            @if(isset(json_decode($coupons_list->saleConditions)->totalLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->saleConditions)->totalLimit}}"
                                                       placeholder="About" name="salecondition[totalLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="salecondition[totalLimit]">
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Yearly Limit</label>
                                            @if(isset(json_decode($coupons_list->saleConditions)->yearlyLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->saleConditions)->yearlyLimit}}"
                                                       placeholder="Yearly Limit" name="salecondition[yearlyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value=""
                                                       placeholder="Yearly Limit" name="salecondition[yearlyLimit]">
                                            @endif

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
                                            @if(isset(json_decode($coupons_list->useConditions)->from))
                                                <input type="date" class="form-control"
                                                       id="condationfromdate"
                                                       value="{{json_decode($coupons_list->useConditions)->from}}"
                                                       placeholder="About" name="usecondition[from]" required>
                                            @else
                                                <input type="date" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="todate[from]" required>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Daily Limit </label>
                                            @if(isset(json_decode($coupons_list->useConditions)->dailyLimit))
                                                <input type="text" class="form-control"
                                                       id="fromdate"
                                                       value="{{json_decode($coupons_list->useConditions)->dailyLimit}}"
                                                       placeholder="About" name="usecondition[dailyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="usecondition" value="" placeholder="About"
                                                       name="usecondition[dailyLimit]">
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Weekly Limit</label>

                                            @if(isset(json_decode($coupons_list->useConditions)->weeklyLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->useConditions)->weeklyLimit}}"
                                                       placeholder="About" name="usecondition[weeklyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="usecondition[weeklyLimit]">
                                            @endif
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputConfirmPassword1">Monthly Limit</label>
                                            @if(isset(json_decode($coupons_list->useConditions)->monthlyLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->useConditions)->monthlyLimit}}"
                                                       placeholder="About" name="usecondition[monthlyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value="" placeholder="About"
                                                       name="usecondition[monthlyLimit]">
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">To </label>
                                            @if(isset(json_decode($coupons_list->useConditions)->to))
                                                <input type="date" class="form-control"
                                                       id="condationtodate"
                                                       value="{{json_decode($coupons_list->useConditions)->to}}"
                                                       placeholder="About" name="usecondition[to]" required>
                                            @else
                                                <input type="date" class="form-control"
                                                       id="condationtodate" value="" placeholder="About"
                                                       name="usecondition[to]" required>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Total Limit</label>
                                            @if(isset(json_decode($coupons_list->useConditions)->totalLimit))
                                                <input type="text" class="form-control"
                                                       id="condationfromdate"
                                                       value="{{json_decode($coupons_list->useConditions)->totalLimit}}"
                                                       placeholder="About" name="usecondition[totalLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="condationfromdate" value="" placeholder="About"
                                                       name="usecondition[totalLimit]">
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Yearly Limit</label>
                                            @if(isset(json_decode($coupons_list->useConditions)->yearlyLimit))
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1"
                                                       value="{{json_decode($coupons_list->useConditions)->yearlyLimit}}"
                                                       placeholder="Yearly Limit" name="usecondition[yearlyLimit]">
                                            @else
                                                <input type="text" class="form-control"
                                                       id="exampleInputConfirmPassword1" value=""
                                                       placeholder="Yearly Limit" name="usecondition[yearlyLimit]">
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="border: 1px solid #e0e0ef; padding: 8px;">
                                            <label style="margin-right:20px; font-weight:bold;"
                                                   for="exampleInputConfirmPassword1">Days: </label>


                                            @forelse ($week as $key=>$day)
                                                @if(isset($couponDays->Days))
                                                    <input class="day"
                                                           @if(in_array($day,$couponDays->Days)){{'checked'}}@endif type="checkbox"
                                                           id="day_{{$key}}" value="{{$day}}"
                                                           name="usecondition[days][]">
                                                @else
                                                    <input class="day"
                                                           @if(in_array($day,$couponDays->days)){{'checked'}}@endif type="checkbox"
                                                           id="day_{{$key}}" value="{{$day}}"
                                                           name="usecondition[days][]">

                                                @endif
                                                <label for="day_{{$key}}"> {{$day}}</label>
                                            @empty

                                            @endforelse


                                        </div>

                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <div style="border: 1px solid #e0e0ef; padding:8px;">
                                            <label style="margin-right:20px; font-weight:bold;"
                                                   for="exampleInputConfirmPassword1">shifts: </label>
                                            @if(isset($couponDays->Shifts))
                                                {{--                                                @forelse (($couponDays->Shifts) as $key=>$shift)--}}

                                                <input class="shift_check"
                                                       @if($shift == 'Morning') {{'checked'}} @endif type="checkbox"
                                                       id="vehicle3" value="Morning" name="usecondition[shifts][]">
                                                <label for="vehicle3"> Morning</label>

                                                <input class="shift_check"
                                                       @if($shift == 'Evening') {{'checked'}} @endif type="checkbox"
                                                       id="vehicle1" value="Evening" name="usecondition[shifts][]">
                                                <label for="vehicle1"> Evening</label>


                                                <input class="shift_check"
                                                       @if($shift == 'afternoon') {{'checked'}} @endif type="checkbox"
                                                       id="vehicle1" value="afternoon" name="usecondition[shifts][]">
                                                <label for="vehicle1"> Afternoon</label>

                                                {{--                                                @empty--}}

                                                {{--                                                @endforelse--}}
                                            @else
                                                {{--                                                @forelse (($couponDays->shifts) as $key=>$shift)--}}
                                                {{--                                                @dd($couponDays->shifts)--}}
                                                <input class="shift_check"
                                                       @if(in_array("Morning", $couponDays->shifts))  {{'checked'}} @endif type="checkbox"
                                                       id="vehicle3" value="Morning" name="usecondition[shifts][]">
                                                <label for="vehicle3"> Morning</label>

                                                <input class="shift_check"
                                                       @if(in_array("Evening", $couponDays->shifts)   ) {{'checked'}} @endif type="checkbox"
                                                       id="vehicle1" value="Evening" name="usecondition[shifts][]">
                                                <label for="vehicle1"> Evening</label>

                                                <input class="shift_check"
                                                       @if(in_array("afternoon", $couponDays->shifts) ) {{'checked'}} @endif type="checkbox"
                                                       id="vehicle1" value="afternoon" name="usecondition[shifts][]">
                                                <label for="vehicle1"> Afternoon</label>

                                                {{--                                                @empty--}}
                                                {{----}}
                                                {{--                                                @endforelse--}}
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </section>

                            <h3>Others</h3>

                            <section>

                                <div class="row">

                                    <div class="col-lg-7">

                                        <h3>Other</h3>
                                        {{-- <div class="form-inline repeater">
                                            <div data-repeater-list="group_b">
                                                <div data-repeater-item class="d-flex mb-2">

                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-prepend">

                                                        </div>
                                                        @foreach(json_decode($coupons_list->otherConditions) as $data)
                                                            <input style="width: 250px;" type="text"
                                                                   class="form-control form-control-sm"
                                                                   value="{{$data}}" name="othercondition"
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
                                        </div> --}}
                                        <div class="form-inline repeater">

                                            <div data-repeater-list="group_b">
                                                @foreach(json_decode($coupons_list->otherConditions) as $key=>$data)
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



                                    {{--                                    <div class="col-lg-4">--}}
                                    {{--                                        <h3 class="sr-only-01" for="inlineFormInputGroup2">Coupon Type</h3>--}}
                                    {{--                                        <div class="form-check">--}}
                                    {{--                                            @if($coupons_list->isInstant =='1')--}}
                                    {{--                                                <input class="form-check-input" type="radio" name="coupon_type"--}}
                                    {{--                                                       id="flexRadioDefault1" value="1" checked>--}}
                                    {{--                                            @else--}}
                                    {{--                                                <input class="form-check-input" type="radio" name="coupon_type"--}}
                                    {{--                                                       id="flexRadioDefault1" value="1">--}}
                                    {{--                                            @endif--}}
                                    {{--                                            <label>--}}
                                    {{--                                                Normal--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="form-check">--}}
                                    {{--                                            @if($coupons_list->isInstant =='2')--}}
                                    {{--                                                <input class="form-check-input" type="radio" name="coupon_type"--}}
                                    {{--                                                       id="flexRadioDefault1" value="2" checked>--}}
                                    {{--                                            @else--}}
                                    {{--                                                <input class="form-check-input" type="radio" name="coupon_type"--}}
                                    {{--                                                       id="flexRadioDefault1" value="2">--}}
                                    {{--                                            @endif--}}
                                    {{--                                            <label>--}}
                                    {{--                                                Instant--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="form-check">--}}
                                    {{--                                            @if($coupons_list->isInstant =='3')--}}
                                    {{--                                                <input class="form-check-input" type="radio" name="coupon_type"--}}
                                    {{--                                                       id="flexRadioDefault1" value="3" checked>--}}
                                    {{--                                            @else--}}
                                    {{--                                                <input class="form-check-input" type="radio" name="coupon_type"--}}
                                    {{--                                                       id="flexRadioDefault1" value="3">--}}
                                    {{--                                            @endif--}}
                                    {{--                                            <label>--}}
                                    {{--                                                Special--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}


                                    {{-- <div class="col-lg-4">
                                        <h3 class="sr-only-01" for="inlineFormInputGroup2">Status</h3>
                                        <div class="form-check">
                                            @if($coupons_list->status == '1')
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="1" checked>
                                            @else
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="1">
                                            @endif

                                            <label>
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            @if($coupons_list->status != '1')
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="0" checked>
                                            @else
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="0">
                                            @endif

                                            <label>
                                                In-Active
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-4">
                                        <h3 class="sr-only-01" for="inlineFormInputGroup2">Status</h3>
                                        <div class="form-check">
                                            {{-- @dd($coupons_list->status) --}}
                                            @if($coupons_list->active == '1')
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="1" checked>
                                            @else
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="1">
                                            @endif

                                            <label>
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            @if($coupons_list->active == '1')
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="0">
                                            @else
                                                <input class="form-check-input" type="radio" name="status_type"
                                                       id="flexRadioDefault1" value="0" checked>
                                            @endif

                                            <label>
                                                In-Active
                                            </label>
                                        </div>
                                    </div>
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
            console.log(fromdate);
            if (fromdate > todate) {
                alert("You must To date Grather then From Date.");
                $('#todate').val(null);
            }
        });
        $("#condationtodate").change(function () {
            var todate = $('#condationtodate').val();
            var fromdate = $('#condationfromdate').val();
            if (fromdate > todate) {
                alert("You must To date Grather then From Date.");
                $('#condationtodate').val(null);
            }
        });
        $("#fromdate").change(function () {
            var todate = $('#todate').val();
            var fromdate = $('#fromdate').val();
            console.log(fromdate);
            if (fromdate > todate) {
                alert("You must To date Less then From Date.");
                $('#todate').val(null);
            }
        });
        $("#condationfromdate").change(function () {
            var todate = $('#condationtodate').val();
            var fromdate = $('#condationfromdate').val();
            if (fromdate > todate) {
                alert("You must To date less then From Date.");
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

        $(document).ready(function () {

            var discount_value = $('#discount_value').val();

            if (discount_value && discount_value != "") {
                $("#discount_rate").attr('readonly', 'readonly');
            } else {
                $("#discount_rate").attr('readonly', false);
            }
            var discount_rate = $('#discount_rate').val();

            if (discount_rate && discount_rate != "") {
                $("#discount_value").attr('readonly', 'readonly');
            } else {
                $("#discount_value").attr('readonly', false);
            }

        });
    </script>

@endsection
