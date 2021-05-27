

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('users.partials.header', [
'title' => __('How It Works Section'),
'class' => 'col-lg-12',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php

if (isset($categories_data->id) && $categories_data->id != 0) {
  $submit_url = url('/works/update', [$categories_data->id ?? '']);
} else {
  $submit_url = url('/works/add');
}
?>
<div class="container-fluid mt--7">
  <form id="category-form" method="post" action="<?php echo e($submit_url); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
      <div class="col-xl-8 col-md-8 col-sm-8">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-12 mb-0"><?php echo e(__('How It Works Form')); ?></h3>
            </div>
          </div>
          <div class="card-body">
            <fieldset>
              <h6 class="heading-small text-muted mb-4">Work Information</h6>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Title</label>
                    <input class="form-control form-control-alternative" type="text" value="<?php echo e($categories_data->name ?? ''); ?>" id="name" name="name">
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-4 col-sm-4">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-12 mb-0"><?php echo e(__('Icon')); ?></h3>
            </div>
          </div>
          <div class="card-body">
            <fieldset>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                  <div class="form-group text-center">
                    <label class="form-control-label" for="input-name">Image</label>
                    <?php
                    if(isset($categories_data) && !empty($categories_data->image) && File::exists(public_path(ORIGNAL_IMAGE_PATH_CATEGORIES.$categories_data->image)))
                    {
                    $path = BASE_URL.ORIGNAL_IMAGE_PATH_CATEGORIES.$categories_data->image;
                    }else
                    {
                    $path = NO_IMAGE;
                    }
                    ?>
                    <div style="display: flex;justify-content: center;">
                      <input type="file" name="image" class="dropify" data-default-file="<?php echo e($path); ?>" />
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <button class="btn btn-icon btn-warning" type="submit" id="save">
          <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
          <span class="btn-inner--text">Save</span>
        </button>
      </div>

    </div>
  </form>
  <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<script>
  $(document).ready(function() {
    $("#save").on('click', function() {
      $("#category-form").validate({
        rules: {
          name: {
            required: true,
          }
        }
      });
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => __('How It Works')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMP\htdocs\fastgoweb\resources\views/works/categories_form.blade.php ENDPATH**/ ?>