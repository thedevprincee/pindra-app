@extends('user.layout')
@section('title')
    <title>{{__('user.My Profile')}}</title>
@endsection
@section('breadcrum')
  My Profile
@endsection
@section('user-content')
<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
    <div class="pd-20 card-box height-100-p">
      <div class="profile-photo">
        <a
          href="modal"
          data-toggle="modal"
          data-target="#modal"
          class="edit-avatar"
          ><i class="fa fa-pencil"></i
        ></a>
        @if ($user->image)
                      <img src="{{ asset($user->image) }}" alt="img" class="avatar-photo" style="border:1px solid; width:150px; height:150px;">
                      @else
                      <img src="{{ asset($defaultProfile->image) }}" alt="img" class="avatar-photo"  style="border:1px solid; width:150px; height:150px;">
                      @endif
       
        <div
          class="modal fade"
          id="modal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="modalLabel"
          aria-hidden="true"
        >
          <div
            class="modal-dialog modal-dialog-centered"
            role="document"
          >
          <form action="{{ route('user.update-profile-pix') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-body pd-5">
                
                <div class="img-container">
                  @if ($user->image)
                      <img src="{{ asset($user->image) }}" alt="img" class="avatar-photo" style="border:1px solid; width:150px; height:150px;">
                      @else
                      <img src="{{ asset($defaultProfile->image) }}" alt="img" class="avatar-photo"  style="border:1px solid; width:150px; height:150px;">
                      @endif
                      <input type="file" name="image">

                </div>
              </div>
              <div class="modal-footer">
                <input
                  type="submit"
                  value="Update"
                  class="btn btn-primary"
                />
                <button
                  type="button"
                  class="btn btn-default"
                  data-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
      <h5 class="text-center h5 mb-0">{{ $user->name }}</h5>
      <p class="text-center text-muted font-14">
        {{ $user->username }}
      </p>
      <div class="profile-info">
        <h5 class="mb-20 h5 text-blue">Contact Information</h5>
        <ul>
          <li>
            <span>Email Address:</span>
            {{ $user->email }}
          </li>
          <li>
            <span>Phone Number:</span>
            {{ $user->phone }}
          </li>
         
        </ul>
      </div>

    </div>
  </div>
  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
    <div class="card-box height-100-p overflow-hidden">
      <div class="profile-tab height-100-p">
        <div class="profile-setting">
          <form action="{{ route('user.update-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile-edit-list row">
              <div class="weight-500 col-md-12">
                <h4 class="text-blue h5 mb-20">
                  Edit Your Personal Setting
                </h4>
                
                <div class="form-group">
                  <label>Username</label>
                  <input
                    class="form-control form-control-lg"
                    type="text" placeholder="{{__('user.Username')}}" name="username" value="{{ $user->username }}"
                  />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  
                  <input
                    class="form-control form-control-lg"
                    type="email"  name="email" readonly value="{{ $user->email }}" placeholder="{{__('user.email')}}"
                  />
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input
                      class="form-control form-control-lg"
                      type="text"  name="phone" value="{{ $user->phone }}" placeholder="{{__('user.phone')}}"
                    />
                  </div>
                  
                </div>
                <div class="form-group">
                  <label>Gender </label>
                  <div class="d-flex">
                    <div
                      class="custom-control custom-radio mb-5 mr-20"
                    >
                      <input
                        type="radio"
                        id="customRadio4"
                        name="gender"
                        class="custom-control-input"
                        value="Male"
                        {{ $user->gender == 'Male' ? 'checked' : ''}}
                      />
                      <label
                        class="custom-control-label weight-400"
                        for="customRadio4"
                        >Male</label
                      >
                    </div>
                    <div
                      class="custom-control custom-radio mb-5"
                    >
                      <input
                        type="radio"
                        id="customRadio5"
                        name="gender"
                        class="custom-control-input"
                        value="Female"
                        selected
                        {{ $user->gender == 'Female' ? 'checked' : ''}}

                      />
                      <label
                        class="custom-control-label weight-400"
                        for="customRadio5"
                        >Female</label
                      >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Country</label>
                  
                  <select name="country" id="country_id" class="form-control form-control-lg" data-style="btn-outline-secondary btn-lg">
                    <option value="">{{__('user.Select Country')}}</option>
                    @foreach ($countries as $country)
                        <option {{ $country->id == $user->country_id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>

                 
                
                </div>
                <div class="form-group">
                  <label>State</label>
                  <input
                  class="form-control form-control-lg"
                  type="text"  name="state" value="{{ $user->state_id }}" placeholder="{{__('user.state')}}"
                />
                </div>
                
                <div class="form-group">
                  <label>City</label>
                  <input
                  class="form-control form-control-lg"
                  type="text"  name="city" value="{{ $user->city_id }}" placeholder="{{__('user.city')}}"
                />
                </div>

               

                <div class="form-group">
                  <label>Address</label>
                  <textarea rows="3 " class="form-control" name="address" placeholder="{{__('user.Address')}}" >{{ $user->address }}</textarea>
                </div>
                
                <div class="form-group">
                  <label>Postal/Zip Code</label>
                  <input type="text" class="form-control form-control-lg" name="zip_code" value="{{ $user->zip_code }}" placeholder="{{__('user.Zip Code')}}">

                </div>
               
                <div class="col-xl-12">
                  <button class="btn btn-primary" type="submit">{{__('user.Update Profile')}}</button>
                </div>
              </div>
              
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



           
                
              


<script>
    (function($) {
        "use strict";
        $(document).ready(function () {

            $("#country_id").on("change",function(){
                var countryId = $("#country_id").val();
                if(countryId){
                    $.ajax({
                        type:"get",
                        url:"{{url('/user/state-by-country/')}}"+"/"+countryId,
                        success:function(response){
                            $("#state_id").html(response.states);
                            var response= "<option value=''>{{__('user.Select a City')}}</option>";
                            $("#city_id").html(response);
                        },
                        error:function(err){
                            console.log(err);
                        }
                    })
                }else{
                    var response= "<option value=''>{{__('user.Select a State')}}</option>";
                    $("#state_id").html(response);
                    var response= "<option value=''>{{__('user.Select a City')}}</option>";
                    $("#city_id").html(response);
                }

            })

            $("#state_id").on("change",function(){
                var countryId = $("#state_id").val();
                if(countryId){
                    $.ajax({
                        type:"get",
                        url:"{{url('/user/city-by-state/')}}"+"/"+countryId,
                        success:function(response){
                            console.log(response);
                            $("#city_id").html(response.cities);
                        },
                        error:function(err){
                            console.log(err);
                        }
                    })
                }else{
                    var response= "<option value=''>{{__('user.Select a City')}}</option>";
                    $("#city_id").html(response);
                }

            })


        });
    })(jQuery);
</script>
@endsection
