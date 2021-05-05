<?php
    $dnl="\n\n";
    $nl="\n\n";
    $tabSpace="      ";
?>
<?php echo e(__("Hi, I'd like to place an order")." 👇"); ?>


<?php if($order->delivery_method==1): ?>
🛵🔜🏡
<?php echo e("*".__('Delivery Order No').": ".$order->id."*"); ?>

<?php else: ?>
✅🏫
<?php echo e("*".__('Pickup Order No').": ".$order->id."*"); ?>

<?php endif; ?>

---------
<?php
foreach ($order->items()->get() as $key => $item) {
    $lineprice = $item->pivot->qty.' X '.$item->name." - ".money($item->pivot->qty * $item->pivot->variant_price, config('settings.cashier_currency'), true);
    if(strlen($item->pivot->variant_name)>3){
        $lineprice .=$nl.$tabSpace.__('Variant:')." ".$item->pivot->variant_name;
    }
   
    if(strlen($item->pivot->extras)>3){
        foreach (json_decode($item->pivot->extras) as $key => $extra) {
            $lineprice .=$nl.$tabSpace.$extra;
        }
    }
?>
🔘<?php echo e($lineprice); ?>


<?php
}
?>
---------
🧾 <?php echo e(__('Total: ').money($order->order_price, config('settings.cashier_currency'), config('settings.do_convertion'))); ?>

---------

<?php if(strlen($order->comment)>0): ?>   
🗒 <?php echo e(__('Comment')); ?>

<?php echo e($order->comment); ?>  
<?php endif; ?>

<?php  //Deliver / Pickup details ?>
<?php if($order->delivery_method==1): ?>
<?php  //Deliver?>
📍 <?php echo e(__('Delivery Details')); ?>


<?php if(config('app.isft')): ?>
<?php echo e(__('Client').": ".$order->client->name); ?>

<?php echo e(__('Address').": ".$order->address->address); ?>

<?php echo e(__('Delivery time').": ".$order->getTimeFormatedAttribute()); ?>

<?php else: ?>
<?php echo e(__('Client').": ".$order->client_name); ?>

<?php echo e(__('Address').": ".$order->whatsapp_address); ?>

<?php echo e(__('Delivery time').": ".$order->getTimeFormatedAttribute()); ?>

<?php endif; ?>

<?php else: ?>
<?php   //Pickup details ?>
✅ <?php echo e(__('Pickup Details')); ?>


<?php if(config('app.isft')): ?>
<?php echo e(__('Client').": ".$order->client->name); ?>

<?php echo e(__('Pickup time').": ".$order->getTimeFormatedAttribute()); ?>

<?php else: ?>
<?php echo e(__('Client').": ".$order->client_name); ?>

<?php echo e(__('Pickup time').": ".$order->getTimeFormatedAttribute()); ?>

<?php endif; ?>

<?php endif; ?>

<?php   //Custom fields ?>
<?php $custom_data=$order->getAllConfigs(); ?>
<?php if(count($custom_data)>0): ?>
<?php echo e(__(config('settings.label_on_custom_fields'))); ?>

<?php $__currentLoopData = $custom_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyCutom => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e(__( "custom.".$keyCutom)); ?>: <?php echo e($itemValue); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php echo e($order->restorant->name." ".__('will confirm your order upon receiving the message.')); ?>



<?php //Add payment only in whatsapp ordering mode ?>
<?php if(config('settings.is_whatsapp_ordering_mode')): ?>   
<?php //Payment ?>
💳 <?php echo e(__('Payment Options')); ?>

<?php echo e($order->restorant->payment_info); ?>


<?php //Payment Link ?>

<?php if(strlen($order->payment_link)>5): ?>
<?php //Add the payment link ?>
💳 <?php echo e(__('Pay now')); ?>

<?php echo e($order->restorant->getLinkAttribute()."/?pay=".$order->id); ?>

<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/fastroch/public_html/resources/views/messages/social.blade.php ENDPATH**/ ?>