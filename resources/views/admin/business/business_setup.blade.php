@extends('layouts.main') @section('content')
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
<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title"></h4>
			<p class="card-description"> </p>
			<form action="{{route('business.update-setup')}}" method="post" enctype="multipart/form-data"> @csrf
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail3"> Business Name</label>
							<input type="text" class="form-control" id="exampleInputEmail3" placeholder="Business Name" name="business_name" value="{{\App\CentralLogics\Helpers::get_settings('BusinessName')}}" required> </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword4"> Booking Notification</label> @if(\App\CentralLogics\Helpers::get_settings('BookingNotification') != '')
							<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Booking Notification" name="booking_notification" value="{{\App\CentralLogics\Helpers::get_settings('BookingNotification')}}" required> @else
							<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Booking Notification" name="booking_notification" value="" required> @endif </div>
					</div>
				</div>
        
				<div class="row">
					<div class="col-md-6">
					<div class="form-group">
							<label for="exampleInputPassword4">Email</label> @if(\App\CentralLogics\Helpers::get_settings('Email') != '')
							<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Email" name="email" value="{{\App\CentralLogics\Helpers::get_settings('Email')}}" required> @else
							<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Email" name="email" value="" required> @endif </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword4">Mobile</label> @if(\App\CentralLogics\Helpers::get_settings('Mobile') != '')
							<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Mobile" name="mobile" value="{{\App\CentralLogics\Helpers::get_settings('Mobile')}}" required> @else
							<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Mobile" name="mobile" value="" required> @endif </div>
					</div>
				</div>
    
				<div class="row">
					<div class="col-md-6">
					<div class="form-group">
									<label for="exampleInputPassword4">Address</label> @if(\App\CentralLogics\Helpers::get_settings('Address') != '')
									<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Address" name="address" value="{{\App\CentralLogics\Helpers::get_settings('Address')}}" required> @else
									<input type="text" class="form-control" id="exampleInputPassword4" placeholder="Address" name="address" value="" required> @endif </div>
							</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword4">Image</label>
							<input type="file" class="form-control" id="exampleInputPassword4" placeholder="Image" name="logo"> </div>
					</div>
</div>					
<button type="submit" class="btn btn-outline-success btn-fw">Submit</button>
						<button class="btn btn-outline-danger btn-fw">Cancel</button>
			</form>
			</div>
			</div>
		</div> @endsection