<!-- Fee Info -->
<div class="col-6">
    <div class="card  bg-secondary shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0"><?php echo e(__('Stripe connect')); ?></h3>
                </div>
                <div class="col-4 text-right">
                </div>
            </div>
        </div>
        <div class="card-body">
         <p>
             <?php echo e(__('We use Stripe to collect payments. Connect now, and we will send your funds from cart payments dirrectly to your Stripe account')); ?>.<br />
             <hr />
             <?php if(!auth()->user()->stripe_account): ?>
                <a href="<?php echo e(route('stripe.connect')); ?>" class="btn btn-primary"><?php echo e(__('Connect with Stripe Connect')); ?></a>
             <?php else: ?>

             <div class="row">
                 <div class="col-md-6">
                    <h4><?php echo e(__('Stripe account')); ?></h4>
                    <?php echo e(auth()->user()->stripe_account); ?>

                 </div>
                 <div class="col-md-6">
                    <h4><?php echo e(__('Stripe details submited')); ?></h4>
                    <?php echo e($stripe_details_submitted); ?>

                 </div>
             </div>
             <br />
             <a href="<?php echo e(route('stripe.connect')); ?>" class="btn btn-warning"><?php echo e(__('Update Stripe connection')); ?></a>
             <?php endif; ?>
        </p>
        </div>
    </div>
</div><?php /**PATH /home/fastroch/public_html/resources/views/finances/stripe.blade.php ENDPATH**/ ?>