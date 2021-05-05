<?php if(
    (config('razorpay.useAdmin')&&config('razorpay.secret')!=""&&config('razorpay.enabled')) ||
    (config('razorpay.useVendor')&&strlen($restorant->getConfig('razorpay_secret',""))>3&&$restorant->getConfig('razorpay_enable','false')!='false')
): ?>
    <div class="custom-control custom-radio mb-3">
        <input name="paymentType" class="custom-control-input" id="paymentRazorpay" type="radio" value="razorpay" <?php echo e(config('settings.default_payment')=="razorpay"?"checked":""); ?>>
        <label class="custom-control-label" for="paymentRazorpay"><?php echo e(__('Pay with Razorpay')); ?></label>
    </div>
<?php endif; ?><?php /**PATH /home/fastroch/public_html/modules/Razorpay/Providers/../Resources/views/selector.blade.php ENDPATH**/ ?>