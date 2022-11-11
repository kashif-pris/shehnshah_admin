@extends('layouts.main')
@section('content')
<style>
  input[type=checkbox]:before {
    border: 1px solid black;
  }
  .wizard > .content{
    min-height:0 !important;
  }
  .coupon-img{
     width:100%;
     height:200px;

}
.coupon-img img{
  width:100%;
  height:200px;
  object-fit:contain;
}
.coupon-detail{
  padding: 20px;
}
.about-cop{
  background:#f2f2f2;
  padding:10px;
}

table {
  border-collapse: collapse;
  width: 100%;
}
tr {
  border-bottom: 1px solid #ddd;
}
.ven-detail{
  padding-top:10px;
}
.checked {
  color: #FEA409;
}
.rating{
  padding-top:10px;
}
</style>
    <!-- <div class="page-header">
        <h3 class="page-title">
            New Coupons
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::segment(1)}}</li>
            </ol>
        </nav>
    </div> -->

    <h3>Coupon View</h3>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                   
                <div>
          
                  <section>
                   <div class="row">
                      <div class="col-md-4">
                      
                        <div class="coupon-img">
                            <img src="{{$coupon_view->cover}}" alt="">
                        </div>
                        
                      </div>
                      <div class="col-md-8 coupon-detail">
                        <h3>{{@$coupon_view->discountRate}}% OFF {{@$coupon_view->service_name->title}}</h3>
                        <span>{{$coupon_view->price}} AED</span>
                        <p style="padding-top:10px;"><i class="fa fa-percent" aria-hidden="true" style=" background:#FEA409; height:20px; width:20px; border-radius:50px; text-align:center; padding:5px;"></i>{{$coupon_view->highlight}}</p>
                        <span>Expries on {{json_decode($coupon_view->saleConditions)->to}}</span>
                        <h3 style="padding-top:10px;">AED {{$coupon_view->price}}</h3>
                        <hr>
                        
                      </div>
                      
                      </div>
                     
                  </section>
                  {{-- <section>
                    <div class="row">
                       <div class="col-md-4">
                         <div class="coupon-img" >
                           <img src="/service/{{$coupon_view->service_name->icon}}" alt="">
                         </div>
                         
                       </div>
                       <div class="col-md-8 coupon-detail">
                          <div class="ven-detail"> 
                         <h3>Total Al Safeer Car Wash</h3>
                         <span> <i class="fa fa-map-marker" aria-hidden="true" style="color:#FEA409;"></i>Sharjah Al nahad road</span>
                         <br>
                         <div class="rating">
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star"></span>
                             <span class="fa fa-star"></span>
                         </div>
                         </div>
                        
                       </div>
                       
                       </div>
                      
                  </section> --}}
                  <hr>
                  <section>
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="about-cop"> About Coupon</h3>
                        <p> {{$coupon_view->about}}</p>

                      </div>
                    </div>
                  </section>
                  <section>
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="about-cop"> Sale Condition</h3>
                        <table>
                            <tr>
                                <td>IsInstant</td>
                                <td>

                                    @if($coupon_view->isInstant==1)
                                        Yes
                                    @else
                                        No
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td>Valid From</td>
                                <td>
                                  @if(isset(json_decode($coupon_view->saleConditions)->from))
                                  {{json_decode($coupon_view->saleConditions)->from}}
                                  @else
                                 @endif
                                </td>

                            </tr>
                            <tr>
                                <td>Expries On</td>
                                <td>
                                  @if(isset(json_decode($coupon_view->saleConditions)->to))
                                  {{json_decode($coupon_view->saleConditions)->to}} @else
                                  @endif</td>

                            </tr>
                            <tr>
                                <td>Daily Limit</td>
                                <td> @if(isset(json_decode($coupon_view->saleConditions)->dailyLimit))
                                  {{json_decode($coupon_view->saleConditions)->dailyLimit}} @else
                                  @endif</td>

                            </tr>
                          <tr>
                            <td>Weekly Limit</td>
                            <td> @if(isset(json_decode($coupon_view->saleConditions)->weeklyLimit))
                              {{json_decode($coupon_view->saleConditions)->weeklyLimit}} @else
                              @endif</td>

                        </tr>
                        <tr>
                          <td>Monthly Limit</td>
                          <td> @if(isset(json_decode($coupon_view->saleConditions)->monthlyLimit))
                            {{json_decode($coupon_view->saleConditions)->monthlyLimit}} @else
                            @endif</td>

                      </tr>
                        <tr>
                          <td>Yearly Limit</td>
                          <td> @if(isset(json_decode($coupon_view->saleConditions)->yearlyLimit))
                            {{json_decode($coupon_view->saleConditions)->yearlyLimit}} @else
                            @endif</td>

                      </tr>
                      <tr>
                        <td>Total Limit</td>
                        <td> @if(isset(json_decode($coupon_view->saleConditions)->totalLimit))
                          {{json_decode($coupon_view->saleConditions)->totalLimit}} @else
                          @endif</td>

                    </tr>
                        </table>

                      </div>
                    </div>
                  </section>
                  <br>
                  <section>
                    <div class="row">
                      <div class="col-md-12 ">
                        <h3 class="about-cop"> Use Condition </h3> 
                    
                        <table>
                          <tr>
                            <td>Valid From</td>
                            <td>
                              @if(isset(json_decode($coupon_view->useConditions)->from))
                              {{json_decode($coupon_view->useConditions)->from}}
                              @else
                             @endif
                            </td>

                        </tr>
                        <tr>
                            <td>Expries On</td>
                            <td>
                              @if(isset(json_decode($coupon_view->useConditions)->to))
                              {{json_decode($coupon_view->useConditions)->to}} @else
                              @endif</td>

                        </tr>
                        <tr>
                            <td>Daily Limit</td>
                            <td> @if(isset(json_decode($coupon_view->useConditions)->dailyLimit))
                              {{json_decode($coupon_view->useConditions)->dailyLimit}} @else
                              @endif</td>

                        </tr>
                      <tr>
                        <td>Weekly Limit</td>
                        <td> @if(isset(json_decode($coupon_view->useConditions)->weeklyLimit))
                          {{json_decode($coupon_view->useConditions)->weeklyLimit}} @else
                          @endif</td>

                    </tr>
                    <tr>
                      <td>Monthly Limit</td>
                      <td> @if(isset(json_decode($coupon_view->useConditions)->monthlyLimit))
                        {{json_decode($coupon_view->useConditions)->monthlyLimit}} @else
                        @endif</td>

                  </tr>
                    <tr>
                      <td>Yearly Limit</td>
                      <td> @if(isset(json_decode($coupon_view->useConditions)->yearlyLimit))
                        {{json_decode($coupon_view->useConditions)->yearlyLimit}} @else
                        @endif</td>

                  </tr>
                  <tr>
                    <td>Total Limit</td>
                    <td> @if(isset(json_decode($coupon_view->useConditions)->totalLimit))
                      {{json_decode($coupon_view->useConditions)->totalLimit}} @else
                      @endif</td>

                </tr>
                <tr>
                  <td>Discount Limit</td>
                  <td> @if(isset(json_decode($coupon_view->useConditions)->discountLimit))
                    {{json_decode($coupon_view->useConditions)->discountLimit}} @else
                    @endif</td>

              </tr>
              <tr>
                <td>Advance Booking</td>
                <td> @if(isset(json_decode($coupon_view->useConditions)->advanceBooking))
                  {{json_decode($coupon_view->useConditions)->advanceBooking}} @else
                  @endif</td>

            </tr>
            <tr>
              <td>Value Limit</td>
              <td>
                 @if(isset(json_decode($coupon_view->useConditions)->valueLimit))
                {{json_decode($coupon_view->useConditions)->valueLimit}}
                 @else
                @endif</td>
                

          </tr>
            <tr>
              <td>Validity Days</td>
              <td>    

                @foreach(json_decode($coupon_view->useConditions)->days as $day)

                          {{$day}},

                @endforeach
                 of the week only

              </td>
          </tr>
          <tr>
            <td>Validity Days</td>
            <td>    
           
              @foreach(json_decode($coupon_view->useConditions)->shifts as $shift)

                        {{$shift}},

              @endforeach
               only

            </td>
        </tr>


                        </table>

                      </div>

                    </div>
                  </section>

                  <section>
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="about-cop"> Other Condition</h3>
                        <table>
                            <tr>
                                <td>Other Condition </td>

                                <td>
                                  @foreach(json_decode($coupon_view->otherConditions) as $data)
                                    {{$data}},
                                 @endforeach
                                </td>

                            </tr>
                           
                        </table>

                      </div>
                    </div>
                  </section>

            </div>
          </div>
        </div>
      </div>  
    

@endsection