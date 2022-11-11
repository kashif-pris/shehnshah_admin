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

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Id #</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Balance</th>
                                <th>Owner Business</th>
                                <th> Vehicle</th>
                                @if(!$vendorId)
                                    <th>Actions</th>@endif
                            </tr>
                            </thead>
                            <tbody>

                                @if(count($Customers)==0)
                                <tr>
                                    <td colspan="7"> No data </td>
                                </tr>
                            @endif



                            @foreach($Customers as $item)
                                <tr>
                                    <td>{!! $item->id !!}</td>
                                    <td> {!! $item->name !!}</td>
                                    <td> {!! $item->mobile !!}</td>
                                    <td> {!! $item->email !!}</td>
                                    <td> {!! $item->balance !!}</td>
                                    <td> @if(isset( $item->Businessreleation)) {!! $item->Businessreleation->title !!} @else
                                            N/A @endif</td>
                                    <td> @if(isset( $item->Vehiclereleation)) {!! $item->Vehiclereleation->registration !!} @else
                                            N/A @endif</td>
                                      @if(!$vendorId)
                                        <td>
                                            <a href="{{route('customer-view')}}"
                                               class="btn btn-outline-success btn-fw">View</a>
                                        </td>
                                    @endif
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