<style>
    .form-box {
        background-color: black;
        padding: 40px;
        opacity: 0.9;
        height: auto;
        display: flex;
        text-align: justify;
        flex-direction: column;
    }

    .rev {
        display: revert !important;
    }

    .rev h1 {
        color: purple;
        font-weight: bold;
        font-size: 35px;
    }

    hr {
        border: 1px solid #6d6161 !important;
    }

    .book-label {
        color: white;
    }

    .bg-input {
        background-color: rgb(82, 86, 89) !important;
    }


    .time-picker {
        display: flex;
        justify-content: center;
        flex-direction: column;
        transition: all 0.4s ease;
        height: 0;
        overflow: hidden;
    }

    .time-picker .set-time {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    .time-picker .label {
        width: 60px;
        margin: 0 5px;
        text-align: center;
        line-height: 34px;
        display: inline-style;
    }

    .time-picker .label a {
        display: block;
        border: 1px solid #dddddd;
        cursor: pointer;
        font-size: 28px;
        font-weight: bold;
        border-radius: 3px;
    }

    .time-picker .label a:hover,
    .time-picker .label a:active {
        background-color: red;
        color: #ffffff;
    }

    .time-picker .label .set {
        text-align: center;
        box-sizing: border-box;
        width: 100%;
        height: 40px;
        line-height: 34px;
        font-size: 20px;
        font-weight: bold;
        border: transparent;
    }

    .time-picker #submitTime {
        text-align: center;
        line-height: 34px;
        border: 1px solid #dddddd;
        width: 88px;
        margin: auto;
        border-radius: 3px;
        cursor: pointer;
        text-transform: uppercase;
        font-weight: bold;
    }

    .time-picker.open {
        border: 1px solid #dddddd;
        padding: 15px;
        transition: all 0.5s ease;
        height: auto;
        background-color: #fcfcfc;
    }

    @import  url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap");

    @import  url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css");

    * {
        padding: 0;
        margin: 0;
        list-style: none;
        border: none;
        text-decoration: none;
        box-sizing: border-box;
        -webkit-overflow-scrolling: touch;
        font-family: "Nunito", sans-serif;
    }

    body {
        background-color: #0f0f1b;
        display: grid;
        place-items: center;
    }

    html,
    body {
        height: 100%;
    }

    .component-pricing-list {
        text-align: center;
    }

    .component-pricing-list header {
        margin-bottom: 80px;
    }

    .component-pricing-list header h3 {
        font-size: 26px;
        color: #fff;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .component-pricing-list header p {
        font-size: 18px;
        color: #fff;
        line-height: 22px;
        max-width: 460px;
        margin: 0 auto;
    }

    .pricing-list {
        display: flex;
        margin: 0 -10px;
    }

    .pricing-list li {
        width: 265px;
        margin: 0 10px;
    }

    .pricing-list li a {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 267px;
        background: #171727;
        border-radius: 20px;
        padding: 35px;
        color: #fff;
        text-align: left;
        transition: 300ms background;
        position: relative;
    }

    .pricing-list li.actv a,
    .pricing-list li a:hover {
        background: #242486;
    }

    .title {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .domain-title {
        margin-bottom: 35px;
    }

    .price {
        font-weight: bold;
        font-size: 26px;
        line-height: 32px;
    }

    .price span {
        display: block;
        font-size: 16px;
        font-weight: normal;
    }

    .btn {
        font-size: 16px;
        margin-top: auto;
        display: flex;
    }

    .btn i {
        color: #fff;
        margin-left: 10px;
        transition: 300ms margin-left;
    }

    .action {
        margin-top: 64px;
        text-align: center;
    }

    .action a {
        display: inline-block;
        padding: 18px 45px;
        border-radius: 10px;
        font-size: 16px;
        color: #8080b9;
        border: 2px solid #1f1f35;
        transition: 300ms all;
    }

    .action a:hover {
        border-color: #8080b9;
        color: #fff;
    }

    .best-price {
        position: absolute;
        top: -15px;
        height: 30px;
        background-color: #a0e0b2;
        border-radius: 30px;
        color: #171727;
        font-size: 16px;
        padding: 0 18px;
        line-height: 30px;
        left: 50%;
        transform: translate(-50%);
    }

    #map-canvas {
        position: relative;
        overflow: hidden;
        height: 400px;
        width: 100%;
        margin-bottom: 50px;
    }

    .mainContainer {
        width: 350px;
        height: auto;
        padding: 30px;
        margin: 0 auto;
        box-shadow: 0 0 10px #2323;
        margin-top: 50px;
        background: white;
    }

    .cardHolder {
        height: 300px;
        background: linear-gradient(to right,
                #6480ef,
                #7775e8,
                #806ce8);
        /*   border-bottom-left-radius:50%;
  border-bottom-right-radius:50%; */
    }

    .opt>.center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .vcenter {
        display: flex;
        align-items: center;
    }

    .heading {
        height: 40px;
        font-size: 14px;
        letter-spacing: 2px;
        color: white;
    }

    .stepHeading {
        height: 20px;
        font-size: 16px;
        font-weight: bolder;
        letter-spacing: 2px;
        color: white;
    }

    .paymentactv {
        border-bottom: 3px solid green;
    }

    .card {
        height: 180px;
        width: 280px;
        background: white;
        margin: 0 auto;
        border-radius: 1.2em;
        margin-top: 25px;
        padding: 12px 20px;
    }

    .card>.part {
        height: 50px;
        margin-bottom: 4px;
    }

    .card>.top {
        display: flex;
        justify-content: flex-end;
    }

    .card>.top>img {
        height: 48px;
    }

    .infoheader {
        height: 20px;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 2px;
        color: #95a5a6
    }

    .card>.middle>.infocontent {
        justify-content: space-between;
        height: 30px;
    }

    .number {
        width: 150px;
    }

    .card>.middle>.infocontent>.num {
        height: 25px;
        font-size: 14px;
        letter-spacing: 2px;
        font-weight: bolder;
    }

    .card>.bottom {
        display: flex;
        justify-content: space-between
    }

    .holderInfo {
        width: 150px;
    }

    .holderInfo>.name,
    .expDate>.date {
        font-size: 12px;
        font-weight: bolder;
        letter-spacing: 2px;
    }

    .status {
        height: 35px;
        width: 300px;
        margin: 0 auto;
        box-shadow: 0 0 10px #2323;
        margin-top: 16px;
        padding: 0 16px;
        font-size: 12px;
        letter-spacing: 2px;
        font-weight: bolder;
    }

    .status>i {
        color: #16a085;
        margin-right: 20px;
        font-size: 16px;
    }

    .options {
        width: 250px;
        height: 75px;
        margin: 0 auto;
        justify-content: space-between;
    }

    .options>.opt {
        height: 80px;
        padding: 12px;
        box-shadow: 0 0 10px #2323;
        border-radius: 5px;
        display: flex;
        width: 120px;
        flex-direction: column;
        justify-content: center;
    }

    .options>.opt>.icon {
        height: 30px;
        width: auto;
        color: #95a5a6;
        font-size: 20px;
    }

    .optname {
        height: 30px;
        font-size: 10px;
        color: #232323;
        letter-spacing: 2px;
        font-weight: bolder
    }

    .payment {
        height: 80px;
        position: relative;
        top: 24px;
        box-shadow: 0 -5px 5px -5px #2323;
        justify-content: space-around;
    }

    .val {
        height: 40px;
        font-size: 24px;
        font-weight: bolder;
        letter-spacing: 2px;
        color: #6480ef;
    }

    .locate-button {
        float: right;
        width: 40px;
        text-align: center;
        color: white;
        padding: 0px;
        margin-top: -37px;
        outline: none;
        /* border: 4px solid #111d5e; */
        /* border-radius: 0 10px 10px 0; */
        border-left: none;
        background: none;
        font-size: 25px !important;
    }
</style>


<?php $__env->startSection('content'); ?>
<section class="section-profile-cover section-shaped my-0 d-none d-md-none d-lg-block d-lx-block">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7"></div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 my-5">
            <!-- Circles background -->
            <img class="bg-image" src="kato/assets/css/bg-image/category-bg.jpg" style="width: 100%;">

        </div>
    </div>
</section>
<section class="section">
    <div class="text-center">
        <div class="container-fluid mt--400">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="row rev">
                        <h1> Want a Ride? </h1>
                        <p> Save your time & Save your money </p>
                    </div>
                    <div class="row mt-100">
                        <div class="col-lg-12">
                            <form id="basic-form">
                                <div class="form-box">
                                    <h3 class="book-label text-center mt-0">Book Taxi Now</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="pickup_location">Pickup Location </label>
                                            <input type="text" name="pickup_location" id="location" class="form-control bg-input pickup_location">
                                            <i class="fa fa-map-marker locate-button" onclick="autoGet('location')"></i>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <label for="drop_location">Drop Location </label>
                                            <input type="text" name="drop_location" id="location2" class="form-control bg-input">
                                            <i class="fa fa-map-marker locate-button" onclick="autoGet('location2')"></i>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="checkbox" id="later">
                                                <label for="later"> Schedule Drive for Later?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-1" id="scheduleDatetime" style="display: none;">
                                        <div class="col-lg-6">
                                            <label for="pickup_date">Pickup Date Time </label>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <input class="form-control datetimepicker bg-input" name="schedule_datetime" id="schedule_datetime" placeholder="Select Date & Time" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="javascript:void(0)" onclick="displayCatagories()" class="btn btn-neutral btn-icon web-menu float-right req-quote">
                                                <span class="nav-link-inner--text"> Request Quote</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </div>
</section>
<?php if(isset($catagories)): ?>
<ul class="pricing-list mb-5" id="cat-cards" style="align-items: center;justify-content: center;display: none;">
    <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="cat-card" data-charges="<?php echo e($value->charges ?? ''); ?>" data-chargeType="<?php echo e($value->charges_type ?? ''); ?>">
        <a href="javascript:void(0)">
            <span class="title" style="text-decoration: underline;"><?php echo e($value->name ?? ''); ?></span>
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
            <span class="image"><img src="<?php echo e($image); ?>" style="height: 100px;"></span>
            <span class="price"><?php echo e($value->charges ?? ''); ?> <span>
                    <?php if ($value->charges_type == 'distance') {
                        echo "Per Kilometer";
                    } elseif ($value->charges_type == 'fixed') {
                        echo "Fixed Charges";
                    } else {
                        echo "Per Miles";
                    }
                    ?>
                </span>

            </span>
        </a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?>
<div class="component-pricing-list mb-5" id="map-container" style="display: none;">
    <div class="container">
        <input type="hidden" id="start">
        <input type="hidden" id="end">
        <div id="map-canvas"></div>
    </div>
    <ul class="pricing-list" id="pc-list" style="  align-items: center;justify-content: center;">
        <li class="actv"><a href="#">
                <span class="title" style="text-decoration: underline;">Total Distance</span>
                <span class="price" id="distance"></span>
            </a></li>
        <li><a href="#">
                <span class="best-price">
                    Best price
                </span>
                <span class="title domain-title" style="text-decoration: underline;">Price</span>
                <span class="price" id="price">
                </span>
            </a></li>
        <li><a href="#">
                <span class="title domain-title" style="text-decoration: underline;">Estimated Time</span>
                <span class="price" id="duration">
                </span>
            </a></li>
    </ul>
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="mainContainer">
                <div class="status vcenter mb-3"> <i class="fa fa-check" aria-hidden="true"></i>
                    Option : &nbsp;<span class="ptype"> COD</span>
                </div>
                <div class="options vcenter">
                    <div class="opt paymentactv" data-type="cash" id="cash">
                        <div class="icon center" style="transform: initial !important;">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <div class="optname center" style="transform: initial !important;margin-top: 2px;">COD</div>
                    </div>
                    <div class="opt" data-type="card" id="card">
                        <div class="icon center" style="transform: initial !important;">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </div>
                        <div class="optname center" style="transform: initial !important;margin-top: 2px;">Credit/Debit Card</div>
                    </div>
                </div>
                <div class="payment vcenter">
                    <div class="amount">
                        <div class="infoheader vcenter">Total Amount</div>
                        <div class="infocontent val vcenter">$ <span class="finalTotal"></span></div>
                    </div>
                    <a href="javascript:void(0)" onclick="pay()" class="btn btn-neutral btn-icon" style="margin: 0;">
                        <span class="nav-link-inner--text"> Pay</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#later").on('change', function() {
        if ($(this).prop("checked") == true) {
            $('#scheduleDatetime').css('display', 'block');
        } else if ($(this).prop("checked") == false) {
            $('#scheduleDatetime').css('display', 'none');
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', ['class' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMP\htdocs\fastgoweb\resources\views/taxi/taxi.blade.php ENDPATH**/ ?>