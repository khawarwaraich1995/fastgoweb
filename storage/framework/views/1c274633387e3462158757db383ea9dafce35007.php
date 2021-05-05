<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('drivers.partials.header', ['title' => __('Add Driver')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Drivers Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('drivers.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4"><?php echo e(__('Driver information')); ?></h6>
                        <div class="pl-lg-4">
                            <form method="post" action="<?php echo e(route('drivers.store')); ?>" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group<?php echo e($errors->has('name_driver') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="name_driver"><?php echo e(__('Driver Name')); ?></label>
                                        <input type="text" name="name_driver" id="name_driver" class="form-control form-control-alternative<?php echo e($errors->has('name_driver') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Driver Name')); ?>" value="" required>
                                        <?php if($errors->has('name_driver')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name_driver')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('email_driver') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="email_driver"><?php echo e(__('Driver Email')); ?></label>
                                        <input type="email" name="email_driver" id="email_driver" class="form-control form-control-alternative<?php echo e($errors->has('email_driver') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Driver Email')); ?>" value="" required>
                                        <?php if($errors->has('email_driver')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email_driver')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('phone_driver') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="phone_driver"><?php echo e(__('Driver Phone')); ?></label>
                                        <input type="text" name="phone_driver" id="phone_driver" class="form-control form-control-alternative<?php echo e($errors->has('phone_driver') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Driver Phone')); ?>" value="" required>
                                        <?php if($errors->has('phone_driver')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('phone_driver')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Drivers Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/drivers/create.blade.php ENDPATH**/ ?>