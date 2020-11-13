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

use Spatie\Sitemap\SitemapGenerator;

Auth::routes();

Route::group(['namespace' => 'Auth'], function (){
    Route::get('dang-ki', 'RegisterController@getRegister')->name('get.register');
    Route::post('dang-ki', 'RegisterController@postRegister')->name('post.register');
    Route::get('xac-nhan-tai-khoan', 'RegisterController@verifyAccount')->name('get.verifyaccount.register');

    Route::get('dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap', 'LoginController@postLogin')->name('post.login');
    Route::get('dang-xuat', 'LoginController@getLogout')->name('get.logout.user');

    Route::get('/lay-lai-mat-khau', 'ForgotPasswordController@getForgotPassword')->name('get.forget.password');
    Route::post('/lay-lai-mat-khau', 'ForgotPasswordController@sendCoderesetPassword');
    Route::get('/khoi-phuc-mat-khau', 'ForgotPasswordController@getresetPassword')->name('get.reset.password');
    Route::post('/khoi-phuc-mat-khau', 'ForgotPasswordController@resetPassword');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('danh-muc/{slug}', 'CategoryController@getListProduct')->name('get.list.product');
Route::get('san-pham/{slug}', 'ProductDetailController@productDetail')->name('get.detail.product');
Route::get('bai-viet', 'ArticleController@getListArticle')->name('get.list.article');
Route::get('bai-viet/{slug}', 'ArticleController@articleDetail')->name('get.detail.article');
Route::get('tin-tuc', 'ArticleController@getRssFeed')->name('get.list.rssfeed');

Route::prefix('shopping')->group(function (){
    Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('/delete/{id}','ShoppingCartController@deleteProductItem')->name('delete.shopping.cart');
    Route::get('/update','ShoppingCartController@updateProductItem')->name('update.shopping.cart');
    Route::get('danh-sach','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');


});

Route::group(['prefix' => 'gio-hang','middleware' => 'CheckLoginUser'],function (){
    Route::get('/thanh-toan','ShoppingCartController@getFromPay')->name('get.form.pay');
    Route::post('/thanh-toan','ShoppingCartController@saveInforShoppingCart')->name('post.form.pay');
    Route::get('thanh-toan-paypal','ShoppingCartController@payPal')->name('get.paypal');
    Route::get('paypal-callback','ShoppingCartController@payPalSuccess')->name('get.paypal.success');
    Route::get('thanh-toan-vnpay','ShoppingCartController@vnPaySuccess')->name('get.vnpay.success');
});
Route::group(['prefix' => 'ajax'],function (){
    Route::post('/view-product','HomeController@viewedProduct')->name('post.product.view');

});

Route::group(['prefix' => 'user','middleware' => 'CheckLoginUser'],function (){
    Route::get('/','UserController@updateUser')->name('user.dashboard');
    Route::post('/', 'UserController@saveupdateUser');
    Route::get('/password','UserController@updatePassword')->name('user.update.password');
    Route::post('/password','UserController@saveupdatePassword');
    Route::get('/transaction','UserController@index')->name('user.transaction.dashboard');
    Route::get('/view/{id}', 'UserController@viewOrders')->name('user.get.view.order');
});

Route::get('lien-he','ContactController@getContact')->name('get.contact');
Route::post('lien-he','ContactController@saveContact');

Route::get('san-pham', 'CategoryController@getListProduct')->name('get.search.product');
Route::get('sitemap', function (){
    SitemapGenerator::create('http://webshopping.com')->writeToFile('sitemap_com1.xml');
    return 'Created sitemap!!';
});
