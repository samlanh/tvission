@extends('layout.main')
<?php 
// dd($data);
?>

@section('title')
	<title>The Bee Go {{trans('language.security_user')}}</title>
@stop

@section('style')
	
@stop

@section('content')

	<div class="blank-header-top">
	</div>
	<div class="blank-header">
	</div>
	 <!-- Start About -->
    <section class="auth ptb-40">
      <div class="container">
        <div class="row">
        	<div class="col-md-7 col-xs-12 col-sm-12"> 
        		@php
        		//dd($errors);
        		@endphp
        		@if ($errors->any())
					 @foreach ($errors->all() as $error)
						<div class="alert alert-warning alert-dismissible  show" role="alert">
						  {{ $error }}
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
					 @endforeach
				@endif
        	</div>
        	<div class="col-md-5 col-xs-12 col-sm-12"> 
        		<div class="blog-righ-login mtb-20">
        			<div class="card-box">
			    		 <ul class="tab-menu nav  md-pills pills-primary nav-tab" role="tablist">
				            <li class="nav-item active">
				                <a class="nav-link " data-toggle="tab" href="#sgininPanel" role="tab"><i class="fa fa-sign-in ml-2"></i> {{ trans('language.sign_in') }}</a>
				            </li>
				            <li class="nav-item">
				                <a class="nav-link" data-toggle="tab" href="#sginupPanel" role="tab">
				                <i class="fa fa-user-plus"></i> {{ trans('language.sign_up') }}
				                </a>
				            </li>
				        </ul>
				    </div>
				    <div class="card-box-content">
					    <!-- Tab panels -->
					    <div class="tab-content-vertical">
					        <!--Sign Up Panel-->
					        <div class="tab-content fade in active" id="sgininPanel" role="tabpanel">
					        		<div class="title-form text-center mtb-20">
						        		<h3>{{trans('language.sign_in_your_the_bee')}}</h3>
						        	</div>
					        		{!! Form::open(['url' => '/user/auth-signin','id'=>'signin','class'=>'default-form mt-20 mb-10','method'=>'POST']) !!}
							          <div class="form-group mtb-20">									 
									    <div class="input-group">
					                        <div class="input-group-prepend">
					                          <span class="input-group-text" id="basic-addon3"><i class="fa fa-envelope"></i></span>
					                        </div>
					                         {{Form::email("email", $value = null, $attributes = ['id'=>'email','class' => 'form-control ','placeholder'=>trans('language.enter_email')])}}
					                      </div>
									  </div>
									  <div class="form-group">									  	
											<div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
												</div>
												{{Form::password('password', ['id'=>'password','class' => 'form-control','placeholder'=>trans('language.password')])}}  
										  </div>
									  </div>
									  
									  <div class="form-group text-right">
									  		<a class="forget-password" href="#">{{trans('language.forget_password')}}</a>
									  </div>
									  <div class="form-group text-center">
									  	{{Form::submit(trans('language.sign_in'), ['id'=>'signinbt','class' => 'btn btn-primary btn-the-bee'])}}
									  </div>
									 {!! Form::close() !!}

					        </div>
					        <!--/.Sign Up Panel-->

					        <!--Sign In Panel-->
					        <div class="tab-content fade in" id="sginupPanel" role="tabpanel">
					        	<div class="title-form text-center mtb-20">
					        		<h3>{{trans('language.sign_up_now')}}</h3>
					        	</div>

					        	{!! Form::open(['url' => '/user/auth-signup','id'=>'signup','class'=>'default-form mt-20 mb-10','method'=>'POST']) !!}
							          <div class="form-group mtb-20">									 
									    <div class="input-group">
					                        <div class="input-group-prepend">
					                          <span class="input-group-text" id="basic-addon3"><i class="fa fa-envelope"></i></span>
					                        </div>
					                         {{Form::email("email", $value = null, $attributes = ['id'=>'n_email','class' => 'form-control ','placeholder'=>trans('language.enter_email')])}}
					                      </div>
									  </div>
									  <div class="form-group">
									  		<div class="input-group form-tel">
										 	 	<input id="phone" name="phone_number" value="{{$value = null}}" required="required" type="tel">
										 	 	
										 	 </div>
									  </div>
									  <div class="form-group">									  	
											<div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
												</div>
												{{Form::password('password', ['id'=>'n_password','class' => 'form-control','placeholder'=>trans('language.password')])}}  
										  </div>
									  </div>
									  <div class="form-group">									  	
											<div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
												</div>
												{{Form::password('password_confirmation', ['id'=>'confirm_password','class' => 'form-control','placeholder'=>trans('language.comfirm_password')])}}  
										  </div>
									  </div>
									  <div class="form-group text-center">
									  	{{Form::submit(trans('language.sign_up'), ['id'=>'signupbt','class' => 'btn btn-primary btn-the-bee'])}}
									  </div>
									 {!! Form::close() !!}
					        </div>
					        <!--/.Sign In Panel-->
					     </div>
					     <!--/. Tab panels -->
					 </div>
		          
				 </div>
			</div>
        </div>
      </div>
    </section>
    <!-- End About -->
	
	
@stop

@section('script')
<link rel="stylesheet" href="{{ asset('assets/js/int-phone/css/intlTelInput.css') }}">
<script src="{{ asset('assets/js/int-phone/intlTelInput.js') }}"></script>

 <script>
  	
	    $("#phone").intlTelInput({
	       geoIpLookup: function(callback) {
	         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
	           var countryCode = (resp && resp.country) ? resp.country : "";
	           callback(countryCode);
	         });
	       },
	      initialCountry: "auto",
	      utilsScript: "{{ asset('assets/js/int-phone/utils.js') }}"
	    });
	      $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
                

            });
   
  </script>
@stop
