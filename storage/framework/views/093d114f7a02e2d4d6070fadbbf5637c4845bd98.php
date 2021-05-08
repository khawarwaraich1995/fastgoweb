<nav id="navbar-main" class="navbar navbar-light navbar-expand-lg fixed-top">
  <div class="container-fluid">
      <a class="navbar-brand mr-lg-5" href="/">
        <img src="<?php echo e(config('global.site_logo')); ?>">
      </a>
      <?php if( request()->get('location') ): ?>
        <span style="z-index: 10" class=""><?php echo e(__('DELIVERING TO')); ?> :  <b><?php echo e(request()->get('location')); ?></b></span> <a   data-toggle="modal"  href="#locationset"><span class="ml-sm-2 search description">(<?php echo e(__('change')); ?>)</span></a>
      <?php endif; ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                <img src="<?php echo e(config('global.site_logo')); ?>">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          
          <?php if(!config('settings.single_mode')&&config('settings.restaurant_link_register_position')=="navbar"): ?>
            <li class="nav-item">
              <a data-mode="popup" target="_blank" class="button nav-link nav-link-icon" href="<?php echo e(route('newrestaurant.register')); ?>"><?php echo e(__(config('settings.restaurant_link_register_title'))); ?></a>
            </li>
          <?php endif; ?>
          <?php if(config('app.isft')&&config('settings.driver_link_register_position')=="navbar"): ?>
          <li class="nav-item">
              <a data-mode="popup" target="_blank" class="button nav-link nav-link-icon" href="<?php echo e(route('driver.register')); ?>"><?php echo e(__(config('settings.driver_link_register_title'))); ?></a>
            </li>
            <?php endif; ?>
          <?php if(!empty(config('global.facebook'))): ?>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="<?php echo e(config('global.facebook')); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(__('Like us on Facebook')); ?>">
              <i class="fa fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none"><?php echo e(__('Facebook')); ?></span>
            </a>
          </li>
          <?php endif; ?>
          <?php if(!empty(config('global.instagram'))): ?>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="<?php echo e(config('global.instagram')); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(__('Follow us on Instagram')); ?>">
              <i class="fa fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none"><?php echo e(__('Instagram')); ?></span>
            </a>
          </li>
          <?php endif; ?>
          <?php echo $__env->yieldContent('addiitional_button_1'); ?>
          <?php echo $__env->yieldContent('addiitional_button_2'); ?>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
                <?php if(auth()->guard()->check()): ?>
                    <?php echo $__env->make('layouts.menu.partials.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <?php echo $__env->make('layouts.menu.partials.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </li>
            <li class="web-menu">
             

              <?php if(\Request::route()->getName() != "cart.checkout"): ?>
                <a  id="desCartLink" onclick="openNav()" class="btn btn-neutral btn-icon btn-cart" style="cursor:pointer;">
                  <span class="btn-inner--icon">
                    <i class="fa fa-shopping-cart"></i>
                  </span>
                  <span class="nav-link-inner--text"><?php echo e(__('Cart')); ?></span>
              </a>
              <?php endif; ?>

            </li>
            <li class="mobile-menu">
              <?php echo $__env->yieldContent('addiitional_button_1_mobile'); ?>
              <?php echo $__env->yieldContent('addiitional_button_2_mobile'); ?>
              <?php if(\Request::route()->getName() != "cart.checkout"): ?>
                <a  id="mobileCartLink" onclick="openNav()" class="nav-link" style="cursor:pointer;">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="nav-link-inner--text"><?php echo e(__('Cart')); ?></span>
                </a>
              <?php endif; ?>


            </li>
          </ul>
        </ul>
      </div>
    </div>

  </nav>
<?php /**PATH E:\xampp\htdocs\fastgo\resources\views/layouts/menu/top.blade.php ENDPATH**/ ?>