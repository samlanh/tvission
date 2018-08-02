<?php



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
	        				<h3 class="title-blog upercase"><span class="panel-step-num">2</span><?php echo e(trans('language.payment')); ?></h3>
	        			</div>
                        <div class="message-payment">
    	        			<div class="col-md-1 col-xs-12 col-sm-12"> 

                                <span id="time">  
                                  <?php 
                                    echo date("i:s",  $arrayOrder->time_to_cancel_in_sec);

                                  ?>
                                </span>
                            </div>
                            <div class="col-md-11 col-xs-12 col-sm-12">    
                                <p>
                                    Please complete your payment before time run out, or reservation we're holding will be released to other.

                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-xs-12">
                          <div class="row">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title"><strong>Comfirm Payments</strong></h3>
                              </div>
                              <div class="panel-body">
                                <div style="text-align:center" id="international_payments" class="payments">
                                
                                  <a class="payment" href="<?php echo e(url('tickets/payment?id='.app('request')->input('id'))); ?>" >
                                    <div class="payment_choice unselected-payment-choice">
                                      Comfirm Payment
                                      
                                    </div>
                                  </a>


                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
         
                    <?php
                        $min = date("i",  $arrayOrder->time_to_cancel_in_sec);
                        $sec = date("s",  $arrayOrder->time_to_cancel_in_sec);
                       
                        $date=date_create($arrayOrder->createddate);
                        $createdate= date_format($date,"Y/m/d H:i:s");

                        $expiredate = date("Y/m/d H:i:s",strtotime("$createdate +  $min  min"));
                        $expiredate  = date("Y/m/d H:i:s",strtotime("$expiredate +  $sec  sec"));
                 
                  


                    $date = new DateTime($expiredate);
                    $datenow = new DateTime(date("Y/m/d H:i:s"));
                    $exprietime =  $date->getTimestamp();           
                    $cureentitme =   $datenow->getTimestamp();  
                   
                    $remain =  $exprietime - $cureentitme ;

                    $min = date("i",  $remain);
                    $sec = date("s",  $remain);                     
                    $duration =  $min+($sec/100);
                    if($remain<=0){
                       
                        $duration=0;
                    }

                    

                    ?>  
                    <?php



                      ?>


 <input type="hidden" id="timeout" name="timeout" class="form-control" readonly="true" value='<?php 
                            echo $duration ;
                          ?>
                          '>
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
        							<?php
        								echo $tickets->attributes->route_schedule_vehicle->vehicle_name;
        							?>

        						</span>
        					</li>
							<li>
        						<span class="sum-title"><?php echo e(trans('language.direction')); ?></span> : <span class="sum-value">
        							<?php 
        							echo $tickets->attributes->origin->name;
        							?> 
        							<i class="fa fa-long-arrow-right" aria-hidden="true"></i> 
        							<?php 
        							echo $tickets->attributes->destination->name;
        							?> 
        						</span>
        					</li>
                            <li>
                                <span class="sum-title"><?php echo e(trans('language.operator')); ?></span> : <span class="sum-value">
                                    <?php 
                                    echo $tickets->attributes->operator->name;
                                    ?> 
                                    
                                </span>
                            </li>
        					<li>
        						<span class="sum-title"><?php echo e(trans('language.departure')); ?></span> : <span class="sum-value">
        							<?php
        								echo date("M d,Y",strtotime($tickets->attributes->departure_date))." ".date("h:i a",$tickets->attributes->departure);
        							?>
        						</span>
        					</li>
        					<li>
        						<span class="sum-title"><?php echo e(trans('language.number_passenger')); ?></span> : <span id="passengers" class="sum-value">
        							     <?php 
                                         echo count($tickets->attributes->tickets);
                                         ?>  							
        						</span>
        					</li>
        				</ul>
        				<div class="blog-cost">
        					<h3><?php echo e(trans('language.transfer_cost')); ?></h3>

        					<div class="price-individual">
        						<div class="price-row">
        							<span class="price-title"><?php echo e(trans('language.subtotal')); ?></span> <span class="price-view">
                                    <?php  echo number_format($arrayOrder->amount,2);?>      

                                    </span>
        						</div>
        						<div class="price-row">
        							<span class="price-title"><?php echo e(trans('language.discount')); ?></span> <span class="price-view">
                                        <?php   echo  number_format($arrayOrder->discount,2);
                                        ?>    

                                    </span>
        						</div>
        					</div>
        					
        					<div class="price-total">
        						<div class="price-row">
        							<span class="price-title bold"><?php echo e(trans('language.total')); ?></span> <span class="price-view"><?php  echo number_format($arrayOrder->total_fare,2) ?>   </span>
        						</div>
        					</div>
        				</div>
        		</div>


        	</div>

        </div>
     </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer <= 0) {
            window.location.href = "http://stackoverflow.com";
            //timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * $("#timeout").val(),
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>