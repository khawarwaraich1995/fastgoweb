 <!-- Modal -->
 <div class="modal fade" id="locationset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <form>
    <div class="modal-dialog mt-10" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Change location')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

                <div class="input-group mb-4">
                    <input class="form-control" name="location" id="txtlocation" value="<?php echo e(request()->get('location')); ?>" placeholder="<?php echo e(__('Enter your street or address')); ?>" type="text" required>
                    <div type="button" class="input-group-append button">
                        <span class="input-group-text"><i id="search_location" class="ni ni-pin-3" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Get my current location')); ?>"></i></span>
                    </div>
                    <?php if($errors->has('location')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('location')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Search')); ?></button>
        </div>

    </div>
    </div>
</form>
</div>
<?php /**PATH /home/fastroch/public_html/resources/views/layouts/headers/modallocation.blade.php ENDPATH**/ ?>