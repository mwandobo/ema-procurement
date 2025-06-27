@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/sitemap.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Other Pages')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Sitemap')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-content widget-content-area">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="sitemap">
                                            <li><a href="javascript: void(0);" class="text-uppercase font-weight-bold text-primary"><i class="mdi mdi-adjust mr-1"></i>{{__('Neptune Dashboard and Apps')}}</a>
                                                <ul>
                                                    <li><a href="javascript: void(0);">{{__('Dashboards')}}</a>
                                                        <ul>
                                                            <li><a href="index.html">{{__('Dashboard 1')}}</a></li>
                                                            <li><a href="index-2.html">{{__('Dashboard 2')}}</a></li>
                                                            <li><a href="index-3.html">{{__('Dashboard 3')}}</a></li>
                                                            <li><a href="index-4.html">{{__('Dashboard 4')}}</a></li>
                                                            <li><a href="index-5.html">{{__('Dashboard 5')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript: void(0);">{{__('Apps')}}</a>
                                                        <ul>
                                                            <li><a href="apps_calendar.html">{{__('Calender')}}</a></li>
                                                            <li><a href="apps_chat.html">{{__('Chat')}}</a></li>
                                                            <li><a href="javascript: void(0);">{{__('Companies')}}</a>
                                                                <ul>
                                                                    <li><a href="apps_companies.html">{{__('List')}}</a></li>
                                                                    <li><a href="apps_company_details.html">{{__('Company Details')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="apps_contacts.html">{{__('Contacts')}}</a>
                                                            <li><a href="javascript: void(0);">{{__('ECommerce')}}</a>
                                                                <ul>
                                                                    <li><a href="apps_ecommerce.html">{{__('Dashboard')}}</a></li>
                                                                    <li><a href="apps_ecommerce_products.html">{{__('Products')}}</a></li>
                                                                    <li><a href="apps_ecommerce_product_details.html">{{__('Contacts')}}x</a></li>
                                                                    <li><a href="apps_ecommerce_add_product.html">{{__('Add Product')}}</a></li>
                                                                    <li><a href="apps_ecommerce_orders.html">{{__('Orders')}}</a></li>
                                                                    <li><a href="apps_ecommerce_order_details.html">{{__('Order Details')}}</a></li>
                                                                    <li><a href="apps_ecommerce_customers.html">{{__('Customers')}}</a></li>
                                                                    <li><a href="apps_ecommerce_sellers.html">{{__('Sellers')}}</a></li>
                                                                    <li><a href="apps_ecommerce_cart.html">{{__('Cart')}}</a></li>
                                                                    <li><a href="apps_ecommerce_checkout.html">{{__('Checkout')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="javascript: void(0);">{{__('Email')}}</a>
                                                                <ul>
                                                                    <li><a href="apps_mail.html">{{__('Inbox')}}</a></li>
                                                                    <li><a href="apps_mail_details.html">{{__('Email Details')}}</a></li>
                                                                    <li><a href="apps_mail_create.html">{{__('Compose Email')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="apps_file_manager.html">{{__('Compose Email')}}x</a></li>
                                                            <li><a href="apps_invoice.html">{{__('Invoice List')}}</a></li>
                                                            <li><a href="javascript: void(0);">{{__('Notes')}}</a>
                                                                <ul>
                                                                    <li><a href="apps_notes.html">{{__('List')}}</a></li>
                                                                    <li><a href="apps_notes_details.html">{{__('Details')}}</a></li>
                                                                    <li><a href="apps_notes_create.html">{{__('Create Note')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="apps_social.html">{{__('Social')}}</a></li>
                                                            <li><a href="apps_taskList.html">{{__('Task List')}}</a></li>
                                                            <li><a href="javascript: void(0);">{{__('Tickets')}}</a>
                                                                <ul>
                                                                    <li><a href="apps_tickets.html">{{__('Ticket List')}}</a></li>
                                                                    <li><a href="apps_ticket_details.html">{{__('Ticket Details')}}</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="sitemap">
                                            <li><a href="javascript: void(0);" class="text-uppercase font-weight-bold text-success-teal"><i class="mdi mdi-adjust mr-1"></i> {{__('Pages and UI')}}</a>
                                                <ul>
                                                    <li><a href="javascript: void(0);"> {{__('Auth Pages')}}</a>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript: void(0);"> {{__('Style 1')}}</a>
                                                                <ul>
                                                                    <li><a href="auth_login_1.html"> {{__('Login')}}</a></li>
                                                                    <li><a href="auth_signup_1.html"> {{__('Register')}}</a></li>
                                                                    <li><a href="auth_lock_screen_1.html"> {{__('Lock Screen')}}</a></li>
                                                                    <li><a href="auth_forget_password_1.html"> {{__('Forget Password')}}</a></li>
                                                                    <li><a href="auth_confirm_email_1.html"> {{__('Confirm Email')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: void(0);">{{__('Style 2')}}</a>
                                                                <ul>
                                                                    <li><a href="auth_login_2.html">{{__('Login')}}</a></li>
                                                                    <li><a href="auth_signup_2.html">{{__('Register')}}</a></li>
                                                                    <li><a href="auth_lock_screen_2.html">{{__('Lock Screen')}}</a></li>
                                                                    <li><a href="auth_forget_password_2.html">{{__('Forget Password')}}</a></li>
                                                                    <li><a href="auth_confirm_email_2.html">{{__('Confirm Email')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: void(0);">{{__('Style 3')}}</a>
                                                                <ul>
                                                                    <li><a href="auth_login_3.html">{{__('Login')}}</a></li>
                                                                    <li><a href="auth_signup_3.html">{{__('Register')}}</a></li>
                                                                    <li><a href="auth_lock_screen_3.html">{{__('Lock Screen')}}</a></li>
                                                                    <li><a href="auth_forget_password_3.html">{{__('Confirm Password')}}x</a></li>
                                                                    <li><a href="auth_confirm_email_3.html">{{__('Confirm Email')}}</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript: void(0);">{{__('Confirm Email')}}x</a>
                                                        <ul>
                                                            <li><a href="pages_coming_soon.html">{{__('Coming Soon')}}</a></li>
                                                            <li><a href="pages_coming_soon_2.html">{{__('Coming Soon 2')}}</a></li>
                                                            <li><a href="pages_contact_us.html">{{__('Contact Form')}}</a></li>
                                                            <li><a href="pages_contact_us_2.html">{{__('Contact Form')}}x</a></li>
                                                            <li><a href="javascript: void(0);">{{__('Error')}}</a>
                                                                <ul>
                                                                    <li><a href="pages_error404.html">{{__('404')}}</a></li>
                                                                    <li><a href="pages_error500.html">{{__('500')}}</a></li>
                                                                    <li><a href="pages_error503.html">{{__('503')}}</a></li>
                                                                    <li><a href="pages_maintenance.html">{{__('Maintenance')}}</a></li>
                                                                    <li><a href="pages_error404_2.html">{{__('404 Two')}}</a></li>
                                                                    <li><a href="pages_error500_2.html">{{__('500 Two')}}</a></li>
                                                                    <li><a href="pages_error503_2.html">{{__('503 Two')}}</a></li>
                                                                    <li><a href="pages_maintenance_2.html">{{__('Maintenance Two')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="pages_faq.html">{{__('FAQ')}}</a></li>
                                                            <li><a href="pages_faq_2.html">{{__('FAQ 2')}}</a></li>
                                                            <li><a href="pages_faq_3.html">{{__('FAQ 3')}}</a></li>
                                                            <li><a href="pages_helpdesk.html">{{__('Helpdesk')}}</a></li>
                                                            <li><a href="pages_notifications.html">{{__('Notifications')}}</a></li>
                                                            <li><a href="pages_pricing.html">{{__('Pricing')}}</a></li>
                                                            <li><a href="pages_pricing_2.html">{{__('Pricing')}} 2</a></li>
                                                            <li><a href="pages_privacy.html">{{__('Privacy Policy')}}</a></li>
                                                            <li><a href="pages_profile.html">{{__('Profile')}}</a></li>
                                                            <li><a href="pages_profile_edit.html">{{__('Profile Edit')}}</a></li>
                                                            <li><a href="pages_search_result.html">{{__('Search Result')}}</a></li>
                                                            <li><a href="pages_search_result_2.html">{{__('Search Result 2')}}</a></li>
                                                            <li><a href="pages_sitemap.html">{{__('Sitemap')}}</a></li>
                                                            <li><a href="pages_timeline.html">{{__('Timeline')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript: void(0);">{{__('Timeline')}}x</a>
                                                        <ul>
                                                            <li><a href="basic_ui_accordion.html">{{__('Accordions')}}</a></li>
                                                            <li><a href="basic_ui_animation.html">{{__('Animation')}}</a></li>
                                                            <li><a href="basic_ui_cards.html">{{__('Bootstrap Cards')}}</a></li>
                                                            <li><a href="basic_ui_carousel.html">{{__('Carousel')}}</a></li>
                                                            <li><a href="basic_ui_counter">{{__('Counter')}}</a></li>
                                                            <li><a href="basic_ui_dragitems.html">{{__('Drag Items')}}</a></li>
                                                            <li><a href="basic_ui_lightbox.html">{{__('Lightbox')}}</a></li>
                                                            <li><a href="basic_ui_lightbox_side_open.html">{{__('Lightbox Side Open')}}</a></li>
                                                            <li><a href="basic_ui_list_groups.html">{{__('List Group')}}</a></li>
                                                            <li><a href="basic_ui_media_object.html">{{__('Media Object')}}</a></li>
                                                            <li><a href="basic_ui_modals.html">{{__('Modals')}}</a></li>
                                                            <li><a href="basic_ui_notifications.html">{{__('Notifications')}}</a></li>
                                                            <li><a href="basic_ui_scrollspy.html">{{__('Scroll Spy')}}</a></li>
                                                            <li><a href="basic_ui_session_timeout.html">{{__('Session Timeout')}}</a></li>
                                                            <li><a href="basic_ui_sweet_alerts.html">{{__('Session Timeout')}}x</a></li>
                                                            <li><a href="basic_ui_tabs.html">{{__('Tabs')}}</a></li>
                                                            <li><a href="basic_ui_tour_tutorial.html">{{__('Tour Tutorial')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript: void(0);">{{__('UI Elements')}}</a>
                                                        <ul>
                                                            <li><a href="ui_elements_alerts.html"> {{__('Alerts')}}</a></li>
                                                            <li><a href="ui_elements_avatar.html"> {{__('Avatar')}}</a></li>
                                                            <li><a href="ui_elements_badges.html"> {{__('Badges')}}</a></li>
                                                            <li><a href="ui_elements_breadcrumbs.html"> {{__('Breadcrumbs')}}</a></li>
                                                            <li><a href="ui_elements_buttons.html"> {{__('Buttons')}}</a></li>
                                                            <li><a href="ui_elements_colors.html"> {{__('Colors')}}</a></li>
                                                            <li><a href="ui_elements_dropdowns.html"> {{__('Dropdown')}}</a></li>
                                                            <li><a href="ui_elements_grid.html"> {{__('Grid')}}</a></li>
                                                            <li><a href="ui_elements_jumbotron.html"> {{__('Jumbotron')}}</a></li>
                                                            <li><a href="ui_elements_list_group.html"> {{__('List Group')}}</a></li>
                                                            <li><a href="ui_elements_loading_spinners.html"> {{__('Loading Spinners')}}</a></li>
                                                            <li><a href="ui_elements_pagination.html"> {{__('Paging')}}</a></li>
                                                            <li><a href="ui_elements_popovers.html"> {{__('Popovers')}}</a></li>
                                                            <li><a href="ui_elements_progress_bar.html"> {{__('Progress Bar')}}</a></li>
                                                            <li><a href="ui_elements_ribbons.html"> {{__('Ribbons')}}</a></li>
                                                            <li><a href="ui_elements_tooltips.html"> {{__('Tooltips')}}</a></li>
                                                            <li><a href="ui_elements_typography.html"> {{__('Typography')}}</a></li>
                                                            <li><a href="ui_elements_video.html"> {{__('Video')}}</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="sitemap">
                                            <li><a href="javascript: void(0);" class="text-uppercase font-weight-bold text-danger"><i class="mdi mdi-adjust mr-1"></i>{{__('Other')}}</a>
                                                <ul>
                                                    <li><a href="widgets.html" class="">{{__('Widgets')}}</a></li>
                                                    <li><a href="tables.html" class="">{{__('Tables')}}</a></li>
                                                    <li><a href="datatables.html" class="">{{__('Datatables')}}</a></li>
                                                    <li><a href="javascript: void(0);" class="">{{__('Forms')}}</a>
                                                        <ul>
                                                            <li><a href="javascript: void(0);" class="">{{__('Controls')}}</a></li>
                                                            <ul>
                                                                <li><a href="forms_controls_base_input.html" class="">{{__('Base Input')}}</a></li>
                                                                <li><a href="forms_controls_input_groups.html" class="">{{__('Input Groups')}}</a></li>
                                                                <li><a href="forms_controls_checkbox.html" class="">{{__('Checkbox')}}</a></li>
                                                                <li><a href="forms_controls_radio.html" class="">{{__('Radio')}}</a></li>
                                                                <li><a href="forms_controls_switch.html" class="">{{__('Switch')}}</a></li>
                                                            </ul>
                                                            <li><a href="javascript: void(0);" class="">{{__('Widgets')}}</a></li>
                                                            <ul>
                                                                <li><a href="forms_widgets_picker.html" class="">{{__('Picker')}}</a></li>
                                                                <li><a href="forms_widgets_tagify.html" class="">{{__('Tagify')}}</a></li>
                                                                <li><a href="forms_widgets_touch_spin.html" class="">{{__('Touch Spin')}}</a></li>
                                                                <li><a href="forms_widgets_maxlength.html" class="">{{__('Max Length')}}</a></li>
                                                                <li><a href="forms_widgets_switch.html" class="">{{__('Switch')}}</a></li>
                                                                <li><a href="forms_widgets_select_splitter.html" class="">{{__('Select Splitter')}}</a></li>
                                                                <li><a href="forms_widgets_bootstrap_select.html" class="">{{__('Bootstrap Select')}}</a></li>
                                                                <li><a href="forms_widgets_select_2.html" class="">{{__('Select 2')}}</a></li>
                                                                <li><a href="forms_widgets_input_masks.html" class="">{{__('Input Masks')}}</a></li>
                                                                <li><a href="forms_widgets_autogrow.html" class="">{{__('Autogrow')}}</a></li>
                                                                <li><a href="forms_widgets_range_slider.html" class="">{{__('Range Slider')}}</a></li>
                                                                <li><a href="forms_widgets_clipboard.html" class="">{{__('Clipboard')}}</a></li>
                                                                <li><a href="forms_widgets_typeahead.html" class="">{{__('Typeahead')}}</a></li>
                                                                <li><a href="forms_widgets_captcha.html" class="">{{__('Captcha')}}</a></li>
                                                            </ul>
                                                            <li><a href="forms_validation.html" class="">{{__('Validations')}}</a></li>
                                                            <li><a href="forms_layouts.html" class="">{{__('Layouts')}}</a></li>
                                                            <li><a href="forms_text_editor.html" class="">{{__('Text Editor')}}</a></li>
                                                            <li><a href="forms_file_upload.html" class="">{{__('File Upload')}}</a></li>
                                                            <li><a href="forms_multiple_step.html" class="">{{__('Multiple Step')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript: void(0);" class="">{{__('Maps')}}</a>
                                                        <ul>
                                                            <li><a href="maps_leaflet_map.html" class="">{{__('Leaflet Map')}}</a></li>
                                                            <li><a href="maps_vector_map.html" class="">{{__('Vector Map')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript: void(0);" class="">{{__('Charts')}}</a>
                                                        <ul>
                                                            <li><a href="charts_apex_chart.html" class="">{{__('Apex Chart')}}</a></li>
                                                            <li><a href="charts_chartlist.html" class="">{{__('Chartlist Charts')}}</a></li>
                                                            <li><a href="charts_chartjs.html" class="">{{__('ChartJS')}}</a></li>
                                                            <li><a href="charts_morris_chart.html" class="">{{__('Morris Charts')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);" class="">{{__('Starter Kit')}}</a>
                                                        <ul>
                                                            <li><a href="starter_kit_blank_page.html" class="">{{__('Blank Page')}}</a></li>
                                                            <li><a href="starter_kit_breadcrumbs.html" class="">{{__('Breadcrumbs')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);" class="">{{__('Multi Level')}}</a>
                                                        <ul>
                                                            <li><a href="javascript: void(0);" class="">{{__('Multi Level')}}x</a>
                                                                <ul>
                                                                    <li><a href="javascript: void(0);" class="">{{__('Link 1')}}</a></li>
                                                                    <li><a href="javascript: void(0);" class="">{{__('Link 2')}}</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="javascript: void(0);" class="">{{__('Level 3')}}</a>
                                                                <ul>
                                                                    <li><a href="javascript: void(0);" class="">{{__('Link 1')}}</a></li>
                                                                    <li><a href="javascript: void(0);" class="">{{__('Link 1')}}x</a>
                                                                        <ul>
                                                                            <li><a href="javascript: void(0);" class="">{{__('Link 1')}}</a></li>
                                                                            <li><a href="javascript: void(0);" class="">{{__('Link 2')}}</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="http://neptuneweb.xyz" class="">{{__('Documentation')}}</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
