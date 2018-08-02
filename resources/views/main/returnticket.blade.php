@extends('layout.main')


@php

$ticket = json_decode($ticketsResult)->data;
dd($ticket);
echo $ticket->attributes->ticket_order_number;exit();
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
                        <div class="message-payment">
    	        			<div class="col-md-1 col-xs-12 col-sm-12"> 

                               
                            </div>
                            <div class="col-md-11 col-xs-12 col-sm-12">    
                              
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-xs-12">
                          <div class="row">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title"><strong>International Payment Methods</strong></h3>
                              </div>
                              <div class="panel-body">
                         
                              </div>
                            </div>
                          </div>
                        </div>
         
                    
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
        						

        						</span>
        					</li>
							<li>
        						<span class="sum-title">{{ trans('language.direction') }}</span> : <span class="sum-value">
        						
        						</span>
        					</li>
                            <li>
                                <span class="sum-title">{{ trans('language.operator') }}</span> : <span class="sum-value">
                                   
                                </span>
                            </li>
        					<li>
        						<span class="sum-title">{{ trans('language.departure') }}</span> : <span class="sum-value">
        							
        						</span>
        					</li>
        					<li>
        						<span class="sum-title">{{ trans('language.number_passenger') }}</span> : <span id="passengers" class="sum-value">
        							    							
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