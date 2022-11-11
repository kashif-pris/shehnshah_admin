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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h3>Edit permissions</h3> --}}
            </div>
            {{-- <div class="pull-right mt-3">
                <a class="btn btn-primary" style="background-color: rgb(245 150 42);"
                   href="{{ route('permissions.index') }}"> Back</a>
            </div> --}}
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card basic-form">
{{--                    <div class="card-header bg-light">--}}
{{--                        --}}{{-- <h3 class="text-22 text-midnight text-bold mb-4"> Edit </h3> --}}
{{--                    </div>--}}
                    <div class="card-body">

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
                               href="{{ route('permissions.index') }}"> Back</a>
                        </div>
                        <form method="post" action="{!! route('permissions.update',$Permision->id) !!}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Name</label>
                                        </div>
                                        <input type="text" required class="form-control"
                                               value="{!! $Permision->name !!}"
                                               name="name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Main</label>
                                        </div>
                                        <input type="checkbox" @if($Permision->main==1)  checked @endif class=" "
                                               value="main" name="main">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>IsSub</label>
                                        </div>
                                        <input type="checkbox" @if($Permision->sub_menu==1)  checked @endif class=" "
                                               value="1" name="sub_menu">
                                    </div>
                                </div>
                                <div class="col-6" id="parrent">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Main Permission</label>
                                        </div>
                                        <select id="parrent_val" name="parrent" class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($mainpermissions as $item)
                                                <option @if($item->id == $Permision->parent_id) {{'selected'}} @endif value="{!! $item->id !!}">{!! $item->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label> Group Icon</label>
                                        </div>
                                        <input type="text"  class="form-control" value="{!! $Permision->url !!}" name="icon">
                                    </div>
                                 </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>URL</label>
                                        </div>
                                        <input type="text"  class="form-control" value="{!! $Permision->url !!}" name="url">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>Display Name</label>
                                        </div>
                                        <input type="text"   value="{!! $Permision->display_name !!}" class="form-control" value="{!! $Permision->display_name !!}" name="display_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn  btn-outline-success btn-fw">Save</button>
                                        <a href="{!! route('permissions.index') !!}"
                                           class=" btn  btn-outline-danger btn-fw ">Cancel </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#main_check').change(function () {
                if ($(this).is(":checked")) {
                    $("#parrent").addClass("d-none");
                    $("#parrent_val").prop('required', false);
                } else {
                    $("#parrent").removeClass("d-none");
                    $("#parrent_val").prop('required', true);
                }
            });
        });
    </script>
@endsection

