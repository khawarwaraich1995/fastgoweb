;
<?php $__env->startSection('thead'); ?>
    <th><?php echo e(__('Rating')); ?></th>
    <th><?php echo e(__('Comment')); ?></th>
    <th><?php echo e(__('Order')); ?></th>
    <th><?php echo e(__('User')); ?></th>
    <th><?php echo e(__('Actions')); ?></th>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tbody'); ?>
<?php $__currentLoopData = $setup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($item->rating); ?></td>
    <td><?php echo e($item->comment); ?></td>
<td><a href="<?php echo e(route('orders.show',['order'=>$item->order->id])); ?>"><?php echo e("#".$item->order->id); ?></a></td>
    <td><?php echo e($item->user->name); ?></td>
    <td><a href="<?php echo e(route("reviews.destroyget",["rating"=>$item->id])); ?>" class="btn btn-danger btn-sm"><?php echo e(__('Delete')); ?></a></td>
</tr> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('general.index', $setup, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/resources/views/reviews/index.blade.php ENDPATH**/ ?>