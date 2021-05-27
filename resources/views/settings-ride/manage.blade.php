@extends('layouts.app', ['title' => __('Ride Settings')])

@section('content')
    @include('users.partials.header', [
    'title' => __('Ride Section Settings'),
    'class' => 'col-lg-12',
    ])
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
                        @if ($message = Session::get('success'))
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <form id="settings" method="post" action="{{ url('ridesettings/update/' . ($settings->id ?? '')) }}"
                            autocomplete="off" enctype="multipart/form-data">
                            @csrf
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
                                            href="#rsection" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"><i class="ni ni-money-coins"></i> Ride Section Content</a>
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
                                        @php
                                            if (isset($settings->cod) && $settings->cod == 1) {
                                                $checked = 'checked';
                                            } else {
                                                $checked = '';
                                            }
                                        @endphp
                                        <input value="1" {{ $checked }} type="checkbox" class="custom-control-input"
                                            name="cod" id="cod">
                                        <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($settings->enable_stripe) && $settings->enable_stripe == 1) {
                                                    $checked = 'checked';
                                                } else {
                                                    $checked = '';
                                                }
                                            @endphp
                                            <input value="1" {{ $checked }} type="checkbox"
                                                class="custom-control-input" name="enable_stripe" id="enable_stripe">
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
                                            value="{{ $settings->location_search_radius ?? 0 }}">
                                        <small class="text-muted"><strong>Maximum distance from location from where users
                                                can select routes</strong></small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Default payment type</label><br>
                                        <select class="form-control form-control-alternative" name="default_payment_type">
                                            <option value="stripe"
                                                {{ isset($settings->default_payment_type) && $settings->default_payment_type == 'stripe' ? 'selected' : '' }}>
                                                Stripe
                                                Card Processing</option>
                                            <option value="cod"
                                                {{ isset($settings->default_payment_type) && $settings->default_payment_type == 'cod' ? 'selected' : '' }}>
                                                COD
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="currency">Currency</label>
                                        <input step=".01" type="text" name="currency" id="currency"
                                            class="form-control form-control" value="{{ $settings->currency ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="driver_percent">Driver percentage from
                                            delivery fee</label>
                                        <input step=".01" type="number" name="driver_percent" id="driver_percent"
                                            class="form-control form-control" min="0"
                                            value="{{ $settings->driver_percent ?? 0 }}">
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">App Links</h6>
                                    <div id="form-group-playstore" class="form-group focused">
                                        <label class="form-control-label" for="playstore">Play Store</label>
                                        <input step=".01" type="text" name="playstore" id="playstore"
                                            class="form-control form-control" placeholder="Play Store link here ..."
                                            value="{{ $settings->playstore ?? '' }}">
                                    </div>
                                    <div id="form-group-appstore" class="form-group">
                                        <label class="form-control-label" for="appstore">App Store</label>
                                        <input step=".01" type="text" name="appstore" id="appstore"
                                            class="form-control form-control" placeholder="App Store link here ..."
                                            value="{{ $settings->appstore ?? '' }}">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rsection" role="tabpanel" aria-labelledby="rsection">
                                    <div>
                                        <h4 class="display-4 mb-0">Ride Section</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label class="form-control-label" for="rs_title">Title</label>
                                            <input step=".01" type="text" name="rs_title" id="rs_title"
                                                class="form-control form-control"
                                                value="{{ $settings->rs_title ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="rs_desc">Description</label>
                                            <textarea class="form-control" name="rs_desc"
                                                id="rs_desc">{{ $settings->rs_desc ?? '' }}</textarea>
                                        </div>
                                        <div class="form-group text-center">
                                            <label class="form-control-label" for="input-name">Image
                                                Image</label>
                                            <div class="text-center">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px;">
                                                        @php
                                                        if(isset($settings) && !empty($settings->rs_image) && File::exists(public_path(ORIGNAL_IMAGE_PATH_CATEGORIES.$settings->rs_image)))
                                                        {
                                                        $path = BASE_URL.ORIGNAL_IMAGE_PATH_CATEGORIES.$settings->rs_image;
                                                        }else
                                                        {
                                                        $path = NO_IMAGE;
                                                        }
                                                        @endphp
                                                        <img src="{{$path}}" alt="...">
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-outline-secondary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>


                                                            <input type="file" name="rs_image"
                                                                accept="image/x-png,image/gif,image/jpeg">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments">
                                    <div>
                                        <h4 class="display-4 mb-0">Stripe</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label class="form-control-label" for="stripe_key">Stripe API key</label>
                                            <input step=".01" type="text" name="stripe_key" id="stripe_key"
                                                class="form-control form-control"
                                                value="{{ $settings->stripe_key ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="secret_key">Stripe API
                                                Secret</label>
                                            <input step=".01" type="text" name="secret_key" id="secret_key"
                                                class="form-control form-control"
                                                value="{{ $settings->secret_key ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="stripe_currecny">Stripe Currency</label>
                                            <input step=".01" type="text" name="stripe_currecny" id="stripe_currecny"
                                                class="form-control form-control"
                                                value="{{ $settings->stripe_currecny ?? '' }}">
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

    @include('layouts.footers.auth')
    </div>
@endsection
