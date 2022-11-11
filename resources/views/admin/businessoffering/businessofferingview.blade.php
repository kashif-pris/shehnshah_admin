@extends('layouts.main')
@section('content')
    <style>
        input[type=checkbox]:before {
            border: 1px solid black;
        }

        .wizard > .content {
            min-height: 0 !important;
        }
    </style>
    <div class="page-header">
        <h3 class="page-title">
            View Business Offering
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Dashboard </a></li>
               <a href="{{url('service/business-offering-list')}}" >
                    <li class="breadcrumb-item active" aria-current="page"> / Business Offering</li>
                 </a>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <form name="myForm"  id="example-form"
                         >@csrf

                        <div>
                            <h3>General Information</h3>
                            {{-- tab one --}}
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business</label>
                                            <select class="form-control service" name="business" id="business_id" disabled>
                                               
                                            

                                            <option value="" selected disabled>--Select--</option>
                                                {{-- @if(isset($offering_list->business))
                                                    <option value="{{$offering_list->business->id}}"
                                                            selected> {{$offering_list->business->title}}</option>
                                                @endif --}}
                                                @forelse($business as $b)
                                                    <option disabled {{ $offering_list->business->id == $b->id ? "selected" : "" }} value="{{ $b->id }}">{{$b->title}}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Offerings</label>
                                            <select class="form-control offeringList offering_id" onchange="getOfferingDetails()" name="offering" id="offering_id" disabled>
                                                <option value="" selected disabled>--Select--</option>

                                                 @forelse($offering_link as $b)
                                            <option {{$offering_list->offering->id == $b->id ? "selected" : "" }} value="{{ $b->id }}">{{$b->title}}</option>
                                            @empty
                                            @endforelse
                                            </select>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Title </label>
                                            <input type="text" class="form-control offeringTitle" readonly id="offeringTitle" value = "{{$offering_list->title}}"
                                                   placeholder="About" name="title">
                                                   <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   value="{{$offering_list->id}}" placeholder="About" name="id" hidden readonly>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> About <small
                                                        style="color:green;">(150 character allowed)</small> </label>

                                            <textarea type="text" class="form-control" id="offeringabout"
                                                      placeholder="About" name="about" rows="10.8"
                                                      cols="50" readonly>{{$offering_list->about}}</textarea>
                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Price </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                                                   placeholder="About" value="{{$offering_list->price}}" name="price" readonly>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label>Service</label>
                                            <select class="form-control serviceId" onchange="getOffering()" name="service" id="service_id" disabled>
                                                <option value="" selected disabled>--Select--</option>
                                            @forelse($service_data_list as $b)
                                            <option {{$offering_list->offering->serviceId == $b->id ? "selected" : "" }} value="{{ $b->id }}">{{$b->title}}</option>
                                            @empty

                                            @endforelse
                                            </select>
                                           
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Subtitle </label>
                                            <input type="text" class="form-control" id="offeringSubtitle"
                                                   placeholder="About" value="{{$offering_list->subTitle}}" name="subtitle" readonly>
                                            <div class="alert-danger">{{$errors->first('subtitle')}}</div>

                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="card">

                                                <div class="card-body">
                                                    <h4 class="card-title d-flex">Cover
                                                        <small class="ml-auto align-self-end">
                                                            <small class="text-danger">JPG, PNG </small>
                                                        </small>
                                                    </h4>
                                                    
                                                   
                                                    <img src="{{$offering_list->cover}}"  id="offeringCover"  style ="height:90px;width:270px;"/>
                                                </div>
                                            </div>

                                        </div>
                                       
                                    </div>
                                </div>

                            </section>
                            {{-- Tab two --}}
                            <h3>Time</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1"> Pre Time</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1" readonly value ="{{$offering_list->preTime}}"
                                                   placeholder="About" name="pretime">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Process Time </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1" readonly value ="{{$offering_list->processTime}}"
                                                   placeholder="About" name="processtime">


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Post Time</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1" readonly value ="{{$offering_list->postTime}}"
                                                   placeholder="About" name="posttime">
                                        </div>
                                     
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Pre Grace </label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1" readonly value ="{{$offering_list->preGrace}}"
                                                   placeholder="About" name="pregrace" required>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Process Grace</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1" readonly value ="{{$offering_list->processGrace}}"
                                                   placeholder="About" name="processgrace">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Post Grace</label>
                                            <input type="text" class="form-control" id="exampleInputConfirmPassword1" readonly value ="{{$offering_list->postGrace}}"
                                                   placeholder="About" name="postgrace">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{-- Tab three --}}
                            <h3>Condition</h3>

                           
                            <section>
                                <div class="row">
                                
                                  {{-- <div class="col-lg-7">
                                   
                                  <h3 >Business Hours</h3>    
                                      <div class="table-responsive">
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr class="bg-primary text-white">
                                             
                                              <th>
                                                Days
                                              </th>
                                              <th>
                                                Start Time
                                              </th>
                                              <th>
                                                End Time
                                              </th>
                                              <th>
                                                Break Start
                                              </th>
                                              <th>
                                                Break End
                                              </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                           
                                            @foreach(\App\CentralLogics\Helpers::getWeekMap()[0] as $key2=> $day)
                            
                                            <tr class="table-info">
                                              
                                              <td>
                                                {{@$day}}
                                              </td>
                                              <td class="noP">
                                                <select  class="form-control  customselect" name="start_time[]" >
                                                 
                                                  @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                    <option value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>    
                                                  @endforeach                              
                                                </select>
                                              </td>
                                              <td class="noP">
                                                <select  class="form-control  customselect" name="end_time[]" >
                                                  @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                    <option  value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>    
                                                  @endforeach                              
                                                </select>
                                              </td>
                                              <td class="noP">
                                                <select  class="form-control  customselect" name="break_start_time[]" >
                                                  @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                    <option  value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>    
                                                  @endforeach                              
                                                </select>
                                              </td>
                                              <td class="noP">
                                                <select  class="form-control  customselect" name="break_end_time[]" >
                                                  @foreach(\App\CentralLogics\Helpers::getWeekMap()[1] as $key=> $time)
                                                    <option value="{{$time}}" >{{explode(',',$time)[0].':'.explode(',',$time)[1]}}</option>    
                                                  @endforeach                              
                                                </select>
                                              </td>
                                            </tr>
                                            @endforeach
                                            
                                          </tbody>
                                        </table>
                                      </div>      
                                </div> --}}

                                <div class="col-lg-6">
                                    <h4 class="sr-only-01" for="inlineFormInputGroup2">Conditions</h4>
                                    <label><b>Cash on Delivery</b></label><br>
                                    @if((json_decode($offering_list->conditions)->cashOnDelivery) == 'true')
                                    <label for="">Yes</label>
                                    <input  type="radio" value = "true" name="conditions[cashOnDelivery]" id="" checked readonly>
                                    <label for="">No</label>
                                    <input  type="radio" value = "false" name="conditions[cashOnDelivery]" id=""  readonly>
                                    @else
                                    <label for="">Yes</label>
                                    <input  type="radio" value = "true" name="conditions[cashOnDelivery]" id=""  readonly>
                                    <label for="">No</label>
                                    <input  type="radio" value = "false" name="conditions[cashOnDelivery]" id="" checked  readonly>
                              
                                    @endif
                                   
                                    <br>
                                    <label class="mt-3"><b>Advance Cancellation</b></label>
                                    <input type="text" readonly value ="{{json_decode($offering_list->conditions)->advanceCancellation}}" name="conditions[advanceCancellation]" class="form-control" >
              
                                    <label class="mt-3"><b>Cancellation Allowed</b></label><br>
                                    <!-- <input type="text" name="conditions[cancellationAllowed]" class="form-control"> -->
                                    @if((json_decode($offering_list->conditions)->cancellationAllowed) == "true")
                                    <label for="">Yes</label>
                                    <input type="radio" readonly value ="true" name="conditions[cancellationAllowed]" id="" checked>
                                    <label for="">No</label>
                                    <input  type="radio" readonly value = "false" name="conditions[cancellationAllowed]" id="" >
                            
                                    @else
                                    <label for="">Yes</label>
                                    <input type="radio" readonly value ="true" name="conditions[cancellationAllowed]" id="" class="ml-2" >
                                    <label for="">No</label>
                                    <input type="radio" readonly value ="false" name="conditions[cancellationAllowed]" id="" class="ml-2" checked>
                                    @endif

                                    
                                </div>
                                <div class="col-lg-6">
                                <h4>Other</h4>
                              
                                  <div class="form-inline repeater">
                                  
                                      <div data-repeater-list="group_b">
                                        @foreach(json_decode($offering_list->otherConditions) as $key=>$data)
                                        <div data-repeater-item class="d-flex mb-2">
                                      
                                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                            <div class="input-group-prepend">
                                            </div>
                                              <input style="width:250px;" readonly value="{{$data}}" type="text" class="form-control form-control-sm" name="group_b['{{$key}}'][othercondition]" id="inlineFormInputGroup1" placeholder="Choose File" >
                                            </div>
                                         
                                          {{-- <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                            <i class="fas fa-trash"></i>
                                          </button> --}}
                                          
                                        </div>
                                        @endforeach
                                       
                                      </div>
                                    
                                      {{-- <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                        <i class="fa fa-plus"></i>
                                      </button> --}}
                                    
                                    </div> 
                                    
                                </div>
                              
                              
                                
                            </section>

                            <h3>Others</h3>
                            
                            <section>
                               <div class="row">
                                  <div class="col-lg-4">
                                    <div class="form-group pt-3">
                                      <div class="form-inline repeater">
                                        <h4>couponIds</h4>
                                        <div data-repeater-list="couponIds">
                                          @foreach(json_decode($offering_list->couponIds) as $key=>$data)
                                          <div data-repeater-item class="d-flex mb-2">
                                        
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                              <div class="input-group-prepend">
                                              </div>
                                                <input readonly style="width:250px;" value="{{$data}}" type="text" class="form-control form-control-sm" name="group_b['{{$key}}'][couponIds]" id="inlineFormInputGroup1" placeholder="Choose File" >
                                              </div>
                                           
                                            {{-- <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                              <i class="fas fa-trash"></i>
                                            </button> --}}
                                            
                                          </div>
                                          @endforeach
                                         
                                        </div>
                                      
                                        {{-- <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                          <i class="fa fa-plus"></i>
                                        </button> --}}
                                      
                                      </div> 
                                    </div>
                               </div>
                               <div class="col-lg-4">
                               <div class="form-group pt-3">
                                <div class="form-inline repeater">
                                  <h4>icouponIds</h4>
                                  <div data-repeater-list="icouponIds">
                                    @foreach(json_decode($offering_list->icouponIds) as $key=>$data)
                                    <div data-repeater-item class="d-flex mb-2">
                                  
                                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-prepend">
                                        </div>
                                          <input readonly style="width:250px;" value="{{$data}}" type="text" class="form-control form-control-sm" name="group_b['{{$key}}'][icouponIds]" id="inlineFormInputGroup1" placeholder="Choose File" >
                                        </div>
                                     
                                      {{-- <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
                                        <i class="fas fa-trash"></i>
                                      </button> --}}
                                      
                                    </div>
                                    @endforeach
                                   
                                  </div>
                                
                                  {{-- <button data-repeater-create type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2">
                                    <i class="fa fa-plus"></i>
                                  </button> --}}
                                
                                </div> 
                            </div>
                               </div>
                               <div class="col-lg-4">
                                <h4 class="sr-only-01" for="inlineFormInputGroup2">Status</h4>
                                <div class="form-check">
                                    @if($offering_list->active == '1')
                                    <input class="form-check-input" type="radio" name="status_type"
                                           id="flexRadioDefault1" value="1" checked readonly>
                                    @else
                                         <input class="form-check-input" type="radio" name="status_type"
                                                id="flexRadioDefault1" value="1" readonly>

                                    @endif
                                    <label>
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    @if($offering_list->active == '0')

                                    <input class="form-check-input" type="radio" name="status_type"
                                           id="flexRadioDefault1" value="0" checked readonly>
                                    @else
                                    <input class="form-check-input" type="radio" name="status_type"
                                    id="flexRadioDefault1" value="0" readonly >
                                    @endif
                                    <label>
                                        In-Active
                                    </label>
                                </div>
                               
                            </div> 
                            </div>
                            </section>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        $('#business_id').on('change', function () {

            $.ajax({
                type: "Post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route( 'business_service' ) }}',
                data: {
                    id: this.value, _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    $('#service_id').html(data);
                },

            });

        });
    </script>

    <script>
        function getOffering(){
            // alert('onchange');
        var serviceId = $('.serviceId').val();
        $.ajax({
                url:'{{route("service_offering")}}',
                method:'get',
                data:{'serviceId':serviceId, '_token':'{{csrf_token()}}'},
                success: function(resp){
                    console.log(resp);
                    $(".offeringList").html('');
                    for(var i = 0; i < resp.offering.length; i++){
                            var html = '<option value="'+resp.offering[i].id+'">'+resp.offering[i].title+'</option>';
                            $(".offeringList").append(html);                    
                    }
                },
                error: function(resp){
                    alert('something went wrong');
                }
            })
        }
    </script>

<script>
    function getOfferingDetails(){
       
    var offeringId = $('.offering_id').val();
    $.ajax({
            url:'{{route("offering_details.url")}}',
            method:'get',
            data:{'offeringId':offeringId, '_token':'{{csrf_token()}}'},
            success: function(resp){
                console.log(resp); 
                // alert(resp.cover);           
                $("#offeringTitle").val(resp.title);
                $("#offeringSubtitle").val(resp.subTitle);
                $("#offeringabout").val(resp.about);
                $("#offeringCover").attr('src','/offering_cover/'+resp.cover);

                
            },
            error: function(resp){
                alert('something went wrong');
            }
        })
    }
</script>

    

@endsection