@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            {{strtoupper(Request::segment(1))}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcru mb-item"><a href="{{route('admin-dashboard-panel')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{strtoupper(Request::segment(1))}}</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Business</th>
                                <th>Service</th>
                                <th>Offering</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                {{-- @dd(count($bookings)) --}}
                                @if(count($bookings)==0)
                                <tr>
                                    <td colspan="7"> No data </td>
                                </tr>
                            @endif
                            @foreach($bookings as $item)
                                <tr>
                                    <td>{!! $item->id !!}</td>
                                    <td>@if(isset($item->businessreleation)) {!!  $item->businessreleation->title!!} @else N/A @endif</td>
                                    <td>@if(isset($item->service)) {!!  $item->service->title!!} @else N/A @endif</td>
                                    <td>@if(isset($item->offer)) {!!  $item->offer->title!!} @else N/A @endif</td>
                                    <td>@if(isset($item->customers)) {!!  $item->customers->name!!} @else N/A @endif</td>
                                    <td>{!! $item->date !!}</td>

                                    <td>
                                        <a href="{{route('booking-view')}}" class="btn btn-outline-success btn-fw">View</a>
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