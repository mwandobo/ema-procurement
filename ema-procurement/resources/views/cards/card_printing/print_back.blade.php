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

     <div class="row" style="width:635px;heigth:470px;padding-left:170px;padding-top:35px; border-radius:7px; ">
        <div class="col">

            <div class="row " style="background-color: {{$color}}; max-width: 500px;max-height: 50px;">
                <centre>
                    <h4 class="card-title"
                        style="color:white; font-size:17px; text-align: center; padding-left:18px; padding-top:7px;">
                        <b>CLUBS PARTICIPATING IN RECIPROCAL MEMBERSHIP
                            SCHEME</b>
                    </h4>
                    </centre>

            </div>

            <div class="row" style="line-height: 19px;">
                
                <div class="col-md-6 col-lg-6" style="margin-top: 0.6em; padding-right:3px; ">

                    <ol style="color:#000000;font-weight:bolder">
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:black;">Arusha
                                Gymkhana Club</p>
                        </li>
                         <li style="font-size:11px;">
                            <p style="color:#000000;">Blantyre Sports Club</p>
                        </li>
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Bombay
                                Presidency Golf Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Entebbe Club</p>
                        </li>
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Kampala
                                Golf Club</p>
                        </li>
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Kibene
                                Club</p>
                        </li>
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Kitwe Golf
                                Club</p>
                        </li>
                     <li style="font-size:11px;brightness(0%);">

                            <p style="color:#000000;">Lilongwe Golf
                                Club</p>
                        </li>
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Limuru Country
                                Club</p>
                        </li>
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Lusaka Golf
                                Club</p>
                        </li>
                        <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Mombasa Golf
                                Club</p>
                        </li>
                   <li style="font-size:11px;brightness(0%);">

                            <p style="color:#000000;">Mombasa Sports
                                Club</p>
                        </li>
                                                <li style="font-size:11px;brightness(0%);">
                            <p style="color:#000000;">Moshi
                                Club</p>
                        </li>
                            
                       
                        
                    </ol>

                </div>

                <div class="col-md-6 col-lg-6" style="margin-top: 0.6em; line-width: 15px;">

                    <ol start="14" style="color:#000000;font-weight:bolder">
                         <li style="font-size:11px;">
                            <p style="color:#000000;">Morogoro Gymkhana
                                Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Muthaiga Golf
                                Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Ndola Golf
                                Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Nyali Golf &
                                Country Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Mufindi
                                Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Parklands
                                Sports Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Roan Antelope
                                Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Royal Nairobi
                                Golf</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Sigona Golf
                                Club</p>
                        </li>
                        <li style="font-size:10px;">
                            <p style="color:#000000;">The Des Moines Embassy Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">The Lusaka
                                Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Uganda Golf
                                Club</p>
                        </li>
                        <li style="font-size:11px;">
                            <p style="color:#000000;">Vet Lab Golf
                                Club</p>
                        </li>

                    </ol>

                </div>
                <!--
                <div class="col-md-2 col-lg-1.5" style="margin-top: 1em;">
                <p style="padding-top:50px;">
                        {!! QrCode::size(50)->generate($card); !!}
</p>

                </div>
                -->
            </div>



        </div>
    </div>

    <br><br>
    <button onclick="window.print()">Click here to print</button>

</body>

</html>