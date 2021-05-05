<thead class="thead-light">
    <tr>
        <th scope="col"><?php echo e(__('ID')); ?></th>
        <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
            <th scope="col"><?php echo e(__('Restaurant')); ?></th>
        <?php endif; ?>
        <th class="table-web" scope="col"><?php echo e(__('Created')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('Time Slot')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('Method')); ?></th>
        <th scope="col"><?php echo e(__('Last status')); ?></th>
        <?php if(auth()->check() && auth()->user()->hasRole('admin|owner|driver')): ?>
            <th class="table-web" scope="col"><?php echo e(__('Client')); ?></th>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('admin')): ?>
            <th class="table-web" scope="col"><?php echo e(__('Address')); ?></th>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('owner')): ?>
            <th class="table-web" scope="col"><?php echo e(__('Items')); ?></th>
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
            <th class="table-web" scope="col"><?php echo e(__('Driver')); ?></th>
        <?php endif; ?>
        <th class="table-web" scope="col"><?php echo e(__('Price')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('Delivery')); ?></th>
        <?php if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver')): ?>
            <th scope="col"><?php echo e(__('Actions')); ?></th>
        <?php endif; ?>
    </tr>
</thead>
<tbody>
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td>
        
        <a class="btn badge badge-success badge-pill" href="<?php echo e(route('orders.show',$order->id )); ?>">#<?php echo e($order->id); ?></a>
    </td>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
    <th scope="row">
        <div class="media align-items-center">
            <a class="avatar-custom mr-3">
                <img class="rounded" alt="..." src=<?php echo e($order->restorant->icon); ?>>
            </a>
            <div class="media-body">
                <span class="mb-0 text-sm"><?php echo e($order->restorant->name); ?></span>
            </div>
        </div>
    </th>
    <?php endif; ?>

    <td class="table-web">
        <?php echo e($order->created_at->format(config('settings.datetime_display_format'))); ?>

    </td>
    <td class="table-web">
        <?php echo e($order->time_formated); ?>

    </td>
    <td class="table-web">
        <span class="badge badge-primary badge-pill"><?php echo e($order->getExpeditionType()); ?></span>
    </td>
    <td>
        <?php echo $__env->make('orders.partials.laststatus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </td>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|owner|driver')): ?>
    <td class="table-web">
       <?php echo e($order->client->name); ?>

    </td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole('admin')): ?>
        <td class="table-web">
            <?php echo e($order->address?$order->address->address:""); ?>

        </td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole('owner')): ?>
        <td class="table-web">
            <?php echo e(count($order->items)); ?>

        </td>
    <?php endif; ?>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|owner')): ?>
        <td class="table-web">
            <?php echo e(!empty($order->driver->name) ? $order->driver->name : ""); ?>

        </td>
    <?php endif; ?>
    <td class="table-web">
        <?php echo money($order->order_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?>

    </td>
    <td class="table-web">
        <?php echo money($order->delivery_price, config('settings.cashier_currency'),config('settings.do_convertion')); ?>
    </td>
    <?php echo $__env->make('orders.partials.actions.table',['order' => $order ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/fastroch/public_html/resources/views/orders/partials/orderdisplay.blade.php ENDPATH**/ ?>