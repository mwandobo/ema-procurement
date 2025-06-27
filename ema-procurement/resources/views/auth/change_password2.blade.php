@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
      
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Change password</h4>
                    </div>
                    <div class="card-body">

                    <div class="panel-body">
                      
                      <form class="form-horizontal" method="POST" action="{{ route('member_change_password_updates') }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" class="form-control" name="member_id" value="{{$id}}" required>

                        <div class="form-group row{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-2 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password-confirm" class="col-md-2 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
                        
                        

                        <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            type="submit" id="save">Change Password</button>
                                                      
                                                    </div>
                                                </div>
                    </form>
                </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection