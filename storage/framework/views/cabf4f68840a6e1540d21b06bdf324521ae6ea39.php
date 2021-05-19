<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.partials.header', [
        'title' => __('Booking Orders'),
        'class' => 'col-lg-7'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                  <div class="card">
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
                      <th>Order #</th>
                      <th>Customer Name</th>
                      <th>Total Amount</th>
                      <th>Order Status</th>
                      <th>Payment Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($bookings) && !empty($bookings)): ?>
                  <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $detail_url = url('/order/detail/'.$value->id);
                  ?>
                    <tr>
                      <td><div class="btn badge badge-success badge-pill">#<?php echo e($value->id); ?></div></td>
                      <td><?php echo e($value->full_name); ?></td>
                      <td>$<?php echo e($value->order_total); ?></td>
                      <td>
                        <span class="badge badge-dot mr-4 current_status">
                        <?php if($value->order_status == 'received'): ?>
                        <i class="bg-warning"></i>
                        <span class="status badge badge-warning badge-pill">Received</span>
                        <?php elseif($value->order_status == 'accepted'): ?>
                        <i class="bg-info"></i>
                        <span class="status badge badge-info badge-pill">Accepted</span>
                        <?php elseif($value->order_status == 'assigned'): ?>
                        <i class="bg-warning"></i>
                        <span class="status badge badge-warning badge-pill">Assigned</span>
                        <?php elseif($value->order_status == 'delivered'): ?>
                        <i class="bg-success"></i>
                        <span class="status badge badge-success badge-pill">Delivered</span>
                        <?php elseif($value->order_status == 'rejected'): ?>
                        <i class="bg-danger"></i>
                        <span class="status badge badge-danger badge-pill">Rejected</span>
                        <?php endif; ?>
                      </span>
                    </td>
                      <td>
                        <span class="badge badge-dot mr-4 current_status">
                        <?php if($value->payment_status == 1): ?>
                        <i class="bg-success"></i>
                        <span class="status badge badge-success badge-pill">Paid</span>
                        <?php else: ?>
                        <i class="bg-danger"></i>
                        <span class="status badge badge-danger badge-pill">Unpaid</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo e($detail_url); ?>">
                            <button class="btn btn-sm btn-icon btn-success" type="button">
                               <span class="btn-inner--text">See Details</span>
                            </button>
                          </a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Booking Orders')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fastgo\resources\views/bookings/booking_order.blade.php ENDPATH**/ ?>