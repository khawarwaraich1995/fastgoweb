<?php $__env->startSection('content'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"><?php echo e(__('Page Management')); ?></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to pages')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4"><?php echo e(__('Page information')); ?></h6>
                    <?php if(session('status')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('status')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                    <div class="pl-lg-4">
                        <form method="post" action="<?php echo e(route('pages.store')); ?>" autocomplete="off" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="title" id="title" class="form-control form-control-alternative<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title here ...')); ?>" value="" required autofocus>
                                <?php if($errors->has('title')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                            <label class="form-control-label" for="ckeditor"><?php echo e(__('Content')); ?></label>
                                <textarea class="form-control" id="ckeditor" name="ckeditor"></textarea>
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
</div>
<?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- CKEditor -->
    <script src="<?php echo e(asset('ckeditor')); ?>/ckeditor.js"></script>
    <script>
        "use strict";
        CKEDITOR.replace('ckeditor', {
            removePlugins: 'sourcearea',
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form',
            //allowedContent: 'p h1{text-align}; a[!href]; strong em; p(tip)'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Page')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/pages/create.blade.php ENDPATH**/ ?>