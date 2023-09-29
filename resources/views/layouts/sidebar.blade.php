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
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboard</li>
                            <li  class="">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-rocket"></i>Category
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul      >
                                    <li>
                                        <a href="{{ route('add-category')}}"  class="" >
                                            <i class="metismenu-icon"></i>Add Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('category')}}" >
                                            <i class="metismenu-icon"></i>All Category
                                        </a>
                                    </li>
                                  
                                </ul>
                            </li>
                            <li  class="">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-rocket"></i>Sub Category
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul      >
                                    <li>
                                        <a href="{{ route('add-sub-category')}}"  class="" >
                                            <i class="metismenu-icon"></i>Add Sub Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sub-category')}}" >
                                            <i class="metismenu-icon"></i>All Sub Category
                                        </a>
                                    </li>
                                  
                                </ul>
                            </li>
                            <li  class="">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-rocket"></i>Product
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul      >
                                    <li>
                                        <a href="{{ route('add-product')}}"  class="" >
                                            <i class="metismenu-icon"></i>Add Product
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product')}}" >
                                            <i class="metismenu-icon"></i>All Product
                                        </a>
                                    </li>
                                  
                                </ul>
                            </li>
                            
                            
                            
                           
                            
                        </ul>
                    </div>
                </div>
            </div>