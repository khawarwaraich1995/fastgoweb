<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3 class="mb-0"><?php echo e(__('Apps')); ?></h3>
                        </div>
                        <?php if(config('settings.is_demo') | config('settings.is_demo')): ?> 
                        <div class="col-8 text-right">
                            <a  onclick="alert('Disabled in demo')" class="btn btn-sm btn-success text-white"><?php echo e(__('Add new')); ?></a>
                        </div>
                        <?php else: ?>
                            <div class="col-8 text-right">
                                <a  onclick="$('#appupload').click();" class="btn btn-sm btn-success text-white"><?php echo e(__('Add new')); ?></a>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div style="display: none">
                            <input name="appupload" type="file" class="" id="appupload" accept=".zip,.rar,.7zip"   onchange="form.submit()">
                        </div>
                    </form>

                    <div class="row">
                        <?php if(empty($apps)): ?>
                        <p>
                            <?php echo e(__("There are no apps at the moment")); ?>

                        </p>
                        <?php endif; ?>
                        <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mt-3">
                            <div class="card" style="width: 18rem;">
                                <a target="_blank" href="<?php echo e($app->link); ?>"><img class="card-img-top" src="<?php echo e($app->image); ?>" alt="<?php echo e($app->name); ?>"></a>
                                <div class="card-body">
                                <h5 class="card-title"><?php echo e($app->name); ?> <?php if($app->installed): ?><span class="small text-green"><?php echo e(__('installed')); ?> v<?php echo e($app->version); ?></span><?php endif; ?></h5>
                                <p class="card-text"><?php echo e($app->description); ?></p>
                                <?php if($app->installed): ?>
                                    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-success"><?php echo e(__('Settings')); ?></a>
                                <?php else: ?>
                                    <a target="_blank" href="<?php echo e($app->link); ?>" class="btn btn-primary"><?php echo e(__('Buy now')." - ".$app->price); ?></a>
                                <?php endif; ?>
                                
                                </div>
                            </div>  
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('Settings')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/apps/index.blade.php ENDPATH**/ ?>