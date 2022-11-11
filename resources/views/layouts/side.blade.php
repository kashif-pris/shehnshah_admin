<div class="circle-loader"></div>

@if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff')


    <nav class="sidebar sidebar-offcanvas main_nav" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <div class="nav-link">

                    <div class="profile-name">
                        <p class="name">
                            Welcome Admin
                        </p>
                        <p class="designation">
                            @if(session::get('active_role')->key == 'admin-ar')

                            @php   $vendorId = Session::get('vendorId'); @endphp
                            @if($vendorId)
                              {!! $vendorId->title !!}
                            @else
                                Super Admin
                            @endif



                        @else
                            @php $u= auth()->user()->businessId;
                        $b=   App\Models\Business::find($u);
                            @endphp
                            {{@$b->title}}
                        @endif
                        </p>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            @php
                // DB::table('permissions')->where('order',null)->update(['order'=>0]);
                    // $user= Auth::user();
                    // dd($user->getRoleNames());
                    $permissions = \App\Models\Permission::with('child')->where('main',1)->where('sub_menu',0)->orderBy('order','asc')->get();
                // @dd($permissions)
            @endphp

            @foreach($permissions as $key=> $mainPermision)
                @if(Gate::allows($mainPermision->name))
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#page-layouts_{{$key}}" aria-expanded="false"
                           aria-controls="page-layouts_{{$key}}">
                            <i class="fa @if($mainPermision->icon){{$mainPermision->icon}}@else fa-location-arrow @endif menu-icon"></i>
                            <span class="menu-title">{{$mainPermision->display_name}}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="page-layouts_{{$key}}">
                            <ul class="nav flex-column sub-menu">
                                {{-- <ul class=""> --}}
                                @foreach($mainPermision->child as $key=> $childNav)
                                    @if(Gate::allows($childNav->name))
                                        <li class="nav-item d-none d-lg-block">
                                            <a class="nav-link" href="@if(isset($childNav->url) && $childNav->url != '#0'){{route($childNav->url)}}@endif">
                                                @if($childNav->display_name) {{$childNav->display_name}}    @else {{$childNav->name}}   @endif
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach

        </ul>
    </nav>


    <nav class="sidebar sidebar-offcanvas vendor_nav" id="sidebar">
        <ul class="nav ">
            <li class="nav-item nav-profile">
                <div class="nav-link">

                    <div class="profile-name">
                        <p class="name">
                            Welcome to

                        </p>
                        <p class="designation">
                            @php $u= auth()->user()->businessId;
                            $b=   App\Models\Business::find($u);
   
                              @endphp
  
                              {{@$b->title}}
                          
                        </p>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('booking-list')}}">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Bookings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('customer-list')}}">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('coupon-list')}}">
                    <i class="fa fa-gift menu-icon"></i>
                    <span class="menu-title">Coupons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('queue-list')}}">
                    <i class="fa fa-list  menu-icon"></i>
                    <span class="menu-title">Queues</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('worker-list')}}">
                    <i class="fa fa-user  menu-icon"></i>
                    <span class="menu-title">Workers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('offering-list')}}">
                    <i class="fa fa-gift menu-icon"></i>
                    <span class="menu-title">Offering</span>
                </a>
            </li>

        </ul>
    </nav>

@else
    <nav class="sidebar sidebar-offcanvas  " id="sidebar">
        <ul class="nav ">
            <li class="nav-item nav-profile">
                <div class="nav-link">

                    <div class="profile-name">
                        <p class="name">
                            Welcome to

                        </p>
                        <p class="designation">
                            @php $u= auth()->user()->businessId;
                            $b=   App\Models\Business::find($u);
   
                              @endphp
  
                              {{@$b->title}}
                        </p>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fa fa-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('booking-list')}}">
                    <i class="fa fa-book menu-icon"></i>
                    <span class="menu-title">Bookings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('customer-list')}}">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('coupon-list')}}">
                    <i class="fa fa-gift menu-icon"></i>
                    <span class="menu-title">Coupons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('queue-list')}}">
                    <i class="fa fa-list  menu-icon"></i>
                    <span class="menu-title">Queues</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('worker-list')}}">
                    <i class="fa fa-user  menu-icon"></i>
                    <span class="menu-title">Workers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('offering-list')}}">
                    <i class="fa fa-gift menu-icon"></i>
                    <span class="menu-title">Offering</span>
                </a>
            </li>

        </ul>
    </nav>
@endif