@extends('layout.master')



@section('content')
<style>
.colour {
    color: #191970;
}

h5 {
    margin-top: 1em;
}

li {
    margin-bottom: 1em;
    margin-top: -1em;

}


</style>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Card </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Front Preview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab2" data-toggle="tab" href="#home3" role="tab"
                                    aria-controls="home" aria-selected="true">Back Preview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-info" href="{{route('print.front',$id)}}">Print Front</a>
                                <a class="btn btn-info" href="{{route('print.back',$id)}}">Print Back</a>
                            </li>

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">

                                <div class="row" id="printTable" style="padding-top:85px; padding-left:30px;">
                                    <!-- starting front end of card -->
                                    <div class="card mb-3 offset-1"
                                        style="max-width:115mm; max-height: 300px; border-radius: 7%; ">
                                        <div class="row g-0">
                                            <div class="col-md-4" style="border-radius: 7%;">
                                                <img src="{{ url('assets/img/logo.jpg') }}" class="navbar-logo"
                                                    alt="logo"
                                                    style="height: 120px; padding-left: 15px; border-radius: 30%;" />
                                                <img src="{{url('assets/img/logo')}}/{{$member->picture}}"
                                                    alt="Trendy Pants and Shoes" class="img-fluid rounded-start"
                                                    style="height: 115px; width:120px; padding-top: 5px; padding-left: 15px; padding-bottom: 5px;" />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row" style="margin-top: 2em;">
                                                    <h5 style="color:#191970;"> <strong>DAR ES SALAAM <br></strong></h5>
                                                    <h5 style="color:#191970; margin-top: -1em;"><strong> GYMKHANA CLUB
                                                        </strong></h5>

                                                </div>
                                                <div class="row">
                                                    <h4 style="color:#191970; font-size:25px;"><strong>ID
                                                            No. </strong><small
                                                            style="font-size:14px"><b>FMM-00{{$member->id}}</b></small>
                                                    </h4>


                                                </div>
                                                <div class="row" style="margin-top: -1em;">

                                                    <h4 style="color:#191970;font-size:16px;"><b>{{$member->fname}}
                                                            {{$member->lname}}</b></h4>

                                                </div>

                                                <div class="row" style="margin-top: 1em;">
                                                    <p class="card-text colour" style="color:#191970; font-size:12px;">
                                                        <b> PROPERTY OF GYMKHANA CLUB</b>
                                                    </p>
                                                    <p class="card-text colour"
                                                        style="color:#191970; font-size:10px; margin-top: -1em;">
                                                        <b> P.O. Box 286, Dar es Salaam, Tanzania</b>
                                                    </p>
                                                    <p class="card-text colour"
                                                        style="color:#191970; font-size:10px; margin-top: -1em;">
                                                        <b> Tel: +255 22 2120519, Fax: +255 22 2138445 </b>
                                                    </p>
                                                    <p class="card-text colour"
                                                        style=" color:#191970;font-size:10px; margin-top: -1em;">
                                                        <b> E-Mail : info@gymkhana.co.tz </b>
                                                    </p>

                                                </div>

                                            </div>
                                            <div class="col-md-2 border-right-2"
                                                style="padding-left: 0px;background-color: #191970;">
                                                <centre>
                                                    <h3
                                                        style="writing-mode: vertical-lr; padding-top:18px; color:white;">

                                                        REGULAR MEMBERSHIP

                                                    </h3>
                                                </centre>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end front end of card -->
                                    <!-- starting back end of card -->


                                    <!-- end back end of card -->
                                </div>



                            </div>



                            <div class="tab-pane fade" id="home3" role="tabpanel" aria-labelledby="home-tab2">

                                <div class="row" id="printTable" style="padding-top:75px; padding-left:50px;">

                                    <!-- starting back end of card -->

                                    <div class="card mb-3 offset-1"
                                        style="max-width: 115mm; max-height: 300px; border-radius: 7%;">
                                        <div class="col">

                                            <div class="col">
                                                <div class="row "
                                                    style="background-color: #191970; max-width: 500px;max-height: 300px;">
                                                    <h4 class="card-title"
                                                        style="color:white; font-size:15px; padding-left:20px;">
                                                        <b>CLUBS PARTICIPATING IN RECIPROCAL MEMBERSHIP
                                                            SCHEME<b>
                                                    </h4>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-5">
                                                        <br>
                                                        <ol>
                                                            <li style="font-size:8px"><strong>Arusha
                                                                    Gymkhana Club</strong></li>
                                                            <li style="font-size:8px"><strong>Bombay
                                                                    presidency Golf Club</strong></li>
                                                            <li style="font-size:8px"><strong>Kampala
                                                                    Golf Club</strong></li>
                                                            <li style="font-size:8px"><strong>Kibene
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Kitwe Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Lilongwe Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Limuru Country
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Lusaka Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Mombasa Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Mombasa Sports
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Moshi
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Mufindi
                                                                    Club</strong></li>

                                                        </ol>

                                                    </div>

                                                    <div class="col-md-5">
                                                        <br>
                                                        <ol start="13">

                                                            <li style="font-size:8px"><strong>Muthaiga Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Ndola Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Nyali Golf &
                                                                    Country Club</strong></li>
                                                            <li style="font-size:8px"><strong>Parklands
                                                                    Sports Club</strong></li>
                                                            <li style="font-size:8px"><strong>Roan Antelope
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Royal Nairobi
                                                                    Golf</strong></li>
                                                            <li style="font-size:8px"><strong>Sigona Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:7px"><strong>The Des Moines
                                                                    Embassy Club</strong></li>
                                                            <li style="font-size:8px"><strong>The Lusaka
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Uganda Golf
                                                                    Club</strong></li>
                                                            <li style="font-size:8px"><strong>Vet LAb Golf
                                                                    Club</strong></li>

                                                        </ol>

                                                    </div>

                                                    <div class="col-md-2">
                                                        <div style="padding-top: 50px;">
                                                            {!! QrCode::size(50)->generate($card); !!}
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>

                                    <!-- end back end of card -->
                                </div>



                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection



@section('scripts')
<script type="text/javascript">
function printContent(id) {
    str = document.getElementById(id).innerHTML
    newwin = window.open('', 'printwin', 'left=100,top=100,width=400,height=400')
    newwin.document.write('<HTML><HEAD> <link rel=\"stylesheet\" type=\"text/css\" href=\"CSS/style.css\"/>')

    newwin.document.write('<script>\n')
    newwin.document.write('function chkstate(){\n')
    newwin.document.write('if(document.readyState=="complete"){\n')
    newwin.document.write('window.close()\n')
    newwin.document.write('}\n')
    newwin.document.write('else{\n')
    newwin.document.write('setTimeout("chkstate()",2000)\n')
    newwin.document.write('}\n')
    newwin.document.write('}\n')
    newwin.document.write('function print_win(){\n')
    newwin.document.write('window.print();\n')
    newwin.document.write('chkstate();\n')
    newwin.document.write('}\n')
    newwin.document.write('<\/script>\n')
    newwin.document.write('</HEAD>\n')
    newwin.document.write('<BODY onload="print_win()">\n')
    newwin.document.write('')
    newwin.document.write(str)
    newwin.document.write('</BODY>\n')
    newwin.document.write('</HTML>\n')
    newwin.document.close()
}
</script>

<script>
$('.datatable-basic').DataTable({
    autoWidth: false,
    "columnDefs": [{
        "orderable": false,
        "targets": [3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    "language": {
        search: '<span>Filter:</span> _INPUT_',
        searchPlaceholder: 'Type to filter...',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: {
            'first': 'First',
            'last': 'Last',
            'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
            'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
        }
    },

});
</script>




@endsection