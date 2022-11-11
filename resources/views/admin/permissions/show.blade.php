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
    <div class="card basic-form">
        {{--                    <div class="card-header bg-light">--}}
        {{--                        --}}{{-- <h3 class="text-22 text-midnight text-bold mb-4"> Edit </h3> --}}
        {{--                    </div>--}}
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        {{-- <h3>Edit permissions</h3> --}}
                    </div>
                    <div class="pull-right mt-3">
                        <a class="btn  btn-outline-success btn-fw" 
                           href="{{ route('permissions.index') }}"> Back</a>
                    </div>
                </div>
            </div>


            @if ($errors->any())
                <div class="alert alert-danger">
                    {{-- <strong>Whoops!</strong> There were some problems with your input.<br><br> --}}
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                    <div class="form-group ">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{$Permision->name}}" class="form-control"
                               placeholder="Name">
                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection