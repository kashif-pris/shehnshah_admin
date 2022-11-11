@extends('layouts.main')
@section('content')


    <style>
        .select2-container {
            width: 100% !important;
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

    <div class="card">
        <div class="card-body">
                        @can('queue_add')
            <div class="pull-right " style=" margin-top:3px; margin-bottom:10px;">
                <a class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal"><i
                            class="fa fa-plus-circle"></i> Create New Queue
                </a>
            </div>
                        @endcan

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th style="width: 10%;">Sr #</th>
                                <th style="width: 20%;">Business</th>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 20%;">Alias</th>
                                <th style="width: 30%;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($make as $key=>$make_list)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td> @if(isset($make_list->business_name)) {{$make_list->business_name->title}} @endif</td>
                                    <td>{{$make_list->title}}</td>
                                    <td>{{$make_list->alias}}</td>


                                    <td>
                                        {{-- <!-- <a href="{{url('lookup/model-view')}}/{{$make_list->id}}" class="btn btn-sm btn-outline-primary">View</a> --> --}}

                                        @if(isset($make_list->business_name))
                                            @can('queue_view')
                                                <a
                                                        onclick="getdata('{{$make_list->id}}','{{$make_list->business_name->id}}','{{$make_list->title}}','{{$make_list->alias}}','{{$make_list::offerings(json_decode($make_list->offerings))[0]}}','{{$make_list::offerings(json_decode($make_list->offerings))[1]}}')"
                                                        class="btn btn-sm btn-outline-success" data-toggle="modal"
                                                        data-target="#exampleModal3"> View
                                                </a>
                                            @endcan

                                            @can('queue_edit')
                                                <a onclick="getInfo('{{$make_list->id}}','{{$make_list->business_name->id}}','{{$make_list->title}}','{{$make_list->alias}}','{{$make_list::offerings(json_decode($make_list->offerings))[0]}}','{{$make_list::offerings(json_decode($make_list->offerings))[1]}}', {{$make_list->walkin}} )"
                                                   class="btn btn-sm btn btn-outline-warning" data-toggle="modal"
                                                   data-target="#exampleModal2">Edit
                                                </a>
                                            @endcan
                                        @endif
                                        @can('queue_delete')
                                            <a href="{{url('queues/queue-delete')}}/{{$make_list->id}}"
                                               class="btn btn-sm btn-outline-danger">Delete
                                            </a>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('queue-store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">


                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Select Business *</label>
                            <div class="col-sm-9">
                                <select required class="form-control" id="business_id" name="business_id">
                                    <option value="" disabled selected>--Select Business--</option>
                                    @if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')

                                        @if(isset($vendorId))
                                            @forelse($makeData  as $key=>$m)
                                                <option value="{{$m->id}}"
                                                        @if( $vendorId->id==$m->id)    selected @endif>{{$m->title}}</option>
                                            @empty

                                            @endforelse
                                        @else
                                            @forelse($makeData  as $key=>$m)
                                                <option value="{{$m->id}}">{{$m->title}}</option>
                                            @empty

                                            @endforelse
                                        @endif
                                    @else
                                        @forelse($makeData  as $key=>$m)
                                            <option value="{{$m->id}}"
                                                    selected>{{$m->title}}</option>
                                        @empty

                                        @endforelse
                                    @endif

                                </select>
                            </div>

                            {{-- <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Walk In *</label>
                            <div class="col-sm-9">
                              <input type="text" required class="form-control" id="exampleInputEmail2" placeholder="Walk In" name="walkin">
                            </div> --}}

                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title *</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="exampleInputEmail2"
                                       placeholder="Title" name="title">
                            </div>

                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alias *</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="exampleInputEmail2"
                                       placeholder="Alias" name="alias">
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Walk IN *</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-check  ">

                                            <label class="mt-1">
                                                <input class="form-check-input" type="radio" name="walkin"
                                                       id="flexRadioDefault1" value="1">   Yes
                                            </label>
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-check ">

                                            <label class="mt-1">
                                                <input class="form-check-input" type="radio" name="walkin"
                                                       id="flexRadioDefault1" value="0" checked>  No
                                            </label>

                                        </div></div>
                                </div>






                            </div>

                            <label class="col-sm-3 col-form-label" for="serviceProvissioning_offer">Offerings *</label>
                            <div class="col-sm-9">
                                <select required onchange="findProvissioning()" id="serviceProvissioning_offer"
                                        class="provissioningData js-example-basic-multiple  w-100 form-control" multiple
                                        name="Offerings[]">
                                                          @forelse($offering_name as $s)
                                                                        <option value="{{$s->id}}">{{$s->title}}</option>
                                                            @empty

                                                           @endforelse
                                </select>
                            </div>


                        </div>
                        <button type="submit" class="btn  btn-outline-success btn-fw">Submit</button>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        @php
                            $role = auth()->user()->getRoleNames();


                        @endphp

                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Select Business *</label>
                        <div class="col-sm-9">
                            <select required class="form-control" id="formBusinessView" name="business_id" disabled>
                                <option value="" disabled selected>--Select Business--</option>
                                @php $role = auth()->user()->getRoleNames();

                                @endphp
                                {{-- @if ($role[0] == "admin") --}}
                                @if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')

                                    @if(isset($vendorId))
                                        @forelse($makeData  as $key=>$m)
                                            <option value="{{$m->id}}"
                                                    @if($vendorId->id==$m->id) selected @endif >{{$m->title}}</option>
                                        @empty

                                        @endforelse
                                    @else
                                        @forelse($makeData  as $key=>$m)
                                            <option value="{{$m->id}}"
                                                    @if(@$vendorId->id==$m->id) selected @endif >{{@$m->title}}</option>
                                        @empty

                                        @endforelse
                                    @endif
                                @else
                                    @forelse($makeData  as $key=>$m)
                                        <option value="{{$m->id}}"
                                                selected>{{@$m->title}}</option>
                                    @empty
                                    @endforelse
                                @endif

                            </select>
                        </div>
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title *</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control" id="formTitleView" placeholder="Title"
                                   name="title" readonly>
                            <input type="text" required class="form-control" id="formIdView" name="id" hidden>
                        </div>
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alias *</label>

                        <div class="col-sm-9">
                            <input type="text" required class="form-control" id="formAliasView" placeholder="Alias"
                                   name="alias" readonly>

                        </div>

                        <label class="col-sm-3 col-form-label" for="serviceProvissioning">Offerings *</label>
                        <div class="col-sm-9">
                            <select onchange="findProvissioning()" id="serviceProvissioning"
                                    class="form-control provissioningData js-example-basic-multiple  w-100 form-control"
                                    multiple name="Offerings[]" disabled>
                                @forelse($offering_name as $s)
                                    <option value="{{$s->id}}">{{$s->title}}</option>
                                @empty

                                @endforelse
                            </select>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('queue-edit-store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">


                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Select Business *</label>
                            <div class="col-sm-9">
                                <select required class="form-control" id="business_id_edit" name="business_id">
                                    <option value="" disabled selected>--Select Business--</option>

                                    @php $role = auth()->user()->getRoleNames();

                                    @endphp
                                    {{-- @if ($role[0] == "admin") --}}
                                    @if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')


                                        @if(isset($vendorId))


                                            @forelse($makeData  as $key=>$m)

                                                <option value="{{$m->id}}"
                                                        @if( $vendorId->id==$m->id)    selected @endif>{{$m->title}}</option>
                                            @empty

                                            @endforelse
                                        @else

                                            @forelse($makeData  as $key=>$m)
                                                <option value="{{$m->id}}">{{$m->title}}</option>
                                            @empty

                                            @endforelse

                                        @endif
                                    @else
                                        @forelse($makeData  as $key=>$m)
                                            <option value="{{$m->id}}"
                                                    @if( @$vendorId->id==$m->id)    selected @endif>{{$m->title}}</option>
                                        @empty

                                        @endforelse
                                    @endif


                                </select>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title *</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="formTitle" placeholder="Title"
                                       name="title">
                                <input type="text" required class="form-control" id="formId" name="id" hidden>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alias *</label>

                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="formAlias" placeholder="Alias"
                                       name="alias">

                            </div>
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Walk IN *</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-check  ">

                                            <label class="mt-1">
                                                <input class="form-check-input" type="radio" name="walkin"
                                                       id="walkyes" value="1">   Yes
                                            </label>
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-check ">

                                            <label class="mt-1">
                                                <input class="form-check-input" type="radio" name="walkin"
                                                       id="walkNo" value="0">  No
                                            </label>

                                        </div></div>
                                </div>
                            </div>
                            <label class="col-sm-3 col-form-label" for="serviceProvissioning_offer_edit">Offerings
                                *</label>
                            <div class="col-sm-9">
                                <select onchange="findProvissioning()" id="serviceProvissioning_offer_edit"
                                        class="form-control provissioningData js-example-basic-multiple  w-100 form-control"
                                        multiple name="Offerings[]">
                                                            @forelse($offering_name as $s)
                                                               <option value="{{$s->id}}">{{$s->title}}</option>
                                                           @empty

                                                                 @endforelse 

                                </select>

                            </div>


                        </div>
                        <button type="submit" class="btn  btn-outline-success btn-fw">Submit</button>
                        <button type="button" class="btn  btn-outline-danger btn-fw" data-dismiss="modal">Cancel
                        </button>

                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        @if(isset($vendorId))

       $(document).ready(function () {

            var value = $('#business_id').val();
            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route( 'business_offer' ) }}',
                data: {
                    id: value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {


                    $('#serviceProvissioning_offer').html(data);
                },

            });
        });
        @endif


        @if ($role[0] != "admin")

        $(document).ready(function () {

            var value = $('#business_id').val();
            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route( 'business_offer' ) }}',
                data: {
                    id: value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {


                    $('#serviceProvissioning_offer').html(data);
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
                url: '{{ route( 'business_offer' ) }}',
                data: {
                    id: this.value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {


                    $('#serviceProvissioning_offer').html(data);
                },

            });


        });
        $('#business_id_edit').on('change', function () {


            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route( 'business_offer' ) }}',
                data: {
                    id: this.value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {


                    $('#serviceProvissioning_offer_edit').html(data);
                },

            });


        });

    </script>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->

    <script>
        const getInfo = (id, business, title, alias, BusinessOffering, OriginalOfferings,walkin) => {

            // console.log(JSON.parse(OriginalOfferings).length);
            $('.provissioningData').html('');
            var offerings = JSON.parse(BusinessOffering);
            var OriginalOfferings = JSON.parse(OriginalOfferings);
            var html = '';
            for (let index = 0; index < offerings.length; index++) {
                html += `<option value='${offerings[index].id}' selected>${offerings[index].title}</option>`;

            }
            for (let index = 0; index < OriginalOfferings.length; index++) {
                html += `<option value='${OriginalOfferings[index].id}'>${OriginalOfferings[index].title}</option>`;

            }
            $('.provissioningData').html(html);
            // $('#formStatus').html('');
            $('#formId').val(id);
            $('#business_id_edit').val(business);
            $('#formTitle').val(title);
            $("#formAlias").val(alias);
            if(walkin==1){
                $("#walkyes").prop("checked", true);

            }else{
                $("#walkNo").prop("checked", true);

            }

        }
    </script>

    <script>
        const getdata = (id, business, title, alias, BusinessOffering, OriginalOfferings) => {

            // walkin
            $('.provissioningData').html('');
            var offerings = JSON.parse(BusinessOffering);
            var OriginalOfferings = JSON.parse(OriginalOfferings);
            var html = '';
            for (let index = 0; index < offerings.length; index++) {
                html += `<option value='${offerings[index].id}' selected>${offerings[index].title}</option>`;

            }
            for (let index = 0; index < OriginalOfferings.length; index++) {
                html += `<option value='${OriginalOfferings[index].id}'>${OriginalOfferings[index].title}</option>`;

            }
            $('.provissioningData').html(html);
            $('#formIdView').val(id);
            $('#formBusinessView').val(business);
            $('#formTitleView').val(title);
            $("#formAliasView").val(alias);
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
                    for (let index = 0; index < services.length; index++) {
                        $('.defaultService').append('<option value=' + services[index].id + '>' + services[index].title + '</option>');
                    }
                }
            });


        }
    </script>

@endsection