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
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-description"></p>
            <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Detail</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Business</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                  <div class="media-body">
                    <h5 class="mt-0">I'm doing mental jumping jacks.</h5>
                    <p>Only you could make those words cute. Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. I am not a killer. I feel like a 
                      jigsaw puzzle missing a piece. And I'm not even sure what the picture should be.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                  <div class="media-body">
                    <p>I'm thinking two circus clowns dancing. You? Finding a needle in a haystack isn't hard when every straw is computerized. Tell him time is of the essence. 
                      Somehow, I doubt that. You have a good heart, Dexter.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/14.jpg" alt="sample image">
                  <div class="media-body">
                    <p>
                        I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. You all right, Dexter?
                    </p>
                    <p>
                        I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer. I catch killers. Hello, Dexter Morgan.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  @endsection