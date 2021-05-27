<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.partials.header', [
    'title' => __('Ride Section Settings'),
    'class' => 'col-lg-12',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Settings Management</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if($message = Session::get('success')): ?>
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e($message); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form id="settings" method="post"
                            action="<?php echo e(url('ridesettings/update/'.($settings->id ?? ''))); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active show" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                                class="ni ni-bullet-list-67 mr-2"></i>Site Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#payments" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"><i class="ni ni-money-coins"></i> Payments</a>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="custom-control custom-checkbox">
                                        <?php
                                        if(isset($settings->cod) && $settings->cod == 1)
                                        {
                                            $checked = "checked";
                                        }else{
                                            $checked = "";
                                        }
                                        ?>
                                        <input value="1" <?php echo e($checked); ?> type="checkbox" class="custom-control-input"
                                            name="cod" id="cod">
                                        <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <?php
                                            if(isset($settings->enable_stripe) && $settings->enable_stripe == 1)
                                            {
                                                $checked = "checked";
                                            }else{
                                                $checked = "";
                                            }
                                            ?>
                                            <input value="1" <?php echo e($checked); ?> type="checkbox" class="custom-control-input"
                                                name="enable_stripe" id="enable_stripe">
                                            <label class="custom-control-label" for="enable_stripe">Enable stripe for
                                                payments when ordering</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="form-control-label" for="location_search_radius">Allowed radius from
                                            Location</label>
                                        <input step=".01" type="number" name="location_search_radius"
                                            id="location_search_radius" class="form-control" min="0"
                                            value="<?php echo e($settings->location_search_radius ?? 0); ?>">
                                        <small class="text-muted"><strong>Maximum distance from location from where users
                                                can select routes</strong></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Default payment type</label><br>
                                        <select class="form-control form-control-alternative" name="default_payment_type">
                                            <option value="stripe"
                                                <?php echo e(isset($settings->default_payment_type) && $settings->default_payment_type == 'stripe' ? 'selected' : ''); ?>>Stripe
                                                Card Processing</option>
                                            <option value="cod"
                                                <?php echo e(isset($settings->default_payment_type) && $settings->default_payment_type == 'cod' ? 'selected' : ''); ?>>COD
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="driver_percent">Driver percentage from
                                            delivery fee</label>
                                        <input step=".01" type="number" name="driver_percent" id="driver_percent"
                                            class="form-control form-control" min="0"
                                            value="<?php echo e($settings->driver_percent ?? 0); ?>">
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">App Links</h6>
                                    <div id="form-group-playstore" class="form-group focused">
                                        <label class="form-control-label" for="playstore">Play Store</label>
                                        <input step=".01" type="text" name="playstore" id="playstore"
                                            class="form-control form-control" placeholder="Play Store link here ..."
                                            value="<?php echo e($settings->playstore ?? ''); ?>">
                                    </div>
                                    <div id="form-group-appstore" class="form-group">
                                        <label class="form-control-label" for="appstore">App Store</label>
                                        <input step=".01" type="text" name="appstore" id="appstore"
                                            class="form-control form-control" placeholder="App Store link here ..."
                                            value="<?php echo e($settings->appstore ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments">
                                    <div>
                                        <h4 class="display-4 mb-0">Stripe</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label class="form-control-label" for="stripe_key">Stripe API key</label>
                                            <input step=".01" type="text" name="stripe_key" id="stripe_key"
                                                class="form-control form-control" value="<?php echo e($settings->stripe_key ?? ''); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="secret_key">Stripe API
                                                Secret</label>
                                            <input step=".01" type="text" name="secret_key" id="secret_key"
                                                class="form-control form-control" value="<?php echo e($settings->secret_key ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => __('Ride Settings')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMP\htdocs\fastgoweb\resources\views/settings-ride/manage.blade.php ENDPATH**/ ?>