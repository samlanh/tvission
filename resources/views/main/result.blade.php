@extends('layout.main')
@php
//dd($data);


$pickupDate = date("m/d/Y");
if(app('request')->has('on_date')){
	$pickupDate = date("m/d/Y",strtotime(app('request')->input('on_date')));
}
$urlFromBack = Config::get('constants.myConstant.weburlpart');
@endphp

@section('title')
	<title>{{trans('language.transfer_from')}} {{app('request')->input('from')}} {{trans('language.to')}} {{app('request')->input('to')}}	</title>
@stop

@section('style')
	
@stop

@section('content')
	@include('layout.search')
    <section class="vehicle-list">
      <div class="container">
        <div class="row">
              
          <!-- Start Fleet-Listing -->
          <div class="col-lg-12">
            <div class="fleet-listing">

              <!-- Start Fleet-List -->

				@foreach ($data as $vehicle)
                <div class="vechicle-list">
                  <div class="col-md-2 col-xs-12 col-sm-12  bus thumb">
                    <div class="overlay">
                      <img src="@php 
                 echo $vehicle->attributes->operator_logo->medium;
                  @endphp" />
                    </div>
                    <h4 class="operator_name">
                    	
                    	{{$vehicle->attributes->operator_name}}
                    </h4>
                  </div>	                  
                  <div class="col-md-7 col-xs-12 col-sm-12 content fleet-vechicle-content">
                   
                    <div class="col-lg-12">
                    	<div class="col-md-6 col-xs-12 col-sm-12 text-left">
                    		<p><span class="lb-title">Departure</span>  <span class="value">{{$vehicle->attributes->origin_name}}</span></p>
                    	
                    	</div>
                    	<div class="col-md-6 col-xs-12 col-sm-12 text-right">
                    		<p>
                    			<span class="lb-title">ARRIVAL</span> <span class="value">{{$vehicle->attributes->destination_name}}</span></p>
                    	
                    	</div>
                    </div>
                    <div class="col-lg-12 vehicle-content">
                    	<div class="col-md-4 col-xs-12 col-sm-12 departure-boder-right">
                    		<h4 class="time-departure-arrive">
                         
                            @php 
                              echo date("h:i a",$vehicle->attributes->departure);
                            @endphp
                        </h4>
                    	</div>
                    	<div class="col-md-4 col-xs-12 col-sm-12">
                    		<div  class="travle-info">
                                <div class="text-center">
                                	<span class="title-duration"><div>3H 00</div></span>
                                </div>
					                <div class="border-duration-search"></div>
					                <div class="round-box"></div>
                             </div>
                    	</div>
                    	<div class="col-md-4 col-xs-12 col-sm-12 departure-boder-left">
                    		
                    		<h4 class="time-departure-arrive">
                          
                            @php 
                              echo date("h:i a",$vehicle->attributes->arrival);
                            @endphp
                        </h4>
                    	</div>
                    </div>
                    <div class="col-lg-12">
                    		<div class="vehicle-set">
                    			<img src="{{ asset('assets/img/car-set.png') }}" /> 
                    			<span class="title-seat-avaible">Seat Available : </span>
                    			<span class="label-seat-avaible">{{$vehicle->attributes->availability}}</span>
                    		</div>
						
					</div>
                  </div>
				  <div class="col-md-3 col-xs-12 col-sm-12 text-center  blog-price">
              <div class="col-md-6">
                <div class="hidden-xs hidden-sm">
                  <span class="vehicle-type">
                   {{$vehicle->attributes->vehicle_type_name}}
                  </span>                
                </div>
              </div>
              <div class="col-md-6 text-right" style="padding-left: 0;">
                 
              </div>
               <div class="clearfix"></div>     
            @php
              $amenities = $vehicle->attributes->amenities;
              
            @endphp
						  <div class="col-md-12 layout-amenity hidden-xs hidden-sm">
                @foreach($amenities as $rs)
                  <span class="amenity amenity-{{ $rs }}" title="{{ $rs }}"></span>
                @endforeach                  
              </div>
              <div class="clearfix"></div>     
						<div class="row-button">
							<a class="btn light book-btn" href="{{ url('/ticket/select_seat?on_date='.urlencode($pickupDate).'&route_schedule_vehicle_id='.$vehicle->id) }}">{{ trans('language.book_now') }}</a>
							
						</div>
					</div>
				 
				  <div class="clearfix"></div>                 
                </div>
				 @endforeach

               
				
              <!-- End Fleet-List -->

              <!-- Start Fleets-Listing-Footer 
              <div class="listing-footer clearfix">
                <ul class="custom-list vechicle-listing-pagination pull-right">
                  <li class="prev"><a href="#">Previous</a></li>
                  <li class="number"><a href="#" class="active">1</a></li>
                  <li class="number"><a href="#">2</a></li>
                  <li class="number"><a href="#">3</a></li>
                  <li class="number"><a href="#">4</a></li>
                  <li class="next"><a href="#">Next</a></li>  
                </ul>
              </div>-->
              <!-- End Fleets-Listing-Footer -->

            </div>
          </div>
          <!-- End Section Fleet Listing -->

        </div>
      </div>
    </section>
    <!-- End Section Fleets -->
	
@stop

@section('script')
@stop
