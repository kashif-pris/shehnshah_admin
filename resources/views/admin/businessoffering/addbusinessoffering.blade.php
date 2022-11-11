@extends('layouts.main')
@section('content')
    <style>
        input[type=checkbox]:before {
            border: 1px solid black;
        }

        .wizard > .content {
            min-height: 0 !important;
        }

        img#offeringCover {
            height: 200px;
            width: 270px;
        }
    </style>
    <div class="page-header">
        <h3 class="page-title">
            Business Offering
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Dashboard </a></li>
                <a href="{{url('service/business-offering-list')}}">
                    <li class="breadcrumb-item active" aria-current="page"> / Business Offering</li>
                </a>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <form name="myForm" id="example-form"
                          action="{{route('business-offering-save')}}" method="post" enctype="multipart/form-data">@csrf

                        <div>
                            <h3>General Information</h3>
                            {{-- tab one --}}
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business</label>
                                            <select required class="form-control service" name="business"
                                                    id="business_id">
                                                <option value="" selected disabled>--Select--</option>
                                                @forelse($business as $b)
                                                    @if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')
                                                        <option {{ old('business') == $b->id ? "selected" : "" }} value="{{ $b->id }}">{{$b->title}}</option>
                                                    @else
                                                        <option {{ old('business') == $b->id ? "selected" : "selected" }} value="{{ $b->id }}">{{$b->title}}</option>
                                                    @endif
                                                @empty

                                                @endforelse
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label>Offerings</label>
                                            <select class="form-control offeringList offering_id"
                                                    onchange="getOfferingDetails()" name="offering" id="offering_id">
                                                <option required value="" selected disabled>--Select--</option>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Title </label>
                                            <input required type="text" class="form-control offeringTitle"
                                                   id="offeringTitle"
                                                   placeholder="About" name="title">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> About <small
                                                        style="color:green;">(150 character allowed)</small> </label>

                                            <textarea required type="text" class="form-control" id="offeringabout"
                                                      placeholder="About" name="about" rows="10.8"
                                                      cols="50">{{Request::old('about')}}</textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Price </label>
                                            <input required type="text" class="form-control"
                                                   id="exampleInputConfirmPassword1"
                                                   placeholder="About" value="{{old('price')}}" name="price">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label>Service</label>
                                            <select required class="form-control serviceId" onchange="getOffering()"
                                                    name="service" id="service_id">
                                                <option value="" selected disabled>--Select--</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Subtitle </label>
                                            <input required type="text" class="form-control" id="offeringSubtitle"
                                                   placeholder="About" value="{{old('subtitle')}}" name="subtitle">
                                            <div class="alert-danger">{{$errors->first('subtitle')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <div class="card">

                                                <div class="card-body">
                                                    <h4 class="card-title d-flex">Cover
                                                        <small class="ml-auto align-self-end">
                                                            <small class="text-danger">JPG, PNG </small>
                                                        </small>
                                                    </h4>

                                                    <input required type="file" type="file" name="cover"
                                                           class="dropify"/>
                                                    <div class="col-md-12" id="offeringCover">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-3">
                                        <div class="form-group">
                                            <label>Specs</label>
                                            {{--                                            <input type="text" id="specs_id" class="provissioningData js-example-basic-multiple  w-100 form-control" />--}}
                                            <select disabled required id="specs_id"
                                                    class="provissioningData js-example-basic-multiple  w-100 form-control"
                                                    multiple
                                                    name="specs[]">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ml-3">
                                        <div class="form-group">
                                            <label>Options</label>
                                            <select disabled required id="options_id"
                                                    class="provissioningData js-example-basic-multiple  w-100 form-control"
                                                    multiple
                                                    name="specs[]">
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12  ">

                                        <h3>Gallery</h3>
                                        <div class="form-inline repeater">
                                            <div data-repeater-list="gallery">
                                                <div data-repeater-item class="d-flex mb-2">

                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-prepend">

                                                        </div>
                                                        <input style="width: 250px;" type="file"
                                                               class="form-control form-control-sm" name="gallery"
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
                                    </div> --}}

                                    <div class="form-group col-4">
                                        <h3>Add Images</h3>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-inline repeater">
                                                    <div data-repeater-list="group_a">
                                                        <div data-repeater-item class="d-flex mb-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title d-flex">
                                                                        <small class="ml-auto align-self-end">
                                                                            <small class="text-danger">JPG, PNG </small>
                                                                        </small>
                                                                    </h4>
                                                                    <input required type="file" name="logo"
                                                                           class="dropify"/>
                                                                </div>
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
                                </div>

                            </section>
                            {{-- Tab two --}}
                            <h3>Time</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> Pre Time</label>
                                            <input required type="text" class="form-control"
                                                   id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="pretime">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Process Time </label>
                                            <input required type="text" class="form-control"
                                                   id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="processtime">


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Post Time</label>
                                            <input required type="text" class="form-control"
                                                   id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="posttime">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Pre Grace </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="pregrace" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Process Grace</label>
                                            <input required type="text" class="form-control"
                                                   id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="processgrace">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Post Grace</label>
                                            <input required type="text" class="form-control"
                                                   id="exampleInputConfirmPassword1"
                                                   placeholder="About" name="postgrace">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{-- Tab three --}}
                            <h3>Condition</h3>


                            <section>
                                <div class="row">

                                    {{-- <div class="col-lg-7">

                                    <h3 >Business Hours</h3>
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                            <thead>
                                              <tr class="bg-primary text-white">

                                                <th>
                                                  Days
                                                </th>
                                                <th>
                                                  Start Time
                                                </th>
                                                <th>
                                                  End Time
                                                </th>
                                                <th>
                                                  Break Start
                                                </th>
                                                <th>
                                                  Break End
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                              @foreach(\App\CentralLogics\Helpers::getWeekMap()[0] as $key2=> $day)

                                              <tr class="table-info">

                                                <td>
                                                  {{@$day}}
                                                </td>
                                                <td class="noP">
                                                  <select  class="form-control  customselect" name="start_time[]" >

                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                      <option value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                    @endforeach
                                                  </select>
                                                </td>
                                                <td class="noP">
                                                  <select  class="form-control  customselect" name="end_time[]" >
                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                      <option  value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                    @endforeach
                                                  </select>
                                                </td>
                                                <td class="noP">
                                                  <select  class="form-control  customselect" name="break_start_time[]" >
                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                      <option  value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                    @endforeach
                                                  </select>
                                                </td>
                                                <td class="noP">
                                                  <select  class="form-control  customselect" name="break_end_time[]" >
                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                      <option value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                    @endforeach
                                                  </select>
                                                </td>
                                              </tr>
                                              @endforeach

                                            </tbody>
                                          </table>
                                        </div>
                                  </div> --}}

                                    <div class="col-lg-5 card-body   ml-5  border">
                                        <h3 class="sr-only-01" for="inlineFormInputGroup2">
                                            Conditions</h3>
                                        <label><b>Cash on Delivery</b></label>
                                        <div class="row">
                                            <!-- <input type="text" name="conditions[cashOnDelivery]" class="form-control"> -->
                                            <input required type="radio" value="true" name="conditions[cashOnDelivery]"
                                                   id="">
                                            <label for="">Yes</label>
                                            <input required type="radio" value="false" name="conditions[cashOnDelivery]"
                                                   id="" class="ml-2" checked>
                                            <label for="">No</label>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <label class="mt-3"><b>Advance Cancellation</b></label>
                                            <input required type="text" name="conditions[advanceCancellation]"
                                                   class="form-control">
                                        </div>
                                        <div class="row">
                                            <label class="mt-3"><b>Cancellation Allowed</b></label><br>
                                            <!-- <input type="text" name="conditions[cancellationAllowed]" class="form-control"> -->
                                        </div>
                                        <div class="row"><input required type="radio" value="true"
                                                                name="conditions[cancellationAllowed]"
                                                                id="">
                                            <label for="">Yes</label>
                                            <input required type="radio" value="false"
                                                   name="conditions[cancellationAllowed]" id="" class="ml-2" checked>
                                            <label for="">No</label>


                                        </div>
                                    </div>
                                    <div class="col-lg-5  ml-5 card-body   border">
                                        <h3>Other</h3>
                                        <div class="form-inline repeater">
                                            <div data-repeater-list="group_b">
                                                <div data-repeater-item class="d-flex mb-2">

                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <div class="input-group-prepend">

                                                        </div>
                                                        <input required style="width: 250px;" type="text"
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
                                                    class="btn btn-info btn-sm icon-btn ml-2 mb-2"><i
                                                        class="fa fa-plus"></i></button>
                                        </div>

                                    </div>
                                </div>


                            </section>

                            <h3>Others</h3>

                            <section>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>icouponIds</h4>
                                        <div class="form-group pt-3">
                                            <div class="form-inline repeater">
                                                <div data-repeater-list="icouponIds">
                                                    <div data-repeater-item class="d-flex mb-2">

                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-prepend">

                                                            </div>
                                                            <select id="icouponIds"
                                                                    class="provissioningData js-example-basic-multiple  w-100 form-control"
                                                                    multiple
                                                                    name="icouponIds[]">
                                                            </select>

                                                        </div>

                                                        <button data-repeater-delete type="button"
                                                                class="btn btn-danger btn-sm icon-btn ml-2">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group pt-3">
                                            <h4>couponIds</h4>
                                            <div class="form-inline repeater">
                                                <div data-repeater-list="couponIds">
                                                    <div data-repeater-item class="d-flex mb-2">

                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-prepend">

                                                            </div>

                                                            <select id="couponIds"
                                                                    class="provissioningData js-example-basic-multiple  w-100 form-control"
                                                                    multiple
                                                                    name="couponIds">
                                                            </select>
                                                        </div>

                                                        <button data-repeater-delete type="button"
                                                                class="btn btn-danger btn-sm icon-btn ml-2">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="sr-only-01" for="inlineFormInputGroup2">Status</h4>
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
    </script>

    <script>
        function getOffering() {
            // alert('onchange');
            var serviceId = $('#service_id').val();
            var businessId = $('#business_id').val();
            $.ajax({
                url: '{{route("service_offering")}}',
                method: 'get',
                data: {'serviceId': serviceId, '_token': '{{csrf_token()}}'},
                success: function (resp) {
                    console.log(resp);
                    $(".offeringList").html('');
                    $(".offeringList").html('<option value="" disbaled selected>--Select--</option>');
                    for (var i = 0; i < resp.offering.length; i++) {
                        var html = '<option value="' + resp.offering[i].id + '">' + resp.offering[i].title + '</option>';
                        $(".offeringList").append(html);
                    }
                },
                error: function (resp) {
                    alert('something went wrong');
                }
            })
            $.ajax({
                url: '{{route("coupon.instant")}}',
                method: 'post',
                data: {
                    'businessId': businessId,
                    'serviceId': serviceId,
                    '_token': '{{csrf_token()}}'
                },
                success: function (resp) {
                    console.log(resp);
                    var html = '';
                    $(".icouponIds").html('');
                    for (var i = 0; i < resp.length; i++) {
                        var html = '<option value="' + resp[i].id + '">' + resp[i].title + '</option>';
                        $("#icouponIds").append(html);

                        // icouponIds
                    }
                },
                error: function (resp) {
                    alert('something went wrong');
                }
            })
            $.ajax({
                url: '{{route("coupon.others")}}',
                method: 'post',
                data: {
                    'businessId': businessId,
                    'serviceId': serviceId,
                    '_token': '{{csrf_token()}}'
                },
                success: function (resp) {
                    console.log(resp);
                    var html = '';
                    $(".couponIds").html('');
                    for (var i = 0; i < resp.length; i++) {
                        var html = '<option value="' + resp[i].id + '">' + resp[i].title + '</option>';
                        $("#couponIds").append(html);

                        // icouponIds
                    }
                },
                error: function (resp) {
                    alert('something went wrong');
                }
            })
        }
    </script>

    <script>
        function getOfferingDetails() {

            var offeringId = $('.offering_id').val();
            $.ajax({
                url: '{{route("offering_details.url")}}',
                method: 'get',
                data: {'offeringId': offeringId, '_token': '{{csrf_token()}}'},
                success: function (resp) {
                    console.log(resp.specs);
                    console.log(resp.options);

                    // alert(resp.cover);
                    $("#offeringTitle").val(resp.title);
                    // $("#options_id").val(resp.options);
                    // $("#specs_id").val(resp.specs);
                    $("#offeringSubtitle").val(resp.subTitle);
                    $("#offeringabout").val(resp.about);
                    $('#specs_id').val(resp.specs);
                    // $("#offeringCover").html("<img src='/offering_cover/"+resp.cover+"'>")
                    $("#offeringCover").html("<img src='"+resp.cover+"'>")
                    // specs

                    var html = '';
                    var data = JSON.parse(resp.specs);
                    for (const element of data) {

                        html = html + '<option selected value="' + element + '">' + element + '   </option>';
                    }
                    $("#specs_id").html(html);

                    var html2 = '';
                    var data2 = JSON.parse(resp.options);
                    for (const element of data2) {

                        html2 = html2 + '<option selected value="' + element + '">' + element + '   </option>';
                    }
                    $("#options_id").html(html2);


                    //

                },
                error: function (resp) {
                    alert('something went wrong');
                }
            })
        }
    </script>



@endsection