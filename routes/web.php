<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['namespace' => 'admin'], function () {
  Route::get('/admin/home','HomeController@index')->name('admin.home');


  //update password
  Route::get('/admin/setting/change-password','setting\AdminProfileController@showPasswordPage')->name('admin.setting.password');

  Route::post('/admin/setting/change-password/update','setting\AdminProfileController@updateAdminPassword')->name('admin.setting.password.update');



  //update profile
  Route::get('/admin/setting/my-profile','setting\AdminProfileController@showMyProfile')->name('admin.setting.my-profile');
  
  Route::post('/admin/setting/my-profile/update','setting\AdminProfileController@UpdateAdminProfile')->name('admin.setting.my-profile.update');
  
  
  Route::get('/admin/product/disapproved','product\disApprovedProductController@index')->name('admin.product.disapproved');
  Route::get('/admin/product/approved','product\approvedProductController@index')->name('admin.product.approved');
  Route::get('/admin/product/pending','product\pendingProductController@index')->name('admin.product.pending');


  Route::get('/admin/merchant/approved','MerchantController@approvedList')->name('admin.merchant.approved');
  Route::get('/admin/merchant/pending','MerchantController@pendingList')->name('admin.merchant.pending');
  Route::resource('/admin/merchant','MerchantController',[
    'as' => 'admin',
  ]);

  Route::resource('/admin/customer','CustomerController',[
    'as' => 'admin',
  ]);
  
  Route::resource('/admin/product','product\ProductController',[
    'as' => 'admin',
  ]);
  
  Route::resource('/admin/sub-category','SubCategoryController',[
    'as' => 'admin',
  ]);
  
  Route::resource('/admin/category','CategoryController',[
    'as' => 'admin',
  ]);

});

Route::group(['namespace' => 'customer'], function () {

  Route::get('/','HomeController@index')->name('customer.home');

  Route::get('/product/{category_slug}/{product_slug}/{product_id}','HomeController@showProductPage')->name('customer.productPage')->where('product_slug', '.*')->where('category_slug', '.*');
  
  Route::get('/product/{slug}','HomeController@showCategoryPage')->name('customer.category');

  Route::get('/customer/home','ProfileController@home');
  Route::post('/customer/setting/update/{id}','ProfileController@updateUserInfo')->name('single_user.update');
  Route::get('/customer/setting','ProfileController@showSetting');
  
  Route::resource('/customer/orders','CustomerOrderController',[
    'as' => 'customer',
  ]);

  Route::resource('/customer/wishlist','CustomerWishlistController',[
    'as' => 'customer',
  ]);

  Route::resource('/customer/my-address','CustomerAddressController',[
    'as' => 'customer',
  ]);

  Route::resource('/customer/my-cart','CustomerCartController',[
    'as' => 'customer',
  ]);
});




Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  // Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});



Route::View('/seller','merchant.landing')->name('merchant.landing');

Route::group(['namespace' => 'merchant'], function () {

  //update password
  Route::get('/merchant/setting/change-password','setting\MerchantProfileController@showPasswordPage')->name('merchant.setting.password');

  Route::post('/merchant/setting/change-password/update','setting\MerchantProfileController@updateMerchantPassword')->name('merchant.setting.password.update');



  //update profile
  Route::get('/merchant/setting/my-profile','setting\MerchantProfileController@showMyProfile')->name('merchant.setting.my-profile');
  
  Route::post('/merchant/setting/my-profile/update','setting\MerchantProfileController@UpdateMerchantProfile')->name('merchant.setting.my-profile.update');


  Route::get('/merchant/home','HomeController@index')->name('merchant.home');

  Route::get('/merchant/product/disapproved','product\disApprovedProductController@index')->name('merchant.product.disapproved');
  Route::get('/merchant/product/approved','product\approvedProductController@index')->name('merchant.product.approved');
  Route::get('/merchant/product/pending','product\pendingProductController@index')->name('merchant.product.pending');


  Route::post('/merchant/product/get-subcategory','ProductController@getSubcategory')->name('merchant.get.subcategory');
  
  Route::resource('/merchant/product','ProductController',[
    'as' => 'merchant',
  ]);
});



Route::group(['prefix' => 'seller'], function () {
  Route::get('/login', 'MerchantAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'MerchantAuth\LoginController@login');
  Route::post('/logout', 'MerchantAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'MerchantAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'MerchantAuth\RegisterController@register');

  Route::post('/password/email', 'MerchantAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'MerchantAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'MerchantAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'MerchantAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'customer'], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});
