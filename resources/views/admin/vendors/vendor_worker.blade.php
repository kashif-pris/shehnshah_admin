<style>
    .profile-top{
       justify-content: space-between;
        margin-top: 24px;
    }
    .col-cash{
    background-color: white;
    border: none;
    color: grey;
    padding: 8px 75px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    margin: 4px 2px;
    border-radius: 9px;
    width: 100%;
    cursor: pointer;
}
    .cash-cont{
    padding: 12px 16px;
    color: white;
    }
.c-pic{
    width: 19%;
}
.star-wrap{
    display: flex;
    width: 100%;
    align-items: baseline;
}
.star-wrap p{
    width: 10%;
}
.star-wrap .progress{
    width: 90%;
}
.template-demo .progress {
  margin-top: 0rem !important;
}

</style>
@extends('layouts.main')
@section('content')
<div class="page-header">
        <h3 class="page-title">
          {{strtoupper(Request::segment(2))}}
        </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin-dashboard-panel')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{strtoupper(Request::segment(1))}}</li>
          </ol>
        </nav>
      </div>


  @endsection