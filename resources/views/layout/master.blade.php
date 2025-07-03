<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body>
    <!-- Main navbar -->
    @include('layout.main_navbar')
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        @include('layout.aside2')
        <!-- /main sidebar -->



        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Page header -->
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> -
                                Dashboard</h4>
                            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                        </div>
                        <div class="header-elements d-none">
                            <div class="d-flex justify-content-center">
                            @can('view-member-menu')

                               @else
                                 <?php
$user= App\Models\User::find(auth()->user()->id);
?>
                                    <span class="font-weight-semibold">Hello , {{$user->name}}</span>
                         @endcan
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <span class="breadcrumb-item active">Dashboard</span>
                            </div>

                            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                        </div>

                        <div class="header-elements d-none">
                            <div class="breadcrumb justify-content-center">
                                <a href="#" class="breadcrumb-elements-item">
                                    <i class="icon-comment-discussion mr-2"></i>
                                    Support
                                </a>

                                <div class="breadcrumb-elements-item dropdown p-0">
                                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-gear mr-2"></i>
                                        Settings
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account
                                            security</a>
                                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                                        <a href="#" class="dropdown-item"><i class="icon-accessibility"></i>
                                            Accessibility</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page header -->

                @include('layout.alerts.message')
                <!-- Content area -->
                <div class="content">

                    @yield('content')

                </div>
                <!-- /content area -->


                <!-- Footer -->

                @include('layout.footer2')

                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>


    <!-- /page content -->
    @include('layout.scripts')
    {!! Toastr::message() !!}

</body>
</html>

