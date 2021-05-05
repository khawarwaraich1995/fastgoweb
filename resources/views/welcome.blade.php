@extends('layouts.front', ['class' => ''])

@section('content')
@if( !request()->get('location') )
@include('layouts.headers.search')
@else
@include('layouts.headers.filters')
@endif

<section class="food-category padding-tb" style="background-image: url(kato/assets/css/bg-image/category-bg.jpg); background-size: cover;">
            <div class="container">
                <div class="food-box">
                    <div class="section-header">
                        <h3>Browse Food Category</h3>
                        <p>Completely network impactful users whereas next-generation applications engage out thinking via
                            tactical action.</p>
                    </div>
                    <div class="section-wrapper">
                        <div class="food-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/01.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Breakfast</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/02.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Lunch</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/03.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Dinner</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/04.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Drink</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/05.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Juice</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/06.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Coffee</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/07.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Tea</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="food-item">
                                        <div class="food-thumb">
                                            <a href="#"><img src="{{ asset('kato') }}/assets/images/food/08.png" alt="food"></a>
                                        </div>
                                        <div class="food-content">
                                            <a href="#">Beef Roast</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="food-slider-next"><i class="icofont-double-left"></i></div>
                        <div class="food-slider-prev"><i class="icofont-double-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="food-services padding-tb" id="how-it-works">
        <div class="container">
            <div class="section-header">
                <h3>How it Works</h3>
                <p>Completely network impactful users whereas next-generation applications engage out thinking via
                    tactical action.</p>
            </div>
            <div class="section-wrapper">
                <div class="service-item">
                    <div class="service-inner">
                        <div class="service-thumb">
                            <img src="{{ asset('kato') }}/assets/images/service/01.jpg" alt="food-service">
                            <span>01 step</span>
                        </div>
                        <div class="service-content">
                            <h6><a href="#">Choose Your Favorite</a></h6>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service-inner">
                        <div class="service-thumb">
                            <img src="{{ asset('kato') }}/assets/images/service/02.jpg" alt="food-service">
                            <span>02 step</span>
                        </div>
                        <div class="service-content">
                            <h6><a href="#">We Deliver Your Meals</a></h6>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service-inner">
                        <div class="service-thumb">
                            <img src="{{ asset('kato') }}/assets/images/service/03.jpg" alt="food-service">
                            <span>03 step</span>
                        </div>
                        <div class="service-content">
                            <h6><a href="#">Cash on Delivery</a></h6>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="service-inner">
                        <div class="service-thumb">
                            <img src="{{ asset('kato') }}/assets/images/service/04.jpg" alt="food-service">
                            <span>04 step</span>
                        </div>
                        <div class="service-content">
                            <h6><a href="#">Eat And Enjoy</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<br>
<br>
<br>
@foreach ($sections as $section)

<section class="section" id="main-content">
    <div class="container mt--100">
        <h2>{{ $section['title'] }}</h2>
        @isset($section['super_title'])
        <h2 class="super_title">{{ $section['super_title'] }}</h2>
        @endisset

        <br />
        <div class="row">
            <!-- Stores -->
            @isset($section['restorants'])
            @forelse ($section['restorants'] as $restorant)
            <?php $link = route('vendor', ['alias' => $restorant->alias]); ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="strip">
                    <figure>
                        <a href="{{ $link }}"><img src="{{ $restorant->logom }}" data-src="{{ config('global.restorant_details_image') }}" class="img-fluid lazy" alt=""></a>
                    </figure>
                    <span class="res_title"><b><a href="{{ $link }}">{{ $restorant->name}}</a></b></span><span class="float-right"><i class="fa fa-star" style="color: #dc3545"></i> <strong>{{ number_format($restorant->averageRating, 1, '.', ',') }} <span class="small">/ 5 ({{ count($restorant->ratings) }})</strong></span></span><br />
                    <span class="res_description">{{ $restorant->description}}</span><br />
                    <span class="res_mimimum">{{ __('Minimum order') }}: @money($restorant->minimum, config('settings.cashier_currency'),config('settings.do_convertion'))</span>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-muted mb-0">{{ __('Hmmm... Nothing found!')}}</p>
            </div>

            @endforelse
            @endisset


            <!-- Cities -->
            @isset($section['cities'])
            @forelse (isset($section['cities'])?$section['cities']:[] as $city)
            <?php $link = route('show.stores', ['city' => $city->alias]); ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="strip strip_city">
                    <figure>

                        <a href="{{ $link }}"><img src="{{ $city->logo }}" data-src="{{ config('global.restorant_details_image') }}" class="img-fluid lazy" alt=""></a>

                        <span class="city_title mt--1"><b><a class="text-white" href="{{ $link }}">{{ $city->name}}</a></b></span><br />
                        <a href="{{ $link }}" class="city_letter mt--1 text-red fade-in">{{ $city->alias}}</a>
                    </figure>

                </div>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-muted mb-0">{{ __('Hmmm... Nothing found!')}}</p>
            </div>

            @endforelse
            @endisset

        </div>



    </div>
</section>
@endforeach

<section class="food-apps">
        <div class="bg-shape-style"></div>
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6 col-12">
                    <div class="apps-content padding-tb">
                        <div class="section-header">
                            <h3>FastGo In Your Mobile! Get Our App</h3>
                            <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use
                                Food Delivery & Takeout App.</p>
                            <div class="food-btn-group">
                                <a href="#">
                                    <img src="{{ asset('kato') }}/assets/images/apps/icon/01.png" alt="food-apps">
                                    <div class="app-download">
                                        <p>Download it from</p>
                                        <span>Play Store</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <img src="{{ asset('kato') }}/assets/images/apps/icon/02.png" alt="food-apps">
                                    <div class="app-download">
                                        <p>Download it from</p>
                                        <span>App Store</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="apps-thumb">
                        <img src="{{ asset('kato') }}/assets/images/apps/01.png" alt="food-apps">
                    </div>
                </div>
            </div>
        </div>
    </section>



@if(config('global.playstore') || config('global.appstore'))
<hr>
<section class="row row-grid align-items-center mt section" style="  ">
    <div class="container py-md">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="">{{ __(config('global.mobile_info_title')) }}</h2>
                <h4 class="mb-0 font-weight-light">{{ __(config('global.mobile_info_subtitle')) }}</h4>
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
                <div class="row">
                    @if(config('global.playstore'))
                    <div class="col-6">
                        <a href="{{config('global.playstore')}}" target="_blank"><img class="img-fluid" src="/default/playstore.png" alt="..." /></a>
                    </div>
                    @endif
                    @if(config('global.appstore'))
                    <div class="col-6">
                        <a href="{{config('global.appstore')}}" target="_blank"><img class="img-fluid" src="/default/appstore.png" alt="..." /></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection

@section('js')
<script>
    "use strict";
    var IsplaceChange = false;
    $(document).ready(function() {
        var input = document.getElementById('txtlocation');

        $("#txtlocation").keydown(function() {
            IsplaceChange = false;
        });

        $("#btnsubmit").on("click", function() {

            if (IsplaceChange == false) {
                $("#txtlocation").val('');
                alert("please Enter valid location");
            } else {
                alert($("#txtlocation").val());
            }

        });

        $(".btn_delivery_pickup").click(function() {
            var value = $(this).attr('id');
            $('#expedition').val(value);
        });

        $("#expedition_toggle").on('change', function() {
            var value;
            if ($(this).is(':checked')) {
                value = "pickup"
            } else {
                value = "delivery"
            }

            $('#expedition').val(value);
            document.getElementById('theQuryForm').submit();
        });

        $('#blogCarousel').carousel({
            interval: 5000
        });

        $("#search_location").on("click", function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '/search/location',
                        dataType: 'json',
                        data: {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        },
                        success: function(response) {
                            if (response.status) {
                                $("#txtlocation").val(response.data.formatted_address);
                            }
                        },
                        error: function(response) {}
                    })
                }, function() {

                });
            } else {
                // Browser doesn't support Geolocation
                //handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    });
</script>
@endsection