@extends('layouts.main')
@section('content')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>

        .wizard > .content {
            min-height: 0 !important;
        }

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
    <div class="page-header">
        <h3 class="page-title">
            Register New Business
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

                    <form name="myForm" class="cmxform" onsubmit="return validateForm()" id="example-form"
                          action="{{route('store-vendor')}}" method="post" enctype="multipart/form-data">@csrf
                        <div>
                            <h3>General Information</h3>
                            {{-- tab one --}}
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Title">Business Title*</label>
                                            <input value="" id="Title" required type="text" class="form-control"
                                                   placeholder="Enter Your Business Title" name="business_title">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="serviceProvissioning">Service Provisioning*</label>
                                            <select required onchange="findProvissioning()" id="serviceProvissioning"
                                                    class="provissioningData js-example-basic-multiple  w-100" multiple
                                                    name="service_provissioning[]">
                                                @forelse($services as $s)
                                                    <option value="{{$s->id}}">{{$s->title}}</option>
                                                @empty

                                                @endforelse
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="defaultService">Default Service</label>
                                            <select required id="defaultService" class="form-control defaultService"
                                                    name="service_id" style="margin-left: 7%">

                                            </select>

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
                                                    <input required type="file" name="logo" class="dropify"/>
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
                                                    <input required type="file" name="cover" class="dropify"/>
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
                                    <input required type="text" class="form-control" aria-describedby="street"
                                           name="street" placeholder="Enter Street">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select required onchange="getAreas()" class="form-control city_id"
                                                    name="city">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach($locations as $city)

                                                    <option value="{{$city->id}}">{{$city->name}}</option>

                                                @endforeach


                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <select required class="form-control areas" name="area">

                                                <option value="" selected disabled>--select--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input required type="text" readonly="readonly" value="UAE"
                                                   class="form-control" aria-describedby="CountryHelp"
                                                   placeholder="Enter Country" name="country">
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
                                            <input required type="email" class="form-control Latitude" name="lat"
                                                   aria-describedby="latHelp" placeholder="Enter Latitude">

                                        </div>
                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input required type="text" class="form-control Longitude" name="lng"
                                                   aria-describedby="longHelp" placeholder="Enter Longitude">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>About <small>(200 characters allowed!)</small></label>
                                    <textarea required class="form-control" aria-describedby="aboutHelp" name="about"
                                              placeholder="Enter About"></textarea>
                                </div>

                            </section>
                            {{-- Tab three --}}
                            <h3>Gallery</h3>
                            <section>
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
                                                                                <select class="form-control start_time  customselect"
                                                                                        id="first_start_time"
                                                                                        name="start_time[]">

                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                        <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
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
                                                                        <select class="form-control start_time customselect"
                                                                                name="start_time[]">

                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif

                                                                </td>
                                                                <td class="noP">
                                                                    @if($count==0)
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-lg-9">
                                                                                <select class="form-control end_time customselect"
                                                                                        id="first_end_time"
                                                                                        name="end_time[]">
                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                        <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
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
                                                                        <select class="form-control end_time customselect"
                                                                                name="end_time[]">
                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </td>
                                                                <td class="noP">
                                                                    @if($count==0)
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-lg-9">
                                                                                <select class="form-control break_start customselect"
                                                                                        id="first_break_start"
                                                                                        name="break_start_time[]">
                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                        <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
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
                                                                        <select class="form-control break_start customselect"
                                                                                name="break_start_time[]">
                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </td>
                                                                <td class="noP">
                                                                    @if($count==0)
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-lg-9">
                                                                                <select class="form-control break_end  customselect"
                                                                                        id="first_break_end"
                                                                                        name="break_end_time[]">
                                                                                    @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                        <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                                    @endforeach
                                                                                </select></div>
                                                                            <div class="col-sm-3 col-lg-3">
                                                                                <input style="margin-left: -10px !important; margin-top: 10px"
                                                                                       class="form-control"
                                                                                       type="checkbox"
                                                                                       id="checkbox_break_end"/>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <select class="form-control break_end  customselect"
                                                                                name="break_end_time[]">
                                                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                                                <option value="{{$time}}">{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @php  $count++; @endphp
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
                                                <input required type="text" name="contactInfo[webiste]"
                                                       class="form-control">
                                                <label>Phone</label>
                                                <input required type="text" name="contactInfo[phone]"
                                                       class="form-control">
                                                <label>Email</label>
                                                <input required type="text" name="contactInfo[email]"
                                                       class="form-control">
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

            $.ajax({
                type: 'GET',
                url: '{{route("service-list")}}',
                data: {
                    ajax: items, _token: "{{ csrf_token() }}"
                },
                success: function (services) {
                    $('.defaultService').html('');
                    $('.defaultService').append('<option value="">Select option</option>');
                    for (let index = 0; index < services.length; index++) {
                        $('.defaultService').append('<option value=' + services[index].id + '>' + services[index].title + '</option>');
                    }
                }
            });

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
    {{-- <script>
       @if(old('msg'))
        alert('Business with this phone number already exists!');
      @endif
    </script> --}}
    {{--    checkbox_start_time--}}
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
    <script>
        function validateForm() {

            // $('.start_time').each(function (i, obj) {
            //     console.log(i);
            //     console.log(i.val());
            //
            // });
            // start_time[]
            $(".start_time").each(function () {
                if (!isNaN(this.value) || this.value == "00,00") {
                    alert('Select a Start Time');
                    return false;
                }
            });
            $(".end_time").each(function () {
                if (!isNaN(this.value) || this.value == "00,00") {
                    alert('Select a End Time');
                    return false;
                }
            });
            $(".break_start").each(function () {
                if (!isNaN(this.value) || this.value == "00,00") {
                    alert('Select a Break Start Time');
                    return false;
                }
            });
            $(".break_end").each(function () {
                if (!isNaN(this.value) || this.value == "00,00") {
                    alert('Select a Break End Time');
                    return false;
                }
            });


            let business_title = document.forms["myForm"]["business_title"].value;
            if (business_title == "") {
                alert("business title must be filled out");
                return false;
            }
            // let service_provissioning = document.forms["myForm"]["service_provissioning"].value;
            // if (service_provissioning == "") {
            //     alert("service provissioning must be filled out");
            //     return false;
            // }
            // let service_id = document.forms["myForm"]["service_id"].value;
            // if (service_id == "") {
            //     alert("service   must be filled out");
            //     return false;
            // }
            let street = document.forms["myForm"]["street"].value;
            if (street == "") {
                alert("street   must be filled out");
                return false;
            }
            let area = document.forms["myForm"]["area"].value;
            if (area == "") {
                alert("area   must be filled out");
                return false;
            }
            let city = document.forms["myForm"]["city"].value;
            if (city == "") {
                alert("city   must be filled out");
                return false;
            }
            let country = document.forms["myForm"]["country"].value;
            if (country == "") {
                alert("country   must be filled out");
                return false;
            }
            let lat = document.forms["myForm"]["lat"].value;
            if (lat == "") {
                alert("lat   must be filled out");
                return false;
            }
            let lng = document.forms["myForm"]["lng"].value;
            if (lng == "") {
                alert("lng   must be filled out");
                return false;
            }
            let about = document.forms["myForm"]["about"].value;
            if (about == "") {
                alert("about   must be filled out");
                return false;
            }
            // let hours = document.forms["myForm"]["hours"].value;
            // if (hours == "") {
            //     alert("hours   must be filled out");
            //     return false;
            // }

        }
    </script>
@endsection