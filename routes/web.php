<?php

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

use App\Cart;
use App\Contact;
use App\Product;
use App\Category;

Auth::routes();
Route::pattern('id','[0-9]+');
/* website route */
Route::get('/','WebConfig@index');
Route::get('/about','WebConfig@about');
Route::get('/contact','WebConfig@contact');
Route::get('/shipping-and-policies','WebConfig@terms');
Route::get('/category/{category_slug}','WebConfig@category');
Route::get('/category/{category_slug}?page={N}','WebConfig@category');
// Route::get('/product_detail/{product_slug}','WebConfig@product');
Route::get('/category/{category_slug}/{product_slug}','WebConfig@product');
Route::post('/newsletter','WebConfig@newsletter');
Route::post('/review','WebConfig@review');
Route::resource('/checkout','CheckoutController');
Route::get('/account','WebConfig@account');
Route::resource('/cart','CartController');
Route::resource('/wishlist','WishlistController');
Route::post('/contactmail','WebConfig@contactmail');
 Route::post('/contact', 'WebConfig@sendContactRequest')->name('contact.submit');
/* end website route */
//Route::get('/', 'MainController@main')->name('/');
Route::get('updatePrice', 'OrderController@updatePrice');
Route::get('updateChart', 'OrderController@updatePrice');
Route::get('deleteSession', 'OrderController@deleteSession');
Route::post('/productCart','CartController@product');



Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::post('/profile/{id}', 'AdminController@updateProfile')->name('admin.updateProfile');
    Route::get('/login', 'cPanel\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'cPanel\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'cPanel\AdminLoginController@adminLogout')->name('admin.logout');
    Route::resource('/category', 'CategoryController')->except('show');
    
    Route::resource('/product', 'ProductController')->except('show');
     Route::get('/product/{product}/reviews', 'ProductController@reviews')->name('product.reviews');
    Route::delete('/product/{product}/reviews', 'ProductController@reviewsdestroy')->name('review.destroy');
    Route::get('/product/{product}/editImages', 'ProductController@editImages')->name('product.editImages');
    Route::post('/product/{product}/editImages', 'ProductController@saveImage')->name('product.saveImage');
    Route::delete('/product/{product}/editImages', 'ProductController@deleteImage')->name('product.deleteImage');
    Route::resource('/about', 'AboutController')->only(['index', 'edit', 'update']);
    Route::resource('/contact', 'ContactUsController')->only(['index', 'edit', 'update']);
    Route::resource('/imageslider', 'ImageSliderController')->except('show');
    Route::resource('/brand', 'BrandsController')->except('show');
    Route::resource('/order', 'OrderController')->except('show');
     Route::get('/shippedorder', 'OrderController@shippied')->name('order.shipped');
    Route::get('/deliveredorder', 'OrderController@ordered')->name('order.delivered');
    Route::get('/canceledorder', 'OrderController@canceled')->name('order.canceled');
    Route::put('/order/{order}/status', 'OrderController@changeOrderStatus')->name('order.changeOrderStatus');
    Route::get('/export-orders', 'OrderController@export')->name('export-orders');
    Route::resource('/customer', 'CustomerController')->except('show');
    Route::get('/export-customers', 'CustomerController@export')->name('export-customers');
    Route::get('/order/findCustomer', 'OrderController@findCustomer')->name('admin.findCustomer');
    Route::get('/order/{id}/findCustomer', 'OrderController@findCustomer')->name('admin.findCustomer');
    Route::get('/order/findProduct', 'OrderController@findProduct')->name('admin.findProduct');
    Route::get('/order/{id}/findProduct', 'OrderController@findProduct')->name('admin.findProduct');
    Route::get('monthly', 'AdminController@getMonthlyChart')->name('admin.monthlyChart');
    Route::get('yearly', 'AdminController@getYearlyChart')->name('admin.yearlyChart');
    Route::get('daily', 'AdminController@index')->name('admin.daily');
     Route::resource('/message','MessageController')->only(['index','show','destroy']);
     Route::resource('/branch','BranchController')->except('show');
     Route::resource('/banner','BannerController')->except('show');
     Route::resource('/state','StateController')->except('show');
     Route::resource('/city','CityController')->except('show');
     Route::resource('coupon','CouponsController')->except('show');
     Route::resource('mails','MailController')->except('show');
    Route::get('send_mail', 'MailController@send_view')->name('mails.send');
    Route::post('send_mail', 'MailController@send_mail')->name('mails.send');
     Route::resource('/subcategory','SubCategoryController')->except('show');
     Route::get('shipping&policies', 'ShippingAndPoliciesController@index')->name('shipping.policies');
    Route::Put('shipping&policies', 'ShippingAndPoliciesController@update')->name('shipping.policies.update');
});

Auth::routes();

Route::get('/home', 'WebConfig@index');

Route::post('getCity','WebConfig@getCity')->name('getCity');
Route::post('promoActive','WebConfig@promoActive')->name('promoActive');
Route::get('/upd',function(){
    $categories = Category::all();
    foreach ($categories as $category) {
        $category->update(['category_slug'=> str_slug($category->name, '-') . '-' . $category->id]);
    }

});
// route::get('testsss/{name}',function(){
//     return str_slug(request()->name, '-');
// });

