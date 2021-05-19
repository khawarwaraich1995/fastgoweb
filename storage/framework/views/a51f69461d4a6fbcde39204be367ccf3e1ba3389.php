<div class="pl-lg-4">
    <form id="restorant-form" method="post" action="<?php echo e(route('admin.restaurants.update', $restorant)); ?>" autocomplete="off" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="row">
        <div class="col-md-6">
        <input type="hidden" id="rid" value="<?php echo e($restorant->id); ?>"/>
        <?php echo $__env->make('partials.fields',['fields'=>[
            ['ftype'=>'input','name'=>"Restaurant Name",'id'=>"name",'placeholder'=>"Restaurant Name",'required'=>true,'value'=>$restorant->name],
            ['ftype'=>'input','name'=>"Restaurant Description",'id'=>"description",'placeholder'=>"Restaurant description",'required'=>true,'value'=>$restorant->description],
            ['ftype'=>'input','name'=>"Restaurant Address",'id'=>"address",'placeholder'=>"Restaurant address",'required'=>true,'value'=>$restorant->address],
            ['ftype'=>'input','name'=>"Restaurant Phone",'id'=>"phone",'placeholder'=>"Restaurant phone",'required'=>true,'value'=>$restorant->phone],
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(config('settings.multi_city')): ?>
            <?php echo $__env->make('partials.fields',['fields'=>[
                ['ftype'=>'select','name'=>"Restaurant city",'id'=>"city_id",'data'=>$cities,'required'=>true,'value'=>$restorant->city_id],
            ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
       
        <?php if(auth()->user()->hasRole('admin')): ?>
            <br/>
            <div class="row">
                <div class="col-6 form-group<?php echo e($errors->has('fee') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="input-description"><?php echo e(__('Fee percent')); ?></label>
                    <input type="number" name="fee" id="input-fee" step="any" min="0" max="100" class="form-control form-control-alternative<?php echo e($errors->has('fee') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('fee', $restorant->fee)); ?>" required autofocus>
                    <?php if($errors->has('fee')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('fee')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="col-6 form-group<?php echo e($errors->has('static_fee') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="input-description"><?php echo e(__('Static fee')); ?></label>
                    <input type="number" name="static_fee" id="input-fee" step="any" min="0" max="100" class="form-control form-control-alternative<?php echo e($errors->has('static_fee') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('static_fee', $restorant->static_fee)); ?>" required autofocus>
                    <?php if($errors->has('static_fee')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('static_fee')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <label class="form-control-label" for="item_price"><?php echo e(__('Is Featured')); ?></label>
                <label class="custom-toggle" style="float: right">
                    <input type="checkbox" name="is_featured" <?php if($restorant->is_featured == 1){echo "checked";}?>>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>
            </div>
            <br/>
        <?php endif; ?>
        <br/>
        <?php if(config('app.isft')): ?>
            <?php echo $__env->make('partials.fields',['fields'=>[
                ['ftype'=>'bool','name'=>"Pickup",'id'=>"can_pickup",'value'=>$restorant->can_pickup == 1 ? "true" : "false"],
                ['ftype'=>'bool','name'=>"Delivery",'id'=>"can_deliver",'value'=>$restorant->can_deliver == 1 ? "true" : "false"],
                ['ftype'=>'bool','name'=>"Self Delivery",'id'=>"self_deliver",'value'=>$restorant->self_deliver == 1 ? "true" : "false"],
                ['ftype'=>'bool','name'=>"Free Delivery",'id'=>"free_deliver",'value'=>$restorant->free_deliver == 1 ? "true" : "false"],
            ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(config('app.isqrsaas') && !config('settings.is_whatsapp_ordering_mode')): ?>
            <?php echo $__env->make('partials.fields',['fields'=>[
                ['ftype'=>'bool','name'=>"Disable Call Waiter",'id'=>"disable_callwaiter",'value'=>$restorant->getConfig('disable_callwaiter', 0) ? "true" : "false"],
            ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>  
        <br/>
        <div class="row">
            <?php
                $images=[
                    ['name'=>'resto_logo','label'=>__('Restaurant Image'),'value'=>$restorant->logom,'style'=>'width: 295px; height: 200px;'],
                    ['name'=>'resto_cover','label'=>__('Restaurant Cover Image'),'value'=>$restorant->coverm,'style'=>'width: 200px; height: 100px;']
                ]
            ?>
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <?php echo $__env->make('partials.images',$image, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        


        

        

       
       

    
        
        </div>
        <div class="col-md-6">
            <?php echo $__env->make('restorants.partials.ordering', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('restorants.partials.localisation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- WHATS APP MODE -->
            <?php if(config('settings.is_whatsapp_ordering_mode')): ?>
                <?php echo $__env->make('restorants.partials.social_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
            <?php endif; ?>

            <?php if(config('settings.whatsapp_ordering')): ?>
                <!-- We have WP ordering -->
                <?php if(config('app.isft')): ?>
                    <!-- FT -->
                    <?php if(auth()->user()->hasRole('admin')): ?>
                        <?php echo $__env->make('restorants.partials.waphone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- QR -->
                    <?php echo $__env->make('restorants.partials.waphone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>

        </div>

        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
        </div>
        
    </form>
</div>
<?php /**PATH E:\xampp\htdocs\fastgo\resources\views/restorants/partials/info.blade.php ENDPATH**/ ?>