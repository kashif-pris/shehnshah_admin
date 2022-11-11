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
            <div class="row pb-3">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2></h2>
                    </div>
                    @can('Add-Vendor')
                    <div class="pull-right">
                        <a href="{{route('add-vendor')}}" class="btn btn-outline-success btn-fw"><i class="fa fa-plus-circle"></i> Register Business</a>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Business</th>
                                <th>Service</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Area</th>
                                <th>City</th>
                                <th>Rating</th>
                                <th style="text-align: center" >Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vendor_list_data as $key=>$vendor)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$vendor->title}}</td>
                                    <td>@if(isset($vendor->service->id)) {!!$vendor->service->title!!} @else N/A @endif</td>
                                    <td><?php $data = json_decode($vendor->contact);?>{{$data->phone}}</td>
                                    <td><?php $data = json_decode($vendor->contact);?>{{$data->email}}</td>
                                    <td>{{$vendor->area}}</td>
                                    <td>{{$vendor->city}}</td>
                                    <td>
                                        <?php $average =json_decode($vendor->rating);  ?>
                                        @if($average)
                                         {{end($average) }}
                                         @else 
                                            0
                                         @endif
                                    </td>
                                
                                    <td style ="width: 30%;">
                                        <a href="javascript:void(0)" onclick="setSession('{{$vendor->id}}')" class="btn btn-sm btn-outline-success"><i class="
                                            "></i> Dashboard </a> 
                                        <a href="{{route('vendor-detail-edit',$vendor->id)}}" class=" btn btn-sm btn-outline-warning">Edit</a> 
                                        {{-- <a href="javascript:void(0)" onclick="setSession('{{$vendor->id}}')" class="btn btn-sm btn-outline-success"><i class="
                                            "></i> View </a>  --}}
                                     
                                            {{-- <a href="{{route('vendor-delete',$vendor->id)}}" style="margin-left:5px" class="btn btn-sm btn-outline-danger">Delete</a> --}}
                                            <a href="{{ route('business-profile',$vendor->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-eye
                                                "></i> View </a> 
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

    <script>
        function setSession(vendorId) {


            localStorage.setItem('vendor', vendorId);
  
            showSuccessToast('success', 'Business profile has been set. Redirecting you to the main page in 2 seconds..');
        
            
            $.ajax({
                    type:'POST',
                    url:'{{route("vendor-view")}}',
                    data:{vendorId:vendorId,_token: "{{ csrf_token() }}"
                    },
                    success: function( response ) {
                        setTimeout(function () {
                            window.location.replace("{{env('APP_URL')}}");
                        }, 3000);              
                    }
            });


        }
        
    </script>

@endsection