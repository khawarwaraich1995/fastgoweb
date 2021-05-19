<?php $__env->startSection('content'); ?>
<?php echo $__env->make('drivers.partials.header', ['title' => __('Edit Driver')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container-fluid mt--7">
    <div class="row">
        <!--<div class="col-xl-12 order-xl-1">-->
        <div class="col-xl-8">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"><?php echo e(__('Driver Management')); ?></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('drivers.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="pl-lg-4">
                        <form method="post" action="<?php echo e(route('drivers.update', $driver)); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                        </form>
                    </div>
                    <hr />
                    <h6 class="heading-small text-muted mb-4"><?php echo e(__('Driver information')); ?></h6>
                    <div class="pl-lg-4">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-name"><?php echo e(__('Driver Name')); ?></label>
                            <input type="text" name="name_driver" id="input-name" class="form-control form-control-alternative" placeholder="<?php echo e(__('Driver Name')); ?>" value="<?php echo e(old('name', $driver->name)); ?>" readonly>
                        </div>
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-name"><?php echo e(__('Driver Email')); ?></label>
                            <input type="text" name="email_driver" id="input-name" class="form-control form-control-alternative" placeholder="<?php echo e(__('Driver Email')); ?>" value="<?php echo e(old('name', $driver->email)); ?>" readonly>
                        </div>
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-name"><?php echo e(__('Driver Phone')); ?></label>
                            <input type="text" name="phone_driver" id="input-name" class="form-control form-control-alternative" placeholder="<?php echo e(__('Driver Phone')); ?>" value="<?php echo e(old('name', $driver->phone)); ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="col-xl-4 mb-5 mb-xl-0">
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?php $__currentLoopData = $earnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo e(__($key)); ?></h5>
                                        <span class="h4 font-weight-bold mb-0"><?php echo e(__('Orders').": ".$value['orders']); ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="<?php echo e('icon icon-shape text-white rounded-circle shadow '.$value['icon']); ?>">
                                            <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 text-sm">
                                    <!--<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>-->
                                    <span class="h4 mb-0 text-nowrap"><?php echo e(__('Earnings').": "); ?><?php echo money($value['earning'], config('settings.cashier_currency'),config('settings.do_convertion')); ?></span>
                                </p>
                            </div>
                        </div>
                        <br/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Drivers Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fastgo\resources\views/drivers/edit.blade.php ENDPATH**/ ?>