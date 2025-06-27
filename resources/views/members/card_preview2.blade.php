<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <!-- Core JS files -->

    <!-- Core JS files -->


    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}">
    </script>
    <script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

    <script src="{{asset('assets2/js/app.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/sparklines.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/lines.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/areas.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/donuts.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/bars.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/progress.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/pies.js')}}">
    </script>
    <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/bullets.js')}}">
    </script>

    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}">
    </script>



    <script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}">
    </script>

    <script src="{{asset('global_assets/js/demo_pages/datatables_basic.js')}}"></script>
    <!-- /theme JS files -->
    <!-- /theme JS files -->

    <script type="text/javascript" src="{{asset('assets2/js/downloadFile.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js">
    </script>





    <!-- new js -->


    <!-- end new js -->


    <script src="https://logistic.ema.co.tz/assets/bundles/jquery-ui/jquery-ui.min.js">
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('assets/js/all.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{asset('assets/js/jautocalc.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/jQuery/jQuery.print.js')}}"></script>

    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    {!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
    <!-- The following JS library files are loaded to use PDF Options-->
    {!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
    {!! Html::script('global_assets/js/main/bootstrap.bundle.min.js') !!}
    <style>
    .colour {
        color: #191970;
    }

    h5 {
        margin-top: 1em;
    }

    li {
        margin-bottom: 2em;
        margin-top: -1em;

    }
    </style>
</head>

<body>






    <div class="row" style="width:332px;heigth:200px;padding-left:110px;padding-top:20px; border-radius:7px; ">
        <div class="col-md-4" style="background-color:white; padding-left:4px;">
            <img src="{{ url('assets/img/logo.jpg') }}" class="navbar-logo" alt="logo"
                style="height: 70px;width: 50px;border-radius: 30%; padding-top: 4px; padding-left:4px;" />
            <img src="{{url('assets/img/logo')}}/{{$member->picture}}" alt="Trendy Pants and Shoes"
                class="img-fluid rounded-start"
                style="height: 70px; width:50px; padding-top: 4px;padding-bottom: 5px; padding-left:4px;" />
        </div>
        <div class="col-md-6"
            style="background-color:white;background-image:url({{url('assets/img/logo/background.PNG')}}); background-position: center top;">
            <div class="row" style="">
                <h5 style="color:#191970; font-size:10px;"> <strong>DAR ES SALAAM <br></strong></h5>
                <h5 style="color:#191970; font-size:10px; margin-top: -1em;"><strong> GYMKHANA CLUB </strong></h5>

            </div>
            <div class="row">
                <h4 style="color:#191970; font-size:10px;"><strong>ID
                        No. </strong><small style="font-size:7px"><b>FMM-00{{$member->id}}</b></small>
                </h4>


            </div>
            <div class="row" style="margin-top: -1em;">

                <h4 style="color:#191970;font-size:7px;"><b>{{$member->fname}}
                        {{$member->lname}}</b></h4>

            </div>

            <div class="row" style="margin-top: 1em;">
                <p class="card-text colour" style="color:#191970; font-size:5px;">
                    <b> PROPERTY OF GYMKHANA CLUB</b>
                </p>
                <p class="card-text colour" style="color:#191970; font-size:5px; margin-top: -1em;">
                    <b> P.O. Box 286, Dar es Salaam, Tanzania</b>
                </p>
                <p class="card-text colour" style="color:#191970; font-size:5px; margin-top: -2em;">
                    <b> Tel: +255 22 2120519, Fax: +255 22 2138445 </b>
                </p>

                <p class="card-text colour" style=" color:#191970;font-size:5px; margin-top: -2em;">
                    <b> E-Mail : info@gymkhana.co.tz </b>
                </p>

            </div>

        </div>
        <div class="col-md-2" style="padding-left: 0px;background-color: #191970; height: 150px;">
            <centre>
                <h3 style="writing-mode: vertical-lr;  color:white; font-size:10px; padding-top:20px;">

                    REGULAR MEMBERSHIP

                </h3>
            </centre>
        </div>
    </div>

    <img src="https://dps.expresslane.org/driverslicense/Images/real_id.png"
        style="width:324px;heigth:204px;padding-left:100px;padding-top:20px;">

    <div class="row" style="width:332px;heigth:204px;padding-left:110px;padding-top:20px;">
                <div class="col">
                    <div class="row " style="background-color: #191970; max-width: 500px;max-height: 30px;">
                        <h4 class="card-title" style="color:white; font-size:8px; padding-left:20px;">
                            <b>CLUBS PARTICIPATING IN RECIPROCAL MEMBERSHIP
                                SCHEME<b>
                        </h4>
                    </div>

                    <div class="row" style="background-color:white;background-image:url({{url('assets/img/logo/background.PNG')}}); background-position: center top;">

                        <div class="col-md-5 col-lg-5" style="margin-top: 1em; margin-left: -2em;">
                            
                            <ol>
                                <li style="font-size:3px;"><strong>Arusha
                                        Gymkhana Club</strong></li>
                                <li style="font-size:2.4px;"><strong>Bombay
                                        presidency Golf Club</strong></li>
                                <li style="font-size:3px;"><strong>Kampala
                                        Golf Club</strong></li>
                                <li style="font-size:3px;"><strong>Kibene
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Kitwe Golf
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Lilongwe Golf
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Limuru Country
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Lusaka Golf
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Mombasa Golf
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Mombasa Sports
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Moshi
                                        Club</strong></li>
                                <li style="font-size:3px;"><strong>Mufindi
                                        Club</strong></li>

                            </ol>

                        </div>

                        <div class="col-md-5 col-lg-5" style="margin-top: 1em;">
                            
                            <ol start="13">

                                <li style="font-size:3.5px;"><strong>Muthaiga Golf
                                        Club</strong></li>
                                <li style="font-size:3.5px;"><strong>Ndola Golf
                                        Club</strong></li>
                                <li style="font-size:2.4px;"><strong>Nyali Golf &
                                        Country Club</strong></li>
                                <li style="font-size:3.5px;"><strong>Parklands
                                        Sports Club</strong></li>
                                <li style="font-size:3.5px;"><strong>Roan Antelope
                                        Club</strong></li>
                                <li style="font-size:3.5px;"><strong>Royal Nairobi
                                        Golf</strong></li>
                                <li style="font-size:3.5px;"><strong>Sigona Golf
                                        Club</strong></li>
                                <li style="font-size:2.4px;"><strong>The Des Moines
                                        Embassy Club</strong></li>
                                <li style="font-size:3.5px;"><strong>The Lusaka
                                        Club</strong></li>
                                <li style="font-size:3.5px;"><strong>Uganda Golf
                                        Club</strong></li>
                                <li style="font-size:3.5px;"><strong>Vet LAb Golf
                                        Club</strong></li>

                            </ol>

                        </div>

                        <div class="col-md-2 col-lg-2" style="margin-top: 1em;">
                            <div style="padding-top: 10px;">
                                {!! QrCode::size(50)->generate($card); !!}
                            </div>

                        </div>
                    </div>



                </div>
    </div>


    <button onclick="window.print()">Print this page</button>

</body>

</html>