@php
$private_taxi = "VehicleTypePrivateTaxi";
$bus = "VehicleTypeBus";
@endphp
<section class="section-search" style="background-image: linear-gradient(rgba(55,63,71,.25),rgba(55,63,71,.50), rgba(55,63,71,.75)), url({{ asset('assets/img/home.jpg') }})">
    <div class="css-table">
          <div class="css-table-cell">
            <!-- Start Banner-Search -->
            <div class="banner-search">
              <div class="">
                  <div id="hero-tabs" class="banner-search-inner">
                    <div class="container">
                      <!--
                        <ul class="custom-list tab-title-list clearfix">
                        <li class="tab-title active"><a href="#cartrans">{{ trans('language.private_taxi') }}</a></li>
                          <li class="tab-title "><a href="#cartranss">{{ trans('language.private_taxi') }}</a></li>
                      </ul>
                        -->


                        <ul class="custom-list tab-content-list">
           <!-- Start Car-trans -->
                      <li class="tab-content active">
                        
                        {!! Form::open(['url' => '/search','id'=>'private_taxi','class'=>'default-form','method'=>'GET']) !!}
                            <div class="container">
                              <div class="search-blogmessage">
                                
                              </div>
                              <div class="blogform">
                                <div class="inlineform">
                                  <div id="custom-templates">
                                    <input class="typeahead" type="text" name="from" value="{{ app('request')->input('from') }}" name="from_location" placeholder="{{ trans('language.pick_up_location') }}">
                                  </div>
                                </div>
                                                              
                                <div id="switchlocation" class="switcharrowbutton">
                                  <img src="{{ asset('assets/img/icon/switch-arrow-button.png') }}" />  
                                </div>
                                <div class="inlineform">
                                  <div id="to_location">
                                    <input class="typeahead" id="to" type="text" value="{{ app('request')->input('to') }}" name="to" placeholder="{{ trans('language.drop_location') }}">
                                  </div>
                                </div>
                                @php 
                                $pickupDate = date("m/d/Y",strtotime("+5 day"));
                                  if(app('request')->has('on_date')){
                                      $pickupDate = app('request')->input('on_date');
                                  }
                                @endphp
                                <div class="inlineform">
                                  <input id="calendar" style="width: 100%">
                                  <input id="pickupdate" name="on_date" value="{{ $pickupDate }}" type="hidden" style="width: 100%">
 <input id="searchtype" name="type" value="{{ $bus}}" type="hidden" style="width: 100%">
                          
                                </div>
                                <div class="inlineform">
                                  {{Form::button(trans('language.find_vihecle'), ['id'=>'btnfindtaxi','class' => 'btn light'])}}
                                                        
                                </div>
                              </div>
                            </div>
                       {!! Form::close() !!}
                      </li>
                      <!-- End Car-trans -->
                    </ul>
                    </div>
                  
                </div>
              </div>
            </div>
            <!-- End Banner-Search -->

          </div>
        </div>
  </section>