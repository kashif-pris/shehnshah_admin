@extends('layouts.main')
@section('content')



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
            <div class="pull-right">
                <a class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#exampleModal"><i
                            class="fa fa-plus-circle"></i> Create New Worker</a>
                {{-- <a href="{{url('queues/queue-add')}}" class="btn btn-outline-success btn-fw"><i class="fa fa-plus-circle"></i> Create New Queue</a> --}}

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Id #</th>
                                <th>Title</th>
                                <th>Service</th>
                                <th>Business</th>
                                <th>Phone</th>
                                <th>Actions</th>

                                {{-- @if(!$vendorId) --}}
                                {{-- <th>Actions</th> --}}
                                {{-- @endif --}}

                            </tr>
                            </thead>
                            <tbody>
                            @if(count($woerkers)==0)
                                <tr>
                                    <td colspan="7"> No data</td>
                                </tr>
                            @endif
                            @foreach($woerkers as $item)
                                <tr>
                                    <td>{!! $item->id !!}</td>
                                    <td>{!! $item->title !!}</td>
                                    <td>@if(isset($item->service_name)){!! $item->service_name->title !!} @else
                                            N/A @endif
                                    </td>
                                    <td>@if(isset($item->Businessreleation)){!! $item->Businessreleation->title !!} @else
                                            N/A @endif
                                    {{-- </td> --}}

                                    <td>{!! $item->phone !!}</td>

                                    <td>
                                        <a href="{{route('worker-view',$item->id)}}"
                                           class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{route('worker_edit',$item->id)}}"
                                           class="btn btn-sm btn-outline-primary">Edit</a>
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
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="modal" tabindex="-1" id="exampleModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Workers</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('worker-store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group ">
                                            <div class="row mt-2">
                                                <div class="col-sm-3 col-lg-3">
                                                    <label for="exampleInputEmail2"
                                                           class="col-sm-3 col-form-label">Business</label>
                                                </div>
                                                <div class="col-sm-9  col-lg-9">
                                                    @php $role = auth()->user()->getRoleNames(); @endphp
                                                    @if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')
                                                    @if(isset($vendorId))
                                                        <select required class="form-control" name="businessId"
                                                                id="business_id">
                                                            <option>Select Option</option>
                                                            @foreach($Business as  $item)
                                                                <option value="{!! $item->id !!}"
                                                                        @if($vendorId->id==$item->id) selected @endif >{!! $item->title !!}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select required class="form-control" name="businessId"
                                                                id="business_id">
                                                            <option>Select Option</option>
                                                            @foreach($Business as  $item)
                                                                <option value="{!! $item->id !!}">{!! $item->title !!}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    @else
                                                        <select required class="form-control" name="businessId"
                                                                id="business_id">
                                                        @foreach($Business as  $item)
                                                            <option value="{!! $item->id !!}"
                                                                    @if(@$vendorId->id==$item->id) selected @endif >{!! @$item->title !!}</option>
                                                        @endforeach
                                                        
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-sm-3 col-lg-3">
                                                    <label for="exampleInputEmail2"
                                                           class="col-sm-3 col-form-label">Service </label>
                                                </div>
                                                <div class="col-sm-9 col-lg-9">
                                                    {{--                                <input type="text" required class="form-control" id="exampleInputEmail2"--}}
                                                    {{--                                       placeholder="Alias" name="serviceId">--}}
                                                    {{--                                service_id--}}
                                                    <select required class="form-control" name="serviceId"
                                                            id="service_id">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-3 col-lg-3">
                                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title
                                                        </label></div>
                                                <div class="col-sm-9 col-lg-9">
                                                    <input type="text" required class="form-control"
                                                           id="exampleInputEmail2"
                                                           placeholder="Alias" name="title">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-3 col-lg-3">
                                                    <label for="exampleInputEmail2"
                                                           class="col-sm-3 col-form-label">Image </label></div>
                                                <div class="col-sm-9 col-lg-9">
                                                    <input type="file" required class="form-control"
                                                           id="exampleInputEmail2"
                                                           placeholder="" name="image">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-sm-3 col-lg-3">
                                                    <label for="exampleInputEmail2"
                                                           class="col-sm-3 col-form-label">Phone </label></div>

                                                <div class="col-sm-9 col-lg-9">
                                                    <input type="text" required class="form-control"
                                                           id="exampleInputEmail2"
                                                           placeholder="Alias" name="phone">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-sm btn-outline-success btn-fw" style="margin-left: -145%">
                                                    Submit
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-sm  btn-outline-danger btn-fw" style="margin-left: -189%"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                            </div>
                                        </div>

                            </form>
                        </div>
                    </div>
                        <div class="modal-footer mt-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->

@endsection
 
@section('js')
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
</script>
@endsection