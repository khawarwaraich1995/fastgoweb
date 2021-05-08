<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">



        <?php echo $__env->yieldContent('title'); ?>
        <title><?php echo e(config('app.name', 'FoodTiger')); ?></title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="<?php echo e(asset('argon')); ?>/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="<?php echo e(asset('argon')); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="<?php echo e(asset('argon')); ?>/css/argon.css?v=1.0.0" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="<?php echo e(asset('custom')); ?>/css/custom.css" rel="stylesheet">
        <!-- Select2 -->
        <link type="text/css" href="<?php echo e(asset('custom')); ?>/css/select2.min.css" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('vendor')); ?>/jasny/css/jasny-bootstrap.min.css">
        <!-- Flatpickr datepicker -->
        <link rel="stylesheet" href="<?php echo e(asset('vendor')); ?>/flatpickr/flatpickr.min.css">

         <!-- Font Awesome Icons -->
        <link href="<?php echo e(asset('argonfront')); ?>/css/font-awesome.css" rel="stylesheet" />

        <!-- Range datepicker -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <?php echo $__env->yieldContent('head'); ?>
        <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>

        <!-- Custom CSS defined by admin -->
        <link type="text/css" href="<?php echo e(asset('byadmin')); ?>/back.css" rel="stylesheet">




    </head>
    <body class="<?php echo e($class ?? ''); ?>">
        <?php if(auth()->guard()->check()): ?>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
            <?php if(\Request::route()->getName() != "order.success"): ?>
                <?php echo $__env->make('layouts.navbars.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>

        <div class="main-content">
            <?php echo $__env->make('layouts.navbars.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <?php if(auth()->guard()->guest()): ?>
            <?php echo $__env->make('layouts.footers.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- Commented because navtabs includes same script -->
        <script src="<?php echo e(asset('argon')); ?>/vendor/jquery/dist/jquery.min.js"></script>

        <script src="<?php echo e(asset('argonfront')); ?>/js/core/popper.min.js" type="text/javascript"></script>
        <script src="<?php echo e(asset('argon')); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <?php echo $__env->yieldContent('topjs'); ?>

        <!-- Navtabs -->
        <script src="<?php echo e(asset('argonfront')); ?>/js/core/jquery.min.js" type="text/javascript"></script>


        <script src="<?php echo e(asset('argon')); ?>/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <!-- Nouslider -->
        <script src="<?php echo e(asset('argon')); ?>/vendor/nouislider/distribute/nouislider.min.js" type="text/javascript"></script>

        <!-- Argon JS -->
        <script src="<?php echo e(asset('argon')); ?>/js/argon.js?v=1.0.0"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php echo e(asset('vendor')); ?>/jasny/js/jasny-bootstrap.min.js"></script>
        <!-- Custom js -->
        <script src="<?php echo e(asset('custom')); ?>/js/orders.js"></script>
         <!-- Custom js -->
        <script src="<?php echo e(asset('custom')); ?>/js/mresto.js"></script>
        <!-- AJAX -->

        <!-- SELECT2 -->
        <script src="<?php echo e(asset('custom')); ?>/js/select2.js"></script>
        <script src="<?php echo e(asset('vendor')); ?>/select2/select2.min.js"></script>

        <!-- DATE RANGE PICKER -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <!-- All in one -->
        <script src="<?php echo e(asset('custom')); ?>/js/js.js?id=<?php echo e(config('config.version')); ?>"></script>




         <!-- Import Vue -->
        <script src="<?php echo e(asset('vendor')); ?>/vue/vue.js"></script>

        <!-- Import AXIOS --->
        <script src="<?php echo e(asset('vendor')); ?>/axios/axios.min.js"></script>

        <!-- Flatpickr datepicker -->
        <script src="<?php echo e(asset('vendor')); ?>/flatpickr/flatpickr.js"></script>

        <!-- Notify JS -->
        <script src="<?php echo e(asset('custom')); ?>/js/notify.min.js"></script>


        <script>
            var ONESIGNAL_APP_ID = "<?php echo e(config('settings.onesignal_app_id')); ?>";
            var USER_ID = '<?php echo e(auth()->user()&&auth()->user()?auth()->user()->id:""); ?>';
            var PUSHER_APP_KEY = "<?php echo e(config('broadcasting.connections.pusher.key')); ?>";
            var PUSHER_APP_CLUSTER = "<?php echo e(config('broadcasting.connections.pusher.options.cluster')); ?>";
        </script>

        <!-- OneSignal -->
        <?php if(strlen( config('settings.onesignal_app_id'))>4): ?>
            <script src="<?php echo e(asset('vendor')); ?>/OneSignalSDK/OneSignalSDK.js" async=""></script>
            <script src="<?php echo e(asset('custom')); ?>/js/onesignal.js"></script>
        <?php endif; ?>

        <?php echo $__env->yieldPushContent('js'); ?>
        <?php echo $__env->yieldContent('js'); ?>

        <script src="<?php echo e(asset('custom')); ?>/js/rmap.js"></script>

         <!-- Pusher -->
         <?php if(strlen( config('broadcasting.connections.pusher.app_id'))>2): ?>
            <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
            <script src="<?php echo e(asset('custom')); ?>/js/pusher.js"></script>


        <?php endif; ?>

        <!-- Custom JS defined by admin -->
        <?php echo file_get_contents(base_path('public/byadmin/back.js')) ?>
    </body>
</html>
<?php /**PATH E:\xampp\htdocs\fastgo\resources\views/layouts/app.blade.php ENDPATH**/ ?>