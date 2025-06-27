<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="{{asset('assets/css/all.css')}}" rel="stylesheet" type="text/css">
    <style>
    h5 {
        margin-top: 1em;
    }

    li {
        margin-bottom: 1em;
        margin-top: -1em;


        word-spacing: -1px;



    }


    b {

        text-color: black;

    }
    </style>
</head>

<body>

    <div class="row" style="width:600px;heigth:470px;padding-left:145px;padding-top:18px; border-radius:7px;">
        <div class="col">

            <div class="row " style="background-color: #191970; max-width: 500px;max-height: 50px;">
                <centre>
                    <h4 class="card-title"
                        style="color:white; font-size:17px; text-align: center; padding-left:18px; padding-top:7px;">
                        <b>CLUBS PARTICIPATING IN RECIPROCAL MEMBERSHIP
                            SCHEME</b>
                    </h4>
                    </centr>

            </div>

            <div class="row" style="line-height: 15px;">
                
                <div class="col-md-5 col-lg-5" style="margin-top: 1em; padding-right:3px; ">

                    <ol style="color:#000000;">
                        <li style="font-size:9.0px;brightness(0%);">
                            <p style="color:black;">Arusha
                                Gymkhana Club</p>
                        </li>
                        <li style="font-size:9.0px; text-color:#000000;">
                            <p style="color:#000000;">Bombay
                                Presidency Golf Club</p>
                        </li>
                        <li style="font-size:9px; text-color:#000000;">
                            <p style="color:#000000;">Kampala
                                Golf Club</p>
                        </li>
                        <li style="font-size:9px; text-color:#000000;">
                            <p style="color:#000000;">Kibene
                                Club</p>
                        </li>
                        <li style="font-size:9px; text-color:#000000;">
                            <p style="color:#000000;">Kitwe Golf
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Lilongwe Golf
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Limuru Country
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Lusaka Golf
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Mombasa Golf
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Mombasa Sports
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Moshi
                                Club</p>
                        </li>

                        <li style="font-size:9px;">
                            <p style="color:#000000;">Morogoro Gymkhana
                                Club</p>
                        </li>
                    </ol>

                </div>

                <div class="col-md-5 col-lg-5.5" style="margin-top: 1em; line-width: 15px;">

                    <ol start="13" style="color:#000000;">

                        <li style="font-size:9px;">
                            <p style="color:#000000;">Muthaiga Golf
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Ndola Golf
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Nyali Golf &
                                Country Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Mufindi
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Parklands
                                Sports Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Roan Antelope
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Royal Nairobi
                                Golf</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Sigona Golf
                                Club</p>
                        </li>
                        <li style="font-size:8.8px;">
                            <p style="color:#000000;">The Des Moines Embassy Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">The Lusaka
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Uganda Golf
                                Club</p>
                        </li>
                        <li style="font-size:9px;">
                            <p style="color:#000000;">Vet LAb Golf
                                Club</p>
                        </li>

                    </ol>

                </div>
                
                <div class="col-md-2 col-lg-1.5" style="margin-top: 1em;">
                <p style="padding-top:50px;">
                        {!! QrCode::size(50)->generate($card); !!}
</p>

                </div>
                
            </div>



        </div>
    </div>

    <br><br>
    <button onclick="window.print()">Click here to print</button>

</body>

</html>