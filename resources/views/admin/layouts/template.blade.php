<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('page_title')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="msapplication-tap-highlight" content="no">
    @yield('page_css')
    
  <script src="{{asset('admin/assets/css/select2.css')}}"></script>
  <script src="{{asset('admin/assets/css/bootstrap.min.css')}}"></script>
<link href="{{asset('admin/assets/css/main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">

</head>
<style>
.vertical-nav-menu ul>li>a, .vertical-nav-menu li a  {
    color: #fff;
}
.vertical-nav-menu li a:hover {
    color: #000;
}
.fa {
    font-size:17px;
}
</style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                
               
                <div class="logo-src" style="background-image: ;"><img src="{{ asset('admin/assets/images/company-logo.png')}}" style="margin-top: -24px;margin-left: -13px; width: 108px;height: 75px;"/>  </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    

            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-megamenu nav">
                        <li class="nav-item">
                            <a href="{{ route('adminDashboard')}}" data-placement="bottom" rel="popover-focus" data-offset="300" data-toggle="popover-custom" class="nav-link">
                              Dashboard
                            </a>
                            
                        </li>
                       
                        
                    </ul>       
               </div>

                <div class="app-header-right">
                    <div class="header-dots">
                        
                       
                    </div>
                   
                   <!-- area Start Here -->
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                                    <div class="widget-heading"> {{Auth::user()->name}}</div>
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                            
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading"> {{Auth::user()->name}}</div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <form method="post" action="{{ route('logout')}}">
                                                                        @csrf
                                                                  <a class="btn-pill btn-shadow btn-shine btn btn-focus" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                                                   
                                                                  </form>
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
                    <!-- area End Here -->
                    
                           
                </div>
            </div>
        </div>       

               
        <div class="app-main">
           @include('admin.layouts.sidebar')
           
            <div class="app-main__outer" style="    background: slategrey;">
               
            
               @yield('content')
               
            </div>
        </div>
    </div>
    
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    
    <script src="{{asset('admin/assets/scripts/jquery-3.4.1.min.js')}}"></script>

  <script src="{{asset('admin/assets/scripts/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/scripts/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script></body>

    @yield('page_script')
<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Nov 2021 06:56:13 GMT -->
</html>