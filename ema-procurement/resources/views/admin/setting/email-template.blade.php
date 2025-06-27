@extends('admin.setting.index')

@section('admin.setting.layout')
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('setting.email-template-update') }}">
                     @csrf
                     <?php

$data = App\Models\Setting::all()->last();

?>
                     <fieldset class="setting-fieldset">
                        <legend class="setting-legend">{{ __('Email SMS Template Setting') }}</legend>
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group">
                                     <label for="comment">{{__('Notifications Templates')}}</label>
                                     <textarea class="summernote" name="notify_templates" id="summernote">{{ old('notify_templates',$data->notify_templates) }}</textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="comment">{{__('Invite Templates')}}</label>
                                     <textarea class="summernote" name="invite_templates" id="summernote">{{ old('invite_templates',$data->invite_templates) }}</textarea>
                                 </div>
                             </div>
                         </div>
                    </fieldset>
                     <div class="row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <span>{{ __('Update') }}</span>
                            </button>
                        </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
@endsection
