<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-section">
            <div class="sidebar-user-material">
                <div class="sidebar-section-body">
                    <div class="d-flex">
                        <div class="flex-1">
                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon btn-sm rounded-pill">
                                <i class="icon-wrench"></i>
                            </button>
                        </div>
                        <a href="#" class="flex-1 text-center"><img
                                src="{{ url('assets/img/logo.jpg') }}"
                                class="img-fluid rounded-circle shadow-sm" width="80" height="80" alt=""></a>
                        <div class="flex-1 text-right">
                          <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="icon-transmission"></i>
                            </button>

                            <button type="button"
                                class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                <i class="icon-cross2"></i>
                            </button>
                        </div>
                    </div>

<?php
$settings= App\Models\Setting::first();


?>
                    <div class="text-center">
                        <h6 class="mb-0 text-white text-shadow-dark mt-3">{{$settings->site_name}}</h6>
                        <span class="font-size-sm text-white text-shadow-dark"></span>
                    </div>
                </div>

                <div class="sidebar-user-material-footer">
                    <a href="#user-nav"
                        class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
                        data-toggle="collapse"><span>My account</span></a>
                </div>
            </div>

            <div class="collapse border-bottom" id="user-nav">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-user-plus"></i>
                            <span>My profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-coins"></i>
                            <span>My balance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-comment-discussion"></i>
                            <span>Messages</span>
                            <span class="badge badge-teal badge-pill align-self-center ml-auto">58</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-cog5"></i>
                            <span>Account settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="{{ route('logout') }}" class="nav-link">
                            <i class="icon-switch2"></i>
                            <span>Logout</span>
                        </a> -->
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs mt-1">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="{{url('home')}}"
                        class="nav-link  {{ (request()->is('home')) ? 'active' : ''  }}">
                        <i class="icon-home"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>


                @can('view-dashoard')
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ (request()->is('apps/*')) ? 'active' : ''  }} "><i
                            class="icon-copy"></i> <span>{{__('Apps')}}</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="{{__('Apps')}}">


                        
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/calendar*')) ? 'active' : ''  }} "
                                href="{{url('apps/calendar/')}}">{{__('Calendar')}}</a></li>
                        
                        
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/chat*')) ? 'active' : ''  }}"
                                href="{{url('apps/chat')}}">{{__('Chat')}}</a></li>
                        
                       
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/contacts*')) ? 'active' : ''  }}"
                                href="{{url('apps/contacts')}}">{{__('Contacts')}}</a>
                        </li>

                       <li class="nav-item"> <a href="#" class="nav-link {{ (request()->is('apps/companies/*')) ? 'active' : ''  }} "><i
                            class="icon-copy"></i> <span>{{__('Companies')}}</span></a>

                                 <ul class="nav nav-group-sub" data-submenu-title="{{__('Companies')}}">

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps//companies/list*')) ? 'active' : ''  }}"
                                href="{{url('apps//companies/list')}}">{{__('List')}}</a>
                                
                                </li>

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/companies/company-details*')) ? 'active' : ''  }}"
                                href="{{url('apps/companies/company-details')}}">{{__('Company Details')}}</a>
                                
                                </li>

                                 </ul>
                        </li>

                        <li class="nav-item nav-item-submenu">


                        <a href="#" class="nav-link {{ (request()->is('apps/ecommerce/*')) ? 'active' : ''  }} "><i
                            class="icon-copy"></i> <span>{{__('Ecommerce')}}</span></a>

                                 <ul class="nav nav-group-sub" data-submenu-title="{{__('Ecommerce')}}">

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps//ecommerce/dashboard*')) ? 'active' : ''  }}"
                                href="{{url('apps//companies/dashboard')}}">{{__('Dashboard')}}</a>
                                
                                </li>

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/ecommerce/products*')) ? 'active' : ''  }}"
                                href="{{url('apps/companies/products')}}">{{__('Company Details')}}</a>
                                
                                </li>

                                <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps//ecommerce/product-details*')) ? 'active' : ''  }}"
                                href="{{url('apps//companies/product-details')}}">{{__('Product Details')}}</a>
                                
                                </li>

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/ecommerce/add-product*')) ? 'active' : ''  }}"
                                href="{{url('apps/companies/add-product')}}">{{__('Add Product')}}</a>
                                
                                </li>

                                <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps//ecommerce/orders*')) ? 'active' : ''  }}"
                                href="{{url('apps//companies/orders')}}">{{__('Orders')}}</a>
                                
                                </li>

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/ecommerce/order-details*')) ? 'active' : ''  }}"
                                href="{{url('apps/companies/order-details')}}">{{__('Order Details')}}</a>
                                
                                </li>

                                <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps//ecommerce/customers*')) ? 'active' : ''  }}"
                                href="{{url('apps//companies/customers')}}">{{__('Customers')}}</a>
                                
                                </li>

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/ecommerce/cart*')) ? 'active' : ''  }}"
                                href="{{url('apps/companies/cart')}}">{{__('Cart')}}</a>
                                
                                </li>

                                <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps//ecommerce/sellers*')) ? 'active' : ''  }}"
                                href="{{url('apps//companies/sellers')}}">{{__('Sellers')}}</a>
                                
                                </li>

                                 <li class="nav-item"><a
                                class="nav-link {{ (request()->is('apps/ecommerce/checkout*')) ? 'active' : ''  }}"
                                href="{{url('apps/companies/checkout')}}">{{__('Checkout')}}</a>
                                
                                </li>

                                 </ul>
                        </li>
                        

                    </ul>
                </li>
                @endcan


                   

                <!-- /page kits -->


                @can('view-dashoard')
        <li class="nav-item nav-item-submenu">
            <a href="#app" class="nav-link {{ (request()->is('apps/*')) ? 'active' : ''  }} "><i
                            class="icon-copy"></i> <span>{{__('Apps')}}</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="{{__('Apps')}}">

                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('apps/calendar')) ? 'active' : ''  }}" href="{{ url('/apps/calendar') }}">
                        {{__('Calendar')}} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('apps/chat')) ? 'active' : ''  }}" href="{{ url('/apps/chat') }}"> {{__('Chat')}}
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#pages-companies" class="nav-link {{ (request()->is('apps/companies/*')) ? 'active' : ''  }}"
                        data-toggle="collapse" 
                        class="dropdown-toggle"> {{__('Companies')}} <i
                            class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub"
                        id="pages-companies" data-parent="#pages">
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/companies/list')) ? 'active' : ''  }}"
                                href="{{ url('/apps/companies/lists') }}"> {{__('List')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/companies/company-details')) ? 'active' : ''  }}"
                                href="{{ url('/apps/companies/company-details') }}"> {{__('Company Details')}} </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('apps/contacts')) ? 'active' : ''  }}" href="{{ url('/apps/contacts') }}">
                        {{__('Contacts')}} </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#pages-ecommerce" class="nav-link {{ (request()->is('apps/ecommerce/*')) ? 'active' : ''  }}"
                        data-toggle="collapse" 
                        class="dropdown-toggle"> {{__('Ecommerce')}} <i
                            class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub"
                        id="pages-ecommerce" data-parent="#pages">
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/dashboard')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/dashboard') }}"> {{__('Dashboard')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/products')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/products') }}"> {{__('Products')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/product-details')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/product-details') }}"> {{__('Product Details')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/add-product')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/add-product') }}"> {{__('Add Product')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/orders')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/orders') }}"> {{__('Orders')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/order-details')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/order-details') }}"> {{__('Order Details')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/customers')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/customers') }}"> {{__('Customers')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/sellers')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/sellers') }}"> {{__('Sellers')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/cart')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/cart') }}"> {{__('Cart')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/ecommerce/checkout')) ? 'active' : ''  }}"
                                href="{{ url('/apps/ecommerce/checkout') }}"> {{__('Checkout')}} </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#pages-email" class="nav-link {{ (request()->is('apps/email/*')) ? 'active' : ''  }}" data-toggle="collapse"
                         class="dropdown-toggle"> {{__('Email')}}
                        <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub " id="pages-email"
                        data-parent="#pages">
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/email/inbox')) ? 'active' : ''  }}"
                                href="{{ url('/apps/email/inbox') }}"> {{__('Inbox')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/email/details')) ? 'active' : ''  }}"
                                href="{{ url('/apps/email/details') }}"> {{__('Email Details')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/email/compose')) ? 'active' : ''  }}"
                                href="{{ url('/apps/email/compose') }}"> {{__('Compose Email')}} </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('apps/file-manager')) ? 'active' : ''  }}"
                        href="{{ url('/apps/file-manager') }}"> {{__('File Manager')}} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('apps/invoice-list')) ? 'active' : ''  }}"
                        href="{{ url('/apps/invoice-list') }}"> {{__('Invoice List')}} </a>
                </li>
                <li class="nav-item nav-item-submenu ">
                    <a href="#pages-notes" class="nav-link {{ (request()->is('apps/notes/*')) ? 'active' : ''  }}" data-toggle="collapse"
                        class="dropdown-toggle">
                        {{ __('Notes')}} <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub " id="pages-notes"
                        data-parent="#pages">
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/notes/list')) ? 'active' : ''  }}"
                                href="{{ url('/apps/notes/list') }}"> {{__('List')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/notes/details')) ? 'active' : ''  }}"
                                href="{{ url('/apps/notes/details') }}"> {{__('Notes Details')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/notes/create')) ? 'active' : ''  }}"
                                href="{{ url('/apps/notes/create') }}"> {{__('Create Note')}} </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('apps/social')) ? 'active' : ''  }}" href="{{ url('/apps/social') }}">
                        {{__('Social')}} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('apps/task-list')) ? 'active' : ''  }}" href="{{ url('/apps/task-list') }}">
                        {{__('Task List')}} </a>
                </li>
                <li class="nav-item ">
                    <a href="#pages-tickets" class="nav-link {{ (request()->is('apps/tickets/*')) ? 'active' : ''  }}"
                        data-toggle="collapse" 
                        class="dropdown-toggle"> {{__('Tickets')}} <i
                            class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub "
                        id="pages-tickets" data-parent="#pages">
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/tickets/list')) ? 'active' : ''  }}"
                                href="{{ url('/apps/tickets/list') }}"> {{__('Ticket List')}} </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('apps/tickets/details')) ? 'active' : ''  }}"
                                href="{{ url('/apps/tickets/details') }}"> {{__('Ticket Details')}} </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-title">{{__('Pages')}}</li>
        @endcan

        @can('view-staff-menu')
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link {{ (request()->is('authentications/*')) ? 'active' : ''  }}" data-toggle="collapse"
                >
             
                    <i class="icon-hammer-wrench"></i>
                            
                    <span>{{__('Authorization')}}</span>
             
                <!-- <div> -->
                    <!-- <i class="las la-angle-right sidemenu-right-icon"></i> -->
                    <!-- <span class="menu-badge badge-danger"> {{__('')}}</span> -->
                <!-- </div> -->
            </a>

            <ul class="nav nav-group-sub">
              <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/roles')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/roles') }}"> {{__('Role')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/permissions')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/permissions') }}"> {{__('Permission')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/departments')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/departments') }}"> {{__('Departments')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/designations')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/designations') }}"> {{__('Designations')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/users')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/users') }}"> {{__('Manage Users')}}</a>
                        </li>
                       
                        @can('view-other')
                <li class="nav-item">
                    <a href="#" class="nav-link {{ (request()->is('authentications/style1/*')) ? 'active' : ''  }}"
                       > {{__('Role & Permission')}} <i
                            class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub ">
                       
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/roles')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/roles') }}"> {{__('Role')}}</a>
                        </li>
                        
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/permissions')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/permissions') }}"> {{__('Permission')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/departments')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/departments') }}"> {{__('Departments')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/designations')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/designations') }}"> {{__('Designation')}}</a>
                        </li>
                       
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authorization/users')) ? 'active' : ''  }}"
                                href="{{ url('/authorization/users') }}"> {{__('Manage Users')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authentications/style1/forgot-password')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style1/forgot-password') }}"> {{__('Forget Password')}}
                            </a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authentications/style1/confirm-email')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style1/confirm-email') }}"> {{__('Confirm Email')}} </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('view-style')
                <li class="nav-item ">
                    <a href="#" class="nav-link {{ (request()->is('authentications/style1/*')) ? 'active' : ''  }}"
                        > {{__('Style 1')}} <i
                            class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authentications/style1/login')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style1/login') }}"> {{__('Login')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authentications/style1/signup')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style1/signup') }}"> {{__('Register')}}</a>
                        </li>
                        <li class="nav-item">  
                            <a class="nav-link {{ (request()->is('authentications/style1/locked')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style1/locked') }}"> {{__('Lock Screen')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style1/forgot-password')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style1/forgot-password') }}"> {{__('Forget Password')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style1/confirm-email')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style1/confirm-email') }}"> {{__('Confirm Email')}} </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link {{ (request()->is('authentications/style2/*')) ? 'active' : ''  }}"
                        > Style 2 <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub ">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style2/login')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style2/login') }}"> {{__('Login')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style2/signup')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style2/signup') }}"> {{__('Register')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style2/locked')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style2/locked') }}"> {{__('Lock Screen')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style2/forgot-password')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style2/forgot-password') }}"> {{__('Forget Password')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style2/confirm-email')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style2/confirm-email') }}"> {{__('Confirm Email')}} </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ (request()->is('authentications/style3/*')) ? 'active' : ''  }}"
                        > {{__('Style 3')}} <i
                            class="las la-angle-right sidemenu-right-icon"></i> </a>
                    <ul class="nav nav-group-sub "
                        >
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style3/login')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style3/login') }}"> {{__('Login')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style3/signup')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style3/signup') }}"> {{__('Register')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style3/locked')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style3/locked') }}"> {{__('Lock Screen')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('authentications/style3/forgot-password')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style3/forgot-password') }}"> {{__('Forget Password')}}
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('authentications/style3/confirm-email')) ? 'active' : ''  }}"
                                href="{{ url('/authentications/style3/confirm-email') }}"> {{__('Confirm Email')}} </a>
                        </li>
                    </ul>
                </li>
                @endcan
            </ul>
        </li>

      @can('view-transaction')
     <li class="nav-item nav-item-submenu">
            <a href="#transaction" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" data-toggle="collapse"
                 class="dropdown-toggle">
             
                    <i class="icon-diamond"></i><span>Transaction</span>
                            
      

            </a>
            <ul class="nav nav-group-sub" id="transaction"
                data-parent="#accordionExample">
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('deposit')) ? 'active' : ''  }}" href="{{ url('deposit') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Deposit')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('expenses')) ? 'active' : ''  }}" href="{{ url('expenses') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Payments')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('accounting/bank_statement')) ? 'active' : ''  }}"
                        href="{{ url('accounting/bank_statement') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Bank Statement')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('accounting/bank_reconciliation')) ? 'active' : ''  }}"
                        href="{{ url('accounting/bank_reconciliation') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Bank Reconciliation')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('accounting/reconciliation_report')) ? 'active' : ''  }}"
                        href="{{ url('accounting/reconciliation_report') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Bank Reconciliation Report')}}</span>

                    </a>
                </li>
            
            </ul>
        </li>
@endcan
        
        
             <li class="nav-item nav-item-submenu">
            <a href="#cards" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" data-toggle="collapse"
                 class="dropdown-toggle">
    
                    <i class="icon-credit-card"></i><span>Manage Card </span>
             

            </a>
            <ul class="nav nav-group-sub" id="cards"
                data-parent="#accordionExample">
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('cards')) ? 'active' : ''  }}" href="{{ url('manage_cards') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Manage cards')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('card_printing')) ? 'active' : ''  }}" href="{{ url('card_printing') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Cards Printing')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('card_deposit')) ? 'active' : ''  }}" href="{{ url('card_deposit') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Deposit')}}</span>

                    </a>
                </li>
            
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#manage_member" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" data-toggle="collapse"
                 class="dropdown-toggle">
                
                    <i class="icon-user-tie"></i><span>Manage Member </span>
               

            </a>
            <ul class="nav nav-group-sub" id="manage_member"
                data-parent="#accordionExample">
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('cards')) ? 'active' : ''  }}" href="{{ url('manage_member') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('New No-Cooperate Applications')}}</span>

                    </a>
                </li>

		<li class="nav-item ">
                    <a class="nav-link {{ (request()->is('cards')) ? 'active' : ''  }}" href="{{ url('manage_cooperate') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('New Cooperate Applications')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_payments')) ? 'active' : ''  }}" href="{{ url('member_payments') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('No-Cooperate Payments Verification')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('cooperate_payments')) ? 'active' : ''  }}" href="{{ url('cooperate_payments') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Cooperate Payments Verification')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('card_deposit')) ? 'active' : ''  }}" href="{{ route('member_list') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('All Member List')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                <a class="nav-link {{ (request()->is('manage_charge')) ? 'active' : ''  }}" href="{{ url('members/manage_charge') }}"
                        aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Charges')}}</span>

                        </a>
                    </li>
            
            </ul>
        </li>

      <li class="nav-item ">
            <a class="nav-link {{ (request()->is('location/*')) ? 'active' : ''  }}" href="{{ url('location') }}"
                aria-expanded="false" class="dropdown-toggle">

              <i class="icon-location4"></i>  <span> {{__('Location')}}</span>

            </a>
        </li>

        @can('view-purchase')
       <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link {{ (request()->is('pos/purchases/*')) ? 'active' : ''  }}"><i
                    class="icon-basket"></i> <span>Purchases
                </span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/items*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/items')}}"><i></i></i>Manage Items</a></li>
            <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/pos_supplier*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/pos_supplier')}}"><i></i></i>Manage Suppliers</a></li>
                      @can('view-pos')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/purchase*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/purchase')}}"><i></i></i>Manage Purchases</a></li>
                            @endcan
                      <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/creditors_report*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/creditors_report')}}"><i></i></i>Creditors Report</a></li>

                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/debit_note*')) ? 'active' : ''  }}"
                    href="{{url('pos/purchases/debit_note')}}"><i></i></i>Debit Note</a></li>
                    <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/pos_issue*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/pos_issue')}}"><i></i></i>Good Issue</a></li>
                            @can('view-serial')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/purchase_serial*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/purchase_serial')}}"><i></i></i>Manage Purchases </a></li>
                      @endcan
                                  @can('view-serial')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/list*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/list')}}"><i></i></i> Inventory List</a></li>
                      @endcan
              <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/payments*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/payments')}}"><i></i></i>Manage Payments</a></li> -->
        
            </ul>
            </li>
     
        @endcan

                         @can('view-sales')
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link {{ (request()->is('pos/sales/*')) ? 'active' : ''  }}"><i
                    class="icon-basket"></i> <span>Sales
                </span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item"><a class="nav-link {{ (request()->is('pos/sales/pos_client*')) ? 'active' : ''  }}"
                href="{{url('pos/sales/pos_client')}}"><i></i></i>Clients List</a></li>
                          @can('view-pos')
               <!--<li class="nav-item"><a class="nav-link {{ (request()->is('pos/sales/profoma_invoice*')) ? 'active' : ''  }}"
                href="{{url('pos/sales/profoma_invoice')}}"><i></i></i>Profoma Invoice</a></li>-->
            <li class="nav-item"><a class="nav-link {{ (request()->is('pos/sales/invoice*')) ? 'active' : ''  }}"
                href="{{url('pos/sales/invoice')}}"><i></i></i>Invoices</a></li>
                       @endcan
              <li class="nav-item"><a class="nav-link {{ (request()->is('pos/sales/debtors_report*')) ? 'active' : ''  }}"
                href="{{url('pos/sales/debtors_report')}}"><i></i></i>Debtors Report</a></li>
                <!-- <li class="nav-item"><a class="nav-link {{ (request()->is('pos/sales/credit_note*')) ? 'active' : ''  }}"
                href="{{url('pos/sales/credit_note')}}"><i></i></i>Credit Note</a></li>-->
                  @can('view-serial')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('pos/sales/invoice_serial*')) ? 'active' : ''  }}"
                href="{{url('pos/sales/invoice_serial')}}"><i></i></i>Invoices</a></li>
                      @endcan
               <!-- <li class="nav-item"><a class="nav-link {{ (request()->is('pos/sales/payments*')) ? 'active' : ''  }}"
                href="{{url('pos/purchases/payments')}}"><i></i></i>Manage Payments</a></li> -->
        
            </ul>
            </li>
         @endcan


  @can('view-accounting')
        <li class="nav-item nav-item-submenu">
            <a href="#accounting" class="nav-link {{ (request()->is('accounting/*')) ? 'active' : ''  }}" data-toggle="collapse"
                class="dropdown-toggle">
                
                    <i  class="icon-stats-growth"></i><span>Accounting</span>                          
             

            </a>
            <ul class="nav nav-group-sub" id="accounting"
                data-parent="#accordionExample">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('accounting/manual_entry/*')) ? 'active' : ''  }}"
                        href="{{ url('accounting/manual_entry') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Journal Entry')}}</span>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('accounting/journal*')) ? 'active' : ''  }}"
                        href="{{ url('accounting/journal') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Journal Entry Report')}}</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('accounting/ledger*')) ? 'active' : ''  }}" href="{{ url('accounting/ledger') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Ledger')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('financial_report/trial_balance')) ? 'active' : ''  }}"
                        href="{{ url('financial_report/trial_balance') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Trial Balance ')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('financial_report/trial_balance_summary*')) ? 'active' : ''  }}"
                        href="{{ url('financial_report/trial_balance_summary') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Trial Balance Summary ')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('financial_report/income_statement')) ? 'active' : ''  }}"
                        href="{{ url('financial_report/income_statement') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        {{__('Income Statement')}}

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('financial_report/income_statement_summary')) ? 'active' : ''  }}"
                        href="{{ url('financial_report/income_statement_summary') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        {{__('Income Statement Summary')}}

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('financial_report/balance_sheet')) ? 'active' : ''  }}"
                        href="{{ url('financial_report/balance_sheet') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Balance Sheet')}}</span>

                    </a>
                </li>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ (request()->is('financial_report/balance_sheet_summary')) ? 'active' : ''  }}"
                    href="{{ url('financial_report/balance_sheet_summary') }}" aria-expanded="false"
                    class="dropdown-toggle">

                    <span> {{__('Balance Sheet Summary')}}</span>

                </a>
            </li>

            </ul>
        </li>

@endcan

        

       @can('view-gl-setup')
        <li class="nav-item nav-item-submenu">
            <a href="#glSetup" class="nav-link {{ (request()->is('inventory/*')) ? 'active' : ''  }}" data-toggle="collapse"
                class="dropdown-toggle">               
                    <i  class="icon-wrench3"></i> <span>GL SETUP</span>
                   
               

            </a>

            <ul class="nav nav-group-sub" id="glSetup"
                data-parent="#accordionExample">
                <li class="nav-item  ">
                    <a class="nav-link {{ (request()->is('class_account/*')) ? 'active' : ''  }}" href="{{ url('class_account') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Class Account')}}</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('group_account/*')) ? 'active' : ''  }}" href="{{ url('group_account') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Group Account')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('account_codes/*')) ? 'active' : ''  }}" href="{{ url('account_codes') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Account Codes')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('chart_of_account/*')) ? 'active' : ''  }}" href="{{ url('chart_of_account') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Chart of Accounts')}}</span>

                    </a>
                </li>


            </ul>
        </li>
@endcan


        <li class="nav-item nav-item-submenu">
            <a href="#inventory" class="nav-link {{ (request()->is('inventory/*')) ? 'active' : ''  }}" data-toggle="collapse"
                class="dropdown-toggle">
            
                    <i class="icon-hammer2"></i><span>Inventory</span>                          
              

            </a>
            <ul class="nav nav-group-sub" id="inventory"
                data-parent="#accordionExample">

             
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('inventory/*')) ? 'active' : ''  }}" href="{{ url('inventory') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Inventory Items')}}</span>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('fieldstaff/*')) ? 'active' : ''  }}" href="{{ url('fieldstaff') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Field Staff')}}</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('purchase_inventory/*')) ? 'active' : ''  }}"
                        href="{{ url('purchase_inventory') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Purchase Inventory')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('inventory_list/*')) ? 'active' : ''  }}" href="{{ url('inventory_list') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Inventory List')}}</span>

                    </a>
                </li>
               
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('good_issue/*')) ? 'active' : ''  }}" href="{{ url('good_issue') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Good Issue')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('good_return/*')) ? 'active' : ''  }}" href="{{ url('good_return') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Good Return')}}</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('good_movement/*')) ? 'active' : ''  }}" href="{{ url('good_movement') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Good Movement')}}</span>

                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link {{ (request()->is('good_reallocation/*')) ? 'active' : ''  }}"
                        href="{{ url('good_reallocation') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Good Reallocation')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('good_disposal/*')) ? 'active' : ''  }}" href="{{ url('good_disposal') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Good Disposal')}}</span>

                    </a>
                </li>

            </ul>
        </li>

      @can('view-payroll')
        <li class="nav-item nav-item-submenu">
            <a href="#payroll" class="nav-link {{ (request()->is('payroll/*')) ? 'active' : ''  }}" data-toggle="collapse"
                 class="dropdown-toggle">
             
                    <i class="icon-calculator"></i><span>Payroll</span>
               

            </a>
            <ul class="nav nav-group-sub" id="payroll"
                data-parent="#accordionExample">
                <li class="nav-item  ">
                    <a class="nav-link {{ (request()->is('payroll/salary_template')) ? 'active' : ''  }}" href="{{ url('payroll/salary_template') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Salary Template')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/manage_salary')) ? 'active' : ''  }}" href="{{ url('payroll/manage_salary') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Manage Salary')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('apayroll/employee_salary_list')) ? 'active' : ''  }}"
                        href="{{ url('payroll/employee_salary_list') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Employee Salary List')}}</span>

                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link {{ (request()->is('payroll/make_payment')) ? 'active' : ''  }}"
                        href="{{ url('payroll/make_payment') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Make Payment')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/generate_payslip')) ? 'active' : ''  }}"
                        href="{{ url('payroll/generate_payslip') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Generate Payslip')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/payroll_summary')) ? 'active' : ''  }}" href="{{ url('payroll/payroll_summary') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Payroll Summary')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/advance_salary')) ? 'active' : ''  }}"
                        href="{{ url('payroll/advance_salary') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Advance Salary')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/employee_loan')) ? 'active' : ''  }}"
                        href="{{ url('payroll/employee_loan') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Employee Loan')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/overtime')) ? 'active' : ''  }}"
                        href="{{ url('payroll/overtime') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Overtime')}}</span>

                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link {{ (request()->is('payroll/nssf')) ? 'active' : ''  }}" href="{{ url('payroll/nssf') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Social Security -NSSF')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/tax')) ? 'active' : ''  }}"
                        href="{{ url('payroll/tax') }}" aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Tax ')}}</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('payroll/nhif')) ? 'active' : ''  }}"
                        href="{{ url('payroll/nhif') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('Health Contribution')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('payroll/wcf')) ? 'active' : ''  }}"
                        href="{{ url('payroll/wcf') }}" aria-expanded="false"
                        class="dropdown-toggle">

                        <span> {{__('WCF Contribution')}}</span>

                    </a>
                </li>
            </ul>
        </li>
@endcan

  @can('view-leave')
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('leave/*')) ? 'active' : ''  }}" href="{{ url('leave') }}" aria-expanded="false"
                class="dropdown-toggle">
               
                    <i class="icon-airplane3"></i>
                    <span> {{__('Leave Management')}}</span>
               
            </a>
        </li>
@endcan

  @can('view-training')
               <li class="nav-item">

            <a class="nav-link {{ (request()->is('training/*')) ? 'active' : ''  }}" href="{{ url('training') }}" aria-expanded="false"
                class="dropdown-toggle">
              
                    <i class="icon-book"></i>
                    <span> {{__('Training')}}</span>
              
            </a>
        </li>
@endcan


                <li class="nav-item">

            <a class="nav-link {{ (request()->is('facility/*')) ? 'active' : ''  }}" href="{{ url('facility') }}" aria-expanded="false"
                class="dropdown-toggle">
               
                    <i class="icon-tree7"></i>
                    <span> {{__('Facilities')}}</span>
                
            </a>
        </li>
         
        <li class="nav-item nav-item-submenu">
            <a href="#membership" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" data-toggle="collapse"
                class="dropdown-toggle">
              
                    <i class="icon-user-tie"></i><span>Manage Member </span>
               

            </a>
            <ul class="nav nav-group-sub" id="membership"
                data-parent="#accordionExample">
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('membership')) ? 'active' : ''  }}" href="{{ url('membership/member') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Register')}}</span>

                    </a>
                </li>
                <!--
                <li class="nav-item  card_deposit')) ? 'active' : ''  }}">
                    <a class="nav-link {{ (request()->is('card_deposit')) ? 'active' : ''  }}" href="{{ url('card_deposit') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Deposit')}}</span>

                    </a>
                </li>

-->
            
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('visitors/*')) ? 'active' : ''  }}" href="{{ url('visitors') }}" >
                
                    <i class="icon-user-plus"></i>
                    <span> {{__('Visitors')}}</span>
                
            </a>
        </li>

  
                
        <li class="nav-item nav-item-submenu">
            <a href="#restaurant" class="nav-link {{ (request()->is('restaurant/*')) ? 'active' : ''  }}" >
              
                    <i class="icon-store"></i><span>Restaurant</span>
              
            </a>
            <ul class="nav nav-group-sub" title="restaurant">
              

                <li class="nav-item  ">
                    <a class="nav-link {{ (request()->is('restaurant/restaurants')) ? 'active' : ''  }}" href="{{ url('restaurant/restaurants') }}"
                        <span> {{__('Restaurants List')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('restaurant/tables')) ? 'active' : ''  }}" href="{{ url('restaurant/tables') }}"
                      >

                        <span> {{__('Tables List')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('menu-items')) ? 'active' : ''  }}" href="{{ url('restaurant/menu-items') }}"
                      >

                        <span> {{__('Menu items')}}</span>

                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('orders')) ? 'active' : ''  }}" href="{{ url('restaurant/orders') }}"
                        >

                        <span> {{__('Make Order')}}</span>

                    </a>
                </li>
                <!--
                <li class="nav-item  restaurant')) ? 'active' : ''  }}">
                    <a class="nav-link {{ (request()->is('foodcategory')) ? 'active' : ''  }}" href="{{ url('restaurant/category') }}"
                       >

                        <span> {{__('Food Category')}}</span>

                    </a>
                </li>
                <li class="nav-item  restaurant')) ? 'active' : ''  }}">
                    <a class="nav-link {{ (request()->is('foodcuisine')) ? 'active' : ''  }}" href="{{ url('restaurant/cuisine') }}"
                       >

                        <span> {{__('Food Cuisine')}}</span>

                    </a>
                </li>
               
                <li class="nav-item  restauranthome')) ? 'active' : ''  }}">
                    <a class="nav-link {{ (request()->is('restauranthome')) ? 'active' : ''  }}" href="{{ url('restaurant/restauranthome') }}"
                        >

                        <span> {{__('Reservation Report')}}</span>

                    </a>
                </li>
                 <li class="nav-item  restaurant/dashboard')) ? 'active' : ''  }}">
                    <a class="nav-link {{ (request()->is('restaurant/dashboard')) ? 'active' : ''  }}" href="{{ url('restaurant/dashboard') }}"
                       >

                        <span> {{__('Restaurant Dashbord')}}</span>

                    </a>
                </li>
            -->
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('manage_bar/*')) ? 'active' : ''  }}" href="{{ url('manage_bar') }}">
                    <i class="icon-store2"></i><span>Manage Bar</span>
              
            </a>
        </li>

@can('manage-report')
<li class="nav-item nav-item-submenu">    
	<a href="#" class="nav-link {{ (request()->is('reports/*')) ? 'active' : ''  }}"><i class="icon-grid6"></i> <span>Reports</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Sidebars">
                                                               @can('view-inventory-report')
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link {{ (request()->is('reports/inventory_report*')) ? 'active' : ''  }}">Inventory Report</a>
									<ul class="nav nav-group-sub">
	<!--<li class="nav-item"><a class="nav-link {{ (request()->is('reports/inventory_report/purchase_report*')) ? 'active' : ''  }}"  href="{{url('reports/inventory_report/purchase_report')}}"><i></i></i>Inventory Purchase Report</a></li>-->
       <!--  <li class="nav-item"><a class="nav-link {{ (request()->is('reports/inventory_report/sales_report*')) ? 'active' : ''  }}" href="{{url('reports/inventory_report/sales_report')}}"><i></i></i>Inventory Sales Report</a></li> -->                       
         <!--  <li class="nav-item"><a class="nav-link {{ (request()->is('reports/inventory_report/balance_report*')) ? 'active' : ''  }}"  href="{{url('reports/inventory_report/balance_report')}}"><i></i></i>Inventory Balance Report</a></li>-->
         <li class="nav-item"><a class="nav-link {{ (request()->is('reports/inventory_report/crate_report*')) ? 'active' : ''  }}"  href="{{url('reports/inventory_report/crate_report')}}"><i></i></i>Inventory Crate Report</a></li>
         <li class="nav-item"><a class="nav-link {{ (request()->is('reports/inventory_report/crate_report*')) ? 'active' : ''  }}"  href="{{url('reports/inventory_report/bottle_report')}}"><i></i></i>Inventory Bottle Report</a></li>
</ul>
								</li>
         @endcan	
        </ul>
								</li>
 @endcan

 

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('setting/*')) ? 'active' : ''  }}" href="{{ url('setting') }}" >
             
                    <i class="icon-cog"></i>
                    <span> {{__('Settings')}}</span>
                
            </a>
        </li>
        @endcan
        @can('view-visitor-menu')
        <li class="nav-item nav-item-submenu">
            <a href="#cards" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" >
                <i class="lab la-wpforms"></i><span>Manage</span>

            </a>
            <ul class="nav nav-group-sub" id="cards"
                >
           
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('card_deposit')) ? 'active' : ''  }}" href="{{ url('card_deposit') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Deposit')}}</span>

                    </a>
                </li>
            
            </ul>
        </li>!-->
@endcan
@can('view-member-menu')
        <li class="nav-item nav-item-submenu">
            <a href="#cards" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" >
              
                   <i class="icon-user-plus"></i><span>Manage</span>
              
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="cards"
                >

                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_card_deposit')) ? 'active' : ''  }}" href="{{ url('member_card_deposit') }}"
                        >

                        <span> {{__('Deposit')}} </span>

                    </a>
                </li>
            
            </ul>
        </li>
@endcan

  
                
        
      @can('view-other-menu')
       
        <li class="menu-title"> {{__('Others')}}</li>
        <li class="nav-item nav-item-submenu">
            <a href="http://neptuneweb.xyz" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-file-code"></i>
                    <span> {{__('Documentation')}}</span>
                </div>
            </a>
        </li>
    @endcan
    </ul>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>