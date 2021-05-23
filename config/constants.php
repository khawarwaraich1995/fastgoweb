<?php

use Illuminate\Support\Facades\Auth;

if (!app()->runningInConsole()) {

    $server_name = request()->getSchemeAndHttpHost();
    define("BASE_URL", $server_name);
    define("ADMIN_BASE_URL", $server_name . '/admin');

    define("FRONT_IMAGES", '/front/images');

    //Categories Images Path
    define("ORIGNAL_IMAGE_PATH_CATEGORIES", '/uploads/categories/orignal_images/');
    define("LARGE_IMAGE_PATH_CATEGORIES", '/uploads/categories/large_images/');
    define("MEDIUM_IMAGE_PATH_CATEGORIES", '/uploads/categories/medium_images/');
    define("SMALL_IMAGE_PATH_CATEGORIES", '/uploads/categories/small_images/');

    define("LARGE_IMAGE_PATH_OUTLET", '/uploads/outlet/large_images/');

    //Users Images Path
    define("ORIGNAL_IMAGE_PATH_USERS", '/uploads/users/orignal_images/');
    define("LARGE_IMAGE_PATH_USERS", '/uploads/users/large_images/');
    define("MEDIUM_IMAGE_PATH_USERS", '/uploads/users/medium_images/');
    define("SMALL_IMAGE_PATH_USERS", '/uploads/users/small_images/');

    //Admin Images Path
    define("ORIGNAL_IMAGE_PATH_ADMIN", '/uploads/admin/orignal_images/');
    define("LARGE_IMAGE_PATH_ADMIN", '/uploads/admin/large_images/');
    define("MEDIUM_IMAGE_PATH_ADMIN", '/uploads/admin/medium_images/');
    define("SMALL_IMAGE_PATH_ADMIN", '/uploads/admin/small_images/');

    //Default Images
    define("NO_IMAGE", 'https://www.carsfrombanks.com/frontend/assets/images/placeholder/inventory-full-placeholder.png');
} else {
    $server_name = gethostname();
}
