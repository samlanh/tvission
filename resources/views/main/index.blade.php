@extends('layout.main')
<?php 
// dd($data);
?>

@section('title')
	<title>T Vision tour</title>
@stop

@section('style')
	
@stop

@section('content')

@include('layout.search')
	 <!-- Start About -->
    <section class="about">
      <div class="container">
        <div class="row">

          <!-- Start Preamble -->
          <div class="col-lg-12 preamble">
            <h3>T Vision</h3>
            <img src="{{ asset('assets/img/divisor.png') }}" alt="" class="divisor">
            <p>Bus ticket booking online in cambodia. Easy way to booking to get electronic ticket and fast.</p>
          </div>
          <!-- End Preamble -->

          

        </div>
      </div>
    </section>
    <!-- End About -->
	
	
@stop

@section('script')
@stop
