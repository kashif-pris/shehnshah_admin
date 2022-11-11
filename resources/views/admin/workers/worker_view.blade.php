
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
      <div class="pull-right"></div>
      <div class="row">
        <div class="col-12">
          <div class=" ">
            <form action="{{route('worker-edit-store')}}" method="post"
                  enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{!! $worker->id !!}" name="id">
              <div class="row">
                <div class="form-group ">
                  <div class="row mt-2">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">businessId
                      *</label>
                    <div class="col-sm-9">
                      <select disabled class="form-control" name="businessId" id="business_id">
                        <option>Select Option</option>
                        @foreach($Business as  $item)
                          <option value="{!! $item->id !!}"
                                  @if($worker->businessId==$item->id)  selected @endif >{!! $item->title !!}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">serviceId
                      *</label>
                    <div class="col-sm-9">
                      {{--                                <input type="text" required class="form-control" id="exampleInputEmail2"--}}
                      {{--                                       placeholder="Alias" name="serviceId">--}}
                      {{--                                service_id--}}
                      <select disabled class="form-control" name="serviceId" id="service_id">
                        <option value="{!! $service_selectd->id !!}"
                                selected   >{!! $service_selectd->title !!}</option>

                      </select>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">title *</label>
                    <div class="col-sm-9">
                      <input readonly type="text" required class="form-control" id="exampleInputEmail2"
                             placeholder="Alias" value="{!! $worker->title !!}" name="title">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">image *</label>

                    <div class="col-sm-9">
                      <img src="{!!  $worker->image!!}"/>
                    </div> <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <input disabled type="file" class="form-control" id="exampleInputEmail2"
                             placeholder="Alias" name="image">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">phone *</label>
                    <div class="col-sm-9">
                      <input type="text" readonly class="form-control" id="exampleInputEmail2"
                             placeholder="Alias" value="{!! $worker->phone !!}" name="phone">
                    </div>
                  </div>


                </div>
              </div>
              <div class="row">
                {{-- <div class="col-md-3  ">
                  <div class="row">
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-sm btn-outline-success btn-fw">Submit
                      </button>
                    </div>
                    <div class="col-md-6">
                      <button type="button" class="btn btn-sm  btn-outline-danger btn-fw"
                              data-dismiss="modal">Cancel
                      </button>
                    </div>
                  </div>


                </div> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->

  <!-- partial -->

@endsection @section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>

    $(document).ready(function () {

    });


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