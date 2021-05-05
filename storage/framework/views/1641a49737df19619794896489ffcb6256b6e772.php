<?php $__env->startSection('content'); ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container ">
    <div class="page-header text-blue-d2">
        <h1 class="display-4">
            
        

        <div class="page-tools">
        </h1>
            <div class="action-buttons no-print">
                <a href="#" id="printBtn" class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    <?php echo e(__('Print')); ?>

                </a>
                <a id="exportBtn" href="#" class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    <?php echo e(__('Export')); ?>

                </a>
            </div>
        </div>
    </div>

    <div id="print_area" class="container px-0 card">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                

                
                <div class="row">
                    <div class="col-12">
                        <h1><?php echo e(__(config('pdf-invoice.invoiceTitle','Order'))); ?> #<?php echo e($order->id); ?> </h1>
                        <?php if($order->payment_status=="unpaid"): ?>
                            <span class="badge badge-danger"><?php echo e(__('Unpaid')); ?></span>
                        <?php else: ?>
                            <span class="badge badge-success"><?php echo e(__('Paid')); ?></span>
                        <?php endif; ?>
                        
                        
                        <small class="text-muted"><?php echo e($order->created_at->format(config('settings.datetime_display_format'))); ?></small><br />
                        <small class="text-muted"><?php echo e(__("Payment method")); ?>: <?php echo e(__(strtoupper($order->payment_method))); ?></small>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?php if(config('app.isft')): ?>
                        
                        <div class="">
                            <h3><?php echo e($order->client->name); ?></h3>
                            <h4><?php echo e($order->client->email); ?></h4>
                            <h4><?php echo e($order->address?$order->address->address:""); ?></h4>
                
                            <?php if(!empty($order->address->apartment)): ?>
                                <h4><?php echo e(__("Apartment number")); ?>: <?php echo e($order->address->apartment); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($order->address->entry)): ?>
                                <h4><?php echo e(__("Entry number")); ?>: <?php echo e($order->address->entry); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($order->address->floor)): ?>
                                <h4><?php echo e(__("Floor")); ?>: <?php echo e($order->address->floor); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($order->address->intercom)): ?>
                                <h4><?php echo e(__("Intercom")); ?>: <?php echo e($order->address->intercom); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($order->client->phone)): ?>
                            <br/>
                            <h4><?php echo e(__('Contact')); ?>: <?php echo e($order->client->phone); ?></h4>
                            <?php endif; ?>
                        </div>
                        
                    <?php else: ?>
                        <?php if($order->table): ?>
                            
                        
                            <div class="">
                                
                                    <h3><?php echo e(__('Table:')." ".$order->table->name); ?></h3>
                                    <?php if($order->table->restoarea): ?>
                                        <h4><?php echo e(__('Area:')." ".$order->table->restoarea->name); ?></h4>
                                    <?php endif; ?>
                                
                                
                            </div>
                            
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                       
                        <div class="">
                            <h3><?php echo e($order->restorant->name); ?></h3>
                            <h4><?php echo e($order->restorant->address); ?></h4>
                            <h4><?php echo e($order->restorant->phone); ?></h4>
                            <h4><?php echo e($order->restorant->user->name.", ".$order->restorant->user->email); ?></h4>
                        </div>
                        

                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5"><?php echo e(__('Name')); ?></div>
                        <div class="d-none d-sm-block col-4 col-sm-2"><?php echo e(__('Qty')); ?></div>
                        <div class="d-none d-sm-block col-sm-2"><?php echo e(__('Unit Price')); ?></div>
                        <div class="col-2"><?php echo e(__('Amount')); ?></div>
                    </div>

                    

                    <div class="text-95 text-secondary-d3">

                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-2 mb-sm-0 py-25">
                                <div class="d-none d-sm-block col-1"><?php echo e($key+1); ?></div>
                                <div class="col-9 col-sm-5"><?php echo e($item->name); ?><br />
                                    <?php if(strlen($item->pivot->variant_name)>2): ?>
                                    <br />
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <?php $__currentLoopData = $item->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th><?php echo e($option->name); ?></th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <tr>
                                                <?php $__currentLoopData = explode(",",$item->pivot->variant_name); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td><?php echo e($optionValue); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php endif; ?>

                                <?php if(strlen($item->pivot->extras)>2): ?>
                                    <span class="small text-muted"><?php echo e(__('Extras')); ?></span><br />
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th><?php echo e(__('Item')); ?></th>
                                                <th><?php echo e(__('Price')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list" >
                                            <?php $__currentLoopData = json_decode($item->pivot->extras); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $extraItem=explode(" + ",$extra); ?>
                                                <tr>
                                                    <td><?php echo e($extraItem[0]); ?></td>
                                                    <td><?php echo e($extraItem[1]); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <br />
                                <?php endif; ?>

                            </div>
                                <div class="d-none d-sm-block col-2"><?php echo e($item->pivot->qty); ?></div>
                                <div class="d-none d-sm-block col-2 text-95"> <?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></div>
                                <div class="col-2 text-secondary-d2"><?php echo money($item->pivot->qty*$item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <?php 
                        $currency=config('settings.cashier_currency');
                        $convert=config('settings.do_convertion');
                    ?>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            <?php echo e($order->comment); ?>

                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            
                            <!-- NET -->
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    <?php echo e(__('NET')); ?>

                                </div>
                                <div class="col-5">
                                    <span class="text-110"><?php echo money($order->order_price-$order->vatvalue, $currency ,true); ?></span>
                                </div>
                            </div>

                            <!-- VAT -->
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    <?php echo e(__('VAT')); ?>

                                </div>
                                <div class="col-5">
                                    <span class="text-110"><?php echo money($order->vatvalue, $currency,$convert); ?></span>
                                </div>
                            </div>

                            <!-- Sub Total -->
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    <?php echo e(__('Sub Total')); ?>

                                </div>
                                <div class="col-5">
                                    <span class="text-110"><?php echo money($order->order_price, $currency,$convert); ?></span>
                                </div>
                            </div>

                            <!-- Delivery -->
                            <?php if(config('app.isft')): ?>
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        <?php echo e(__('Delivery')); ?>

                                    </div>
                                    <div class="col-5">
                                        <span class="text-110"><?php echo money($order->delivery_price, $currency,$convert); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>

                             <!-- Sub Total -->
                             <div class="row my-2">
                                <div class="col-7 text-right">
                                    <b><?php echo e(__('Total')); ?></b>
                                </div>
                                <div class="col-5">
                                    <b><span class="text-110 text-success-d3"><?php echo money($order->delivery_price+$order->order_price, $currency,true); ?></span></b>
                                </div>
                            </div>


                            

                        </div>
                    </div>

                    <hr />

                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    var order="<?php echo e($order->id); ?>";
    $('#printBtn').on("click", function () {
        window.print();  
    });
    $('#exportBtn').on("click", function () {
        var element = document.getElementById('print_area');
        var opt = {
           // margin:       1,
            filename:     'order_'+order+'.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pdf-invoice::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/fastroch/public_html/modules/PdfInvoice/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>