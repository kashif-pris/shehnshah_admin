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
                        <a class="nav-link active" id="pills-home-tab" href="{{route('vendor-detail',1)}}" role="tab" aria-controls="pills-home" aria-selected="true">Detail</a>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link active" id="pills-profile-tab"  href="{{route('booking-view',1)}}" role="tab" aria-controls="pills-profile" aria-selected="false">Booking</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" id="pills-contact-tab"  href="{{route('vendor-worker',1)}}" role="tab" aria-controls="pills-contact" aria-selected="false">Worker</a>
                  </li>
              </ul>
              <div class="grid">
                  <div class="row profile-top">
                      <div class="col-md-4 " style="background-color: grey; color:white; max-width: 32%;  border-radius: 12px;">
                          <div class="cash-cont">
                              <h5>Collected Cash</h5>
                              <p style="margin-bottom: 51px;">0.00</p>
                              <span ><button class="col-cash">Collect Cash</button></span>
                          </div>
                      </div>
                      <div class="col-md-4" style="max-width: 32%; display:flex; flex-direction:column; justify-content:space-between;">
                          <div class="row" style="background-color: rgb(173, 173, 209); height:47%; border-radius: 12px;" >
                              <div class="cash-cont">
                                  <h5>Pending Withdraw</h5>
                                  <p>2480.00</p>
                              </div>
                          </div>
                          <div class="row" style="background-color:rgb(6, 6, 39); height:47%; border-radius: 12px;">
                              <div class="cash-cont">
                                  <h5>Withdraw Balance</h5>
                                  <p>0</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4" style=" max-width: 32%; display:flex; flex-direction:column; justify-content:space-between;">
                          <div class="row" style="background-color: rgb(40, 40, 58); height:47%; border-radius: 12px;" >
                              <div class="cash-cont">
                                  <h5>Withdraw </h5>
                                  <p>30.00</p>
                              </div>
                          </div>
                          <div class="row" style="background-color: rgb(41, 14, 14); height:47%; border-radius: 12px;">
                              <div class="cash-cont">
                                  <h5>Total Earning</h5>
                                  <p>2510.00</p>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>

              <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div class="media">
                          <img class="mr-3  c-pic rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                          <div class="media-body">
                              <div class="template-demo">
                                  <div class="star-wrap">
                                      <P>1 Star</P>
                                      <div class="progress progress-md">
                                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="5" style="width: 5%" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                  </div>
                                  <div class="star-wrap">
                                      <P>2 Star</P>
                                      <div class="progress progress-md">
                                          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                  </div>
                                  <div class="star-wrap">
                                      <P>3 Star</P>
                                      <div class="progress progress-md">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                  </div>
                                  <div class="star-wrap">
                                      <P>4 Star</P>
                                      <div class="progress progress-md">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                  </div>
                                  <div class="star-wrap">
                                      <P>5 Star</P>
                                      <div class="progress progress-md">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

          </div>

          <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="media">
                      <img class="mr-3  c-pic rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                      <div class=""  >
                       
                            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.6768791458835!2d74.34283521489074!3d31.50556428137448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190520e18b8a9b%3A0xb742d6f26c475776!2sPrismatic%20Technologies%20Limited!5e0!3m2!1sen!2s!4v1656317056121!5m2!1sen!2s" width="750" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                  </div>
              </div>
          </div>

      </div>



      <div class="row">


      </div>
  </div>

@endsection