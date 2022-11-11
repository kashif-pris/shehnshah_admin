@extends('layouts.main')
@section('content')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <div class="page-header">
        <h3 class="page-title">
            Update {{$businessInfo->title}} Informations
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(1)}}</li>
            </ol>
        </nav>
    </div>
    {{-- @dd($businessHours[0][1]) --}}

    <style>
        .customselect select {
            width: 100px;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .mainImg {
            text-align: center;
            margin: 11px auto;
        }

        #map {
            height: 400px;
        }

        .noP {
            padding: 4px !important;
        }


    </style>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <form id="example-form" action="{{route('vendor-detail-update-info')}}" method="post"
                          enctype="multipart/form-data">@csrf
                        <input type="hidden" value="{{Request::segment(3)}}" name="business_id">
                        <div>
                            <h3>General Information</h3>
                            {{-- tab one --}}
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business Title</label>
                                            <input value="{{$businessInfo->title}}" required type="text"
                                                   class="form-control" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Business Title" name="business_title">
                                            <small id="" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Service Provisioning <small id="emailHelp"
                                                                               class="form-text text-muted"></small></label>
                                            <select onchange="findProvissioning()"
                                                    class="provissioningData js-example-basic-multiple select2 w-100"
                                                    multiple name="service_provissioning[]">
                                                @forelse($provissioning as $srv)
                                                    <option selected
                                                            value="{{$srv->service->id}}">{{$srv->service->title}}</option>
                                                @empty

                                                @endforelse
                                                @forelse($services as $s)
                                                    <option value="{{$s->id}}">{{$s->title}}</option>
                                                @empty

                                                @endforelse
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Default Service</label>
                                            <select class="form-control defaultService" name="default_service"
                                                    style="margin-left: 7%">
                                                @forelse($provissioning as $srv)
                                                    @if($srv->service->id == $businessInfo->serviceId)
                                                        <option selected
                                                                value="{{$srv->service->id}}">{{$srv->service->title}}</option>
                                                    @else
                                                        <option value="{{$srv->service->id}}">{{$srv->service->title}}</option>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title d-flex">Logo
                                                        <small class="ml-auto align-self-end">
                                                            <small class="text-danger">JPG, PNG </small>
                                                        </small>
                                                    </h4>
                                                    <input type="file" name="logo" class="dropify"/>

                                                    <div class="dropify-preview" style="display: block;">
                                                        @if(substr_count($businessInfo->logo,'/' )==0)
                                                            {{--                                                            <img src="{{ asset('vendor_logo/'.$businessInfo->logo) }}"--}}
                                                            {{--                                                                 alt="{{$businessInfo->title}} no logo found"--}}
                                                            {{--                                                                 class="mainImg img-responsive text-center" height="100"--}}
                                                            {{--                                                                 width="100">--}}
                                                            <img src="{{   $businessInfo->logo }}" width="100">
                                                        @else

{{--                                                            <img src="{{ asset($businessInfo->logo) }}"--}}
{{--                                                                 alt="{{$businessInfo->title}} no logo found"--}}
{{--                                                                 class="mainImg img-responsive text-center" height="100"--}}
{{--                                                                 width="100">--}}
                                                            <img src="{{   $businessInfo->logo }}" width="100">
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title d-flex">Cover Photo
                                                        <small class="ml-auto align-self-end">
                                                            <small class="text-danger">JPG, PNG </small>
                                                        </small>
                                                    </h4>
                                                    <input type="file" name="cover" class="dropify"/>
                                                    <div class="dropify-preview" style="display: block;">
                                                        @if(substr_count($businessInfo->cover,'/' )==0)
                                                            <img src="{{ asset('vendor_cover/'.$businessInfo->cover) }}"
                                                                 alt="{{$businessInfo->title}} no cover found"
                                                                 class="mainImg img-responsive text-center"
                                                                 height="100" width="100"> @else
                                                            <img src="{{ asset($businessInfo->cover) }}"
                                                                 alt="{{$businessInfo->title}} no cover found"
                                                                 class="mainImg img-responsive text-center"
                                                                 height="100" width="100">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </section>
                            {{-- Tab two --}}
                            <h3>Address Information</h3>
                            <section>

                                <div class="form-group">
                                    <label>Street</label>
                                    <input value="{{$businessInfo->street}}" type="text" class="form-control"
                                           aria-describedby="street" name="street" placeholder="Enter Street">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select onchange="getAreas()" class="form-control city_id" name="city">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach($locations as $city)
                                                    @if($city->id == $businessInfo->city)
                                                        <option selected value="{{$city->id}}">{{$city->name}}</option>
                                                    @else
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endif
                                                @endforeach


                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <select class="form-control areas" name="area">
                                                @foreach($areas as $area)
                                                    @if($area->id == $businessInfo->area)
                                                        <option value="{{$businessInfo->areaInfo->id}}"
                                                                selected>{{$businessInfo->areaInfo->name}}</option>
                                                    @else
                                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" readonly="readonly" value="UAE" class="form-control"
                                                   aria-describedby="CountryHelp" placeholder="Enter Country"
                                                   name="country">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <small style="color:blue;cursor: pointer;" data-toggle="modal"
                                                   data-target="#exampleModal-4" data-whatever="@Location Picker">
                                                Click here to pick a location
                                            </small>
                                            <input value="{{$businessInfo->lat}}" type="email"
                                                   class="form-control Latitude" name="lat" aria-describedby="latHelp"
                                                   placeholder="Enter Latitude">

                                        </div>
                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input value="{{$businessInfo->lng}}" type="text"
                                                   class="form-control Longitude" name="lng" aria-describedby="longHelp"
                                                   placeholder="Enter Longitude">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>About <small>(200 characters allowed!)</small></label>
                                    <textarea class="form-control" aria-describedby="aboutHelp" name="about"
                                              placeholder="Enter About">{{$businessInfo->about}}</textarea>
                                </div>

                            </section>
                            {{-- Tab three --}}
                            <h3>Gallery</h3>
                            <section>


                                <div class="row">
                                    <div class="form-group col-4">
                                        <h3>Add Images</h3>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-inline repeater">
                                                    <div data-repeater-list="gallery">
                                                        <div data-repeater-item class="d-flex mb-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title d-flex">
                                                                        <small class="ml-auto align-self-end">
                                                                            <small class="text-danger">JPG, PNG </small>
                                                                        </small>
                                                                    </h4>
                                                                    <input type="file" name="logo" class="dropify"/>
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
                                    <div class="col-8">
                                        <h3>Business Gallery</h3>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row portfolio-grid">
                                                    @forelse($gallery as $i=>$image)
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                                            <figure class="effect-text-in">
                                                                @if(substr_count($businessInfo->cover,'/' )==0)
{{--                                                                    <img src="{{ asset( 'business_gallery/'.$image) }}"--}}
{{--                                                                         alt="Image-{{$i+1}}"/>--}}
                                                                    <img src="{{   $image  }}"
                                                                         alt="Image-{{$i+1}}"/>
                                                                @else
{{--                                                                    <img src="{{ asset($image) }}"--}}
{{--                                                                         alt="Image-{{$i+1}}"/>--}}
                                                                    <img src="{{   $image  }}"
                                                                         alt="Image-{{$i+1}}"/>
                                                                @endif
                                                                <figcaption>
                                                                    <p> Image-{{$i+1}}</p>
                                                                </figcaption>
                                                            </figure>
                                                        </div>
                                                    @empty
                                                        <p> No Gallery Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Finish</h3>
                            <section>
                                <div class="row">

                                    <div class="col-lg-8">

                                        <h3>Business Hours</h3>

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Weekly Schedule</h4>

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
                                                        @php  $count=0; @endphp
                                                        @foreach(\App\CentralLogics\Helpers::getWeekMap()[0] as $key2=> $day)

                                                            <tr class="table-info">

                                                                <td>
                                                                    {{@$day}}
                                                                </td>
                                                                <td class="noP">

                                                                    @if($count==0)
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-lg-9">
                                                                                <select required
                                                                                        class="form-control start_time customselect"
                                                                                        id="first_start_time"
                                                                                        name="start_time[]">

                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)

                                                                                        <option value="{{$time}}"
                                                                                        <?php
                                                                                            if ((int)explode(',', $time)[0] == $businessHours[$key2][0] && (int)explode(',', $time)[1] == $businessHours[$key2][1]) {
                                                                                                echo "selected";
                                                                                            }

                                                                                            ?>
                                                                                        >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3 col-lg-3">

                                                                                <input style="margin-left: -10px !important; margin-top: 10px"
                                                                                       class="form-control"
                                                                                       type="checkbox"
                                                                                       id="checkbox_start_time"/>

                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <select required
                                                                                class="form-control start_time  customselect"
                                                                                name="start_time[]">

                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option value="{{$time}}"
                                                                                <?php
                                                                                    if ((int)explode(',', $time)[0] == $businessHours[$key2][0] && (int)explode(',', $time)[1] == $businessHours[$key2][1]) {
                                                                                        echo "selected";
                                                                                    }

                                                                                    ?>
                                                                                >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </td>
                                                                <td class="noP">
                                                                    @if($count==0)
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-lg-9">
                                                                                <select required
                                                                                        class="form-control end_time  customselect"
                                                                                        id="first_end_time"
                                                                                        name="end_time[]">
                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                        <option
                                                                                            <?php
                                                                                            if (isset($businessHours[0][2])) {
                                                                                                if ((int)explode(',', $time)[0] == $businessHours[$key2][2] && (int)explode(',', $time)[1] == $businessHours[$key2][3]) {
                                                                                                    echo "selected";

                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                            value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3 col-lg-3">
                                                                                <input style="margin-left: -10px !important; margin-top: 10px"
                                                                                       class="form-control"
                                                                                       type="checkbox"
                                                                                       id="checkbox_end_time"/>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <select required
                                                                                class="form-control end_time  customselect"
                                                                                name="end_time[]">
                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option
                                                                                    <?php
                                                                                    if (isset($breakHours[0][2]))
                                                                                        if ((int)explode(',', $time)[0] == $businessHours[$key2][2] && (int)explode(',', $time)[1] == $businessHours[$key2][3]) {
                                                                                            echo "selected";

                                                                                        }
                                                                                    ?>


                                                                                    value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </td>
                                                                <td class="noP">
                                                                    @if($count==0)
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-lg-9">
                                                                                <select required
                                                                                        class="form-control break_start  customselect"
                                                                                        id="first_break_start"
                                                                                        name="break_start_time[]">
                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                        <option
                                                                                            <?php
                                                                                            if ((int)explode(',', $time)[0] == $breakHours[$key2][0] && (int)explode(',', $time)[1] == $breakHours[$key2][1]) {
                                                                                                echo "selected";
                                                                                            }

                                                                                            ?>
                                                                                            value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3 col-lg-3">
                                                                                <input style="margin-left: -10px !important; margin-top: 10px"
                                                                                       class="form-control"
                                                                                       type="checkbox"
                                                                                       id="break_start_checkbox"/>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <select required
                                                                                class="form-control break_start  customselect"

                                                                                name="break_start_time[]">
                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option
                                                                                    <?php
                                                                                    if ((int)explode(',', $time)[0] == $breakHours[$key2][0] && (int)explode(',', $time)[1] == $breakHours[$key2][1]) {
                                                                                        echo "selected";
                                                                                    }

                                                                                    ?>
                                                                                    value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </td>
                                                                <td class="noP">
                                                                    @if($count==0)
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-lg-9">
                                                                                <select required
                                                                                        class="form-control  break_end customselect"
                                                                                        id="first_break_end"
                                                                                        name="break_end_time[]">
                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                        <option
                                                                                            <?php
                                                                                            if (isset($breakHours[0][2])) {
                                                                                                if ((int)explode(',', $time)[0] == $breakHours[$key2][2] && (int)explode(',', $time)[1] == $breakHours[$key2][3]) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                            }

                                                                                            ?>
                                                                                            value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3 col-lg-3">
                                                                                <input style="margin-left: -10px !important; margin-top: 10px"
                                                                                       class="form-control"
                                                                                       type="checkbox"
                                                                                       id="checkbox_break_end"/>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <select required
                                                                                class="form-control  break_end customselect"
                                                                                name="break_end_time[]">
                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option
                                                                                    <?php
                                                                                    if (isset($breakHours[0][2])) {
                                                                                        if ((int)explode(',', $time)[0] == $breakHours[$key2][2] && (int)explode(',', $time)[1] == $breakHours[$key2][3]) {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }

                                                                                    ?>
                                                                                    value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </td>
                                                            </tr> @php  $count++; @endphp
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-4">
                                        <h3 class="sr-only-01" for="inlineFormInputGroup2">Contact Information</h3>
                                        <div class="card">
                                            <div class="card-body">

                                                <label>Website</label>
                                                <input value="{{@json_decode($businessInfo->contact)->webiste}}"
                                                       type="text" name="contactInfo[webiste]" class="form-control">
                                                <label>Phone</label>
                                                <input value="{{@json_decode($businessInfo->contact)->phone}}"
                                                       type="text" name="contactInfo[phone]" class="form-control">
                                                <label>Email</label>
                                                <input value="{{@json_decode($businessInfo->contact)->email}}"
                                                       type="text" name="contactInfo[email]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">


        <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 modal_body_content">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbFQqjZgQOWRMuQ_RpXU0kGAUIfJhDw98&callback=initMap&v=weekly"
            defer
    ></script>
    <script>

        const findProvissioning = () => {
            var items = [];
            $('.provissioningData option:selected').each(function () {
                items.push($(this).val());
                console.log($(this).val());
            });
            if (items.length > 0) {
                $.ajax({
                    type: 'GET',
                    url: '{{route("service-list")}}',
                    data: {
                        ajax: items, _token: "{{ csrf_token() }}"
                    },
                    success: function (services) {
                        $('.defaultService').html('');
                        for (let index = 0; index < services.length; index++) {
                            $('.defaultService').append('<option value=' + services[index].id + '>' + services[index].title + '</option>');
                        }
                    }
                });
            }

        }

        const getAreas = () => {
            var city = $('.city_id').val();
            $.ajax({
                type: 'GET',
                url: '{{route("config-get-cities")}}',
                data: {
                    city: city, _token: "{{ csrf_token() }}"
                },
                success: function (areas) {
                    $('.areas').html('');
                    for (let index = 0; index < areas.length; index++) {
                        $('.areas').append('<option value=' + areas[index].id + '>' + areas[index].name + '</option>');
                    }
                }
            });
        }

        function initMap() {
            const myLatlng = {lat: 23.4241, lng: 53.8478};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: myLatlng,
            });
            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get Lat/Lng!",
                position: myLatlng,
            });

            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                console.log(mapsMouseEvent.latLng.toJSON());
                // Close the current InfoWindow.
                $('.Latitude').val(mapsMouseEvent.latLng.toJSON().lat);
                $('.Longitude').val(mapsMouseEvent.latLng.toJSON().lng);
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                infoWindow.setContent(
                    JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                );
                infoWindow.open(map);
            });
        }

        window.initMap = initMap;

    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#checkbox_start_time").click(function () {
                var a = $("#first_start_time").val();
                if ($(this).prop("checked") == true) {
                    $('.start_time').val(a)
                }
            });
            $("#checkbox_end_time").click(function () {
                var a = $("#first_end_time").val();
                if ($(this).prop("checked") == true) {
                    $('.end_time').val(a)
                }
            });
            $("#break_start_checkbox").click(function () {
                var a = $("#first_break_start").val();
                if ($(this).prop("checked") == true) {
                    $('.break_start').val(a)
                }
            });
            $("#checkbox_break_end").click(function () {
                var a = $("#first_break_end").val();
                if ($(this).prop("checked") == true) {
                    $('.break_end').val(a)
                }
            });
        });
    </script>
@endsection