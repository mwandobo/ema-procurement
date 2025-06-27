@extends('layout.master')

@push('plugin-styles')
<!-- add some inline style or css file if any -->
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}

</style>
@endpush

@section('content')
<?php

$data = App\Models\Setting::all()->last();

?>
<!-- Main Body Starts -->
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h4><a data-active="" href="{{ url('setting') }}" ><span> Settings</span></a></h4>
                        

                    </div>
                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="bg-light card">
                                            <div class="list-group list-group-flush">

                                                <a href="{{ route('setting.sms') }}"
                                                    class="list-group-item list-group-item-action {{ (request()->is('admin/setting/sms')) ? 'active' : '' }}">{{ __('SMS Setting') }}</a>
                                                <a href="{{ route('setting.email') }}"
                                                    class="list-group-item list-group-item-action {{ (request()->is('admin/setting/email')) ? 'active' : '' }}">{{ __('Email Setting') }}</a>
                                                <a href="{{ route('setting.notification') }}"
                                                    class="list-group-item list-group-item-action {{ (request()->is('admin/setting/notification')) ? 'active' : '' }}">{{ __('Notification Setting') }}</a>
                                                <a href="{{ route('setting.email-template') }}"
                                                    class="list-group-item list-group-item-action {{ (request()->is('admin/setting/emailtemplate')) ? 'active' : '' }}">{{ __('Email Sms Template Setting') }}</a>

                                            </div>
                                        </div>
                                    </div>

                                    @yield('admin.setting.layout')
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

<!-- push external js if any -->
@push('plugin-scripts')
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
@endpush

@push('custom-scripts')
<script>
$(document).on('click', '.edit_role_btn', function() {
    let id = $(this).data('id');
    let name = $(this).data('name');
    let slug = $(this).data('slug');
    console.log("here");
    $('#r-id_').val(id);
    $('#r-slug_').val(slug);
    $('#r-name_').val(name);
    $('#editRoleModal').modal('show');
});
</script>



@endpush