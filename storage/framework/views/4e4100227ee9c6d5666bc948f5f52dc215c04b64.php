<?php if(
    (config('mercadopago.useAdmin')&&config('mercadopago.access_token')!=""&&config('mercadopago.enabled')) ||
    (config('mercadopago.useVendor')&&strlen($restorant->getConfig('mercadopago_access_token',""))>3&&$restorant->getConfig('mercadopago_enable','false')!='false')
): ?>
    <div class="custom-control custom-radio mb-3">
        <input name="paymentType" class="custom-control-input" id="paymentMercadopago" type="radio" value="mercadopago" <?php echo e(config('settings.default_payment')=="mercadopago"?"checked":""); ?>>
        <label class="custom-control-label" for="paymentMercadopago"><?php echo e(__('Pay with Mercadopago')); ?></label>
    </div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\fastgo\modules\Mercadopago\Providers/../Resources/views/selector.blade.php ENDPATH**/ ?>