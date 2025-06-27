@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('assets/css/apps/ecommerce.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Apps')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="apps_ecommerce.html">{{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Checkout')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Ends -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="">
                    <div class="widget-content searchable-container grid">
                        <div class="row mb-4 mt-3">
                            <div class="col-md-3 checkout-tab-heading-container">
                                <div class="card-box">
                                    <div class="nav flex-column nav-pills mb-sm-0 mb-3   text-center mx-auto" id="v-border-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-border-pills-order-tab" data-toggle="pill" href="#v-border-pills-order" role="tab" aria-controls="v-border-pills-order" aria-selected="true">
                                            <i class="las la-clipboard-list"></i> {{__('Order Summary')}}
                                        </a>
                                        <a class="nav-link  text-center" id="v-border-pills-billing-tab" data-toggle="pill" href="#v-border-pills-billing" role="tab" aria-controls="v-border-pills-billing" aria-selected="false">
                                            <i class="lar la-user-circle"></i> {{__('Billing Info')}}
                                        </a>
                                        <a class="nav-link  text-center" id="v-border-pills-shipping-tab" data-toggle="pill" href="#v-border-pills-shipping" role="tab" aria-controls="v-border-pills-shipping" aria-selected="false">
                                            <i class="las la-truck"></i> {{__('Shipping Info')}}
                                        </a>
                                        <a class="nav-link  text-center" id="v-border-pills-payment-tab" data-toggle="pill" href="#v-border-pills-payment" role="tab" aria-controls="v-border-pills-payment" aria-selected="false">
                                            <i class="las la-money-bill-wave-alt"></i> {{__('Payment Info')}}
                                        </a>
                                    </div>
                                </div>
                                <a href="{{url('/apps/ecommerce/cart')}}" class="d-block w-100 btn btn-dark mb-3"><i class="las la-arrow-left"></i> {{__('Back to Cart')}}</a>
                                <a class="d-block w-100 btn btn-outline-primary mb-3">{{__('Proceed')}} <i class="las la-arrow-right"></i></a>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content" id="v-border-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-border-pills-order" role="tabpanel" aria-labelledby="v-border-pills-order-tab">
                                        <div class="card-box order-detail-table">
                                            <h5 class="header-title mb-3">{{__('Items from Order #SK898789')}}</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-centered mb-0">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>{{__('Product name')}}</th>
                                                        <th>{{__('Quantity')}}</th>
                                                        <th>{{__('Price')}}</th>
                                                        <th>{{__('Total')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">{{__('White Full Sleeve Shirt')}}</th>
                                                        <td>{{__('1')}}1</td>
                                                        <td>{{__('$50')}}</td>
                                                        <td>{{__('$50')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{__('Red Full Sleeve Shirt')}}</th>
                                                        <td>{{__('2')}}</td>
                                                        <td>{{__('$100')}}</td>
                                                        <td>{{__('$100')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{__('Purple Full Sleeve Shirt')}}</th>
                                                        <td>{{__('1')}}</td>
                                                        <td>{{__('$60')}}</td>
                                                        <td>{{__('$60')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="3" class="text-right">{{__('Sub Total :')}}</th>
                                                        <td><div class="font-weight-bold">{{__('$310')}}</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="3" class="text-right">{{__('Shipping Charge :')}}</th>
                                                        <td>{{__('$50')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="3" class="text-right">{{__('Estimated Tax :')}}</th>
                                                        <td>{{__('$40')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="3" class="text-right">{{__('Grand Total :')}}</th>
                                                        <td><div class="strong text-success-teal">{{__('$400')}}</div></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-border-pills-billing" role="tabpanel" aria-labelledby="v-border-pills-billing-tab">
                                        <div class="media">
                                            <div class="card-box w-100 billing-tab">
                                                <div>
                                                    <h6>{{__('Shipping information')}}</h6>
                                                    <p class="mb-4">{{__('Fill all information below')}}</p>
                                                    <form class="">
                                                        <div class="mb-4 row form-group">
                                                            <label for="billing-name" class="col-form-label col-md-2 col-form-label">{{__('Name')}}</label>
                                                            <div class="col-md-10"><input id="billing-name" placeholder="{{__('Enter your name')}}" type="text" class="form-control form-control" /></div>
                                                        </div>
                                                        <div class="mb-4 row form-group">
                                                            <label for="billing-email-address" class="col-form-label col-md-2 col-form-label">{{__('Email Id')}}</label>
                                                            <div class="col-md-10"><input id="billing-email-address" placeholder="{{__('Enter your email')}}" type="email" class="form-control form-control" /></div>
                                                        </div>
                                                        <div class="mb-4 row form-group">
                                                            <label for="billing-phone" class="col-form-label col-md-2 col-form-label">{{__('Phone')}}</label>
                                                            <div class="col-md-10"><input type="text" class="form-control" id="billing-phone" placeholder="{{__('Enter your Phone no.')}}" /></div>
                                                        </div>
                                                        <div class="mb-4 row form-group">
                                                            <label for="billing-address" class="col-form-label col-md-2 col-form-label">{{__('Address')}}</label>
                                                            <div class="col-md-10"><textarea class="form-control" id="billing-address" rows="3" placeholder="{{__('Enter full address')}}"></textarea></div>
                                                        </div>
                                                        <div class="mb-4 row form-group">
                                                            <label class="col-form-label col-md-2 col-form-label">{{__('Country')}}</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control select2" title="Country">
                                                                    <option value="0">{{__('Select Country')}}</option>
                                                                    <option value="AF">{{__('Afghanistan')}}</option>
                                                                    <option value="AL">{{__('Albania')}}</option>
                                                                    <option value="DZ">{{__('Algeria')}}</option>
                                                                    <option value="AS">{{__('American Samoa')}}</option>
                                                                    <option value="AD">{{__('Andorra')}}</option>
                                                                    <option value="AO">{{__('Angola')}}</option>
                                                                    <option value="AI">{{__('Anguilla')}}</option>
                                                                    <option value="AQ">{{__('Antarctica')}}</option>
                                                                    <option value="AR">{{__('Argentina')}}</option>
                                                                    <option value="AM">{{__('Armenia')}}</option>
                                                                    <option value="AW">{{__('Aruba')}}</option>
                                                                    <option value="AU">{{__('Australia')}}</option>
                                                                    <option value="AT">{{__('Austria')}}</option>
                                                                    <option value="AZ">{{__('Azerbaijan')}}</option>
                                                                    <option value="BS">{{__('Bahamas')}}</option>
                                                                    <option value="BH">{{__('Bahrain')}}</option>
                                                                    <option value="BD">{{__('Bangladesh')}}</option>
                                                                    <option value="BB">{{__('Barbados')}}</option>
                                                                    <option value="BY">{{__('Belarus')}}</option>
                                                                    <option value="BE">{{__('Belgium')}}</option>
                                                                    <option value="BZ">{{__('Belize')}}</option>
                                                                    <option value="BJ">{{__('Benin')}}</option>
                                                                    <option value="BM">{{__('Bermuda')}}</option>
                                                                    <option value="BT">{{__('Bhutan')}}</option>
                                                                    <option value="BO">{{__('Bolivia')}}</option>
                                                                    <option value="BW">{{__('Botswana')}}</option>
                                                                    <option value="BV">{{__('Bouvet Island')}}</option>
                                                                    <option value="BR">{{__('Brazil')}}</option>
                                                                    <option value="BN">{{__('Brunei Darussalam')}}</option>
                                                                    <option value="BG">{{__('Bulgaria')}}</option>
                                                                    <option value="BF">{{__('Burkina Faso')}}</option>
                                                                    <option value="BI">{{__('Burundi')}}</option>
                                                                    <option value="KH">{{__('Cambodia')}}</option>
                                                                    <option value="CM">{{__('Cameroon')}}</option>
                                                                    <option value="CA">{{__('Canada')}}</option>
                                                                    <option value="CV">{{__('Cape Verde')}}</option>
                                                                    <option value="KY">{{__('Cayman Islands')}}</option>
                                                                    <option value="CF">{{__('Central African Republic')}}</option>
                                                                    <option value="TD">{{__('Chad')}}</option>
                                                                    <option value="CL">{{__('Chile')}}</option>
                                                                    <option value="CN">{{__('China')}}</option>
                                                                    <option value="CX">{{__('Christmas Island')}}</option>
                                                                    <option value="CC">{{__('Cocos (Keeling) Islands')}}</option>
                                                                    <option value="CO">{{__('Colombia')}}</option>
                                                                    <option value="KM">{{__('Comoros')}}</option>
                                                                    <option value="CG">{{__('Congo')}}</option>
                                                                    <option value="CK">{{__('Cook Islands')}}</option>
                                                                    <option value="CR">{{__('Costa Rica')}}</option>
                                                                    <option value="CI">{{__('Cote d\'Ivoire')}}</option>
                                                                    <option value="HR">{{__('Croatia (Hrvatska)')}}</option>
                                                                    <option value="CU">{{__('Cuba')}}</option>
                                                                    <option value="CY">{{__('Cyprus')}}</option>
                                                                    <option value="CZ">{{__('Czech Republic')}}</option>
                                                                    <option value="DK">{{__('Denmark')}}</option>
                                                                    <option value="DJ">{{__('Djibouti')}}</option>
                                                                    <option value="DM">{{__('Dominica')}}</option>
                                                                    <option value="DO">{{__('Dominican Republic')}}</option>
                                                                    <option value="EC">{{__('Ecuador')}}</option>
                                                                    <option value="EG">{{__('Egypt')}}</option>
                                                                    <option value="SV">{{__('El Salvador')}}</option>
                                                                    <option value="GQ">{{__('Equatorial Guinea')}}</option>
                                                                    <option value="ER">{{__('Eritrea')}}</option>
                                                                    <option value="EE">{{__('Estonia')}}</option>
                                                                    <option value="ET">{{__('Ethiopia')}}</option>
                                                                    <option value="FK">{{__('Falkland Islands (Malvinas)')}}</option>
                                                                    <option value="FO">{{__('Faroe Islands')}}</option>
                                                                    <option value="FJ">{{__('Fiji')}}</option>
                                                                    <option value="FI">{{__('Finland')}}</option>
                                                                    <option value="FR">{{__('France')}}</option>
                                                                    <option value="GF">{{__('French Guiana')}}</option>
                                                                    <option value="PF">{{__('French Polynesia')}}</option>
                                                                    <option value="GA">{{__('Gabon')}}</option>
                                                                    <option value="GM">{{__('Gambia')}}</option>
                                                                    <option value="GE">{{__('Georgia')}}</option>
                                                                    <option value="DE">{{__('Germany')}}</option>
                                                                    <option value="GH">{{__('Ghana')}}</option>
                                                                    <option value="GI">{{__('Gibraltar')}}</option>
                                                                    <option value="GR">{{__('Greece')}}</option>
                                                                    <option value="GL">{{__('Greenland')}}</option>
                                                                    <option value="GD">{{__('Grenada')}}</option>
                                                                    <option value="GP">{{__('Guadeloupe')}}</option>
                                                                    <option value="GU">{{__('Guam')}}</option>
                                                                    <option value="GT">{{__('Guatemala')}}</option>
                                                                    <option value="GN">{{__('Guinea')}}</option>
                                                                    <option value="GW">{{__('Guinea-Bissau')}}</option>
                                                                    <option value="GY">{{__('Guyana')}}</option>
                                                                    <option value="HT">{{__('Haiti')}}</option>
                                                                    <option value="HN">{{__('Honduras')}}</option>
                                                                    <option value="HK">{{__('Hong Kong')}}</option>
                                                                    <option value="HU">{{__('Hungary')}}</option>
                                                                    <option value="IS">{{__('Iceland')}}</option>
                                                                    <option value="IN">{{__('India')}}</option>
                                                                    <option value="ID">{{__('Indonesia')}}</option>
                                                                    <option value="IQ">{{__('Iraq')}}</option>
                                                                    <option value="IE">{{__('Ireland')}}</option>
                                                                    <option value="IL">{{__('Israel')}}</option>
                                                                    <option value="IT">{{__('Italy')}}</option>
                                                                    <option value="JM">{{__('Jamaica')}}</option>
                                                                    <option value="JP">{{__('Japan')}}</option>
                                                                    <option value="JO">{{__('Jordan')}}</option>
                                                                    <option value="KZ">{{__('Kazakhstan')}}</option>
                                                                    <option value="KE">{{__('Kenya')}}</option>
                                                                    <option value="KI">{{__('Kiribati')}}</option>
                                                                    <option value="KR">{{__('Korea, Republic of')}}</option>
                                                                    <option value="KW">{{__('Kuwait')}}</option>
                                                                    <option value="KG">{{__('Kyrgyzstan')}}</option>
                                                                    <option value="LV">{{__('Latvia')}}</option>
                                                                    <option value="LB">{{__('Lebanon')}}</option>
                                                                    <option value="LS">{{__('Lesotho')}}</option>
                                                                    <option value="LR">{{__('Liberia')}}</option>
                                                                    <option value="LY">{{__('Libyan Arab Jamahiriya')}}</option>
                                                                    <option value="LI">{{__('Liechtenstein')}}</option>
                                                                    <option value="LT">{{__('Lithuania')}}</option>
                                                                    <option value="LU">{{__('Luxembourg')}}</option>
                                                                    <option value="MO">{{__('Macau')}}</option>
                                                                    <option value="MG">{{__('Madagascar')}}</option>
                                                                    <option value="MW">{{__('Malawi')}}</option>
                                                                    <option value="MY">{{__('Malaysia')}}</option>
                                                                    <option value="MV">{{__('Maldives')}}</option>
                                                                    <option value="ML">{{__('Mali')}}</option>
                                                                    <option value="MT">{{__('Malta')}}</option>
                                                                    <option value="MH">{{__('Marshall Islands')}}</option>
                                                                    <option value="MQ">{{__('Martinique')}}</option>
                                                                    <option value="MR">{{__('Mauritania')}}</option>
                                                                    <option value="MU">{{__('Mauritius')}}</option>
                                                                    <option value="YT">{{__('Mayotte')}}</option>
                                                                    <option value="MX">{{__('Mexico')}}</option>
                                                                    <option value="MD">{{__('Moldova, Republic of')}}</option>
                                                                    <option value="MC">{{__('Monaco')}}</option>
                                                                    <option value="MN">{{__('Mongolia')}}</option>
                                                                    <option value="MS">{{__('Montserrat')}}</option>
                                                                    <option value="MA">{{__('Morocco')}}</option>
                                                                    <option value="MZ">{{__('Mozambique')}}</option>
                                                                    <option value="MM">{{__('Myanmar')}}</option>
                                                                    <option value="NA">{{__('Namibia')}}</option>
                                                                    <option value="NR">{{__('Nauru')}}</option>
                                                                    <option value="NP">{{__('Nepal')}}</option>
                                                                    <option value="NL">{{__('Netherlands')}}</option>
                                                                    <option value="AN">{{__('Netherlands Antilles')}}</option>
                                                                    <option value="NC">{{__('New Caledonia')}}</option>
                                                                    <option value="NZ">{{__('New Zealand')}}</option>
                                                                    <option value="NI">{{__('Nicaragua')}}</option>
                                                                    <option value="NE">{{__('Niger')}}</option>
                                                                    <option value="NG">{{__('Nigeria')}}</option>
                                                                    <option value="NF">{{__('Norfolk Island')}}</option>
                                                                    <option value="MP">{{__('Northern Mariana Islands')}}</option>
                                                                    <option value="NO">{{__('Norway')}}</option>
                                                                    <option value="OM">{{__('Oman')}}</option>
                                                                    <option value="PW">{{__('Palau')}}</option>
                                                                    <option value="PA">{{__('Panama')}}</option>
                                                                    <option value="PG">{{__('Papua New Guinea')}}</option>
                                                                    <option value="PY">{{__('Paraguay')}}</option>
                                                                    <option value="PE">{{__('Peru')}}</option>
                                                                    <option value="PH">{{__('Philippines')}}</option>
                                                                    <option value="PN">{{__('Pitcairn')}}</option>
                                                                    <option value="PL">{{__('Poland')}}</option>
                                                                    <option value="PT">{{__('Portugal')}}</option>
                                                                    <option value="PR">{{__('Puerto Rico')}}</option>
                                                                    <option value="QA">{{__('Qatar')}}</option>
                                                                    <option value="RE">{{__('Reunion')}}</option>
                                                                    <option value="RO">{{__('Romania')}}</option>
                                                                    <option value="RU">{{__('Russian Federation')}}</option>
                                                                    <option value="RW">{{__('Rwanda')}}</option>
                                                                    <option value="KN">{{__('Saint Kitts and Nevis')}}</option>
                                                                    <option value="LC">{{__('Saint LUCIA')}}</option>
                                                                    <option value="WS">{{__('Samoa')}}</option>
                                                                    <option value="SM">{{__('San Marino')}}</option>
                                                                    <option value="ST">{{__('Sao Tome and Principe')}}</option>
                                                                    <option value="SA">{{__('Saudi Arabia')}}</option>
                                                                    <option value="SN">{{__('Senegal')}}</option>
                                                                    <option value="SC">{{__('Seychelles')}}</option>
                                                                    <option value="SL">{{__('Sierra Leone')}}</option>
                                                                    <option value="SG">{{__('Singapore')}}</option>
                                                                    <option value="SK">{{__('Slovakia (Slovak Republic)')}}</option>
                                                                    <option value="SI">{{__('Slovenia')}}</option>
                                                                    <option value="SB">{{__('Solomon Islands')}}</option>
                                                                    <option value="SO">{{__('Somalia')}}</option>
                                                                    <option value="ZA">{{__('South Africa')}}</option>
                                                                    <option value="ES">{{__('Spain')}}</option>
                                                                    <option value="LK">{{__('Sri Lanka')}}</option>
                                                                    <option value="SH">{{__('St. Helena')}}</option>
                                                                    <option value="PM">{{__('St. Pierre and Miquelon')}}</option>
                                                                    <option value="SD">{{__('Sudan')}}</option>
                                                                    <option value="SR">{{__('Suriname')}}</option>
                                                                    <option value="SZ">{{__('Swaziland')}}</option>
                                                                    <option value="SE">{{__('Sweden')}}</option>
                                                                    <option value="CH">{{__('Switzerland')}}</option>
                                                                    <option value="SY">{{__('Syrian Arab Republic')}}</option>
                                                                    <option value="TW">{{__('Taiwan, Province of China')}}</option>
                                                                    <option value="TJ">{{__('Tajikistan')}}</option>
                                                                    <option value="TZ">{{__('Tanzania, United Republic of')}}</option>
                                                                    <option value="TH">{{__('Thailand')}}</option>
                                                                    <option value="TG">{{__('Togo')}}</option>
                                                                    <option value="TK">{{__('Tokelau')}}</option>
                                                                    <option value="TO">{{__('Tonga')}}</option>
                                                                    <option value="TT">{{__('Trinidad and Tobago')}}</option>
                                                                    <option value="TN">{{__('Tunisia')}}</option>
                                                                    <option value="TR">{{__('Turkey')}}</option>
                                                                    <option value="TM">{{__('Turkmenistan')}}</option>
                                                                    <option value="TC">{{__('Turks and Caicos Islands')}}</option>
                                                                    <option value="TV">{{__('Tuvalu')}}</option>
                                                                    <option value="UG">{{__('Uganda')}}</option>
                                                                    <option value="UA">{{__('Ukraine')}}</option>
                                                                    <option value="AE">{{__('United Arab Emirates')}}</option>
                                                                    <option value="GB">{{__('United Kingdom')}}</option>
                                                                    <option value="US">{{__('United States')}}</option>
                                                                    <option value="UY">{{__('Uruguay')}}</option>
                                                                    <option value="UZ">{{__('Uzbekistan')}}</option>
                                                                    <option value="VU">{{__('Vanuatu')}}</option>
                                                                    <option value="VE">{{__('Venezuela')}}</option>
                                                                    <option value="VN">{{__('Viet Nam')}}</option>
                                                                    <option value="VG">{{__('Virgin Islands (British)')}}</option>
                                                                    <option value="VI">{{__('Virgin Islands (U.S.)')}}</option>
                                                                    <option value="WF">{{__('Wallis and Futuna Islands')}}</option>
                                                                    <option value="EH">{{__('Western Sahara')}}</option>
                                                                    <option value="YE">{{__('Yemen')}}</option>
                                                                    <option value="ZM">{{__('Zambia')}}</option>
                                                                    <option value="ZW">{{__('Zimbabwe')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-0 row form-group">
                                                            <label for="example-textarea" class="col-form-label col-md-2 col-form-label">{{__('Order Notes:')}}</label>
                                                            <div class="col-md-10"><textarea class="form-control" id="example-textarea" rows="3" placeholder="{{__('Write some note..')}}"></textarea></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-border-pills-shipping" role="tabpanel" aria-labelledby="v-border-pills-shipping-tab">
                                        <div class="card-box w-100 shipping-tab">
                                            <div>
                                                <h6>{{__('Saved Address')}}</h6>
                                                    <p class="mb-4">{{__('Fill the form below in order to
                                                        send you the order\'s invoice.')}}</p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="border border-light p-3 rounded mb-3 mb-md-0">
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                                                                    <label class="custom-control-label font-16 text-light-black" for="customRadio1">{{__('Home')}}</label>
                                                                </div>
                                                                <div class="float-right">
                                                                    <a href="#"><i class="las la-pen font-20"></i></a>
                                                                </div>
                                                                <h6 class="mt-2">{{__('Dean Jones')}}</h6>
                                                                <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Address:')}}</span> {{__('1234 Hirasona lane, CA 91105')}}</p>
                                                                <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Phone:')}}</span> {{__('(123) 134-4747')}}</p>
                                                                <p class="mb-0 font-13"><span class="font-weight-semibold mr-2">{{__('Mobile:')}}</span> {{__('(+01) 98765 43210')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="border border-light p-3 rounded mb-3 mb-md-0">
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                                    <label class="custom-control-label font-16 text-light-black" for="customRadio2">{{__('Office')}}</label>
                                                                </div>
                                                                <div class="float-right">
                                                                    <a href="#"><i class="las la-pen font-20"></i></a>
                                                                </div>
                                                                <h6 class="mt-2">{{__('Dean Jones')}}</h6>
                                                                <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Address:')}}</span> {{__('1234 Hirasona lane, CA 91105')}}</p>
                                                                <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Phone:')}}</span> {{__('(123) 134-4747')}}</p>
                                                                <p class="mb-0 font-13"><span class="font-weight-semibold mr-2">{{__('Mobile:')}}</span> {{__('(+01) 98765 43210')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="mt-4">{{__('Shipping Method')}}</h6>
                                                    <p class="mb-4">{{__('Fill the form below in order to
                                                        send you the order\'s invoice.')}}</p>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="border border-light p-3 rounded mb-3">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="shippingMethodRadio1" name="shippingOptions" class="custom-control-input" checked="">
                                                                    <label class="custom-control-label font-16 text-light-black" for="shippingMethodRadio1">{{__('Standard Delivery - FREE')}}</label>
                                                                </div>
                                                                <p class="mb-0 pl-4 pt-1 font-13">{{__('Estimated 3-4 days shipping (Duties and tax may be due upon delivery)')}}</p>
                                                            </div>
                                                            <div class="border border-light p-3 rounded">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="shippingMethodRadio2" name="shippingOptions" class="custom-control-input">
                                                                    <label class="custom-control-label font-16 text-light-black" for="shippingMethodRadio2">{{__('Fast Delivery - $25')}}</label>
                                                                </div>
                                                                <p class="mb-0 pl-4 pt-1 font-13">{{__('Estimated 1 day shipping (Duties and tax may be due upon delivery)')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-border-pills-payment" role="tabpanel" aria-labelledby="v-border-pills-payment-tab">
                                        <div class="card-box w-100 payment-tab">
                                            <div>
                                                <h6>{{__('Payment Selection')}}</h6>
                                                <p class="mb-4">{{__('Fill the form below in order to send you the order\'s invoice.')}}
                                                    </p>
                                                <div class="border border-light p-3 mb-3 rounded">
                                                    <div class="float-right">
                                                        <i class="fab fa-cc-paypal font-24 text-primary"></i>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="BillingOptRadio2" name="billingOptions" class="custom-control-input">
                                                        <label class="custom-control-label font-16 text-light-black" for="BillingOptRadio2">{{__('Pay with Paypal')}}</label>
                                                    </div>
                                                    <p class="mb-0 pl-4 pt-1 font-13">{{__('You will be redirected to PayPal website to complete your purchase securely.')}}</p>
                                                </div>
                                                <div class="border border-light p-3 mb-3 rounded">
                                                    <div class="float-right">
                                                        <i class="far fa-credit-card font-24 text-primary"></i>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="BillingOptRadio1" name="billingOptions" class="custom-control-input" checked="">
                                                        <label class="custom-control-label font-16 text-light-black" for="BillingOptRadio1">{{__('Credit / Debit Card')}}</label>
                                                    </div>
                                                    <p class="mb-0 pl-4 pt-1 font-13">{{__('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and Stripe.')}}</p>
                                                    <div class="row mt-4">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="card-number">{{__('Card Number')}}</label>
                                                                <input type="text" id="card-number" class="form-control" data-toggle="input-mask" data-mask-format="0000 0000 0000 0000" placeholder="{{__('4242 4242 4242 4242')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="card-name-on">{{__('Name on card')}}</label>
                                                                <input type="text" id="card-name-on" class="form-control" placeholder="{{__('Master Shreyu')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="card-expiry-date">{{__('Expiry date')}}</label>
                                                                <input type="text" id="card-expiry-date" class="form-control" data-toggle="input-mask" data-mask-format="00/00" placeholder="MM/YY">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="card-cvv">{{__('CVV code')}}</label>
                                                                <input type="text" id="card-cvv" class="form-control" data-toggle="input-mask" data-mask-format="000" placeholder="{{__('012')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border border-light p-3 mb-3 rounded">
                                                    <div class="float-right">
                                                        <i class="fas fa-money-bill-alt font-24 text-primary"></i>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="BillingOptRadio4" name="billingOptions" class="custom-control-input">
                                                        <label class="custom-control-label font-16 text-light-black" for="BillingOptRadio4">{{__('Cash on Delivery')}}</label>
                                                    </div>
                                                    <p class="mb-0 pl-4 pt-1 font-13">{{__('Pay with cash when your order is delivered.')}}</p>
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush
