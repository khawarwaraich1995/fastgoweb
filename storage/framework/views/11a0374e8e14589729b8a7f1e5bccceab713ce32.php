<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3><span class="delTime delTimeTS"><?php echo e(__('Delivery time')); ?></span><span class="picTime picTimeTS"><?php echo e(__('Pickup time')); ?></span><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <select name="timeslot" id="timeslot" class="form-control<?php echo e($errors->has('timeslot') ? ' is-invalid' : ''); ?>" required>
          <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value=<?php echo e($value); ?>><?php echo e($text); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      </div>
      <br />
      <br />
    </div>
  </div>
  <br /><?php /**PATH /home/fastroch/public_html/resources/views/cart/time.blade.php ENDPATH**/ ?>