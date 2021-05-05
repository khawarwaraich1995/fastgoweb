<?php $__currentLoopData = $order->actions['buttons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $next_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $btnType="btn-primary";
      if(str_contains($next_status,'accept')){
        $btnType="btn-success";
      }else if(str_contains($next_status,'reject')){
        $btnType="btn-danger";
      }
    ?>
    <a href="<?php echo e(url('updatestatus/'.$next_status.'/'.$order->id)); ?>" class="btn btn-sm <?php echo e($btnType); ?>"><?php echo e(__($next_status)); ?></a> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(strlen($order->actions['message'])>0): ?>
    <p><small class="text-muted"><?php echo e($order->actions['message']); ?></small><p>
<?php endif; ?><?php /**PATH /home/fastroch/public_html/resources/views/orders/partials/actions/actions.blade.php ENDPATH**/ ?>