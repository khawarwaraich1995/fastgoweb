<?php if(Session::has('success')): ?>
    <div class="bg-green-lightest text-green-darker p-6 shadow-md" role="alert">
        <div class="flex justify-center">
            <p><?php echo e(Session::get('success')); ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="bg-red-lightest text-red-darker p-6 shadow-md" role="alert">
        <div class="flex justify-center">
            <p><?php echo Session::get('error'); ?></p>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/fastroch/public_html/resources/views/vendor/translation/notifications.blade.php ENDPATH**/ ?>