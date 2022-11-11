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
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"></h4>
        <p class="card-description"> <code></code>  <code></code>  <code></code>  <code></code></p>
        <div class="row">
          <div class="col-md-10 mx-auto">
            <ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
              Jazz Chash
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
              PayPal
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                  Cradit Card
                </a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" id="pills-vibes-tab-custom" data-toggle="pill" href="#pills-vibes" role="tab" aria-controls="pills-contact" aria-selected="false">
                  Vibes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-energy-tab-custom" data-toggle="pill" href="#pills-energy" role="tab" aria-controls="pills-contact" aria-selected="false">
                  Energy
                </a>
              </li>  --}}
            </ul>
            <div class="tab-content tab-content-custom-pill" id="pills-tabContent-custom">
              <div class="tab-pane fade show active" id="pills-health" role="tabpanel" aria-labelledby="pills-home-tab-custom">
                <div class="d-flex mb-4">
                  <img src="../../images/samples/300x300/12.jpg" class="w-25 h-100 rounded" alt="sample image">
                  <img src="../../images/samples/300x300/1.jpg" class="w-25 h-100 ml-4 rounded" alt="sample image">
                  <img src="../../images/samples/300x300/2.jpg" class="w-25 h-100 ml-4 rounded" alt="sample image">
                </div>
                <p>

                </p>
                <p>
               
                </p>
              </div>
              <div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
                <div class="media">
                  {{-- <img class="mr-3 w-25 rounded" src="http://www.urbanui.com/" alt="sample image"> --}}
                  <div class="media-body">
                    <p></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                <div class="media">
                  {{-- <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/14.jpg" alt="sample image"> --}}
                  <div class="media-body">
                    <p>
                       
                    </p>
                    <p>
                       
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-vibes" role="tabpanel" aria-labelledby="pills-vibes-tab-custom">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/15.jpg" alt="sample image">
                  <div class="media-body">
                    <p>
                        This man is a knight in shining armor. I feel like a jigsaw puzzle missing a piece. And I'm not 
                        even sure what the picture should be. Somehow, I doubt that. You have a good heart, Dexter. Keep your mind limber.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-energy" role="tabpanel" aria-labelledby="pills-energy-tab-custom">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/11.jpg" alt="sample image">
                  <div class="media-body">
                    <p>
                        Finding a needle in a haystack isn't hard when every straw is computerized. You're a killer. I catch killers. 
                        I will not kill my sister. I will not kill my sister. I will not kill my sister. Rorschach would say you have a hard time relating to others.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection