<?php $__env->startSection('content'); ?>
   <section class="section">
    <div class="container">
        <br /><br />
        <div class="alert alert-danger" role="alert">
            <?php echo e(__($message)); ?>. 
        </div>
        <br />
        <p>
        <a class="btn btn-danger" href="<?php echo e(url()->previous()); ?>"><?php echo e(__('Go back')); ?></a>
        </p>
    </div>
   </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', ['class' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/restorants/error_location.blade.php ENDPATH**/ ?>