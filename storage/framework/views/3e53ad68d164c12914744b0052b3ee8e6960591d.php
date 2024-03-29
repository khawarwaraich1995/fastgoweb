<!--
=========================================================
* Argon Design System - v1.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2020 Creative Tim (http://www.creative-tim.com)

Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('argonfront')); ?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo e(asset('argonfront')); ?>/img/favicon.png">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta property="og:image" content="<?php echo e(config('global.site_logo')); ?>">
    <title><?php echo e(config('global.site_name','FoodTiger')); ?></title>

    <?php echo notifyCss(); ?>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="<?php echo e(asset('argonfront')); ?>/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo e(asset('argonfront')); ?>/css/nucleo-svg.css" rel="stylesheet" />
    <link href="<?php echo e(asset('argonfront')); ?>/css/nucleo-icons.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="<?php echo e(asset('argonfront')); ?>/css/argon-design-system.min.css?v=1.4.0" rel="stylesheet" />

    <!-- Custom CSS -->
    <link type="text/css" href="<?php echo e(asset('custom')); ?>/css/custom.css" rel="stylesheet">

    <!-- Select2 -->
    <link type="text/css" href="<?php echo e(asset('custom')); ?>/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('kato')); ?>/assets/css/icofont.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('kato')); ?>/assets/css/lightcase.css">
    <link rel="stylesheet" href="<?php echo e(asset('kato')); ?>/assets/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo e(asset('argonfront')); ?>/js/core/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php if(config('settings.google_analytics')): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo config('settings.google_analytics'); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '<?php echo config('settings.google_analytics'); ?>');
    </script>
    <?php endif; ?>

    <?php echo $__env->make('googletagmanager::head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head'); ?>
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>


    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Custom CSS defined by admin -->
    <link type="text/css" href="<?php echo e(asset('byadmin')); ?>/front.css" rel="stylesheet">

</head>

<body class="">
    <?php echo $__env->make('googletagmanager::body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->guard()->check()): ?>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
    <?php endif; ?>



    <!-- Navbar -->
    <?php if(config('app.isft')): ?>
    <?php echo $__env->make('layouts.menu.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <?php echo $__env->make('layouts.menu.top_justlogo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- End Navbar -->
    <div class="wrapper">
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.navbars.cartSideMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.footers.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(request()->get('location') ): ?>
        <?php echo $__env->make('layouts.headers.modallocation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <!--   Core JS Files   -->

    <script src="<?php echo e(asset('argonfront')); ?>/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('argonfront')); ?>/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>


    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/bootstrap-switch.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/moment.min.js"></script>

    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('argonfront')); ?>/js/plugins/bootstrap-datepicker.min.js"></script>

    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo e(asset('argonfront')); ?>/js/argon-design-system.js?v=1.2.0" type="text/javascript"></script>


    <!-- Import Vue -->
    <script src="<?php echo e(asset('vendor')); ?>/vue/vue.js"></script>
    <!-- Import AXIOS --->
    <script src="<?php echo e(asset('vendor')); ?>/axios/axios.min.js"></script>

    <!-- Add to Cart   -->
    <script>
        var LOCALE = "<?php echo  App::getLocale() ?>";
        var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
        var USER_ID = '<?php echo e(auth()->user()&&auth()->user()?auth()->user()->id:""); ?>';
        var PUSHER_APP_KEY = "<?php echo e(config('broadcasting.connections.pusher.key')); ?>";
        var PUSHER_APP_CLUSTER = "<?php echo e(config('broadcasting.connections.pusher.options.cluster')); ?>";
    </script>
    <script src="<?php echo e(asset('custom')); ?>/js/cartFunctions.js"></script>


    <!-- Cart custom sidemenu -->
    <script src="<?php echo e(asset('custom')); ?>/js/cartSideMenu.js"></script>

    <!-- Notify JS -->
    <script src="<?php echo e(asset('custom')); ?>/js/notify.min.js"></script>

    <!-- SELECT2 -->
    <script src="<?php echo e(asset('custom')); ?>/js/select2.js"></script>
    <script src="<?php echo e(asset('vendor')); ?>/select2/select2.min.js"></script>

    <!-- All in one -->
    <script src="<?php echo e(asset('custom')); ?>/js/js.js?id=<?php echo e(config('config.version')); ?>"></script>




    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyDffZbIsJa_vyw7j8ZKjYuVcdQpGb0Ph3Q&libraries=places&callback=js.initializeGoogle"></script>

    <?php if(strlen( config('broadcasting.connections.pusher.app_id'))>2): ?>
    <!-- Pusher -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="<?php echo e(asset('custom')); ?>/js/pusher.js"></script>
    <?php endif; ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php echo $__env->yieldContent('js'); ?>

    <?php echo notifyJs(); ?>

    <!-- Custom JS defined by admin -->
    <?php echo file_get_contents(base_path('public/byadmin/front.js')) ?>
    <script src="<?php echo e(asset('kato')); ?>/assets/js/lightcase.js"></script>
    <script src="<?php echo e(asset('kato')); ?>/assets/js/swiper.min.js"></script>
    <script src="<?php echo e(asset('kato')); ?>/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo e(asset('kato')); ?>/assets/js/functions.js"></script>
    <script>
        flatpickr('.datetimepicker', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
    <script>
        $('.dropify').dropify();
    </script>
    <script>
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'));
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            var slat = place.geometry.location.lat();
            var slong = place.geometry.location.lng();
            var start = slat + ',' + slong;
            $('#start').val(start);
        });
        var autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('location2'));
        google.maps.event.addListener(autocomplete2, 'place_changed', function() {
            var place2 = autocomplete2.getPlace();
            var elat = place2.geometry.location.lat();
            var elong = place2.geometry.location.lng();
            var end = elat + ',' + elong;
            $('#end').val(end);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();

        function initialize() {
            directionsDisplay = new google.maps.DirectionsRenderer();
            var mapOptions = {
                zoom: 7,
                center: new google.maps.LatLng(41.850033, -87.6500523)
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('directions-panel'));

            var control = document.getElementById('control');
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
        }

        function validateForm() {
            var pickup = $('#location').val();
            var drop = $('#location2').val();

            if ($('#later').prop("checked") == true) {
                var datetime = $('#schedule_datetime').val();
                if (datetime == '') {
                    $('#schedule_datetime').css({
                        'border': '1px solid red'
                    }); //this line is added before focus
                    return false;
                }
            }

            if (pickup == '') {
                $('#location').css({
                    'border': '1px solid red'
                }); //this line is added before focus
                $('#location').focus();
                return false;
            } else if (drop == '') {
                $('#location2').css({
                    'border': '1px solid red'
                });
                $('#location2').focus();
                return false;
            } else {
                return true;
            }
        }

        function displayCatagories() {
            var form = validateForm();
            if (form == true) {
                $("#cat-cards").show();
                $('html, body').animate({
                    scrollTop: $("#cat-cards").offset().top
                }, 1000);
            }

        }

        $('.cat-card').click(function(e) {
            $(this).addClass("actv");
            var charges = $(this).attr('data-charges');
            var chargesType = $(this).attr('data-chargetype');
            calcRoute(charges, chargesType)
        });

        $('.opt').click(function(e) {
            var type = $(this).attr('data-type');
            var booking_arr = localStorage.getItem("booking_arr");
            booking_arr = JSON.parse(booking_arr);
            if (type == "cash") {
                booking_arr[0].payment_method = "cash";
                $('.ptype').text('COD');
                $('#cash').addClass("paymentactv");
                $('#card').removeClass("paymentactv");
            } else {
                booking_arr[0].payment_method = "card";
                $('.ptype').text('Credit/Debit Card');
                $('#card').addClass("paymentactv");
                $('#cash').removeClass("paymentactv");
            }
            var chargesType = $(this).attr('data-chargetype');
            calcRoute(charges, chargesType)
            localStorage.setItem("booking_arr", JSON.stringify(booking_arr));
        });

        function calcRoute(charges, chargesType) {
            var start = document.getElementById('start').value;
            var end = document.getElementById('end').value;
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
            getDistance(charges, chargesType)
            $("#map-container").css("display", "block");
            $('html, body').animate({
                scrollTop: $("#pc-list").offset().top
            }, 1000);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        function getDistance(charges, chargesType) {
            var origin = document.getElementById('start').value;
            var destination = document.getElementById('end').value;
            var distanceService = new google.maps.DistanceMatrixService();
            distanceService.getDistanceMatrix({
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.WALKING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                    durationInTraffic: true,
                    avoidHighways: false,
                    avoidTolls: false
                },
                function(response, status) {
                    if (status !== google.maps.DistanceMatrixStatus.OK) {
                        console.log('Error:', status);
                    } else {
                        var distance = parseFloat(response.rows[0].elements[0].distance.text).toFixed(2);
                        var type = "Kilometers";
                        if (chargesType == 'distance' || chargesType == 'miles') {
                            if (chargesType == 'distance') {
                                var price = distance * parseFloat(charges).toFixed(2);
                            } else if (chargesType == 'miles') {
                                distance = distance / 1.60934;
                                var price = parseFloat(distance * charges).toFixed(2);
                                type = "Miles";
                            }
                        } else {
                            var price = parseFloat(response.rows[0].elements[0].distance.text) * parseFloat(charges);
                        }
                        $("#price").text('Total: $' + price).show();
                        $(".finalTotal").text(price).show();
                        $("#distance").text(parseFloat(distance).toFixed(2) + ' ' + type).show();
                        $("#duration").text(response.rows[0].elements[0].duration.text).show();
                        var schedule = 0;
                        var schedule_datetime = '';
                        if($('#later').prop("checked") == true){
                            schedule = 1;
                            schedule_datetime =  $('#schedule_datetime').val();
                        }
                        var booking_arr = [{
                            'start': origin,
                            'end': destination,
                            'order_amount': parseFloat(price).toFixed(2),
                            'payment_method': 'cash',
                            'is_schedule': schedule,
                            'schedule_datetime': schedule_datetime,
                        }];
                        localStorage.setItem("booking_arr", JSON.stringify(booking_arr));
                    }
                });
        }

        function pay() {
            var booking_arr = localStorage.getItem("booking_arr");
            if (booking_arr != null) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(url('/booking/confirm')); ?>",
                    data: {
                        'booking_arr': booking_arr,
                        '_token': '<?php echo e(csrf_token()); ?>'
                    },
                    cache: false,
                    success: function(data) {
                        if(data.status == true)
                        {
                            window.location.href = "/success?orderID="+data.id;
                        }
                    },
                    error: function(data) {
                        window.location.href = "/login";
                    }
                });

            }
        }

        function autoGet(field) {
            // Check for geolocation browser support and execute success method
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    geoLocationSuccess,
                    geoLocationError, {
                        timeout: 10000
                    }
                );
            } else {
                alert("your browser doesn't support geolocation");
            }

            function geoLocationSuccess(pos) {
                // get user lat,long
                var myLat = pos.coords.latitude,
                    myLng = pos.coords.longitude,
                    loadingTimeout;
                if (field == "location") {
                    var start = myLat + ',' + myLng;
                    $('#start').val(start);
                }
                if (field == "location2") {
                    var end = myLat + ',' + myLng;
                    $('#end').val(end);
                }
                var loading = function() {
                    $('#' + field).text("fetching...");
                };

                loadingTimeout = setTimeout(loading, 600);

                var request = $.get(
                        "https://nominatim.openstreetmap.org/reverse?format=json&lat=" +
                        myLat +
                        "&lon=" +
                        myLng
                    )
                    .done(function(data) {
                        if (loadingTimeout) {
                            clearTimeout(loadingTimeout);
                            loadingTimeout = null;
                            $('#' + field).val(data.display_name);
                        }
                    })
                    .fail(function() {
                        // handle error
                    });
            }

            function geoLocationError(error) {
                var errors = {
                    1: "Permission denied",
                    2: "Position unavailable",
                    3: "Request timeout"
                };
                alert("Error: " + errors[error.code]);
            }
        }
    </script>

</body>

</html><?php /**PATH E:\xampp\htdocs\fastgo\resources\views/layouts/front.blade.php ENDPATH**/ ?>