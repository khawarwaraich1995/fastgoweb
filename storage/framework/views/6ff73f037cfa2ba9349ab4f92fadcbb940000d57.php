<?php if(
    (config('payfast.useAdmin')&&config('payfast.merchantKey')!=""&&config('payfast.enabled')) ||
    (config('payfast.useVendor')&&strlen($restorant->getConfig('payfast_merchantKey',""))>3&&$restorant->getConfig('payfast_enable','false')!='false')
): ?>
    <div class="custom-control custom-radio mb-3">
        <input name="paymentType" class="custom-control-input" id="paymentPayfast" type="radio" value="payfast" <?php echo e(config('settings.default_payment')=="payfast"?"checked":""); ?>>
        <label class="custom-control-label" for="paymentPayfast"><?php echo e(__('Pay with Payfast')); ?></label>
    </div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\fastgo\modules\Payfast\Providers/../Resources/views/selector.blade.php ENDPATH**/ ?>