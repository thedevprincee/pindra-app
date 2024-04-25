@extends('user.layout')
@section('title')
    <title>{{__('user.Change Password')}}</title>
@endsection

@section('breadcrum')
  Change Password
@endsection

@section('user-content')
<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
       
            <form action="{{ route('user.update-password') }}" method="POST">
            @csrf   
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input
                              class="form-control form-control-lg"
                              type="password" name="current_password" placeholder="{{__('user.Current Password')}}" />
                        </div>
                        
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <div class="form-group">
                            <label>New Password</label>
                            <input
                              class="form-control form-control-lg"
                              type="password" name="password" placeholder="{{__('user.New Password')}}" />
                        </div>
                        
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input
                              class="form-control form-control-lg"
                              type="password" name="password_confirmation" placeholder="{{__('user.Confirm Password')}}" />
                        </div>
                        
                    </div>
                    
                   
                    <div class="col-xl-12">
                    <button class="btn btn-primary"  type="submit">{{__('user.Update Password')}}</button>
                    </div>
                </div>
               
            </form>
        </div>
    </div>
</div>
@endsection
