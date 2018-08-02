<?php 
// dd($data);
?>

<?php $__env->startSection('title'); ?>
	<title>T Vision tour</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layout.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	 <!-- Start About -->
    <section class="about">
      <div class="container">
        <div class="row">

          <!-- Start Preamble -->
          <div class="col-lg-12 preamble">
            <h3>About The Bee Go</h3>
            <img src="<?php echo e(asset('assets/img/divisor.png')); ?>" alt="" class="divisor">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est.</p>
          </div>
          <!-- End Preamble -->

          

        </div>
      </div>
    </section>
    <!-- End About -->
	
	<section class="choose-taxi" ><!--style=" background-image: url('/img/choosetaxi.jpg');"-->
		<div class="row">
			<div class="col-sm-6 pt-5">
				<!------<img src="img/choosetaxi1.png">-------->
			</div>
			<div class="col-sm-6 choose-contant">
			   <div class="choose-iteam">
				   <div>
					   <h4>
						   Why Choose TAXI Cab !
					   </h4>
				   </div>
				   <div class="mb-4">
					   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Obsecro, <br>inquit, Torquate, haec dicit Epicurus?
				   </div>
				   <div class="row">
					   <div class="col-sm-1">
						   <i class="fa fa-taxi" aria-hidden="true"></i>
					   </div>
					   <div class="col-sm-11">
						   <div>
							   <h5>
								   Awesome Taxi Services
							   </h5>
							   <p class="choose-text">
								   Sed tu istuc dixti bene Latine, parum plane. Fortasse id optimum, sed ubi <br> illud: Plus semper voluptatis? Cum autem negant ea quicquam ad beatam<br> vitam pertinere,
							   </p>
						   </div>
					   </div>

				   </div>
				   <div class="row">
					   <div class="col-sm-1">
						   <i class="fa fa-map-marker" aria-hidden="true"></i>
					   </div>
					   <div class="col-sm-11">
						   <div>
							   <h5>
								   Awesome Taxi Services
							   </h5>
							   <p class="choose-text">
								   Sed tu istuc dixti bene Latine, parum plane. Fortasse id optimum, sed ubi <br> illud: Plus semper voluptatis? Cum autem negant ea quicquam ad beatam<br> vitam pertinere,
							   </p>
						   </div>
					   </div>

				   </div>
				   <div class="row">
					   <div class="col-sm-1">
						   <i class="fa fa-user" aria-hidden="true"></i>
					   </div>
					   <div class="col-sm-11">
						   <div>
							   <h5>
								   Awesome Taxi Services
							   </h5>
							   <p class="choose-text">
								   Sed tu istuc dixti bene Latine, parum plane. Fortasse id optimum, sed ubi <br> illud: Plus semper voluptatis? Cum autem negant ea quicquam ad beatam<br> vitam pertinere,
							   </p>
						   </div>
					   </div>

				   </div>
			   </div>
			</div>
		</div>
	</section>

   
    
   
    

    <!-- Start Partners -->
    <section class="partners">
      <div class="container">
        <div class="row">

          <!-- Start Preamble -->
          <div class="col-lg-12 preamble">
            <h5>Our Partners</h5>
          </div>
          <!-- End Preamble -->

          <!-- Start Partner -->
          <div class="col-lg-3 col-md-3 col-sm-3 company">
            <a href="#"><img src="<?php echo e(asset('assets/img/company1.png')); ?>" alt=""></a>
          </div>
          <!-- End Partner -->

          <!-- Start Partner -->
          <div class="col-lg-3 col-md-3 col-sm-3 company">
            <a href="#"><img src="<?php echo e(asset('assets/img/company2.png')); ?>" alt=""></a>
          </div>
          <!-- End Partner -->

          <!-- Start Partner -->
          <div class="col-lg-3 col-md-3 col-sm-3 company">
            <a href="#"><img src="<?php echo e(asset('assets/img/company3.png')); ?>" alt=""></a>
          </div>
          <!-- End Partner -->

          <!-- Start Partner -->
          <div class="col-lg-3 col-md-3 col-sm-3 company">
            <a href="#"><img src="<?php echo e(asset('assets/img/company4.png')); ?>" alt=""></a>
          </div>
          <!-- End Partner -->

        </div>
      </div>
    </section>
    <!-- End Partners -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>