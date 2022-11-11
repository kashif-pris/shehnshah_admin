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
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description">

                </p>
                <form class="forms-sample">

                    <div class="form-group">
                        <label for="exampleInputUsername1">Business Id</label>

                        {{-- <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username"> --}}
                        <select class="form-control" id="business_id" placeholder="Username">
                            <option>Select option</option>
                            @foreach($Business as $item)
                                <option value="{!! $item->id !!}">{!! $item->title !!}</option>
                            @endforeach
                        </Select>

                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Service Id</label>
                        {{-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> --}}
                        <select class="form-control" id="service_id" placeholder="Username"> 

                        </Select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">offering Id</label>
                        {{-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> --}}
                        <select class="form-control" id="exampleInputUsername1" placeholder="Username">
                            <option> offering 1</option>
                            <option> offering 2</option>
                            <option> offering 3</option>
                        </Select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Customer Id </label>
                        {{-- <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password"> --}}
                        <select class="form-control" id="exampleInputUsername1" placeholder="Username">
                            <option> Customer 1</option>
                            <option> Customer 2</option>
                            <option> Customer 3</option>
                        </Select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Date </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Walk in Booking </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">business </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Customer </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Vehicle </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Offering </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Queue </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Discount </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Invoice </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Payment </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Worker </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Start Date </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">End Date </label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                               placeholder="Password">
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
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
@endsection