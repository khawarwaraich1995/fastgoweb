<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
    <?php $__currentLoopData = $earnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__($key)); ?></h5>
                      <span class="h3 font-weight-bold mb-0"><?php echo e(__('Orders').": ".$value['orders']); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="<?php echo e('icon icon-shape text-white rounded-circle shadow '.$value['icon']); ?>">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!--<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
                    <span class="h4 mb-0 text-nowrap"><?php echo e(__('Earnings').": "); ?><?php echo money($value['earning'], config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                  </p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </div>
</div><?php /**PATH /home/fastroch/public_html/resources/views/layouts/headers/cards/driver.blade.php ENDPATH**/ ?>