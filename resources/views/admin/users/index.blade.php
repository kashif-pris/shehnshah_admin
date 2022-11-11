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
                        <h2></h2>
                    </div>
                    @can('user-add')
                    <div class="pull-right">
                        <a class="btn  btn-outline-success btn-fw"
                           href="{{ route('users.create')}}"> Create User</a>
                    </div>
                    @endcan
                    {{-- <div class="pull-right">
                        <a class="btn btn-success" style="background-color: rgb(245 150 42);"
                           href="{{ route('users.create') }}"> Create New Users</a>
                    </div> --}}
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table   mt-3">
                <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>User Type</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Business Id</th>

                    <th width="280px">Action</th>
                </tr>
                @foreach ($Users as $i=>$item)
                    <tr>
                        <th>{{ $i+1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->user_type }}</td>
                        <td>{{ $item->email }}</td>
                        <td>   @foreach($item->getRoleNames()  as $item1) {!!  $item1 !!} @endforeach </td>
                        <td>@if(isset($item->business_name)) {{ $item->business_name->title }} @else N/A @endif</td>
                        <td>
                            <form action="{{ route('users.destroy',$item->id) }}" method="POST">
                       @can('user_view')
                                <a class="btn btn-outline-success btn-sm" href="{{ route('users.show',$item->id) }}">Show</a>
                              @endcan
                             {{-- @can('user_edit') --}}
                                <a class="ml-1 btn btn-sm btn-outline-warning"
                                   href="{{ route('users.edit',$item->id) }}">Edit</a>
                            {{-- @endcan --}}
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{-- {!! $products->links() !!} --}}
        </div>
    </div>
@endsection