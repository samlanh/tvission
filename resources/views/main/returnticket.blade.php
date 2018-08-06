@extends('layout.main')


@php

$ticket = json_decode($ticketsResult)->data;
$payment = json_decode($paymentResult)->data;
//dd($payment);
//echo $ticket->attributes->ticket_order_number;exit();
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
                    @php 
                     if($payment->attributes->status_code==0){
                    @endphp
					<div class="passenger-detail-content">
						<div class="blog-title border-bottom pb-10">
	        				<h3 class="title-blog upercase">{{ trans('language.booking_complete') }}</h3>
	        			</div>
                      

                        <div class="col-xs-12">
                          <div class="row">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title"><strong>This link below your Electronic Tiket</strong></h3>
                              </div>
                              <div class="panel-body">
                                    <div class="form-group">                                       
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon3"><i class="fa fa-key"></i></span>
                                                </div>
                                                <input class="form-control" type="text" name="ticketlink" value="{{ $ticket->attributes->ticket_pdf }}" >
                                          </div>
                                      </div>
                              </div>
                            </div>
                          </div>
                        </div>                
					</div>
                     @php 
                     }else if($payment->attributes->status_code==1){
                    @endphp
                    <div class="passenger-detail-content">
                        <div class="blog-title border-bottom pb-10">
                            <h3 class="title-blog upercase">{{ trans('language.booking_complete') }}</h3>
                        </div>
                      

                        <div class="col-xs-12">
                          <div class="row">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title"><strong>Your Booking is failed</strong></h3>
                              </div>
                                <div class="panel-content">
                                        <p>Your account not enough credit to process payment.</p>
                                        <p>Please Refill your balance</p>
                                 </div>
                            </div>
                          </div>
                        </div>                
                    </div>
                     @php 
                     }
                    @endphp
			        <div class="clearfix"></div>				
				</div>
        	</div>
        	<div class="col-md-5 col-xs-12 col-sm-12 right-blog-summary"> 
        		<div id="blog-summary" class="summary-booking-blog mtb-10 pr-10 pl-10 pt-10 pb-10">
        			<div class="blog-title  pb-10">
        				<h3 class="title-blog">{{ trans('language.summary_booking') }}</h3>
        			</div>

        			<div class="content-summary">
        				<ul class="booking-summarry">
                            <li>
                                <span class="sum-title">{{ trans('language.booking_no') }}</span> : <span class="sum-value">
                               {{ $ticket->attributes->ticket_order_number}}

                                </span>
                            </li>
                                
        					<li>
        						<span class="sum-title">{{ trans('language.vihecle_type') }}</span> : <span class="sum-value">     	{{ $ticket->attributes->route_schedule_vehicle->vehicle_name}}
        						</span>
        					</li>
							<li>
        						<span class="sum-title">{{ trans('language.direction') }}</span> : <span class="sum-value">
        						@php 
                                    echo $ticket->attributes->origin->name;
                                    @endphp 
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i> 
                                    @php 
                                    echo $ticket->attributes->destination->name;
                                    @endphp 
        						</span>
        					</li>
                            <li>
                                <span class="sum-title">{{ trans('language.operator') }}</span> : <span class="sum-value">
                                   {{ $ticket->attributes->operator->name}}
                                </span>
                            </li>
        					<li>
        						<span class="sum-title">{{ trans('language.departure') }}</span> : <span class="sum-value">
        							@php
                                        echo date("M d,Y",strtotime($ticket->attributes->departure_date))." ".date("h:i a",$ticket->attributes->departure);
                                    @endphp
        						</span>
        					</li>
        					<li>
        						<span class="sum-title">{{ trans('language.number_passenger') }}</span> : <span id="passengers" class="sum-value">
        							 {{ $ticket->attributes->number_of_tickets}}				
        						</span>
        					</li>
        				</ul>
        				


        	</div>

        </div>
     </div>
</section>
@stop


@section('script')

@stop