@extends('layouts.front', ['class' => ''])

@section('content')
@if( !request()->get('location') )
@include('layouts.headers.search')
@else
@include('layouts.headers.filters')
@endif

@php
$locationfilter = app('request')->input('location');
$expedition = app('request')->input('expedition');
@endphp

@if(empty($locationfilter))
<style>
    .df {
        display: flex;
        justify-content: center;
        align-content: center;
    }
</style>
@php 
$categories = App\Catagoriesmain::where('status', 1)->get(['id', 'name', 'image']);
@endphp
<section class="food-category padding-tb" style="background-image: url(kato/assets/css/bg-image/category-bg.jpg); background-size: cover;">
    <div class="container">
        <div class="food-box">
            <div class="section-header">
                <h3>Browse Category</h3>
            </div>
            <div class="section-wrapper">
                @foreach($categories as $value)
                <div class="food-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="food-item">
                                <div class="food-thumb df">
                                    <a href="#"><img style="height: 45px;width: 56px" src="{{ asset('kato') }}/assets/images/food/01.png" alt="food"></a>
                                </div>
                                <div class="food-content text-center">
                                    <a href="#">{{$value->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="food-services padding-tb" id="how-it-works">
    <div class="container">
        <div class="section-header">
            <h3>How it Works</h3>
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
                        <h6><a href="#">Pay With Crypto/Google Pay</a></h6>
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
@endif

@foreach ($sections as $section)
<section class="popular-foods padding-tb" style="background-color: #fafeff;">
    <div class="container">
        <div class="section-header">
            <h2>{{ $section['title'] }}</h2>
            @isset($section['super_title'])
            <h2 class="super_title">{{ $section['super_title'] }}</h2>
            @endisset
        </div>
        <div class="section-wrapper">
            <div class="row">
                @isset($section['restorants'])
                @forelse ($section['restorants'] as $restorant)
                <?php $link = route('vendor', ['alias' => $restorant->alias]); ?>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="p-food-item">
                        <div class="p-food-inner">
                            <div class="p-food-thumb">
                                <img src="{{ config('global.restorant_details_cover_image') }}" alt="p-food">
                                <span>{{ __('Minimum order') }}: @money($restorant->minimum, config('settings.cashier_currency'),config('settings.do_convertion'))</span>
                            </div>
                            <div class="p-food-content">
                                <div class="p-food-author">
                                    <a href="{{ $link }}"><img style="height: 65px;" src="{{ config('global.restorant_details_image') }}" alt="food-author"></a>
                                </div>
                                <h6><a href="{{ $link }}">{{ $restorant->name}}</a></h6>
                                <div class="p-food-group">
                                    <span>Description : {{ $restorant->description}}</span>
                                </div>
                                <ul class="del-time">
                                    <li>
                                        <i class="icofont-cycling-alt"></i>
                                        <div class="time-tooltip">
                                            <div class="time-tooltip-holder">
                                                <span class="tooltip-label">Delivery time</span>
                                                <span class="tooltip-info">Your order will be delivered in 20
                                                    minutes.</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="icofont-stopwatch"></i>
                                        <div class="time-tooltip">
                                            <div class="time-tooltip-holder">
                                                <span class="tooltip-label">Pickup time</span>
                                                <span class="tooltip-info">You can pickup order in 20
                                                    minutes.</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="p-food-footer">
                                    <div class="left">
                                        <div class="rating">
                                            <i class="fa fa-star" style="color: #dc3545"></i> <strong>{{ number_format($restorant->averageRating, 1, '.', ',') }} <span class="small">/ 5 ({{ count($restorant->ratings) }})</strong>
                                        </div>
                                    </div>
                                    <div class="right"><i class="icofont-home"></i> {{ $restorant->address}}</div>
                                </div>
                            </div>
                        </div>
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
    </div>
</section>
@endforeach
@if(empty($locationfilter))
@if(config('global.playstore') || config('global.appstore'))
<section class="food-apps">
    <div class="bg-shape-style"></div>
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6 col-12">
                <div class="apps-content padding-tb">
                    <div class="section-header">
                        <h3>{{ __(config('global.mobile_info_title')) }}</h3>
                        <p>{{ __(config('global.mobile_info_subtitle')) }}</p>
                        <div class="food-btn-group">
                            @if(config('global.playstore'))
                            <a href="{{config('global.playstore')}}">
                                <img src="{{ asset('kato') }}/assets/images/apps/icon/01.png" alt="food-apps">
                                <div class="app-download">
                                    <p>Download it from</p>
                                    <span>Play Store</span>
                                </div>
                            </a>
                            @endif
                            @if(config('global.appstore'))
                            <a href="{{config('global.appstore')}}">
                                <img src="{{ asset('kato') }}/assets/images/apps/icon/02.png" alt="food-apps">
                                <div class="app-download">
                                    <p>Download it from</p>
                                    <span>App Store</span>
                                </div>
                            </a>
                            @endif
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
@endif
@endif




<!-- @if(config('global.playstore') || config('global.appstore'))
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
@endif -->

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