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
                                <a class="btn btn-info" href="{{route('print.front',$id)}}">Print Front</a>
                                <a class="btn btn-info" href="{{route('print.back',$id)}}">Print Back</a>
                            </li>

                        </ul>
                     
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection



@section('scripts')


@endsection