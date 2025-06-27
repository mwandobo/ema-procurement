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
                    $settings = App\Models\Setting::first();


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




                    <!--
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
-->

                   
                <a class="nav-link {{ (request()->is('change_password/*')) ? 'active' : ''  }}" href="{{ url('change_password') }}">
                    <i class="icon-cog"></i>
                    <span> Change Password</span>

                </a>

                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i> {{ __('Logout') }}
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
                
                
                
                
            @can('view-visitor')
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('visitors/*')) ? 'active' : ''  }}" href="{{ url('visitors') }}">

                    <i class="icon-user-plus"></i>
                    <span> {{__('Visitors')}}</span>

                </a>
            </li>
            @endcan
            
            
            
                            @can('manage_member')
                <li class="nav-item nav-item-submenu">
                    <a href="#manage_member" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" data-toggle="collapse"
                        class="dropdown-toggle">

                        <i class="icon-user-tie"></i><span>Manage Member </span>


                    </a>
                    <ul class="nav nav-group-sub" id="manage_member"
                        data-parent="#accordionExample">

                        {{--
                @can('view-noncooperate')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('cards')) ? 'active' : ''  }}" href="{{ url('manage_member') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('New No-Cooperate Applications')}}</span>

                        </a>
                </li>
                @endcan

                @can('view-cooperate')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('cards')) ? 'active' : ''  }}" href="{{ url('manage_cooperate') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('New Cooperate Applications')}}</span>

                    </a>
                </li>
                @endcan



                @can('view-cooperate-payment')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('cooperate_payments')) ? 'active' : ''  }}" href="{{ url('cooperate_payments') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Cooperate Payments Verification')}}</span>

                    </a>
                </li>
                @endcan


                @can('view-members')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_reg_admin_view')) ? 'active' : ''  }}" href="{{ route('member_reg_admin_view') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> Create New Members </span>

                    </a>
                </li>
                @endcan

                --}}


                @can('view-membership-type')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('members/membership_type')) ? 'active' : ''  }}" href="{{ url('members/membership_type') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Membership Type')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-charges')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('members/manage_charge')) ? 'active' : ''  }}" href="{{ url('members/manage_charge') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Charges')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-members')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_list')) ? 'active' : ''  }}" href="{{ route('member_list') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Member List')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-members-deposit')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_deposit_list')) ? 'active' : ''  }}" href="{{ route('member_deposit_list') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Member Deposit ')}}</span>

                    </a>
                </li>
                @endcan






                @can('view-card-list')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_card_list')) ? 'active' : ''  }}" href="{{ route('member_card_list') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Card List')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-card-printing')

                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('card_printing')) ? 'active' : ''  }}" href="{{ url('card_printing') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> Manage Cards</span>

                    </a>
                </li>
                @endcan


                @can('view-member-payment')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_payments')) ? 'active' : ''  }}" href="{{ url('member_payments') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Member Fee Payment')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-active-members')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('active_members')) ? 'active' : ''  }}" href="{{ route('active_members') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Active Member List')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-expired-members')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('expired_members')) ? 'active' : ''  }}" href="{{ route('expired_members') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Expired Member List')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-transaction_report')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('transaction_report')) ? 'active' : ''  }}" href="{{ route('transaction_report') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Member Transaction Report')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-registration_report')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('registration_report')) ? 'active' : ''  }}" href="{{ route('registration_report') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Member Registration Report')}}</span>

                    </a>
                </li>
                @endcan

                @can('view-fee_report')
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('fee_report')) ? 'active' : ''  }}" href="{{ route('fee_report') }}"
                        aria-expanded="false" class="dropdown-toggle">

                        <span> {{__('Member Fee Report')}}</span>

                    </a>
                </li>
                @endcan

            </ul>
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

                
                
                
                 @can('view-suppliers')
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('supplier/*')) ? 'active' : ''  }}" href="{{ url('supplier') }}">

                    <i class="icon-user"></i>
                    <span> {{__('Suppliers')}}</span>

                </a>
            </li>
            @endcan
            
            
             
                
             
                    
                    
                 @can('view-bar')

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ request()->is('leave/*') ? 'active' : '' }}">
                        <i class="icon-sales"></i> <span>Location & Bar</span></a>

                    <ul class="nav nav-group-sub">

                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->is('location/*') ? 'active' : '' }}" href="{{ url('location') }}">
                                Location</a>
                        </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('bar/manage_bar')) ? 'active' : ''  }}" href="{{ url('bar/manage_bar') }}"> Bar List</a>
                    </li>


                    </ul>
                </li>
                @endcan
                
                
                
                
                 @can('view-bar-purchase')
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link {{ (request()->is('bar/purchases/*')) ? 'active' : ''  }}"><i class="icon-cart"></i> <span> Purchases </span></a>
                        <ul class="nav nav-group-sub">

                            @can('view-bar-items')

                            <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/category*')) ? 'active' : ''  }}"
                                    href="{{url('bar/purchases/category')}}"><i></i></i>Manage Categories</a></li>

                            <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/bar_items*')) ? 'active' : ''  }}"
                                    href="{{url('bar/purchases/bar_items')}}"><i></i></i>Manage Items</a></li>
                            @endcan

                            {{--
@can('view-bar-supplier')
            <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/bar_pos_supplier*')) ? 'active' : ''  }}"
                            href="{{url('bar/purchases/bar_pos_supplier')}}"><i></i></i>Manage Suppliers</a>
                    </li>

                    @endcan
                    --}}


                    @can('view-bar-purchase-requisition')
                    <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/bar_purchase_requisition*')) ? 'active' : ''  }}"
                            href="{{url('bar/purchases/bar_purchase_requisition')}}"><i></i></i>Manage Purchases Requisition</a></li>
                    @endcan


                    @can('view-bar-purchase-order')
                    <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/bar_purchase_quotation*')) ? 'active' : ''  }}"
                            href="{{url('bar/purchases/bar_purchase_quotation')}}"><i></i></i>Manage Purchases Quotation</a></li>
                    @endcan


                    @can('view-bar_purchases')
                    <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/bar_purchase*')) ? 'active' : ''  }}"
                            href="{{url('bar/purchases/bar_purchase')}}"><i></i></i>Manage Purchases Order</a></li>
                    @endcan

                    @can('view-bar-creditors_report')
                    <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/creditors_report*')) ? 'active' : ''  }}"
                            href="{{url('bar/purchases/creditors_report')}}"><i></i></i>Creditors Report</a></li>
                    @endcan
                    @can('view-bar-debit_note')
                    <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/bar_debit_note*')) ? 'active' : ''  }}"
                            href="{{url('bar/purchases/bar_debit_note')}}"><i></i></i>Debit Note</a></li>
                    @endcan

                    @can('view-bar-issue')
                    <li class="nav-item"><a class="nav-link {{ (request()->is('bar/purchases/bar_pos_issue*')) ? 'active' : ''  }}"
                            href="{{url('bar/purchases/bar_pos_issue')}}"><i></i></i>Stock Movement</a></li>
                    @endcan

                    @can('view-bar-activity')
                    <li class="nav-item"><a class="nav-link {{ (request()->is('bar/pos_activity*')) ? 'active' : ''  }}"
                            href="{{url('bar/pos_activity')}}"><i></i></i>Track POS Activity</a></li>
                    @endcan

                </ul>
            </li>
            @endcan
            
            
            
            
            
              @can('manage-member_activities')
            <li class="nav-item nav-item-submenu">
                <a href="#restaurant" class="nav-link {{ (request()->is('restaurant/*')) ? 'active' : ''  }}">

                    <i class="icon-store"></i><span>Sales</span>

                </a>
                <ul class="nav nav-group-sub" title="restaurant">

                    @can('view-restaurant_list')
                    <li class="nav-item  ">
                        <a class="nav-link {{ (request()->is('restaurant/restaurants')) ? 'active' : ''  }}" href="{{ url('restaurant/restaurants') }}"
                            <span> {{__('Restaurants List')}}</span>

                        </a>
                    </li>

                    @endcan

                    @can('view-tables')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('restaurant/tables')) ? 'active' : ''  }}" href="{{ url('restaurant/tables') }}">

                            <span> {{__('Tables List')}}</span>

                        </a>
                    </li>

                    @endcan

                    @can('view-restaurant_menu')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('menu-items')) ? 'active' : ''  }}" href="{{ url('restaurant/menu-items') }}">

                            <span> {{__('Menu items')}}</span>

                        </a>
                    </li>

                    @endcan

                    @can('view-orders')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('orders')) ? 'active' : ''  }}" href="{{ url('restaurant/orders') }}">

                            <span> {{__('Make Order')}}</span>

                        </a>
                    </li>


                    @endcan


                    @can('view-facilities')
                    <li class="nav-item">

                        <a class="nav-link {{ (request()->is('facility/*')) ? 'active' : ''  }}" href="{{ url('facility') }}" aria-expanded="false"
                            class="dropdown-toggle">
                            <span> {{__('Section ')}}</span>

                        </a>
                    </li>
                    @endcan



                    @can('view-facilities_items')
                    <li class="nav-item">

                        <a class="nav-link {{ (request()->is('facility_items')) ? 'active' : ''  }}" href="{{ url('facility_items') }}" aria-expanded="false"
                            class="dropdown-toggle">
                            <span> {{__('Section Items')}}</span>

                        </a>
                    </li>
                    @endcan



                    @can('view-facilities_sales')
                    <li class="nav-item">

                        <a class="nav-link {{ (request()->is('facility_sales')) ? 'active' : ''  }}" href="{{ url('facility_sales') }}" aria-expanded="false"
                            class="dropdown-toggle">
                            <span> {{__('Section Sales')}}</span>

                        </a>
                    </li>
                    @endcan


                </ul>
            </li>

            @endcan
            
            
            
            
             @can('view-transaction')
            <li class="nav-item nav-item-submenu">
                <a href="#transaction" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" data-toggle="collapse"
                    class="dropdown-toggle">

                    <i class="icon-diamond"></i><span>Transaction</span>



                </a>
                <ul class="nav nav-group-sub" id="transaction"
                    data-parent="#accordionExample">

                    @can('view-deposit')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('deposit')) ? 'active' : ''  }}" href="{{ url('deposit') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Deposit')}}</span>

                        </a>
                    </li>
                    @endcan
                    @can('view-expenses')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('expenses')) ? 'active' : ''  }}" href="{{ url('expenses') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Payments')}}</span>

                        </a>
                    </li>
                    @endcan

                    @can('view-transfer')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('transfer')) ? 'active' : ''  }}"
                            href="{{ url('transfer') }}">Transfer</a></li>
                    @endcan


                    @can('view-cash')
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ url('account') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> Bank & Cash</span>

                        </a>
                    </li>
                    @endcan

                    @can('view-bank_statement')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('accounting/bank_statement')) ? 'active' : ''  }}"
                            href="{{ url('accounting/bank_statement') }}" aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Bank Statement')}}</span>

                        </a>
                    </li>

                    @endcan
                    @can('view-bank_reconciliation')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('accounting/bank_reconciliation')) ? 'active' : ''  }}"
                            href="{{ url('accounting/bank_reconciliation') }}" aria-expanded="false"
                            class="dropdown-toggle">

                            <span> {{__('Bank Reconciliation')}}</span>

                        </a>
                    </li>
                    @endcan

                    @can('view-reconciliation_report')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('accounting/reconciliation_report')) ? 'active' : ''  }}"
                            href="{{ url('accounting/reconciliation_report') }}" aria-expanded="false"
                            class="dropdown-toggle">

                            <span> {{__('Bank Reconciliation Report')}}</span>

                        </a>
                    </li>
                    @endcan

                </ul>
            </li>
            @endcan

                
                  @can('view-gl-setup')
            <li class="nav-item nav-item-submenu">
                <a href="#glSetup" class="nav-link {{ (request()->is('inventory/*')) ? 'active' : ''  }}" data-toggle="collapse"
                    class="dropdown-toggle">
                    <i class="icon-wrench3"></i> <span>GL SETUP</span>



                </a>

                <ul class="nav nav-group-sub" id="glSetup"
                    data-parent="#accordionExample">

                    @can('view-class_account')
                    <li class="nav-item  ">
                        <a class="nav-link {{ (request()->is('class_account/*')) ? 'active' : ''  }}" href="{{ url('class_account') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Class Account')}}</span>

                        </a>
                    </li>
                    @endcan
                    @can('view-group_account')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('group_account/*')) ? 'active' : ''  }}" href="{{ url('group_account') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Group Account')}}</span>

                        </a>
                    </li>
                    @endcan
                    @can('view-sub_group_account')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('sub_group_account/*')) ? 'active' : ''  }}" href="{{ url('sub_group_account') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__(' Sub Group Account')}}</span>

                        </a>
                    </li>
                    @endcan
                    @can('view-account_codes')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('account_codes/*')) ? 'active' : ''  }}" href="{{ url('account_codes') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Account Codes')}}</span>

                        </a>
                    </li>
                    @endcan


                    @can('view-chart_of_account')
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('chart_of_account/*')) ? 'active' : ''  }}" href="{{ url('chart_of_account') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Chart of Accounts')}}</span>

                        </a>
                    </li>
                    @endcan


                </ul>
            </li>
            @endcan
                
                
                
                
                    @can('view-accounting')
            <li class="nav-item nav-item-submenu">
                <a href="#accounting" class="nav-link {{ (request()->is('accounting/*')) ? 'active' : ''  }}" data-toggle="collapse"
                    class="dropdown-toggle">

                    <i class="icon-stats-growth"></i><span>Accounting</span>


                </a>
                <ul class="nav nav-group-sub" id="accounting"
                    data-parent="#accordionExample">

                    @can('view-manual_entry')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('accounting/manual_entry/*')) ? 'active' : ''  }}"
                            href="{{ url('accounting/manual_entry') }}" aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Journal Entry')}}</span>

                        </a>
                    </li>

                    @endcan
                    @can('view-journal')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('accounting/journal*')) ? 'active' : ''  }}"
                            href="{{ url('accounting/journal') }}" aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Journal Entry Report')}}</span>

                        </a>
                    </li>
                    @endcan

                    @can('view-ledger')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('accounting/ledger*')) ? 'active' : ''  }}" href="{{ url('accounting/ledger') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Ledger')}}</span>

                        </a>
                    </li>
                    @endcan
                    @can('view-trial_balance')
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
                    @endcan

                    @can('view-income_statement')
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

                    @endcan
                    @can('view-balance_sheet')
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
            @endcan
            </ul>
            </li>

            @endcan
            
            
                
                
                  @can('view-payroll')
                <li class="nav-item nav-item-submenu">
                    <a href="#payroll" class="nav-link {{ (request()->is('payroll/*')) ? 'active' : ''  }}" data-toggle="collapse"
                        class="dropdown-toggle">

                        <i class="icon-calculator"></i><span>Payroll</span>


                    </a>
                    <ul class="nav nav-group-sub" id="payroll"
                        data-parent="#accordionExample">
                        @can('view-salary_template')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/salary_template*')) ? 'active' : ''  }}"
                                href="{{url('payroll/salary_template')}}"> Salary
                                Template</a></li>
                        @endcan
                        @can('view-manage_salary')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/manage_salary*')) ? 'active' : ''  }}"
                                href="{{url('payroll/manage_salary')}}"> Manage
                                Salary</a></li>
                        @endcan
                        @can('view-employee_salary_list')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/employee_salary_list*')) ? 'active' : ''  }}"
                                href="{{ url('payroll/employee_salary_list') }}">
                                Employee Salary List</a>
                        </li>
                        @endcan
                        @can('view-make_payment')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/make_payment*')) ? 'active' : ''  }}"
                                href="{{url('payroll/make_payment')}}">Make Payment</a>
                        </li>
                        @endcan
                        @can('view-make_payment')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/multiple_payment*')) ? 'active' : ''  }}"
                                href="{{url('payroll/multiple_payment')}}">Make Multiple Payments</a>
                        </li>
                        @endcan
                        @can('view-generate_payslip')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/generate_payslip*')) ? 'active' : ''  }}"
                                href="{{url('payroll/generate_payslip')}}">Generate
                                Payslip</a></li>
                        @endcan
                        @can('view-payroll_summary')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/payroll_summary*')) ? 'active' : ''  }}"
                                href="{{url('payroll/payroll_summary')}}">Payroll
                                Summary</a></li>
                        @endcan
                        @can('view-salary_control')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/salary_control*')) ? 'active' : ''  }}"
                                href="{{url('payroll/salary_control')}}">Salary Control</a></li>
                        @endcan
                        @can('view-advance_salary')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/advance_salary*')) ? 'active' : ''  }}"
                                href="{{url('payroll/advance_salary')}}">Advance
                                Salary</a></li>
                        @endcan
                        @can('view-employee_loan')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/employee_loan*')) ? 'active' : ''  }}"
                                href="{{url('payroll/employee_loan')}}">Employee
                                Loan</a></li>
                        @endcan
                        @can('view-overtime')
                        <li class="nav-item"><a
                                class="nav-link {{ (request()->is('payroll/overtime*')) ? 'active' : ''  }}"
                                href="{{url('payroll/overtime')}}">Overtime</a></li>
                        @endcan
                        @can('view-nssf')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('payroll/nssf*')) ? 'active' : ''  }}"
                                href="{{url('payroll/nssf')}}">Social Security (NSSF)
                            </a></li>
                        @endcan
                        @can('view-tax')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('payroll/tax*')) ? 'active' : ''  }}"
                                href="{{url('payroll/tax')}}">PAYE </a></li>
                        @endcan
                        @can('view-nhif')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('payroll/nhif*')) ? 'active' : ''  }}"
                                href="{{url('payroll/nhif')}}">Health Contribution</a>
                        </li>
                        @endcan
                        @can('view-wcf')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('payroll/wcf*')) ? 'active' : ''  }}"
                                href="{{url('payroll/wcf')}}">WCF Contribution</a></li>
                        @endcan
                        @can('view-sdl')
                        <li class="nav-item"><a class="nav-link {{ (request()->is('payroll/sdl*')) ? 'active' : ''  }}"
                                href="{{url('payroll/sdl')}}">SDL Contribution</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('view-leave')

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ request()->is('leave/*') ? 'active' : '' }}">
                        <i class="icon-airplane3"></i> <span>Leave Management</span></a>

                    <ul class="nav nav-group-sub">

                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->is('leave_category*') ? 'active' : '' }}" href="{{ url('leave_category') }}">
                                Leave Category</a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->is('leave*') ? 'active' : '' }}" href="{{ url('leave') }}">
                                Manage Leave</a>
                        </li>


                    </ul>
                </li>
                @endcan





 @can('manage-report')
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link {{ (request()->is('reports/*')) ? 'active' : ''  }}"><i class="icon-grid6"></i> <span>Reports</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Sidebars">
                    @can('view-restaurant-report')
<!--
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link {{ (request()->is('reports/bar*')) ? 'active' : ''  }}">Restaurant Report</a>
                        <ul class="nav nav-group-sub">

                            <li class="nav-item"><a class="nav-link {{ (request()->is('reports/bar/crate_report*')) ? 'active' : ''  }}" href="{{url('reports/bar/crate_report')}}"><i></i></i> Report By Date</a></li>
                            <li class="nav-item"><a class="nav-link {{ (request()->is('reports/bar/bottle_report*')) ? 'active' : ''  }}" href="{{url('reports/bar/bottle_report')}}"><i></i></i> Drink Sales Report</a></li>
                            <li class="nav-item"><a class="nav-link {{ (request()->is('reports/bar/stock_movement_report*')) ? 'active' : ''  }}" href="{{url('reports/bar/stock_movement_report')}}"><i></i></i> Stock Movement Report</a></li>


                            {{--
          <li class="nav-item"><a class="nav-link {{ (request()->is('reports/bar/kitchen_report*')) ? 'active' : ''  }}" href="{{url('reports/bar/kitchen_report')}}"><i></i></i> Kitchen Report</a>
                    </li>
                    --}}
                </ul>

            </li>
-->
            @endcan


            @can('view-section-report')
<!--
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link {{ (request()->is('reports/sales*')) ? 'active' : ''  }}">Section Report</a>
                <ul class="nav nav-group-sub">



                    <li class="nav-item"><a class="nav-link {{ (request()->is('reports/section/sales_report*')) ? 'active' : ''  }}" href="{{url('reports/section/sales_report')}}"><i></i></i>Section Sales Report</a></li>
                </ul>
            </li>
-->            

            <a class="nav-link {{ (request()->is('reports/section/realtime_stock_report*')) ? 'active' : ''  }}" href="{{url('reports/section/realtime_stock_report')}}"><i></i></i>Realtime Product Report</a>

            <a class="nav-link {{ (request()->is('reports/section/products_report*')) ? 'active' : ''  }}" href="{{url('reports/section/products_report')}}"><i></i></i>Products Report</a>

            <a class="nav-link {{ (request()->is('reports/section/sections_report*')) ? 'active' : ''  }}" href="{{url('reports/section/sections_report')}}"><i></i></i>Section Report</a>
            
            <a class="nav-link {{ (request()->is('reports/section/sale_report*')) ? 'active' : ''  }}" href="{{url('reports/section/sale_report')}}"><i></i></i>Sales Report</a>

            @endcan





            {{--
          @can('view-pos-report')
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link {{ (request()->is('reports/pos*')) ? 'active' : ''  }}">POS Report</a>
            <ul class="nav nav-group-sub">

                <li class="nav-item"><a class="nav-link {{ (request()->is('reports/pos/inventory_report*')) ? 'active' : ''  }}" href="{{url('reports/pos/inventory_report')}}"><i></i></i> Inventory Report</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('reports/pos/good_issue_report*')) ? 'active' : ''  }}" href="{{url('reports/pos/good_issue_report')}}"><i></i></i> Good Issue Report</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('reports/pos/section_report*')) ? 'active' : ''  }}" href="{{url('reports/pos/section_report')}}"><i></i></i> Section Report</a></li>
            </ul>
            </li>
            @endcan
            --}}



            </ul>
            </li>
            @endcan
                
                
                
                 @can('view-authorization')
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link {{ (request()->is('authentications/*')) ? 'active' : ''  }}" data-toggle="collapse">

                    <i class="icon-hammer-wrench"></i>

                    <span>Roles & Permission</span>

                </a>

                <ul class="nav nav-group-sub">
<!--
                    <li class="nav-item">
                        <a class="nav-link "
                            href="{{ url('change_password') }}">Change Password</a>
                    </li>
-->
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

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('azamPay*')) ? 'active' : ''  }}"
                            href="{{ route('azampay.index')}}">Subscription</a>
                    </li>

                </ul>
            </li>
            @endcan

                
                
                
                
                 @can('view-settings')
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('setting/*')) ? 'active' : ''  }}" href="{{ url('setting') }}">

                    <i class="icon-cog"></i>
                    <span> {{__('Settings')}}</span>

                </a>
            </li>

            @endcan
                
                
                
                
                



               




                {{--
  @can('view-inventory')
        <li class="nav-item nav-item-submenu">
            <a href="#inventory" class="nav-link {{ (request()->is('inventory/*')) ? 'active' : ''  }}" data-toggle="collapse"
                class="dropdown-toggle">

                <i class="icon-hammer2"></i><span>Inventory</span>


                </a>
                <ul class="nav nav-group-sub" id="inventory"
                    data-parent="#accordionExample">


                    @can('view-inventory')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('inventory*')) ? 'active' : ''  }}"
                            href="{{url('inventory')}}">Inventory Items</a></li>
                    @endcan
                    @can('view-fieldstaff')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('fieldstaff*')) ? 'active' : ''  }}"
                            href="{{url('fieldstaff')}}">Field Staff</a></li>
                    @endcan

                    @can('view-purchase_inventory')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('purchase_inventory*')) ? 'active' : ''  }}"
                            href="{{url('purchase_inventory')}}">Purchase
                            Inventory</a></li>
                    @endcan
                    @can('view-inventory_list')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('inventory_list*')) ? 'active' : ''  }}"
                            href="{{url('inventory_list')}}">Inventory List</a>
                    </li>
                    @endcan
                    @can('view-inventory_list')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('service_type*')) ? 'active' : ''  }}"
                            href="{{url('service_type')}}">Service Type</a></li>
                    @endcan
                    @can('view-maintainance')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('maintainance*')) ? 'active' : ''  }}"
                            href="{{url('maintainance')}}">Maintainance</a></li>
                    @endcan
                    @can('view-service')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('service*')) ? 'active' : ''  }}"
                            href="{{url('service')}}">Service</a></li>
                    @endcan
                    @can('view-service')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('good_issue*')) ? 'active' : ''  }}"
                            href="{{url('good_issue')}}">Good Issue</a></li>
                    @endcan
                    @can('view-good_return')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('good_return*')) ? 'active' : ''  }}"
                            href="{{url('good_return')}}">Good Return</a></li>
                    @endcan
                    @can('view-good_return')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('good_movement*')) ? 'active' : ''  }}"
                            href="{{url('good_movement')}}">Good Movement</a></li>
                    @endcan
                    @can('view-good_reallocation')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('good_reallocation*')) ? 'active' : ''  }}"
                            href="{{url('good_reallocation')}}">Good
                            Reallocation</a></li>
                    @endcan
                    @can('view-good_disposal')
                    <li class="nav-item"><a
                            class="nav-link {{ (request()->is('good_disposal*')) ? 'active' : ''  }}"
                            href="{{url('good_disposal')}}">Good Disposal</a></li>
                    @endcan

                </ul>
                </li>
                @endcan
                --}}

              


              



                {{--
  @can('view-member-transaction')
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

                    <li class="nav-item  card_deposit')) ? 'active' : ''  }}">
                        <a class="nav-link {{ (request()->is('card_deposit')) ? 'active' : ''  }}" href="{{ url('card_deposit') }}"
                            aria-expanded="false" class="dropdown-toggle">

                            <span> {{__('Deposit')}}</span>

                        </a>
                    </li>



                </ul>
                </li>
                @endcan



                @can('manage_card')
                <li class="nav-item nav-item-submenu">
                    <a href="#cards" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}" data-toggle="collapse"
                        class="dropdown-toggle">

                        <i class="icon-credit-card"></i><span>Manage Card </span>


                    </a>
                    <ul class="nav nav-group-sub" id="cards"
                        data-parent="#accordionExample">

                        @can('view-card')
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('cards')) ? 'active' : ''  }}" href="{{ url('manage_cards') }}"
                                aria-expanded="false" class="dropdown-toggle">

                                <span> {{__('Manage cards')}}</span>

                            </a>
                        </li>
                        @endcan

                        @can('view-card-printing')
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('card_printing')) ? 'active' : ''  }}" href="{{ url('card_printing') }}"
                                aria-expanded="false" class="dropdown-toggle">

                                <span> {{__('Cards Printing')}}</span>

                            </a>
                        </li>
                        @endcan

                        @can('view-card-printing')
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('gymkhana_test')) ? 'active' : ''  }}" href="{{ route('gymkhana_test') }}"
                                aria-expanded="false" class="dropdown-toggle">

                                <span> MEMEBERSHIP FEES RECEIPT</span>

                            </a>
                        </li>
                        @endcan

                        @can('view-card-printing')
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('gymkhana_test2')) ? 'active' : ''  }}" href="{{ route('gymkhana_test2') }}"
                                aria-expanded="false" class="dropdown-toggle">

                                <span> EXPENDITURE FEES RECEIPT</span>

                            </a>
                        </li>
                        @endcan

                        @can('view-card-deposit')
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('card_deposit')) ? 'active' : ''  }}" href="{{ url('card_deposit') }}"
                                aria-expanded="false" class="dropdown-toggle">

                                <span> {{__('Deposit')}}</span>

                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>

                @endcan
                --}}

           



          


           

            @can('manage-bar')
            

                    
           

                   



            @can('view-bar-sales')
            <!--
								<li class="nav-item nav-item-submenu">
									 <a href="#" class="nav-link {{ (request()->is('bar/sales/*')) ? 'active' : ''  }}">Sales</a>
									<ul class="nav nav-group-sub">
	 <li class="nav-item"><a class="nav-link {{ (request()->is('bar/sales/bar_pos_client*')) ? 'active' : ''  }}"
                href="{{url('bar/sales/bar_pos_client')}}"><i></i></i>Clients List</a></li>
                          @can('view-pos')
            <li class="nav-item"><a class="nav-link {{ (request()->is('bar/sales/bar_invoice*')) ? 'active' : ''  }}"
                href="{{url('bar/sales/bar_invoice')}}"><i></i></i>Invoices</a></li>
                       @endcan
              <li class="nav-item"><a class="nav-link {{ (request()->is('bar/sales/debtors_report*')) ? 'active' : ''  }}"
                href="{{url('bar/sales/debtors_report')}}"><i></i></i>Debtors Report</a></li>
              

</ul>
								</li>
-->
            @endcan


            </ul>

            </li>
            @endcan

            {{--

 @can('view-purchase')
       <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link {{ (request()->is('pos/purchases/*')) ? 'active' : ''  }}"><i
                class="icon-basket"></i> <span>Purchases
            </span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                @can('view-items')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/items*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/items')}}"><i></i></i>Manage Items</a></li>
                @endcan


                @can('view-suppliers')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/supplier*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/supplier')}}"><i></i></i>Manage Suppliers</a></li>
                @endcan



                @can('view-purchase-requisition')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/purchase_requisition*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/purchase_requisition')}}"><i></i></i>Manage Purchases Requisition</a></li>
                @endcan


                @can('view-purchase-order')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/purchase_quotation*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/purchase_quotation')}}"><i></i></i>Manage Purchases Quotation</a></li>
                @endcan

                @can('view-purchases_pos')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/purchase*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/purchase')}}"><i></i></i>Manage Purchases Order</a></li>
                @endcan

                @can('view-creditors_report')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/creditors_report*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/creditors_report')}}"><i></i></i>Creditors Report</a></li>
                @endcan

                @can('view-debit_note')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/debit_note*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/debit_note')}}"><i></i></i>Debit Note</a></li>
                @endcan

                @can('view-issue')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/purchases/pos_issue*')) ? 'active' : ''  }}"
                        href="{{url('pos/purchases/pos_issue')}}"><i></i></i>Good Issue</a></li>
                @endcan
                @can('view-pos_activity')
                <li class="nav-item"><a class="nav-link {{ (request()->is('pos/activity*')) ? 'active' : ''  }}"
                        href="{{url('pos/activity')}}"><i></i></i> Track POS Activity</a></li>
                @endcan



            </ul>
            </li>

            @endcan
            --}}





          

           

        


           


           

            

           
            @endcan


            @can('view-visitor-menu')
            <li class="nav-item nav-item-submenu">
                <a href="#cards" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}">
                    <i class="lab la-wpforms"></i><span>Manage</span>

                </a>
                <ul class="nav nav-group-sub" id="cards">

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
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('azamPay*')) ? 'active' : ''  }}"
                    href="{{ route('azampay.index')}}"><i class="icon-cash"></i>Deposit</a>
            </li>

            @endcan

            @can('view-member-menu')
            <li class="nav-item nav-item-submenu">
                <a href="#cards" class="nav-link {{ (request()->is('transaction/*')) ? 'active' : ''  }}">

                    <i class="icon-user-plus"></i><span>Manage</span>

                </a>
                <ul class="nav nav-group-sub" data-submenu-title="cards">

                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('manage_member/*')) ? 'active' : ''  }}" title="View Details" href="{{ route("manage_member.show", auth()->user()->member_id)}}">
                            <span>View Information</span>
                        </a>
                    </li>


                    {{--
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('member_card_deposit')) ? 'active' : ''  }}" href="{{ route("member.deposit", auth()->user()->member_id)}}">

                    <span> {{__('Deposit')}} </span>

                    </a>
            </li>
            --}}
            <li class="nav-item ">
                <a class="nav-link {{ (request()->is('members/order_summary')) ? 'active' : ''  }}" title="View " href="{{ route('member_order')}}">
                    <span>Order Summary</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ (request()->is('transaction_list/*')) ? 'active' : ''  }}" href="{{ route("transaction_list", auth()->user()->member_id)}}"
                    aria-expanded="false" class="dropdown-toggle">

                    <span> {{__('Transaction List')}}</span>

                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ (request()->is('transaction_report')) ? 'active' : ''  }}" href="{{ route('transaction_report') }}"
                    aria-expanded="false" class="dropdown-toggle">

                    <span> {{__(' Transaction Report')}}</span>

                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link "
                    href="{{ url('change_password') }}">Change Password</a>
            </li>

            </ul>
            </li>
            @endcan



            </ul>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>