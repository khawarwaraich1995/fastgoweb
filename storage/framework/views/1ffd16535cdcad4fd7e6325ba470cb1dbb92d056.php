<?php if(strlen(config('settings.recaptcha_site_key'))>2): ?>
<?php $__env->startSection('head'); ?>
<?php echo htmlScriptTagJsApi([]); ?>

<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>


<!-- <div class="container-fluid mt-7">
        <div class="row">

            </div>
            <div class="col-xl-8 offset-xl-2">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0"><?php echo e(__('Register your restaurant')); ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  id="registerform" method="post" action="<?php echo e(route('newrestaurant.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Restaurant information')); ?></h6>

                            <?php if(session('status')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('status')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="name"><?php echo e(__('Restaurant Name')); ?></label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Restaurant Name here')); ?> ..." value="<?php echo e(isset($_GET["name"])?$_GET['name']:""); ?>" required autofocus>
                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Owner information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('name_owner') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="name_owner"><?php echo e(__('Owner Name')); ?></label>
                                    <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative<?php echo e($errors->has('name_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Owner Name here')); ?> ..." value="<?php echo e(isset($_GET["name"])?$_GET['name']:""); ?>" required autofocus>

                                    <?php if($errors->has('name_owner')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name_owner')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('email_owner') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="email_owner"><?php echo e(__('Owner Email')); ?></label>
                                    <input type="email" name="email_owner" id="email_owner" class="form-control form-control-alternative<?php echo e($errors->has('email_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Owner Email here')); ?> ..." value="<?php echo e(isset($_GET["email"])?$_GET['email']:""); ?>" required autofocus>

                                    <?php if($errors->has('email_owner')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('email_owner')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('phone_owner') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="phone_owner"><?php echo e(__('Owner Phone')); ?></label>
                                    <input type="text" name="phone_owner" id="phone_owner" class="form-control form-control-alternative<?php echo e($errors->has('phone_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Owner Phone here')); ?> ..." value="<?php echo e(isset($_GET["phone"])?$_GET['phone']:""); ?>" required autofocus>

                                    <?php if($errors->has('phone_owner')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('phone_owner')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="text-center">
                                    <?php if(strlen(config('settings.recaptcha_site_key'))>2): ?>
                                        <?php if($errors->has('g-recaptcha-response')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                        </span>
                                        <?php endif; ?>

                                        <?php echo htmlFormButton(__('Save'), ['id'=>'thesubmitbtn','class' => 'btn btn-success mt-4']); ?>

                                    <?php else: ?>
                                        <button type="submit" id="thesubmitbtn" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div> -->

<div class="container-fluid mt-7">
    <section class="contact-us mt-10">
        <div class="bg-shape-style"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="contact-from">
                        <h5>Register Now</h5>
                        <form id="registerform" method="post" action="<?php echo e(route('newrestaurant.store')); ?>" autocomplete="off">
                        <?php echo csrf_field(); ?>
                            <input type="text" name="name" id="name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Restaurant Name here')); ?> ..." value="<?php echo e(isset($_GET["name"])?$_GET['name']:""); ?>" required autofocus>
                            <?php if($errors->has('name')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative<?php echo e($errors->has('name_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Owner Name here')); ?> ..." value="<?php echo e(isset($_GET["name"])?$_GET['name']:""); ?>" required autofocus>

                            <?php if($errors->has('name_owner')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('name_owner')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <input type="email" name="email_owner" id="email_owner" class="form-control form-control-alternative<?php echo e($errors->has('email_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Owner Email here')); ?> ..." value="<?php echo e(isset($_GET["email"])?$_GET['email']:""); ?>" required autofocus>

                            <?php if($errors->has('email_owner')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email_owner')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <input type="text" name="phone_owner" id="phone_owner" class="form-control form-control-alternative<?php echo e($errors->has('phone_owner') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Owner Phone here')); ?> ..." value="<?php echo e(isset($_GET["phone"])?$_GET['phone']:""); ?>" required autofocus>

                            <?php if($errors->has('phone_owner')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('phone_owner')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <input type="submit" value="Free Registration">
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="contact-home-chef">
                        <div class="section-header">
                            <h3>Register Your Restaurant</h3>
                            <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use
                            </p>
                        </div>
                        <div class="section-wrapper">
                            <div class="contact-count-item">
                                <div class="contact-count-inner">
                                    <div class="contact-count-thumb">
                                        <img src="<?php echo e(asset('kato')); ?>/assets/images/contac/icon/01.png" alt="food-contact">
                                    </div>
                                    <div class="contact-count-content">
                                        <h5><span class="counter">24896</span>+</h5>
                                        <p>Food</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-count-item">
                                <div class="contact-count-inner">
                                    <div class="contact-count-thumb">
                                        <img src="<?php echo e(asset('kato')); ?>/assets/images/contac/icon/02.png" alt="food-contact">
                                    </div>
                                    <div class="contact-count-content">
                                        <h5><span class="counter">2.5</span>K</h5>
                                        <p>Clints</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-count-item">
                                <div class="contact-count-inner">
                                    <div class="contact-count-thumb">
                                        <img src="<?php echo e(asset('kato')); ?>/assets/images/contac/icon/03.png" alt="food-contact">
                                    </div>
                                    <div class="contact-count-content">
                                        <h5><span class="counter">250</span>+</h5>
                                        <p>Chef</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="contact-thumb">
                        <img src="<?php echo e(asset('kato')); ?>/assets/images/contac/01.png" alt="food-contact">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php if(isset($_GET['name'])&&$errors->isEmpty()): ?>
<script>
    "use strict";
    document.getElementById("thesubmitbtn").click();
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', ['title' => __('User Profile')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fastgo\resources\views/restorants/register.blade.php ENDPATH**/ ?>