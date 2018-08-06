@extends('layout.main')


@php
$pickupDate = date("m/d/Y",strtotime("+1 day"));
if(app('request')->has('on_date')){
	$pickupDate = date("m/d/Y",strtotime(app('request')->input('on_date')));
	if($pickupDate < date("m/d/Y")){
		$pickupDate = date("m/d/Y",strtotime("+1 day"));
	}
}


@endphp

@section('style')
<style type="text/css">

</style>
@stop

@section('content')
<section class="booking-detail ptb-40">
      <div class="container">
        <div class="row">
        	
        	<div class="col-md-7 col-xs-12 col-sm-12"> 
        		<div class="passenger-detail border-gradient-to-top pb-40 pr-20 pl-20 ">
					<div class="passenger-detail-content">
						<div class="blog-title border-bottom pb-10">
	        				<h3 class="title-blog upercase"><span class="panel-step-num">1</span>{{ trans('language.transfer_detail') }}</h3>
	        			</div>
	        			{!! Form::open(['url' => '/tickets/ticket_cart','id'=>'private_taxi','class'=>'default-form','method'=>'POST']) !!}
	        			<div class="tab-contents" id="selected-seat-tab">
	        				<div class="title-step mt-10">
	        					<h4>1. {{ trans('language.seat_selection') }}</h4>
	        				</div>
						  <div class="tab-pane fade  active" id="content-tap1" role="tabpanel" aria-labelledby="home-tab">
						  		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				                    <div class="vehicle-seat">
				                    	<input type="hidden" id="routeScheduleVehicleId" name="routeScheduleVehicleId" class="form-control" readonly="true" value="{{$seat->id}}">
				                    	<input type="hidden" id="operator_id" name="operator_id" class="form-control" readonly="true" value="@php echo $data->attributes->operator->id @endphp">
				                    	<input type="hidden" id="departuredate" name="departuredate" class="form-control" readonly="true" value="@php echo $pickupDate @endphp">
<input type="hidden" id="operator_id" name="operator_id" class="form-control" readonly="true" value="@php echo $data->attributes->route_schedule->departure @endphp">

				                    	@php
				                    	$coloumseat = $seat->attributes->vehicle_type->column;
				                    	$rowseat = $seat->attributes->vehicle_type->row;
				                    	$totlaseat = $coloumseat * $rowseat;
				                    	$layout = $seat->attributes->vehicle_type->layouts;

				                    	$carseat = $seat->attributes->seats;
				       
				                    	$row=1;
				                    	$col=1;
				                    	for($i=1; $i<=$totlaseat; $i++){	

				                    	@endphp
				                    		@if(empty($layout[$i]))
				                    		<div class="seat-logo-blank" >
												<div class="seat "></div>
											</div>
				                    		@elseif($layout[$i]==0)
											<div class="seat-logo-blank" >
												<div class="seat "></div>
											</div>
											@elseif($layout[$i]==1)

												@foreach($carseat as $seats)

													@if($seats->position==$i)
													<div class="seat-logo"  >
														<div id="rvc-{{$seat->id}}-{{$seats->label}}" class="seat {{$seats->status}}-seat">
															@if($seats->status=="available")
															<input class="chkSeat" type="checkbox" name="chkSeat" id="@php 
		echo $seats->id;
															@endphp" value="{{$seats->label}}" data-row="{{$row}}" data-column="{{$col}}">
															@endif
														</div><span>{{$seats->label}}</span>
													</div>
													@endif
												@endforeach
											@endif

											@php $col++; @endphp
											@if($coloumseat==$i)
											<div class="clearfix"></div>
											@php $coloumseat = $coloumseat +4; $row=$row+1; $col=1;	@endphp
											@endif
								
				                    	@php
				                    	}
				                    	@endphp
										<div class="clearfix"></div>
				                    	<div class="guide-note mtb-10">
				                    		<div class="seat-logo">
												<div class="seat available-seat"></div>
												<span>{{ trans('language.available') }}</span>
											</div>
											<div class="seat-logo">
												<div class="seat busy-seat"></div>
												<span>{{ trans('language.busy') }}</span>
											</div>
											<div class="seat-logo">
												<div class="seat booked-seat"></div>
												<span>{{ trans('language.booked') }}</span>
											</div>
											<div class="seat-logo">
												<div class="seat selected-seat"></div>
												<span>{{ trans('language.selected') }}</span>
											</div>
											<div class="clearfix"></div>
				                    	</div>

				                   </div>
			                	</div>
			                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			                		<div class="form-group">
					                  <label for="txtSelectedSeat">{{ trans('language.selected_seat') }}</label>
					                  <input type="text" id="txtSelectedSeat" name="txtSelectedSeat" class="form-control" readonly="true">
					                </div>
					                <div class="form-group">
					                  <label for="txtTotalPrice">{{ trans('language.total_seat') }}</label>
					                  <input type="text" id="txtTotalSeats" name="txtTotalSeats" class="form-control" readonly="true" value="0">
					                </div>
			                	</div>
			                	<div class="clearfix"></div>	
			                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 action-group text-right">
			                		
			                		  <input type="button" id="home-tab" class="form-control-inline btn btn-success pull-right" value="{{ trans('language.next') }}" data-toggle="tab" data-parent="#content-tap2" data-target="#content-tap2">
					              
					            </div>
					            <div class="clearfix"></div>
						  </div>
						  <div class="title-step  mt-10">
	        					<h4>2. {{ trans('language.passengers_detail') }}</h4>
	        			  </div>
						  <div class="tab-pane fade" id="content-tap2" role="tabpanel" aria-labelledby="contact-tab">
						  		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
			                    	<div class="head-title">
			                    		<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
			                    			<lable class="head-lable">#</lable>
			                    		</div>
			                    		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			                    			<lable class="head-lable">{{ trans('language.seat') }}</lable>
			                    		</div>
			                    		
			                    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                    			<lable class="head-lable">{{ trans('language.full_name') }}</lable>
			                    		</div>
			                    		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			                    			<lable class="head-lable">{{ trans('language.gender') }}</lable>
			                    		</div>
			                    		<div class="clearfix"></div>
			                    	</div>
			                    	<div id="seat-row-info" class="row-seat-info">
			                    		
			                    	</div>
				                   	<div class="clearfix"></div>

				                   	<div class="form-external">
				                   		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
				                   			{{Form::email("email", $value = null, $attributes = ['id'=>'email','class' => 'form-control ','required'=>'required','placeholder'=>trans('language.enter_email')])}}
				                   		</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
											<div class="form-tel">
										 	 	<input id="phone" name="phone_number" value="" required="required" type="tel">
										 	 </div>
				                   		</div>
				                   		<div class="clearfix"></div>
				                   	</div>
			                    </div>
			                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 action-group text-right">
			                		<input type="button" id="btnBack1" class="form-control-inline btn btn-default collapsed" value="{{ trans('language.back') }}" data-toggle="tab" data-parent="#content-tap1" data-target="#content-tap1" >
			                		  <input type="submit" id="home-tab" class="form-control-inline btn btn-success pull-right" value="{{ trans('language.next') }}" >
					              
					            </div>
					            <div class="clearfix"></div>
				                    
					  		</div>
					  	</div>		
					  	{!! Form::close() !!}		  
					</div>
			        <div class="clearfix"></div>				
				</div>
        	</div>
        	<div class="col-md-5 col-xs-12 col-sm-12 right-blog-summary"> 
        		<div id="blog-summary" class="summary-booking-blog mtb-10 pr-10 pl-10 pt-10 pb-10">
        			<div class="blog-title  pb-10">
        				<h3 class="title-blog">{{ trans('language.summary') }}</h3>
        			</div>

        			<div class="content-summary">
        				<ul class="booking-summarry">
        					<li>
        						<span class="sum-title">{{ trans('language.vihecle_type') }}</span> : <span class="sum-value">
        							@php
        								echo $data->attributes->vehicle->name;
        							@endphp
<input type="hidden" id="price_foreigner" name="price_foreigner" class="form-control" readonly="true" value="@php echo $data->attributes->route_schedule_vehicle->price_foreigner @endphp">
<input type="hidden" id="price_local" name="price_local" class="form-control" readonly="true" value="@php echo $data->attributes->route_schedule_vehicle->price_local @endphp">
        						</span>
        					</li>
							<li>
        						<span class="sum-title">{{ trans('language.direction') }}</span> : <span class="sum-value">
        							@php 
        							echo $data->attributes->route->origin->name;
        							@endphp 
        							<i class="fa fa-long-arrow-right" aria-hidden="true"></i> 
        							@php 
        							echo $data->attributes->route->destination->name;
        							@endphp 
        						</span>
        					</li>
        					<li>
        						<span class="sum-title">{{ trans('language.departure') }}</span> : <span class="sum-value">
        							@php
        								echo date("M d,Y",strtotime($pickupDate))." ".date("h:i a",$data->attributes->route_schedule->departure);
        							@endphp
        						</span>
        					</li>
        					<li>
        						<span class="sum-title">{{ trans('language.number_passenger') }}</span> : <span id="passengers" class="sum-value">
        							       							
        						</span>
        					</li>
        				</ul>
        				<div class="blog-cost">
        					<h3>{{ trans('language.transfer_cost') }}</h3>

        					<div class="price-individual">
        						<div class="price-row">
        							<span class="price-title">{{ trans('language.subtotal') }}</span> <span id="lbsubtotal" class="price-view"></span>
        						</div>
        						<div class="price-row">
        							<span class="price-title">{{ trans('language.discount') }}</span> <span id="discountlb" class="price-view"></span>
        						</div>
        					</div>
        					
        					<div class="price-total">
        						<div class="price-row">
        							<span class="price-title bold">{{ trans('language.total') }}</span> <span id="lbg-total" class="price-view"> </span>
        						</div>
        					</div>
        				</div>
        		</div>


        	</div>

        </div>
     </div>
</section>
@stop


@section('script')
<link rel="stylesheet" href="{{ asset('assets/js/int-phone/css/intlTelInput.css') }}">
<script src="{{ asset('assets/js/int-phone/intlTelInput.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {		
		$('.chkSeat').change(function() {
			var checkedvalue="";
			 $('.chkSeat:checkbox:checked').each(function(i){
			 	if(checkedvalue==""){
			 		checkedvalue = $(this).val();
			 	}else{
			 		checkedvalue = checkedvalue+","+$(this).val();
			 	}
	     	});
			var routeVehicle = $("#routeScheduleVehicleId").val();
			var rowinfo="";
			var seatRowInfo=1;
			 $('.chkSeat:checkbox').each(function() { //loop through each checkbox
		            if(this.checked ==true){
		            	$( "#rvc-"+routeVehicle+"-"+$(this).val() ).removeClass("available-seat");
						$( "#rvc-"+routeVehicle+"-"+$(this).val() ).addClass("selected-seat");

						rowinfo+='<div class="seat-value">';
							rowinfo+='<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">';
								rowinfo+='<lable class="head-lable">'+seatRowInfo+'</lable>';
							rowinfo+='</div>';
							rowinfo+='<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">';
								rowinfo+='<lable class="head-lable">'+$(this).val()+'</lable>';
								rowinfo+='<input type="hidden" id="txtSeatId'+seatRowInfo+'" name="txtSeatId'+seatRowInfo+'" value="'+this.id+'">';
								rowinfo+='<input type="hidden" id="is_local'+seatRowInfo+'" name="is_local'+seatRowInfo+'" value="0">';
							rowinfo+='</div>';
							
							rowinfo+='<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
								rowinfo+='<input type="text" id="txtName'+seatRowInfo+'" name="txtName'+seatRowInfo+'" class="form-control myform" placeholder="Full Name">';
									rowinfo+='<label id="name-error'+seatRowInfo+'" class="error text-warning myerror"></label>';
							rowinfo+='</div>';
							rowinfo+='<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">';
								rowinfo+='<select id="cboGender'+seatRowInfo+'" name="cboGender'+seatRowInfo+'" class="form-control myform">';
									rowinfo+='<option value="">Gender</option>';
									rowinfo+='<option value="Male">Male</option>';
									rowinfo+='<option value="Female">Female</option>';
								rowinfo+='</select>';
							rowinfo+='</div><div class="clearfix"></div>';
						rowinfo+='</div>';
						seatRowInfo++;
		            }else{
		            	$( "#rvc-"+routeVehicle+"-"+$(this).val() ).addClass("available-seat");
						$( "#rvc-"+routeVehicle+"-"+$(this).val() ).removeClass("selected-seat");
		            }


				});
			 $( "#seat-row-info" ).html( rowinfo );
			// $( "div.second" ).replaceWith( rowinfo );
			  $("#txtSelectedSeat").val(checkedvalue);
			  $("#txtTotalSeats").val($('.chkSeat:checkbox:checked').length);
			   $("#passengers").html($('.chkSeat:checkbox:checked').length);
			var price_foreigner=$("#price_foreigner").val();
			var subtotal = $('.chkSeat:checkbox:checked').length * price_foreigner;
			$("#lbsubtotal").html(subtotal);
			$("#discountlb").html(0);
			$("#lbg-total").html(subtotal);

		});


    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
$("#phone").intlTelInput({
	       geoIpLookup: function(callback) {
	         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
	           var countryCode = (resp && resp.country) ? resp.country : "";
	           callback(countryCode);
	         });
	       },
	       initialCountry: 'kh'
	    });
	      
</script>
@stop