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
            Edit Business Offering
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
                          action="{{route('business-offering-edit-store')}}" method="post"
                          enctype="multipart/form-data">@csrf

                        <div>
                            <h3>General Information</h3>
                            {{-- tab one --}}
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business</label>
                                            <select class="form-control service" name="business" id="business_id">


                                                <option value="" selected disabled>--Select--</option>
                                                {{-- @if(isset($offering_list->business))
                                                    <option value="{{$offering_list->business->id}}"
                                                            selected> {{$offering_list->business->title}}</option>
                                                @endif --}}
                                                @forelse($business as $b)
                                                    <option {{ $offering_list->business->id == $b->id ? "selected" : "" }} value="{{ $b->id }}">{{$b->title}}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Offerings</label>
                                            <select class="form-control offeringList offering_id"
                                                    onchange="getOfferingDetails()" name="offering" id="offering_id">
                                                <option value="" selected disabled>--Select--</option>

                                                @forelse($offering_link as $b)
                                                    <option {{$offering_list->offering->id == $b->id ? "selected" : "" }} value="{{ $b->id }}">{{$b->title}}</option>
                                                @empty
                                                @endforelse
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Title </label>
                                            <input type="text" class="form-control offeringTitle" id="offeringTitle"
                                                   value="{{$offering_list->title}}"
                                                   placeholder="About" name="title">
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->id}}" placeholder="About" name="id" hidden>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> About <small
                                                        style="color:green;">(150 character allowed)</small> </label>

                                            <textarea type="text" class="form-control" id="offeringabout"
                                                      placeholder="About" name="about" rows="10.8"
                                                      cols="50">{{$offering_list->about}}</textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Price </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" value="{{$offering_list->price}}" name="price">
                                        </div>
                                        <div class="form-group ">
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
                                                                                <small class="text-danger">JPG,
                                                                                    PNG </small>
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
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label>Service</label>
                                            <select class="form-control serviceId" onchange="getOffering()"
                                                    name="service" id="service_id">
                                                <option value="" selected disabled>--Select--</option>
                                                @forelse($service_data_list as $b)
                                                    <option {{$offering_list->offering->serviceId == $b->id ? "selected" : "" }} value="{{ $b->id }}">{{$b->title}}</option>
                                                @empty

                                                @endforelse
                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Subtitle </label>
                                            <input type="text" class="form-control" id="offeringSubtitle"
                                                   placeholder="About" value="{{$offering_list->subTitle}}"
                                                   name="subtitle">
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

                                                    <input type="file" type="file" name="cover" class="dropify"/>
                                                    <img src=" {{$offering_list->cover}}" id="offeringCover"
                                                         style="height:90px;width:270px;"/>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="card">

                                                <div class="card-body">
                                                    <h4 class="card-title d-flex">galery
                                                        <small class="ml-auto align-self-end">
                                                            <small class="text-danger">JPG, PNG </small>
                                                        </small>
                                                    </h4>
{{-- @dd($offering_list->gallery) --}}
                                                    @if($offering_list->gallery)
                                                        @foreach(json_decode($offering_list->gallery)  as $item)

                                                         <div class="row mt-3 col-md-8">   <img src="{{$item}}" id="offeringCover" class="img-fluid"
                                                                 /> </div>
                                                        @endforeach
                                                    @endif
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
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->preTime}}"
                                                   placeholder="About" name="pretime">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Process Time </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->processTime}}"
                                                   placeholder="About" name="processtime">


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Post Time</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->postTime}}"
                                                   placeholder="About" name="posttime">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Pre Grace </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->preGrace}}"
                                                   placeholder="About" name="pregrace" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Process Grace</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->processGrace}}"
                                                   placeholder="About" name="processgrace">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Post Grace</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->postGrace}}"
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

                                    <div class="col-lg-6">
                                        <h4 class="sr-only-01" for="inlineFormInputGroup2">Conditions</h4>
                                        <label><b>Cash on Delivery</b></label><br>
                                        @if((json_decode($offering_list->conditions)->cashOnDelivery) == 'true')
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

                                        <br>
                                        <label class="mt-3"><b>Advance Cancellation</b></label>
                                        <input type="text"
                                               value="{{json_decode($offering_list->conditions)->advanceCancellation}}"
                                               name="conditions[advanceCancellation]" class="form-control">

                                        <label class="mt-3"><b>Cancellation Allowed</b></label><br>
                                        <!-- <input type="text" name="conditions[cancellationAllowed]" class="form-control"> -->
                                        @if((json_decode($offering_list->conditions)->cancellationAllowed) == "true")
                                            <label for="">Yes</label>
                                            <input type="radio" value="true" name="conditions[cancellationAllowed]"
                                                   id="" checked>
                                            <label for="">No</label>
                                            <input type="radio" value="false" name="conditions[cancellationAllowed]"
                                                   id="">

                                        @else
                                            <label for="">Yes</label>
                                            <input type="radio" value="true" name="conditions[cancellationAllowed]"
                                                   id="" class="ml-2">
                                            <label for="">No</label>
                                            <input type="radio" value="false" name="conditions[cancellationAllowed]"
                                                   id="" class="ml-2" checked>
                                        @endif


                                    </div>
                                    <div class="col-lg-6">


                                        <div class="col-lg-10  ml-5 card-body   border">
                                            {{-- <h3>Other</h3>
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
                                            </div> --}}

                                            <h4>Other</h4>
                              
                                            <div class="form-inline repeater">
                                            
                                                <div data-repeater-list="group_b">
                                                  @foreach(json_decode($offering_list->otherConditions) as $key=>$data)
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

                                        </div>


                            </section>

                            <h3>Others</h3>

                            <section>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>icouponIds</h4>
                                        <div class="form-group pt-3">
                                            <div class="form-inline ">
                                                <div data>
                                                    <div data-item class="d-flex mb-2">

                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-prepend">

                                                            </div>
                
                                                            <select required id="icouponIds"
                                                                    class="provissioningData js-example-basic-multiple  w-100 form-control"
                                                                    multiple
                                                                    name="icouponIds[]">
                                                                @foreach($icouponIds as $key=>$data)
                                                                    <option 
                                                                            value="{{$data->id}}">{{$data->title}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group pt-3">
                                            <h4>couponIds</h4>
                                            <div class="form-inline ">
                                                <div data-list="couponIds">
                                                    <div data class="d-flex mb-2">

                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <div class="input-group-prepend">

                                                            </div>

                                                            <select required id="couponIds"
                                                                    class="provissioningData js-example-basic-multiple  w-100 form-control"
                                                                    multiple
                                                                    name="couponIds[]">
                                                                @foreach($couponIds as $key=>$data)
                                                                    <option 
                                                                            value="{{$data->id}}">{{$data->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    {{-- Status --}}
                                    <div class="col-lg-4">
                                        <h4 class="sr-only-01" for="inlineFormInputGroup2">Status</h4>
                                        <div class="form-check">
                                            @if($offering_list->active == '1')
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
                                            @if($offering_list->active == '0')

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
            var serviceId = $('.serviceId').val();
            $.ajax({
                url: '{{route("service_offering")}}',
                method: 'get',
                data: {'serviceId': serviceId, '_token': '{{csrf_token()}}'},
                success: function (resp) {
                    console.log(resp);
                    $(".offeringList").html('');
                    for (var i = 0; i < resp.offering.length; i++) {
                        var html = '<option value="' + resp.offering[i].id + '">' + resp.offering[i].title + '</option>';
                        $(".offeringList").append(html);
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
                    console.log(resp);
                    // alert(resp.cover);
                    $("#offeringTitle").val(resp.title);
                    $("#offeringSubtitle").val(resp.subTitle);
                    $("#offeringabout").val(resp.about);
                    $("#offeringCover").attr('src', '/offering_cover/' + resp.cover);
                    // $("#offeringCover").html("<img src='"+resp.cover+"'>")


                },
                error: function (resp) {
                    alert('something went wrong');
                }
            })
        }
    </script>



@endsection