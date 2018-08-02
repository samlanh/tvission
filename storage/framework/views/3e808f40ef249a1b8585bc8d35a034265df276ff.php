<?php

$ticket = json_decode($ticketsResult)->data;
dd($ticket);
echo $ticket->attributes->ticket_order_number;exit();
?>

<?php $__env->startSection('style'); ?>
<style type="text/css">

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="booking-detail ptb-40">
      <div class="container">
        <div class="row">
        	
        	<div class="col-md-7 col-xs-12 col-sm-12"> 
        		<div class="passenger-detail border-gradient-to-top pb-40 pr-20 pl-20 ">
					<div class="passenger-detail-content">
						<div class="blog-title border-bottom pb-10">
	        				<h3 class="title-blog upercase"><span class="panel-step-num">1</span><?php echo e(trans('language.transfer_detail')); ?></h3>
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
        				<h3 class="title-blog"><?php echo e(trans('language.summary')); ?></h3>
        			</div>

        			<div class="content-summary">
        				<ul class="booking-summarry">
        					<li>
        						<span class="sum-title"><?php echo e(trans('language.vihecle_type')); ?></span> : <span class="sum-value">
        						

        						</span>
        					</li>
							<li>
        						<span class="sum-title"><?php echo e(trans('language.direction')); ?></span> : <span class="sum-value">
        						
        						</span>
        					</li>
                            <li>
                                <span class="sum-title"><?php echo e(trans('language.operator')); ?></span> : <span class="sum-value">
                                   
                                </span>
                            </li>
        					<li>
        						<span class="sum-title"><?php echo e(trans('language.departure')); ?></span> : <span class="sum-value">
        							
        						</span>
        					</li>
        					<li>
        						<span class="sum-title"><?php echo e(trans('language.number_passenger')); ?></span> : <span id="passengers" class="sum-value">
        							    							
        						</span>
        					</li>
        				</ul>
        				


        	</div>

        </div>
     </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>