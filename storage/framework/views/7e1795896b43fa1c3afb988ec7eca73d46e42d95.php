<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Share Menu')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<title><?php echo e($name); ?></title>
<?php $__env->stopSection(); ?>
<?php if(config('settings.share_this_property')): ?>
    <?php $__env->startSection('head'); ?>
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=<?php echo e(config('settings.share_this_property')); ?>&product=sticky-share-buttons" async="async"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <h2 class="text-uppercase text-center text-muted mb-4"><?php echo e(__('Share your menu with your audience')); ?></h2>
                        <div class="pl-lg-4">
                            <div class="sharethis-inline-share-buttons" data-url="<?php echo e($url); ?>"></div>
                            <div class="text-center mt-6">
                                <img src="<?php echo e('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$url); ?>" class="image mr-3" alt=""/>
                            </div>
                            <div class="text-center mt-4 mr-3">
                                <a type="button" href="/downloadqr" class="btn btn-success"><?php echo e(__('Download QR Code')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Share Menu')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/restorants/share.blade.php ENDPATH**/ ?>