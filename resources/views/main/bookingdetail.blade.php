@extends('layout.main')
@php
	$total = $data->price - $data->discount;
@endphp

@section('title')
	<title>The Bee Go</title>
@stop

@section('style')
	 <link href="{{ asset('assets/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
	 <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@stop

@section('content')

	<div class="blank-header-top">
	</div>
	<div class="blank-header">
	</div>
	 <!-- Start About -->
    <section class="booking-detail ptb-40">
      <div class="container">
        <div class="row">

        	<div class="col-md-7 col-xs-12 col-sm-12"> 
        		{!! Form::open(['url' => 'booking/request','id'=>'bookingrequest','class'=>'default-form mt-20 mb-10','method'=>'POST']) !!}
        		<div class="passenger-detail border-gradient-to-top pb-40 pr-20 pl-20 ">
					<div class="passenger-detail-content">
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
						
						<div class="blog-title border-bottom pb-10">
	        				<h3 class="title-blog upercase"><span class="panel-step-num">1</span>{{ trans('language.transfer_detail') }}</h3>
	        			</div>				
						 
						 <div class="form-group mtb-5">
						 	<div class="col-md-7 col-xs-12 col-sm-12"> 
							 	{{ Form::label('pickup_pointer', trans('language.pickup_pointer'), array('class' => 'label_form_detail'))}} <span class="required">*</span>
							 	 {{Form::text("pickup_poiter",null, $attributes = ['id'=>'pickup_poiter','class' => 'form-control ','required'=>'required','placeholder'=>trans('language.pickup_pointer')])}}
						 	</div>
						 	<div class="col-md-5 col-xs-12 col-sm-12"> 
						 		{{ Form::label('time_picker', trans('language.time_picker'), array('class' => 'label_form_detail'))}} <span class="required">*</span>
						 		<div class='input-group date' id='datetimepicker3'>
				                    <input id="time_picker" value="{{$value = null}}" name="time_picker" type='text' class="form-control datetimepick" required='required' onkeydown="return false" />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-time"></span>
				                    </span>
				                </div>
						 	</div>
						 	<div class="clearfix"></div>						 	
						 </div>
						
						 <div class="form-group mtb-5">
						 	<div class="col-md-12 col-xs-12 col-sm-12">
						 		{{ Form::label('note', trans('language.note'), array('class' => 'label_form_detail'))}} 
						 	 {{Form::text("note", $value = null, $attributes = ['id'=>'note','class' => 'form-control ','placeholder'=>trans('language.note')])}}
						 	</div>
						 	<div class="clearfix"></div>						 	
						 </div>
						 <div class="form-group mtb-5">
						 		<div class="col-md-12 col-xs-12 col-sm-12">
						 			{{ Form::label('fly_number', trans('language.fly_number'), array('class' => 'label_form_detail'))}}
						 	 {{Form::text("fly_number", $value = null, $attributes = ['id'=>'note','class' => 'form-control ','placeholder'=>trans('language.fly_number')])}}
						 		</div>	
						 		<div class="clearfix"></div>					  	
						 </div>

						<div class="blog-title border-bottom pb-10">
	        				<h3 class="title-blog upercase">{{ trans('language.passenger_detail') }}</h3>
	        			</div>
	        			<div class="form-group mtb-5">
	        				<div class="col-md-12 col-xs-12 col-sm-12">
						 	 {{ Form::label('fullname', trans('language.full_name'), array('class' => 'label_form_detail'))}}<span class="required">*</span>
						 	 {{Form::text("fullname", $value = null, $attributes = ['id'=>'fullname','class' => 'form-control ','placeholder'=>trans('language.full_name')])}}
						 	</div>
						 </div>
						 <div class="form-group mtb-5">
						 	<div class="col-md-6 col-xs-12 col-sm-12"> 
						 		{{ Form::label('age', trans('language.age'), array('class' => 'label_form_detail'))}}
						 	 	{{Form::number("age", $value = null, $attributes = ['id'=>'age','class' => 'form-control ','min'=>'1','max'=>'100','placeholder'=>trans('language.age')])}}
						 	</div>
						 	<div class="col-md-6 col-xs-12 col-sm-12"> 
						 		{{ Form::label('number_passenger', trans('language.number_passenger'), array('class' => 'label_form_detail'))}}
						 	 	{{Form::number("number_passenger", $value = null, $attributes = ['id'=>'number_passenger','class' => 'form-control ','min'=>'1','max'=>'100','placeholder'=>trans('language.number_passenger')])}}
						 	 	{{ Form::hidden('taxi_price', $data->price, array('id' => 'taxi_price') ) }}
						 	 	{{ Form::hidden('dicount', $data->discount,array('id' => 'discount')) }}
						 	 	{{ Form::hidden('total_booking', $total,array('id' => 'total_booking')) }}
						 	 	{{ Form::hidden('from_location', $data->from_location,array('id' => 'from_location')) }}
						 	 	{{ Form::hidden('tolocation', $data->to_location,array('id' => 'tolocation')) }}
						 	 	{{ Form::hidden('supplyerId', $data->supplyerId,array('id' => 'supplyerId')) }}
						 	 	{{ Form::hidden('vehicleTypeId', $data->vehicleTypeId,array('id' => 'vehicleTypeId')) }}
						 	 	{{ Form::hidden('pickupDate', date("Y-m-d",strtotime($bookingdate)),array('id' => 'vehicleTypeId')) }}
						 	</div>
						 	 <div class="clearfix"></div>
						 </div>
						
	        			<div class="form-group mtb-5">
	        				<div class="col-md-6 col-xs-12 col-sm-12"> 
	        					{{ Form::label('phone_number', trans('language.phone_number'), array( 'class' => 'label_form_detail','required'=>'required'))}}<span class="required">*</span>	        				
		        				<div class="form-tel">
							 	 	<input id="phone" name="phone_number" value="{{$value = null}}" required="required" type="tel">
							 	 </div>
	        				</div>
	        				<div class="col-md-6 col-xs-12 col-sm-12"> 
	        					{{ Form::label('email', trans('language.email'), array('class' => 'label_form_detail'))}}<span class="required">*</span>								 
							    <div class="input-group">
			                        <div class="input-group-prepend">
			                          <span class="input-group-text" id="basic-addon3"><i class="fa fa-envelope"></i></span>
			                        </div>
			                         {{Form::email("email", $value = null, $attributes = ['id'=>'email','class' => 'form-control ','required'=>'required','placeholder'=>trans('language.enter_email')])}}
			                     </div>
	        				</div>
	        				<div class="clearfix"></div>
						 </div>
	        			<div class="blog-title border-bottom pb-10">
	        				<h3 class="title-blog upercase">{{ trans('language.billing_detail') }}</h3>
	        			</div>
	        			 <div class="form-group mb-20">
	        			 	<div class="col-md-6 col-xs-12 col-sm-12">
	        			 	 {{ Form::label('billing_address', trans('language.billing_address'), array('class' => 'label_form_detail'))}}
						 	 {{Form::text("billing_address", $value = null, $attributes = ['id'=>'note','class' => 'form-control ','placeholder'=>trans('language.billing_address')])}}
						 	</div>
						 	<div class="col-md-6 col-xs-12 col-sm-12">
						 		 {{ Form::label('billing_name', trans('language.billing_name'), array('class' => 'label_form_detail'))}}
						 	 {{Form::text("billing_name", $value = null, $attributes = ['id'=>'note','class' => 'form-control ','placeholder'=>trans('language.billing_name')])}}
						 	</div>
						 	<div class="clearfix"></div>
						 </div>
						<div class="form-group mb-0">
							<div class="col-md-12 col-xs-12 col-sm-12 text-left">
						 	{{ Form::checkbox('agree_term','no',null,$attributes = ["id"=>"agree_term","class"=>"check-box-agree"]) }}
						 	<span class="descrip-condiction">{{ trans('language.i_have_read_and_agree') }} <a class="go-to-term" href="#">{{ trans('language.term_and_condition') }}</a> {{ trans('language.of') }} <strong>The Bee Go</strong>. </span>
						 	</div>
						 	<div class="clearfix"></div>
						 </div>
						 <div class="form-group mb-0">
							<div class="col-md-12 col-xs-12 col-sm-12 text-left">
						 	{{ Form::checkbox('agree_direction','no',null,$attributes = ["id"=>"agree_direction","class"=>"check-box-agree"]) }}
						 	<span class="descrip-condiction">{{ trans('language.i_comfirm_direction') }} : <strong>{{ $data->fromLocation }}</strong> {{ trans('language.to') }} <strong>{{ $data->toLocation }} </strong> </span>
						 	</div>
						 	<div class="clearfix"></div>
						 </div>
						 <div class="form-group mb-20">
							<div class="col-md-12 col-xs-12 col-sm-12 text-left">
						 	{{ Form::checkbox('agree_direction','no',null,$attributes = ["id"=>"agree_direction","class"=>"check-box-agree"]) }}
						 	<span class="descrip-condiction">{{ trans('language.i_comfirm_departure_datetime') }} <strong>{{ date("M d Y",strtotime($bookingdate)) }}</strong> </span>
						 	</div>
						 	<div class="clearfix"></div>
						 </div>
						 <div class="form-group mb-20">
						 	<div class="col-md-12 col-xs-12 col-sm-12 text-center">
						 		{{Form::submit(trans('language.comfirm'), ['id'=>'comfirm','class' => 'btn btn-primary btn-the-bee'])}}
						 	</div>
						 	<div class="clearfix"></div>
						 </div>
					</div>
        		</div>
        		{!! Form::close() !!}
        	</div>
        	<div class="col-md-5 col-xs-12 col-sm-12 right-blog-summary"> 
        		<div id="blog-summary" class="summary-booking-blog mtb-10 pr-10 pl-10 pt-10 pb-10">
        			<div class="blog-title  pb-10">
        				<h3 class="title-blog">{{ trans('language.summary') }}</h3>
        			</div>
        			<div class="content-summary">
        				<ul class="booking-summarry">
        					<li>
        						<span class="sum-title">{{ trans('language.vihecle_type') }}</span> : <span class="sum-value">{{ $data->vehicleType }}</span>
        					</li>
							<li>
        						<span class="sum-title">{{ trans('language.direction') }}</span> : <span class="sum-value">{{ $data->fromLocation }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $data->toLocation }}</span>
        					</li>
        					<li>
        						<span class="sum-title">{{ trans('language.departure') }}</span> : <span class="sum-value">{{ date("M d Y",strtotime($bookingdate)) }}</span>
        					</li>
        				</ul>
        				<div class="blog-cost">
        					<h3>{{ trans('language.transfer_cost') }}</h3>

        					<div class="price-individual">
        						<div class="price-row">
        							<span class="price-title">{{ trans('language.vehicle') }}</span> <span class="price-view">USD {{ number_format($data->price,2) }}</span>
        						</div>
        						<div class="price-row">
        							<span class="price-title">{{ trans('language.discount') }}</span> <span class="price-view">USD {{ number_format($data->discount,2) }}</span>
        						</div>
        					</div>
        					
        					<div class="price-total">
        						<div class="price-row">
        							<span class="price-title bold">{{ trans('language.total') }}</span> <span class="price-view">USD {{ number_format($total, 2) }} </span>
        						</div>
        					</div>
        				</div>

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


<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/js/collapse.js') }}"></script>
<script src="{{ asset('assets/js/transition.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
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
