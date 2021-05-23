<?php if(
    (config('paystack.useAdmin')&&config('paystack.secret_key')!=""&&config('paystack.enabled')) ||
    (config('paystack.useVendor')&&strlen($restorant->getConfig('paystack_secretKey',""))>3&&$restorant->getConfig('paystack_enable','false')!='false')
): ?>
    <div class="custom-control custom-radio mb-3">
        <input name="paymentType" class="custom-control-input" id="paymentPaystack" type="radio" value="paystack" <?php echo e(config('settings.default_payment')=="paystack"?"checked":""); ?>>
        <label class="custom-control-label" for="paymentPaystack"><?php echo e(__('Pay with Paystack')); ?></label>
    </div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\fastgo\modules\Paystack\Providers/../Resources/views/selector.blade.php ENDPATH**/ ?>