@extends('layouts.main')
@section('content')



      <div class="page-header">
        <h3 class="page-title">
          {{strtoupper(Request::segment(2))}}
        </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin-dashboard-panel')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{strtoupper(Request::segment(2))}}</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
            <div class="row pb-3">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2></h2>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('offering-add')}}" class="btn btn-outline-success btn-fw"><i class="fa fa-plus-circle"></i> Register New Offer</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Service</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Status</th>
                                <th style ="width: 20%;">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offering_list as $key=>$coupon)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    {{-- <td>{{$coupon->service_name->title}}</td> --}}
                                    <td>@if(isset($coupon->service_name)){!! $coupon->service_name->title !!} @else
                                        N/A @endif
                                      </td>
                                    <td>{{$coupon->title}}</td>
                                    <td>{{$coupon->subTitle}}</td>
                                    <td>
                                      @if($coupon->active == '1')
                                      <div class="badge badge-success badge-pill">Active</div>
                                      @else 
                                      <div class="badge badge-warning badge-pill">In-Active</div>
                                      @endif
                                    </td>
                                    
                                
                                    <td style ="display:flex;">
                                        <a href="{{url('service/offering-view')}}/{{$coupon->id}}" class="btn btn-sm btn-outline-success"><i class="fa fa-eye
                                            "></i> View </a> 
                                        <a href="{{url('service/offering-edit')}}/{{$coupon->id}}" class="ml-1 btn btn-sm btn-outline-warning">Edit</a> 
                                        <a href="{{url('service/offering-delete')}}/{{$coupon->id}}" style="margin-left:5px" class="btn btn-sm btn-outline-danger">Delete</a>
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
   
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->

  @endsection