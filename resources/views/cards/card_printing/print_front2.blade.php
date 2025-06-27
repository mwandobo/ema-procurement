<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link href="{{asset('assets/css/all.css')}}" rel="stylesheet" type="text/css">

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

    <div class="row" style="width:610px;heigth:470px;padding-left:145px;padding-top:18px; border-radius:7px;">
        <div class="col-md-4" style=" padding-left:4px; background-color: #191970;">
            <img src="{{ url('assets/img/logo.jpg') }}" class="navbar-logo" alt="logo"
                style="height: 130px;width: 130px;border-radius: 40px;background-color: #191970; padding-top: 8px; padding-left:4px;" />
            <img src="{{url('assets/img/logo')}}/{{$member->picture}}" alt="Trendy Pants and Shoes"
                class="img-fluid rounded-start"
                style="height: 150px; width:130px; padding-top: 8px;padding-bottom: 5px;" />
        </div>
        <div class="col-md-6"
            style="background-color: #191970; background-image:url({{url('assets/img/logo/background.png')}}); background-position: bottom 1000px right 500px; background-size: 820px;">
            <div class="row" style="">
                <h5 style="color:white; font-size:20px; font-weight: bolder; margin-top: 2em;"> <strong>DAR ES SALAAM
                    </strong></h5>
                <h5 style="color:white; font-size:20px; font-weight: bolder; margin-top: -0.5em;"><strong> GYMKHANA
                        CLUB </strong></h5>

            </div>
            <div class="row" style="margin-top: 1.3em;">
                <h4 style="color:white; font-size:25; font-weight: bolder;"><strong>
                    </strong><small style="font-size:23px"><b>FMM-00{{$member->id}}</b></small>
                </h4>


            </div>
            <div class="row" style="margin-top: -0.2em;">

                <h4 style="color:white;font-size:15px; font-weight: bolder;"><b>LESERIAN S. SAYORE
                    </b></h4>

            </div>

            <div class="row" style="margin-top: 1.5em; padding-top:10px;">
                <p class="card-text colour" style="color:white; font-size:10px; font-weight: bolder;">
                    <b> PROPERTY OF GYMKHANA CLUB</b>
                </p>
                <p class="card-text colour" style="color:white; font-size:10px; margin-top: -1em;">
                    P.O. Box 286, Dar es Salaam, Tanzania
                </p>
                <p class="card-text colour" style="color:white; font-size:9px; margin-top: -1em;">
                    Tel: +255 22 2120519, Fax: +255 22 2138445
                </p>

                <p class="card-text colour" style=" color:white;font-size:10px; margin-top: -1em;">
                    E-Mail : info@dargymkhana.or.tz
                </p>

            </div>

        </div>
        <div class="col-md-2" style="padding-left: 0px;background-color: #DBE80C; height: 290px;">
            <centre>
                <h3
                    style="writing-mode: vertical-lr;  color:white; font-size:18px; font-weight: bolder; padding-top:30px;">

                    <b> REGULAR MEMBERSHIP </b>

                </h3>
            </centre>
        </div>
    </div>

    <!--
    <img src="https://dps.expresslane.org/driverslicense/Images/real_id.png"
        style="width:324px;heigth:204px;padding-left:110px;padding-top:15px;">
        
 -->

    <br><br>
    <button onclick="window.print()">Click here to print</button>

</body>

</html>