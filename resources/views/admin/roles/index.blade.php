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
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2></h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn  btn-outline-success btn-fw"
                               href="{{ route('roles.create')}}"> Create New Roles</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table   mt-3">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Key</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($Roles as $item)
                        <tr>
                            {{-- <td>{{ ++$i }}</td> --}}
                            <th>{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->key }}</td>

                            <td>
                                <form action="{{ route('roles.destroy',$item->id) }}" method="POST">

                                    <a class="btn btn-outline-success btn-sm"
                                       href="{{ route('roles.show',$item->id) }}">Show</a>

                                    <a class="btn btn-sm btn btn-outline-warning"
                                       href="{{ route('roles.edit',$item->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    {{-- @if (Gate::allows('role_delete')) --}}
                                        {{-- <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button> --}}
                                    {{-- @endif --}}

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    {{-- {!! $products->links() !!} --}}

@endsection