@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/chat.css') !!}
    {!! Html::style('plugins/animate/animate.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Chat')}}</span></li>
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
        <div class="layout-top-spacing">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="widget-content searchable-container grid">
                        <div class="card-box">
                            <div class="chat-container">
                                <div class="hamburger">
                                    <i class="las la-bars fadeIn"></i>
                                </div>
                                <div class="user-container">
                                    <div class="own-details">
                                        <img src="{{ url('assets/img/profile-14.jpg') }}" />
                                        <h3> {{__('Sara Williamson')}}</h3>
                                        <p> {{__('Sara@companyname.com')}}</p>
                                        <div class="dropdown chat-own-setting mt-1">
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="las la-cog font-20"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Profile')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Chats')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Notifications')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Add People')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Help')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teams">
                                        <h5 class="chat-headings"> {{__('Teams')}} <span> {{__('Online 4')}}</span></h5>
                                        <div class="team-container">
                                            <div class="single-team">
                                                        <span class="team-user-img">
                                                            <img src="{{ url('assets/img/profile-16.jpg') }}" />
                                                        </span>
                                                <span class="online"></span>
                                            </div>
                                            <div class="single-team">
                                                        <span class="team-user-img">
                                                            {{__('AP')}}
                                                        </span>
                                                <span class="offline"></span>
                                            </div>
                                            <div class="single-team">
                                                        <span class="team-user-img">
                                                            <img src="{{ url('assets/img/profile-15.jpg') }}" />
                                                        </span>
                                                <span class="online"></span>
                                            </div>
                                            <div class="single-team">
                                                        <span class="team-user-img">
                                                            <img src="{{ url('assets/img/profile-18.jpg') }}" />
                                                        </span>
                                                <span class="online"></span>
                                            </div>
                                            <div class="single-team">
                                                        <span class="team-user-img">
                                                            {{__('SR')}}
                                                        </span>
                                                <span class="offline"></span>
                                            </div>
                                            <div class="single-team">
                                                        <span class="team-user-img">
                                                            <img src="{{ url('assets/img/profile-12.jpg') }}" />
                                                        </span>
                                                <span class="online"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-list-box">
                                        <div class="search">
                                            <i class="las la-search toggle-search"></i>
                                            <input type="text" class="form-control" placeholder="{{__('Search')}}" />
                                        </div>
                                        <div class="people">
                                            <div class="person" data-chat="person6">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-22.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Amanda Winston')}}"> {{__('Amanda Winston')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                        <div>
                                                            <span class="pinned"><i class="las la-thumbtack"></i></span>
                                                            <span class="chat-count"> {{__('99')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person1">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-32.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Nijel Jonas')}}"> {{__('Nijel Jonas')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                        <div>
                                                            <span class="pinned"><i class="las la-thumbtack"></i></span>
                                                            <span class="chat-count"> {{__('2')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person2">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-29.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Jennifer Clarke')}}"> {{__('Jennifer Clarke')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person3">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-16.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Dolph Green')}}"> {{__('Dolph Green')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person4">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-11.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Shee Huang Tee')}}"> {{__('Shee Huang Tee')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person5">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-24.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Rocky')}}"> {{__('Rocky')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person7">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-25.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Eerie Johnson')}}"> {{__('Eerie Johnson')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person8">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-5.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('John Obi Mikel')}}"> {{__('John Obi Mikel')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person9">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-6.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Xavier Doherty')}}"> {{__('Xavier Doherty')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="person" data-chat="person10">
                                                <div class="user-info">
                                                    <div class="user-head mr-2">
                                                        <img src="{{ url('assets/img/profile-9.jpg') }}" alt="avatar">
                                                    </div>
                                                    <div class="user-body">
                                                        <h5 class="text-truncate strong mb-0 mt-1 chat-user-name" data-name="{{__('Mitchell Clarke')}}"> {{__('Mitchell Clarke')}}</h5>
                                                        <p class="text-muted font-11 text-truncate mb-0"> {{__('Askla sasasajs asja saisa sasa sah')}} </p>
                                                    </div>
                                                    <div class="user-footer ml-2 text-right">
                                                        <span class="chat-time font-10 text-success-teal"> {{__('12:25')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-details">
                                    <div class="search mb-3">
                                        <i class="las la-search toggle-search"></i>
                                        <input type="text" class="form-control" placeholder="{{__('Search for a message')}}" />
                                    </div>
                                    <div class="chat-details-header">
                                        <div class="chat-with">
                                            <p> {{__('Chat With')}}</p>
                                            <h3> {{__('Amanda Winston')}}</h3>
                                        </div>
                                        <div class="chat-with-options">
                                            <span class="start-video-call" title="{{__('Video Call')}}"><i class="las la-video"></i></span>
                                            <span class="start-call" title="{{__('Call')}}"><i class="las la-phone"></i></span>
                                            <div class="dropdown chat-with-op mt-1">
                                                <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="las la-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                    <a class="dropdown-item" href="javascript:void(0);"> {{__('Mute')}}</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"> {{__('Pin to top')}}</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"> {{__('Report')}}</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"> {{__('Export Chat')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chatting-container">
                                        <div class="chatting-time">
                                            <p>
                                                <span> {{__('Today')}}</span>
                                            </p>
                                        </div>
                                        <div class="own-chat-container slideInRight">
                                            <div class="own-chat">
                                                <p> {{__('Hey Amanda, Can we get on a quick call ?')}}</p>
                                            </div>
                                            <span class="own-time"> {{__('11:25')}}</span>
                                        </div>
                                        <div class="other-chat-container slideInLeft">
                                            <div class="other-chat">
                                                <p> {{__('Sorry, Im busy right now. Please call me after 3 PM')}}</p>
                                            </div>
                                            <span class="other-time"> {{__('Hi')}}11:28</span>
                                        </div>
                                        <p class="text-center">
                                            <span class="calling-info"> {{__('Last call duration 16:32')}}</span>
                                        </p>
                                        <div class="own-chat-container slideInRight">
                                            <div class="own-chat">
                                                <p> {{__('You need to make 3 designs for the project. Im sending you the reference')}}</p>
                                            </div>
                                            <span class="own-time"> {{__('15:25')}}</span>
                                        </div>
                                        <div class="own-chat-container slideInRight has-file">
                                            <div class="has-file">
                                                <div class="own-file-container">
                                                    <span><i class="las la-file-alt"></i></span>
                                                    <div>
                                                        <p class="file-name"> {{__('Reference.zip')}}</p>
                                                        <p class="file-msg"> {{__('unzip it to view the pdf')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="own-time"> {{__('15:25')}}</span>
                                        </div>
                                        <div class="other-chat-container slideInRight">
                                            <div class="other-chat">
                                                <p> {{__('Ok')}}</p>
                                            </div>
                                            <span class="other-time"> {{__('15:30')}}</span>
                                        </div>
                                        <div class="other-chat-container slideInLeft">
                                            <div class="other-chat">
                                                <p> {{__('Got It. I will send you the designs by tomorrow')}}</p>
                                            </div>
                                            <span class="other-time"> {{__('15:31')}}</span>
                                        </div>
                                        <div class="own-chat-container slideInRight">
                                            <div class="own-chat">
                                                <p> {{__('Sounds good!')}}</p>
                                            </div>
                                            <span class="own-time"> {{__('11:25')}}</span>
                                        </div>
                                    </div>
                                    <div class="chat-input-container">
                                        <div class="cic pointer">
                                            <i class="las la-grin-beam"></i>
                                            <input class="chat-text-input" placeholder="{{__('Write something here')}}"/>
                                        </div>
                                        <label for="file-input" class="mb-0">
                                            <a class="send" title="{{__('Attach a file')}}"><i class="las la-paperclip"></i></a>
                                        </label>
                                        <input id="file-input" type="file" style="display: none;"/>
                                        <a class="send chat-send" title="Send"><i class="las la-paper-plane"></i></a>
                                    </div>
                                </div>
                                <div class="chat-details empty">
                                    <p> {{__('Please select a user to start chatting')}}</p>
                                </div>
                                <div class="chat-user-details">
                                    <div class="hide-chat-user-details">
                                        <i class="las la-arrow-left"></i>
                                    </div>
                                    <div class="other-details">
                                        <img src="{{ url('assets/img/profile-22.jpg') }}" />
                                        <h3> {{__('Amanda Winston')}}</h3>
                                        <p> {{__('Amanda@companyname.com')}}</p>
                                    </div>
                                    <div class="other-section">
                                        <h5 class="chat-headings"> {{__('Shared Files')}} <span class="pointer"> {{__('View All')}}</span></h5>
                                        <div class="single-file">
                                            <span><i class="las la-file-alt"></i></span>
                                            <div>
                                                <p class="file-name"> {{__('Reference.zip')}}</p>
                                                <p class="file-msg"> {{__('Today 15:25')}}</p>
                                            </div>
                                        </div>
                                        <div class="single-file">
                                            <span><i class="las la-file-alt"></i></span>
                                            <div>
                                                <p class="file-name"> {{__('tax-slip-2020.zip')}}</p>
                                                <p class="file-msg"> {{__('Yesterday 18:38')}}</p>
                                            </div>
                                        </div>
                                        <div class="single-file">
                                            <span><i class="las la-file-alt"></i></span>
                                            <div>
                                                <p class="file-name"> {{__('Tender_requirement.pdf')}}</p>
                                                <p class="file-msg"> {{__('Yesterday 21:38')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-chat-option">
                                        <a><i class="las la-envelope"></i> {{__('Send Email')}}</a>
                                    </div>
                                    <div class="single-chat-option">
                                        <a><i class="las la-volume-mute"></i> {{__('Mute Notificatios')}}</a>
                                    </div>
                                    <div class="single-chat-option">
                                        <a><i class="las la-eye-slash"></i> {{__('Hide Medias')}}</a>
                                    </div>
                                    <div class="single-chat-option">
                                        <a><i class="las la-thumbtack"></i> {{__('Pin to top')}}</a>
                                    </div>
                                    <div class="single-chat-option">
                                        <a><i class="las la-cloud-download-alt"></i> {{__('Export Chat')}}</a>
                                    </div>
                                    <div class="single-chat-option">
                                        <a class="text-danger"><i class="las la-eraser"></i> {{__('Clear All Messages')}}</a>
                                    </div>
                                    <div class="single-chat-option">
                                        <a class="text-danger"><i class="las la-trash-alt"></i> {{__('Delete User')}}</a>
                                    </div>
                                    <div class="single-chat-option">
                                        <a class="text-danger"><i class="las la-ban"></i> {{__('Block User')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-calling-div">
        <div class="small-call-window-container">
            <div class="small-call-window">
                <div class="call-user">
                    <img src="{{ url('assets/img/profile-22.jpg') }}" class="scw-image">
                    <div class="scw-nl-container">
                        <p class="scw-name"> {{__('Amanda')}}</p>
                        <p class="scw-call-type blinking">
                            <span> {{__('video')}}</span>
                            {{__('calling . . .')}}
                        </p>
                        <p class="accepted-call-timer"> {{__('00:05')}}</p>
                    </div>
                </div>
                <div class="video-user">
                    <img src="{{ url('assets/img/video-chat-2.jpg') }}" class="client-image">
                    <img src="{{ url('assets/img/profile-16.jpg') }}" class="own-video-image">
                    <div class="scw-nl-container">
                        <p class="scw-name"> {{__('Amanda')}}</p>
                        <p class="scw-call-type blinking">
                            <span> {{__('video')}}</span>
                            {{__('calling . . .')}}
                        </p>
                        <p class="accepted-call-timer"> {{__('00:05')}}</p>
                    </div>
                </div>
                <div class="scw-flex">
                    <div class="scw-btn-container">
                        <button class="accept-call" title="{{__('Accept Call')}}">
                            <i class="las la-phone"></i>
                        </button>
                        <button class="accept-video-call" title=" {{__('Accept Call')}}">
                            <i class="las la-video"></i>
                        </button>
                        <button class="mute-call" title="{{__('Mute Call')}}">
                            <i class="las la-microphone-slash" style="display: none;"></i>
                            <i class="las la-microphone"></i>
                        </button>
                        <button class="reject-call" title="{{__('Reject Call')}}">
                            <i class="las la-phone-slash rotate-call"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/apps/mailbox-chat.js') !!}
@endpush

@push('custom-scripts')

@endpush
