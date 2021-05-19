<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.partials.header', [
        'title' => __('Booking Details'),
        'class' => 'col-lg-7'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12">
            <br>
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">#<?php echo e($booking->id); ?> - <?php echo e($booking->created_at); ?></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('rides')); ?>" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Customer Information</h6>
                    <div class="pl-lg-4">
                        <h3><?php echo e($booking->full_name); ?></h3>
                        <h4><?php echo e($booking->email); ?></h4>
                        <h4><?php echo e($booking->phone); ?></h4>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Order Information</h6>
                    <div class="pl-lg-4">
                        <h4><strong>Transaction# :</strong> <?php echo e($booking->transaction_no ?? ''); ?></h4>
                        <h4><strong>Pickup Time :</strong> <?php echo e($booking->pickup_time ?? ''); ?></h4>
                        <h4><strong>Pickup Location:</strong> <?php echo e($booking->from_location ?? ''); ?></h4>
                        <h4><strong>Drop Location:</strong> <?php echo e($booking->to_location ?? ''); ?></h4>
                        <h4><strong>Order Note:</strong> <?php echo e($booking->note ?? "N/A"); ?></h4>
                    </div>
                    <hr>
                    <h3>TOTAL: $<?php echo e($booking->order_total ?? 0.00); ?></h3>
                    <hr>
                    <h4>Payment method: Credit Card</h4>
                    <?php if($booking->payment_status == 1): ?>
                    <i class="bg-success"></i>
                    <h4>Payment status: <span class="status badge badge-success badge-pill"> Paid</span></h4>
                    <?php else: ?>
                    <i class="bg-danger"></i>
                    <h4>Payment status: <span class="status badge badge-danger badge-pill"> Unpaid</span></h4>
                    <?php endif; ?>
                </div>
                <div class="card-footer py-4">
                    <h6 class="heading-small text-muted mb-4">Actions</h6>
                    <nav class="justify-content-end" aria-label="...">
                        <?php if($booking->order_status == 'received'): ?>
                        <button type="button" class="btn btn-warning" onclick="order_status(<?php echo e($booking->id); ?>,'accepted')">Accept Order</button>
                        <?php elseif($booking->order_status == 'accepted'): ?>
                            <button type="button" onclick="get_online_riders(<?php echo e($booking->id); ?>)" class="btn btn-success">Assign Order</button>
                        <?php elseif($booking->order_status == 'assigned'): ?>
                            <button type="button" class="btn btn-info" disabled>Assigned to Driver</button>
                            <?php elseif($booking->order_status == 'delivered'): ?>
                            <button type="button" class="btn btn-success" disabled>Delivered</button>
                            <?php elseif($booking->order_status == 'rejected'): ?>
                            <button type="button" class="btn btn-danger" disabled>Rejected</button>
                        <?php endif; ?>
                        <?php if($booking->order_status == 'received' || $booking->order_status == 'accepted'): ?>
                        <a href="javascript:void(0)" class="btn btn-danger" onclick="order_status(<?php echo e($booking->id); ?>,'rejected')">Reject</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
        </div>
    </footer>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Online Drivers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<script defer>
    function order_status(order_id, status){
        $.ajax({
              type:'POST',
              url:'<?php echo e(route("booking.status")); ?>',
              data:{'order_id': order_id, 'status': status, '_token': "<?php echo e(csrf_token()); ?>"},
              success:function(response) {
                 var status = response.status;
                 var message = response.message;
                 location.reload();
              }
           });
    }

    function get_online_riders(order_id){
        $.ajax({
              type:'POST',
              url:'<?php echo e(route("get.riders")); ?>',
              data:{'order_id': order_id, '_token': "<?php echo e(csrf_token()); ?>"},
              success:function(response) {
                    $(".modal-body").html(response);
                    $('#exampleModal').modal('show');
              }
           });
    }

    function assingOrder(rider_id, order_id){
        $.ajax({
              type:'POST',
              url:'<?php echo e(route("assign.rider")); ?>',
              data:{'rider_id': rider_id,'order_id': order_id, '_token': "<?php echo e(csrf_token()); ?>"},
              success:function(response) {
                   location.reload();
              }
           });
    }
</script>

<?php echo $__env->make('layouts.app', ['title' => __('Order Detail')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fastgo\resources\views/bookings/order_detail.blade.php ENDPATH**/ ?>