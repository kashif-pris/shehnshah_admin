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
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Notification</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Massage</a>
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" aria-selected="false">Contact</a> --}}
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="../../images/faces/face12.jpg" alt="sample image">
                  <div class="media-body">
                    <h4 class="mt-0">John Doe</h4>
                    <p>
                        Fail most room even gone her end like. Comparison dissimilar unpleasant six compliment two unpleasing 
                        any add. Ashamed my company thought wishing colonel it prevent he in. Pretended residence are something 
                        far engrossed old off.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="../../images/faces/face12.jpg" alt="sample image">
                  <div class="media-body">
                    <h4 class="mt-0">John Doe</h4>
                    <p>
                        Fail most room even gone her end like. Comparison dissimilar unpleasant six compliment two unpleasing 
                        any add. Ashamed my company thought wishing colonel it prevent he in. Pretended residence are something 
                        far engrossed old off.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                <h4>Contact us </h4>
                <p>
                  Feel free to contact us if you have any questions!
                </p>
                <p>
                  <i class="fa fa-phone text-info"></i>
                  +123456789
                </p>
                <p>
                  <i class="far fa-envelope-open text-success"></i>
                  contactus@example.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

  @endsection