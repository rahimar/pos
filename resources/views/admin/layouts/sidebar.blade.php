<div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
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
                <div class="scrollbar-sidebar" style="    background: darkslategrey;">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboard</li>
                        <li  class="{{ Request::segment(2) == 'purchaseitems' ? 'mm-active':''}} {{ Request::segment(2) == 'add-purchaseitems' ? 'mm-active':''}}">
                            <a href="#">
                                <i class="metismenu-icon fa fa-shopping-cart" style="font-size:17px;"></i>Purchase
                                <i class="metismenu-state-icon  fa fa-chevron-down" style="font-size:17px;"></i>
                            </a>
                            <ul      >
                                <li>
                                    <a href="{{ route('addpurchaseitems')}}"  class="{{ Request::segment(2) == 'add-purchaseitems' ? 'mm-active':''}}" >
                                        <i class="metismenu-icon"></i>Purchase Items
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('purchaseitems')}}" class="{{ Request::segment(2) == 'purchaseitems' ? 'mm-active':''}}">
                                        <i class="metismenu-icon"></i>All Purchase Items
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li  class="{{ Request::segment(2) == 'salesitems' ? 'mm-active':''}} {{ Request::segment(2) == 'add-salesitems' ? 'mm-active':''}}">
                            <a href="#">
                                <i class="metismenu-icon fa fa-shopping-cart" style="font-size:17px;"></i>Sales
                                <i class="metismenu-state-icon  fa fa-chevron-down" style="font-size:17px;"></i>
                            </a>
                            <ul      >
                                <li>
                                    <a href="{{ route('addsalesitems')}}"  class="{{ Request::segment(2) == 'add-salesitems' ? 'mm-active':''}}">
                                        <i class="metismenu-icon"></i>Sales Items
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('salesitems')}}"  class="{{ Request::segment(2) == 'salesitems' ? 'mm-active':''}}">
                                        <i class="metismenu-icon"></i>All Sales Items
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li  class="{{ Request::segment(2) == 'product' ? 'mm-active':''}} {{ Request::segment(2) == 'category' ? 'mm-active':''}} {{ Request::segment(2) == 'brand' ? 'mm-active':''}}
                        {{ Request::segment(2) == 'unit' ? 'mm-active':''}} {{ Request::segment(2) == 'register' ? 'mm-active':''}} {{ Request::segment(2) == 'acchead' ? 'mm-active':''}}">
                                <a href="#">
                                    <i class="metismenu-icon fa fa-anchor" style="font-size:17px;"></i>Basic setting
                                    <i class="metismenu-state-icon  fa fa-chevron-down" style="font-size:17px;"></i>
                                </a>
                                <ul>
                                    <li >
                                        <a href="{{ route('product')}}"  class="{{ Request::segment(2) == 'product' ? 'mm-active':''}}" >
                                            <i class="metismenu-icon"></i>Product
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('category')}}" class="{{ Request::segment(2) == 'category' ? 'mm-active':''}}">
                                            <i class="metismenu-icon"></i>Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('brand')}}" class="{{ Request::segment(2) == 'brand' ? 'mm-active':''}}">
                                            <i class="metismenu-icon"></i>Brand
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('unit')}}" class="{{ Request::segment(2) == 'unit' ? 'mm-active':''}}">
                                            <i class="metismenu-icon"></i>Units
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('companyregister')}}" class="{{ Request::segment(2) == 'register' ? 'mm-active':''}}">
                                            <i class="metismenu-icon"></i> Register
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('acchead')}}" class="{{ Request::segment(2) == 'acchead' ? 'mm-active':''}}">
                                            <i class="metismenu-icon"></i> Add Acc Head
                                        </a>
                                    </li>
                                  
                                </ul>
                            </li>
                            <li   class="{{ Request::segment(2) == 'addmessage' ? 'mm-active':''}} {{ Request::segment(2) == 'message' ? 'mm-active':''}} {{ Request::segment(2) == 'sendsms' ? 'mm-active':''}}">
                                <a href="#">
                                    <i class="metismenu-icon fa fa-life-ring" style="font-size:17px;"></i>Message
                                    <i class="metismenu-state-icon  fa fa-chevron-down" style="font-size:17px;"></i>
                                </a>
                                <ul      >
                                    <li>
                                        <a href="{{ route('addmessage')}}"  class="{{ Request::segment(2) == 'addmessage' ? 'mm-active':''}} {{ Request::segment(2) == 'message' ? 'mm-active':''}}">
                                            <i class="metismenu-icon"></i>Add Create Msg
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sendsms')}}" class="{{ Request::segment(2) == 'sendsms' ? 'mm-active':''}}">
                                            <i class="metismenu-icon"></i>Send Msg
                                        </a>
                                    </li>
                                  
                                </ul>
                            </li>
                            
                           
                           
                            
                            
                            
                            
                           
                            
                        </ul>
                    </div>
                </div>
            </div>