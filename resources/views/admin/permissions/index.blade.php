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
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2></h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-outline-success btn-fw"
                               href="{{ route('permissions.create') }}"> Create New Permissioin</a>
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
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Main</th>
                        <th>URL</th>
                        <th>Display Name</th>
                        <th>IsSub</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($Permissions as $permission)
                        <tr>
                            {{-- <td>{{ ++$i }}</td> --}}
                            <th>{{ $permission->id }}</th>
                            <td>
                                <i class="fa {{$permission->icon}}"></i>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->main }}</td>
                            <td>{{ $permission->url }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>
                                @if($permission->sub_menu == '1')
                                True
                                @else
                                False
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">

                                    <a class="btn btn-outline-success btn-sm"
                                       href="{{ route('permissions.show',$permission->id) }}">View</a>

                                    <a class="btn btn-sm btn btn-outline-warning "
                                       href="{{ route('permissions.edit',$permission->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    {{-- {!! $products->links() !!} --}}

@endsection