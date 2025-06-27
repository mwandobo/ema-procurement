@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/invoice.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Invoice')}}</span></li>
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
        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                </div>
                <div class="doc-container">
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search search-bar-container">
                                    <i class="las la-search toggle-search"></i>
                                    <form class="form-inline search-full form-inline search" role="search">
                                        <div class="search-bar">
                                            <input type="text" class="search-form-control  ml-lg-auto" placeholder="{{__('Search here')}}">
                                        </div>
                                    </form>
                                </div>
                                <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="K5UI89OP78" data-invoice-id="K5UI89OP78">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('11')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: K5UI89OP78')}}</p>
                                                    <p class="invoice-customer-name">{{__('Sales Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Umbrella Corporation')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="P5UI89OP79" data-invoice-id="P5UI89OP79">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('11')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: P5UI89OP79')}}</p>
                                                    <p class="invoice-customer-name">{{__('Order Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Hethwoy Inc.')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="A4UI89OP90" data-invoice-id="A4UI89OP90">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('10')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: A4UI89OP90')}}</p>
                                                    <p class="invoice-customer-name">{{__('Sales Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Orapt Watches')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="H8UI89OP47" data-invoice-id="H8UI89OP47">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('15')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: H8UI89OP47')}}</p>
                                                    <p class="invoice-customer-name">{{__('Order Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Zindo Consultants')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="I0PI89OP11" data-invoice-id="I0PI89OP11">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('16')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: I0PI89OP11')}}</p>
                                                    <p class="invoice-customer-name">{{__('Sales Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Balmo Electronics')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-container">
                        <div class="invoice-inbox">
                            <div class="inv-not-selected">
                                <p>{{__('Click any invoice to see the details')}}</p>
                            </div>
                            <div class="invoice-header-section">
                                <div class="invoice-action">
                                    <button class="btn btn-primary action-print">{{__('Print')}}</button>
                                </div>
                            </div>
                            <div id="ct" class="">
                                <div class="K5UI89OP78">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">
                                        <div class="row inv--head-section">
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img src="{{ url('assets/img/company-2.jpg') }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">{{__('Tax Invoice')}}</h3>
                                            </div>
                                        </div>
                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">{{__('To')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                <p class="inv-detail-title">{{__('Invoice Details')}}</p>
                                            </div>
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{__('Umbrella Corporation')}}</p>
                                                <p class="inv-street-addr">{{__('91 Jamast Street, California, 245874')}}</p>
                                                <p class="inv-email-address">{{__('umbrella@mail.com')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">{{__('Invoice Id :')}} </span> <span class="inv-number">{{__('K5UI89OP78')}}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">{{__('Date :')}} </span> <span class="inv-date">{{__('12 April 2020')}}</span></p>
                                            </div>
                                        </div>
                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">{{__('Hi')}}S.No</th>
                                                            <th scope="col">{{__('Hi')}}Items</th>
                                                            <th class="text-right" scope="col">{{__('Qty')}}</th>
                                                            <th class="text-right" scope="col">{{__('Unit Price')}}</th>
                                                            <th class="text-right" scope="col">{{__('Amount')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{__('Printer')}}</td>
                                                            <td class="text-right">100</td>
                                                            <td class="text-right">{{__('$300')}}</td>
                                                            <td class="text-right">{{__('$30000')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>{{__('Mobile')}}</td>
                                                            <td class="text-right">10</td>
                                                            <td class="text-right">{{__('$50')}}</td>
                                                            <td class="text-right">{{__('$500')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>{{__('Monitor')}}</td>
                                                            <td class="text-right">30</td>
                                                            <td class="text-right">{{__('$700')}}</td>
                                                            <td class="text-right">{{__('$21000')}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">{{__('Bank Information:')}}</h6>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Bank Name:')}}</span> {{__('Digital Bank of Commerce')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Account Number:')}}</span> {{__('874574584512')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Payment Mode:')}}</span> {{__('Cheque')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Transaction Id:')}}</span> {{__('8HD5248ADSY')}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Sub Total:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$51500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Tax Amount:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$200')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate">{{__('Discount :')}} <span class="discount-percentage">5%</span> </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="">{{__('Grand Total :')}} </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <h4 class="">{{__('$51200')}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-contact">
                                            <div class="row">
                                                <div class="col-sm-12 col-12">
                                                    <p class="">{{__('Email: info@mail.com | Contact: +1 5475-8244 | Website: www.website.com')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="P5UI89OP79">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">
                                        <div class="row inv--head-section">
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img src="{{ url('assets/img/company-5.jpg') }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">{{__('Tax Invoice')}}</h3>
                                            </div>
                                        </div>
                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">{{__('To')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                <p class="inv-detail-title">{{__('Invoice Details')}}</p>
                                            </div>
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{__('Hethwoy Inc.')}}</p>
                                                <p class="inv-street-addr">{{__('91 Jamast Street, California, 245874')}}</p>
                                                <p class="inv-email-address">{{__('hethwoy@mail.com')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">{{__('Invoice Id :')}} </span> <span class="inv-number">{{__('K5UI89OP78')}}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">{{__('Date :')}} </span> <span class="inv-date">{{__('11 April 2020')}}</span></p>
                                            </div>
                                        </div>
                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">{{__('S.No')}}</th>
                                                            <th scope="col">{{__('Items')}}</th>
                                                            <th class="text-right" scope="col">{{__('Qty')}}</th>
                                                            <th class="text-right" scope="col">{{__('Unit Price')}}</th>
                                                            <th class="text-right" scope="col">{{__('Amount')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{__('Printer')}}</td>
                                                            <td class="text-right">100</td>
                                                            <td class="text-right">{{__('$300')}}</td>
                                                            <td class="text-right">{{__('$30000')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>{{__('Mobile')}}</td>
                                                            <td class="text-right">10</td>
                                                            <td class="text-right">{{__('$50')}}</td>
                                                            <td class="text-right">{{__('$500')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>{{__('Monitor')}}</td>
                                                            <td class="text-right">30</td>
                                                            <td class="text-right">{{__('$700')}}</td>
                                                            <td class="text-right">{{__('$21000')}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">{{__('Bank Information:')}}</h6>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Bank Name:')}}</span> {{__('Digital Bank of Commerce')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Account Number:')}}</span> {{__('874574584512')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Payment Mode:')}}</span> {{__('Cheque')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Transaction Id:')}}</span> {{__('8HD5248ADSY')}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Sub Total:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$51500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Tax Amount:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$200')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate">{{__('Discount :')}} <span class="discount-percentage">5%</span> </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="">{{__('Grand Total :')}} </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <h4 class="">{{__('$51200')}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-contact">
                                            <div class="row">
                                                <div class="col-sm-12 col-12">
                                                    <p class="">{{__('Email: info@mail.com | Contact: +1 5475-8244 | Website: www.website.com')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="A4UI89OP90">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">
                                        <div class="row inv--head-section">
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img src="{{ url('assets/img/company-3.jpg') }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">{{__('Tax Invoice')}}</h3>
                                            </div>
                                        </div>
                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">{{__('To')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                <p class="inv-detail-title">{{__('Invoice Details')}}</p>
                                            </div>
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{__('Zindo Consultants')}}</p>
                                                <p class="inv-street-addr">{{__('91 Jamast Street, California, 245874')}}</p>
                                                <p class="inv-email-address">{{__('zindo@mail.com')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">{{__('Invoice Id :')}} </span> <span class="inv-number">{{__('K5UI89OP78')}}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">{{__('Date :')}} </span> <span class="inv-date">{{__('15 April 2020')}}</span></p>
                                            </div>
                                        </div>
                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">{{__('S.No')}}</th>
                                                            <th scope="col">{{__('Items')}}</th>
                                                            <th class="text-right" scope="col">{{__('Qty')}}</th>
                                                            <th class="text-right" scope="col">{{__('Unit Price')}}</th>
                                                            <th class="text-right" scope="col">{{__('Amount')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{__('Printer')}}</td>
                                                            <td class="text-right">{{__('Hi')}}100</td>
                                                            <td class="text-right">{{__('$300')}}</td>
                                                            <td class="text-right"> {{__('$30000')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>{{__('Mobile')}}</td>
                                                            <td class="text-right">10</td>
                                                            <td class="text-right">{{__('$50')}}</td>
                                                            <td class="text-right">{{__('$500')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>{{__('Monitor')}}</td>
                                                            <td class="text-right">30</td>
                                                            <td class="text-right">{{__('$700')}}</td>
                                                            <td class="text-right">{{__('$21000')}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">{{__('Bank Information:')}}</h6>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Bank Name:')}}</span> {{__('Digital Bank of Commerce')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Account Number:')}}</span> {{__('874574584512')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Payment Mode:')}}</span> {{__('Cheque')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Transaction Id:')}}</span> {{__('8HD5248ADSY')}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Sub Total:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$51500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Tax Amount:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$200')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate">{{__('Discount :')}} <span class="discount-percentage">5%</span> </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="">{{__('Grand Total :')}} </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <h4 class="">{{__('$51200')}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-contact">
                                            <div class="row">
                                                <div class="col-sm-12 col-12">
                                                    <p class="">{{__('Email: info@mail.com | Contact: +1 5475-8244 | Website: www.website.com')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="H8UI89OP47">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">
                                        <div class="row inv--head-section">
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img src="{{ url('assets/img/company-4.jpg') }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">{{__('Tax Invoice')}}</h3>
                                            </div>
                                        </div>
                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">{{__('To')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                <p class="inv-detail-title">{{__('Invoice Details')}}</p>
                                            </div>
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{__('Zindo Consultants')}}</p>
                                                <p class="inv-street-addr">{{__('91 Jamast Street, California, 245874')}}</p>
                                                <p class="inv-email-address">{{__('zindo@mail.com')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">{{__('Invoice Id :')}} </span> <span class="inv-number">{{__('K5UI89OP78')}}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">{{__('Date :')}} </span> <span class="inv-date">{{__('15 April 2020')}}</span></p>
                                            </div>
                                        </div>
                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">{{__('S.No')}}</th>
                                                            <th scope="col">{{__('Items')}}</th>
                                                            <th class="text-right" scope="col">{{__('Qty')}}</th>
                                                            <th class="text-right" scope="col">{{__('Unit Price')}}</th>
                                                            <th class="text-right" scope="col">{{__('Amount')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{__('Printer')}}</td>
                                                            <td class="text-right">{{__('Hi')}}100</td>
                                                            <td class="text-right">{{__('$300')}}</td>
                                                            <td class="text-right"> {{__('$30000')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>{{__('Mobile')}}</td>
                                                            <td class="text-right">10</td>
                                                            <td class="text-right">{{__('$50')}}</td>
                                                            <td class="text-right">{{__('$500')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>{{__('Monitor')}}</td>
                                                            <td class="text-right">30</td>
                                                            <td class="text-right">{{__('$700')}}</td>
                                                            <td class="text-right">{{__('$21000')}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">{{__('Bank Information:')}}</h6>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Bank Name:')}}</span> {{__('Digital Bank of Commerce')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Account Number:')}}</span> {{__('874574584512')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Payment Mode:')}}</span> {{__('Cheque')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Transaction Id:')}}</span> {{__('8HD5248ADSY')}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Sub Total:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$51500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Tax Amount:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$200')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate">{{__('Discount :')}} <span class="discount-percentage">5%</span> </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="">{{__('Grand Total :')}} </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <h4 class="">{{__('$51200')}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-contact">
                                            <div class="row">
                                                <div class="col-sm-12 col-12">
                                                    <p class="">{{__('Email: info@mail.com | Contact: +1 5475-8244 | Website: www.website.com')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="I0PI89OP11">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">
                                        <div class="row inv--head-section">
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img src="{{ url('assets/img/company-5.jpg') }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">{{__('Tax Invoice')}}</h3>
                                            </div>
                                        </div>
                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">{{__('To')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                <p class="inv-detail-title">{{__('Invoice Details')}}</p>
                                            </div>
                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{__('Balmo Electronics')}}</p>
                                                <p class="inv-street-addr">{{__('91 Jamast Street, California, 245874')}}</p>
                                                <p class="inv-email-address">{{__('balmo@mail.com')}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">{{__('Invoice Id :')}} </span> <span class="inv-number">{{__('K5UI89OP78')}}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">{{__('Date :')}} </span> <span class="inv-date">{{__('14 April 2020')}}</span></p>
                                            </div>
                                        </div>
                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">{{__('S.No')}}</th>
                                                            <th scope="col">{{__('Items')}}</th>
                                                            <th class="text-right" scope="col">{{__('Qty')}}</th>
                                                            <th class="text-right" scope="col">{{__('Unit Price')}}</th>
                                                            <th class="text-right" scope="col">{{__('Amount')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{__('Printer')}}</td>
                                                            <td class="text-right">100</td>
                                                            <td class="text-right">{{__('$300')}}</td>
                                                            <td class="text-right">{{__('$30000')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>{{__('Mobile')}}</td>
                                                            <td class="text-right">10</td>
                                                            <td class="text-right">{{__('$50')}}</td>
                                                            <td class="text-right">{{__('$500')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>{{__('Monitor')}}</td>
                                                            <td class="text-right">30</td>
                                                            <td class="text-right">{{__('$700')}}</td>
                                                            <td class="text-right">{{__('$21000')}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">{{__('Bank Information:')}}</h6>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Bank Name:')}}</span> {{__('Digital Bank of Commerce')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Account Number:')}}</span> {{__('874574584512')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Payment Mode:')}}</span> {{__('Cheque')}}</p>
                                                        </div>
                                                        <div class="col-sm-12 col-12">
                                                            <p class=" inv-subtitle"><span>{{__('Transaction Id:')}}</span> {{__('8HD5248ADSY')}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Sub Total:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$51500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">{{__('Tax Amount:')}} </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$200')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate">{{__('Discount :')}} <span class="discount-percentage">5%</span> </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">{{__('$500')}}</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="">{{__('Grand Total :')}} </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <h4 class="">{{__('$51200')}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-contact">
                                            <div class="row">
                                                <div class="col-sm-12 col-12">
                                                    <p class="">{{__('Email: info@mail.com | Contact: +1 5475-8244 | Website: www.website.com')}}</p>
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
    {!! Html::script('assets/js/apps/invoice.js') !!}
@endpush

@push('custom-scripts')

@endpush
