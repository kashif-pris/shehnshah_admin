<style>
    .note-details{
      text-align: end;
    }
    .c-pic{
      width: 15% !important;
    }
    .tag{
      background-color: rgb(179 239 181);
      border: none;
      color: rgb(93, 189, 67);
      padding: 2px 13px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 13px;
      margin: 4px 2px;
      border-radius: 9px;
      cursor: pointer;
  }
  .tag1{
    background-color: rgb(192, 218, 243);
      color: rgb(12, 69, 122);
  }
  .tag2{
    background-color:rgb(241, 209, 158);
      color: rgb(156, 102, 15);
  }
  .logo-pic{
    width: 9%
  }
  .payment h5{
  width: 25%;
  }
  .payment span{
    width: 18%;
  }
  .time{
    color: black !important;
      font-size: 18px;
  }
  @media (max-width: 1080px) {
    .tab-content {
    padding: 1rem 1rem !important;
  }
  }
  @media (min-width: 992px) {
  
  .tag {
      padding: 2px 9px;
  }
  .font{
    font-size: 12px;
  }
  .payment h5 {
    width: 42%;
  }
  .payment span {
    width: 29%;
  }
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
              <li class="breadcrumb-item active" aria-current="page">{{strtoupper(Request::segment(2))}}</li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description"></p>
                <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Booking Details</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                      <p class="col-md-4">Order Note:</p>
                      <div class="note-details col-md-8">
                        <p>Payment Method: Cash On Delivery</p>
                        <p>Refrence Code: <a href=""> Add </a></p>
                        <p>Order Type: Delivery</p>
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
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="media">
                      <img class="mr-3  c-pic rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                      <div class="media-body">
                        <h5 class="mt-0">Lorem ipsum dolor sit amet</h5>
                        <h5 class="mt-0">Lorem ipsum dolor sit amet</h5>
                        <p style="margin-bottom: 0 !important;">Lead Time: <span style="color: green">45 Minuts</span></p>
                        <p style="margin-bottom: 0 !important;">Price: <span style="color:orange">AED 45</span></p>
                        <p style="margin-bottom: 0 !important;">Tag: <span><button class="tag">4Liters</button></span>
                           <span ><button class="tag tag2">4Liters</button></span> 
                           <span><button class="tag tag1">4Liters</button></span></p>
                      </div>
                    </div>
                  </div>
                </div>
          
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="media">
                      <div class="media-body">
                          <div class="payment row">
                            <h5 class="mt-0">Payment Method </h5>
                            <span> <input type="radio" id="html" name="fav_language" value="HTML">
                               <label for="html">Online</label></span>
                              <span> <input type="radio" id="html" name="fav_language" value="HTML">
                                  <label for="html">COD</label></span>
                          </div>
                          <table style="width: 100%;">
                          <tr>
                            <td>Sub Total</td>
                            <td>$45.00</td>
                          </tr>
                          <tr>
                            <td>VAT(10%)</td>
                            <td>$2.00</td>
                          </tr>
                          <tr>
                            <td>Grand Total</td>
                            <td>$47.00</td>
                          </tr>
  
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description time">Date & Time</p>
                <p>24-jun-2022 9:30 Am - 10:00 AM</p>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="media">
                      <img class="mr-3  c-pic rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                      <div class="media-body">
                        <h5 class="mt-0">Tyota Corolla</h5>
                        <p class="font"> C10019 - Sharjah </p>
                      </div>
                    </div>
                  </div>
                </div>
             
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="media">
                      <div class="media-body">
                          <div class=" row">
                              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="media">
                                  <img class="mr-3  c-pic rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                                  <div class="media-body">
                                    <h5 class="mt-0">Total Al Safeer Car Wash</h5>
                                    <p class="font"> Sharjah Al nahaba road</p>
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
                      <div class="media-body">
                          <div class=" row">
                              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="media">
                                  <img class="mr-3  c-pic rounded" src="../../images/samples/300x300/12.jpg" alt="sample image">
                                  <div class="media-body">
                                    <h5 class="mt-0">50% OFF Car Wash</h5>
                                    <p class="font">30.00 AED</p>
                                    <span ><button class="tag tag2">CASH VOUCHER</button>
                                  </div>
                                </div>
                              </div>
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