<?php $__env->startSection('content'); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Drivers')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('drivers.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add driver')); ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(__('Name')); ?></th>
                                    <th scope="col"><?php echo e(__('Email')); ?></th>
                                    <th scope="col"><?php echo e(__('Acceptance rating')); ?></th>
                                    <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                                    <th scope="col"><?php echo e(__('Active')); ?></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('drivers.edit', $driver)); ?>"><?php echo e($driver->name); ?></a></td>
                                        <td>
                                            <a href="mailto:<?php echo e($driver->email); ?>"><?php echo e($driver->email); ?></a>
                                        </td>
                                        <td>
                                            <?php echo e($driver->acceptancerating); ?>

                                        </td>
                                        <td><?php echo e($driver->created_at->format(config('settings.datetime_display_format'))); ?></td>
                                        <td>
                                           <?php if($driver->active == 1): ?>
                                                <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                           <?php else: ?>
                                                <span class="badge badge-warning"><?php echo e(__('Not active')); ?></span>
                                           <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="<?php echo e(route('drivers.destroy', $driver)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <?php if($driver->active == 0): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('driver.activate', $driver)); ?>"><?php echo e(__('Activate')); ?></a>
                                                        <?php else: ?>
                                                            <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__("Are you sure you want to deactivate this driver?")); ?>') ? this.parentElement.submit() : ''">
                                                                <?php echo e(__('Deactivate')); ?>

                                                            </button>
                                                        <?php endif; ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <?php echo e($drivers->links()); ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Drivers')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/drivers/index.blade.php ENDPATH**/ ?>