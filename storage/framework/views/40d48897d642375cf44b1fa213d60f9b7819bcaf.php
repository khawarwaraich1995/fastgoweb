<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.partials.header', [
        'title' => __('Categories'),
        'class' => 'col-lg-7'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                  <div class="card">
              <!-- Card header -->
              <div class="card-header text-right">
              <!-- <button class="btn btn-sm btn-icon btn-success" data-toggle="modal" data-target="#exampleModalMessage" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                     <span class="btn-inner--text">Import CSV</span>
                </button>
                <button class="btn btn-sm btn-icon btn-warning" data-toggle="modal" data-target="#excelModalMessage" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                     <span class="btn-inner--text">Import Excel</span>
                </button> -->
                <a href="<?php echo e(url('/categories-main/create')); ?>">
                  <button class="btn btn-sm btn-icon btn-warning" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                     <span class="btn-inner--text">Add New Category</span>
                  </button>
                </a>
              </div>
              <?php if($message = Session::get('error')): ?>
              <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                  <span class="alert-text"><strong>Oopss!</strong> <?php echo e($message); ?></span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
              </div>
              <?php endif; ?>
              <div class="container table-responsive py-4">
                <table class="table table-flush" id="datatable-buttons">
                  <thead class="thead-light">
                    <tr>
                      <th>Sr.no</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $i = 0;
                  ?>
                  <?php if(isset($categories) && !empty($categories)): ?>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $i = $i + 1;
                    $edit_url = url('/categories-main/edit/'.$value->id);
                    $delete_url = url('/categories-main/destroy/'.$value->id);
                  ?>
                    <tr>
                      <td><div class="btn badge badge-success badge-pill">#<?php echo e($i); ?></div></td>
                      <td><?php echo e($value->name); ?></td>
                      <td>
                      <?php
                      $path = BASE_URL.SMALL_IMAGE_PATH_CATEGORIES.$value->image;
                      $check_exist = File::exists(public_path().SMALL_IMAGE_PATH_CATEGORIES.$value->image);
                      if($check_exist == 1 && $value->image != '')
                      {
                        $image = $path;
                      }else{
                        $image = NO_IMAGE;
                      }
                      ?>
                      <img class="rounded" src="<?php echo e($image); ?>" width="50px" height="50px">
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4 current_status">
                        <?php if($value->status == 1): ?>
                        <i class="bg-success"></i>
                        <span class="status badge badge-success badge-pill">Active</span>
                        <?php else: ?>
                        <i class="bg-danger"></i>
                        <span class="status badge badge-danger badge-pill">Inactive</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="bottom-end" style="position: absolute;will-change: transform;top: 0px;left: 0px;transform: translate3d(-160px, 32px, 0px);">

                            <a class="dropdown-item" href="<?php echo e($edit_url); ?>">Edit</a>


                            <?php if($value->status == 1): ?>
                              <a class="dropdown-item status-change" href="javascript:void(0);"  rel="<?php echo e($value->status); ?>" data-cat-id="<?php echo e($value->id); ?>">Deactivate</a>
                            <?php else: ?>
                              <a class="dropdown-item status-change" href="javascript:void(0);"  rel="<?php echo e($value->status); ?>" data-cat-id="<?php echo e($value->id); ?>">Activate</a>
                            <?php endif; ?>



                            <a class="dropdown-item" href="<?php echo e($delete_url); ?>">Delete</a>

                        </div>
                      </div>
                    </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <script defer type="text/javascript">
          $('.status-change').on('click', function(){
              var status = $(this).attr('rel');
              var cat_id = $(this).attr('data-cat-id');
              $.ajax({
              type:'POST',
              url:'<?php echo e(url("/categories-main/status")); ?>',
              data:{'status': status, 'cat_id': cat_id, '_token': "<?php echo e(csrf_token()); ?>"},
              success:function(response) {
                 var status = response.status;
                 var message = response.message;
                 var current_status = response.current_status;
                 if(status == true)
                 {
                  toastr.success(message);
                  location.reload();
                 }else
                 {
                  toastr.error(message);
                 }
              }
           });
          });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Categories')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fastgo\resources\views/categories-main/categories_list.blade.php ENDPATH**/ ?>