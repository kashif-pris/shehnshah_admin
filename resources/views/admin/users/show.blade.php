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


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card basic-form">
{{--                    <div class="card-header bg-light">--}}
{{--                        <h3 class="text-22 text-midnight text-bold mb-4"> Create </h3>--}}
{{--                    </div>--}}
                    <div class="card-body">


                        {{-- <h3 class="text-22 text-midnight text-bold mb-4">Create Permission </h3> --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="pull-right mt-3">
                            <a class="btn  btn-outline-success btn-fw" 
                               href="{{ route('users.index') }}"> Back</a>
                        </div>
                        {{-- <form method="post" action="{!! route('users.update',$user->id) !!}"
                              enctype="multipart/form-data"> --}}
{{--                            @csrf--}}
{{--                            @method('put')--}}
                            <div class="row mt-3">

                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Name</label>
                                        </div>
                                        <input type="text" required class="form-control" value="{!! $user->name !!}" name="name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Email</label>
                                        </div>
                                        <input type="email" required class="form-control" value="{!! $user->email !!} " name="email">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Password</label>
                                        </div>
                                        <input type="password"class="form-control" value="" name="password" placeholder="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Profile Image</label>
                                        </div>
                                        <input type="file"   class="form-control" value=" " name="profile_photo_path">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Role</label>
                                        </div>
                                        @php
                                            $user_role = $user->roles()->get();
                                            // @dd($user_role);                                             $role_id=0;
                                             if(count($user_role)>0)
                                             {
                                                $role_id=$user_role[0]->id;
                                             }
                                        @endphp
                                        <select   id="" name="role[]" class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($roles as $item)
                                                <option value="{!! $item->id !!}" @if($role_id == $item->id) selected @endif >{!! $item->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                </div>
                                {{-- <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                            <a href="{!! route('users.index') !!}"
                                               class=" btn btn-sm btn-danger">Cancel </a>
                                        </div>
                                    </div>
                                </div> --}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection