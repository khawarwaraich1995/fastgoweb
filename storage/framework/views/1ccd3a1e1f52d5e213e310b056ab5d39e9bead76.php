<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow border-0 mt-8">
            <div class="card-body text-center">
                <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                    <span class="swal2-success-line-tip"></span>
                    <span class="swal2-success-line-long"></span>
                    <div class="swal2-success-ring"></div>
                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                </div>
                <h2 class="display-2"><?php echo e(__("You're all set!")); ?></h2>
                <h1 class="mb-4">
                    <span class="badge badge-primary"><?php echo e(__('Order')." #".$order->id); ?></span>
                </h1>
                <div class="d-flex justify-content-center">
                    <div class="col-8">
                        <h5 class="mt-0 mb-5 heading-small text-muted">
                            <?php echo e(__("Your order is created. You will be notified for further information.")); ?>

                        </h5>
                        <div class="font-weight-300 mb-5">
                            <?php echo e(__("Thanks for your purchase")); ?>, 
                        <span class="h3"><?php echo e($order->restorant->name); ?></span></div>
                        <?php if(config('settings.wildcard_domain_ready')): ?>
                            <a href="<?php echo e($order->restorant->getLinkAttribute()); ?>" class="btn btn-outline-primary btn-sm"><?php echo e(__('Go back to restaurant')); ?></a>
                        <?php else: ?>
                            <a href="<?php echo e(route('vendor',$order->restorant->subdomain)); ?>" class="btn btn-outline-primary btn-sm"><?php echo e(__('Go back to restaurant')); ?></a>
                        <?php endif; ?>

                        <!-- WHATS APP -->
                        <?php if($showWhatsApp): ?>
                            <a target="_blank" href="?order=<?php echo e($_GET['order']); ?>&whatsapp=yes"  class="btn btn-lg btn-icon btn btn-success mt-4 paymentbutton">
                                <span style="color:white" class="btn-inner--icon lg"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
                                <span style="color:white" class="btn-inner--text"><?php echo e(__('Send order on WhatsApp')); ?></span>
                            </a>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.app', ['title' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/orders/success.blade.php ENDPATH**/ ?>