<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3><?php echo e(__('Delivery Address')); ?><span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
        <input type="hidden" value="<?php echo e($restorant->id); ?>" id="restaurant_id"/>
        <div class="form-group<?php echo e($errors->has('addressID') ? ' has-danger' : ''); ?>">
            <?php if(count($addresses)): ?>
                <select name="addressID" id="addressID" class="form-control<?php echo e($errors->has('addressID') ? ' is-invalid' : ''); ?>  noselecttwo" required>
                    <option disabled selected value> <?php echo e(__('-- select an option -- ')); ?></option>
                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(config('settings.enable_cost_per_distance')): ?>
                            <option data-cost=<?php echo e($address->cost_per_km); ?> id="<?php echo e('address'.$address->id); ?>"  <?php if(!$address->inRadius){echo "disabled";} ?> value=<?php echo e($address->id); ?>><?php echo e($address->address." - ".money( $address->cost_per_km, config('settings.cashier_currency'),config('settings.do_convertion'))); ?> </option>
                        <?php else: ?>
                    <option data-cost=<?php echo e(config('global.delivery')); ?> id="<?php echo e('address'.$address->id); ?>"  <?php if(!$address->inRadius){echo "disabled";} ?> value=<?php echo e($address->id); ?>><?php echo e($address->address); ?> </option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('addressID')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('addressID')); ?></strong>
                    </span>
                <?php endif; ?>
            <?php else: ?>
                <h6 id="address-complete-order"><?php echo e(__('You don`t have any address. Please add new one')); ?>.</h6>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <button type="button" data-toggle="modal" data-target="#modal-order-new-address"  class="btn btn-outline-success"><?php echo e(__('Add new')); ?></button>
        </div>
        <input type="hidden" name="deliveryCost" id="deliveryCost" value="0" />
      </div>
      <br />
      <br />
    </div>
  </div>
  <br />
<?php /**PATH E:\xampp\htdocs\fastgo\resources\views/cart/address.blade.php ENDPATH**/ ?>