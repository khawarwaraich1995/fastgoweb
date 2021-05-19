<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('drivers.partials.header', ['title' => __('Edit Client')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Client Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <form method="post" action="<?php echo e(route('clients.update', $client)); ?>" autocomplete="off">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('put'); ?>

                                </form>
                                </div>


                                <hr />
                                <h6 class="heading-small text-muted mb-4"><?php echo e(__('Client information')); ?></h6>
                            <div class="pl-lg-4">


                                <div class="form-group<?php echo e($errors->has('name_client') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="name_client"><?php echo e(__('Client Name')); ?></label>
                                    <input type="text" name="name_client" id="name_client" class="form-control form-control-alternative" placeholder="<?php echo e(__('Client Name')); ?>" value="<?php echo e(old('name', $client->name)); ?>" readonly>
                                </div>

                                <div class="form-group<?php echo e($errors->has('email_client') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="email_client"><?php echo e(__('Client Email')); ?></label>
                                    <input type="text" name="email_client" id="email_client" class="form-control form-control-alternative" placeholder="<?php echo e(__('Client Email')); ?>" value="<?php echo e(old('name', $client->email)); ?>" readonly>
                                </div>

                                <div class="form-group<?php echo e($errors->has('phone_client') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="phone_client"><?php echo e(__('Client Phone')); ?></label>
                                    <input type="text" name="phone_client" id="phone_client" class="form-control form-control-alternative" placeholder="<?php echo e(__('Client Phone')); ?>" value="<?php echo e(old('name', $client->phone)); ?>" readonly>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Clients Management')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fastgo\resources\views/clients/edit.blade.php ENDPATH**/ ?>