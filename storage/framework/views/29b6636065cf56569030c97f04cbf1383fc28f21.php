<div class="modal fade" id="modal-new-address" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-notification"><?php echo e(__('Add new address')); ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form">
                            <div class="form-group<?php echo e($errors->has('new_address') ? ' has-danger' : ''); ?>">
                                <input class="form-control" name="new_address" id="new_address" placeholder="<?php echo e(__( 'New address here' )); ?> ..." type="text" required>
                                <?php if($errors->has('category_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('category_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div id="map2" class="form-control form-control-alternative"></div>
                            <div class="text-center">
                                <button type="submit" id="submitNewAddress" class="btn btn-primary my-4"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/fastroch/public_html/resources/views/addresses/partials/modals.blade.php ENDPATH**/ ?>