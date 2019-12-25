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

Route::get('/', function () {
    return view('frontend.index');
})->name('index');


//User Routes
Auth::routes();

Route::group(['prefix' => '/user'], function (){

 Route::get('/home', 'Frontend\UserController@index')->name('user.deshboard');
 Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');


});



//Admin Routes
Route::group(['prefix' => '/admin'], function (){
    Route::get('/home', 'Backend\AdminController@index')->name('admin.deshboard');

    //Admin Login Routes
    Route::get('/login', 'Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');

    //Forget password
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    //Reset Password
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');

});


// Category Routes
Route::group(['prefix' => '/category'], function (){

    Route::get('/add',[
       'uses' => 'Backend\CategoryController@index',
       'as' => 'add-category'
    ]);

    Route::get('/manage',[
       'uses' => 'Backend\CategoryController@manageCategory',
       'as' => 'manage-category'
    ]);

    Route::post('/save',[
       'uses' => 'Backend\CategoryController@saveCategory',
       'as' => 'new-category'
    ]);

    Route::get('/unpublished/{id}',[
       'uses' => 'Backend\CategoryController@unpublishedCategory',
       'as' => 'unpublished-category'
    ]);

    Route::get('/published/{id}',[
       'uses' => 'Backend\CategoryController@publishedCategory',
       'as' => 'published-category'
    ]);

    Route::get('/edit/{id}',[
       'uses' => 'Backend\CategoryController@editCategory',
       'as' => 'edit-category'
    ]);

    Route::get('/delete/{id}',[
       'uses' => 'Backend\CategoryController@deleteCategory',
       'as' => 'delete-category'
    ]);

    Route::post('/update',[
        'uses' => 'Backend\CategoryController@updateCategory',
        'as' => 'update-category'
    ]);

});


// Brand Routes
Route::group(['prefix' => '/brand'], function (){

    Route::get('/add',[
        'uses' => 'Backend\BrandController@index',
        'as' => 'add-brand'
    ]);

    Route::get('/manage',[
        'uses' => 'Backend\BrandController@manageBrand',
        'as' => 'manage-brand'
    ]);

    Route::post('/save',[
        'uses' => 'Backend\BrandController@saveBrand',
        'as' => 'new-brand'
    ]);

    Route::get('/unpublished/{id}',[
        'uses' => 'Backend\BrandController@unpublishedBrand',
        'as' => 'unpublished-brand'
    ]);

    Route::get('/published/{id}',[
        'uses' => 'Backend\BrandController@publishedBrand',
        'as' => 'published-brand'
    ]);

    Route::get('/edit/{id}',[
        'uses' => 'Backend\BrandController@editBrand',
        'as' => 'edit-brand'
    ]);

    Route::get('/delete/{id}',[
        'uses' => 'Backend\BrandController@deleteBrand',
        'as' => 'delete-brand'
    ]);

    Route::post('/update',[
        'uses' => 'Backend\BrandController@updateBrand',
        'as' => 'update-brand'
    ]);

});


// Division Routes
Route::group(['prefix' => '/division'], function (){

    Route::get('/add',[
        'uses' => 'Backend\DivisionController@index',
        'as' => 'add-division'
    ]);

    Route::get('/manage',[
        'uses' => 'Backend\DivisionController@manageDivision',
        'as' => 'manage-division'
    ]);

    Route::post('/save',[
        'uses' => 'Backend\DivisionController@saveDivision',
        'as' => 'new-division'
    ]);

    Route::get('/unpublished/{id}',[
        'uses' => 'Backend\DivisionController@unpublishedDivision',
        'as' => 'unpublished-division'
    ]);

    Route::get('/published/{id}',[
        'uses' => 'Backend\DivisionController@publishedDivision',
        'as' => 'published-division'
    ]);

    Route::get('/edit/{id}',[
        'uses' => 'Backend\DivisionController@editDivision',
        'as' => 'edit-division'
    ]);

    Route::get('/delete/{id}',[
        'uses' => 'Backend\DivisionController@deleteDivision',
        'as' => 'delete-division'
    ]);

    Route::post('/update',[
        'uses' => 'Backend\DivisionController@updateDivision',
        'as' => 'update-division'
    ]);

});


// District Routes
Route::group(['prefix' => '/district'], function (){

    Route::get('/add',[
        'uses' => 'Backend\DistrictController@index',
        'as' => 'add-district'
    ]);

    Route::get('/manage',[
        'uses' => 'Backend\DistrictController@manageDistrict',
        'as' => 'manage-district'
    ]);

    Route::post('/save',[
        'uses' => 'Backend\DistrictController@saveDistrict',
        'as' => 'new-district'
    ]);

    Route::get('/unpublished/{id}',[
        'uses' => 'Backend\DistrictController@unpublishedDistrict',
        'as' => 'unpublished-district'
    ]);

    Route::get('/published/{id}',[
        'uses' => 'Backend\DistrictController@publishedDistrict',
        'as' => 'published-district'
    ]);

    Route::get('/edit/{id}',[
        'uses' => 'Backend\DistrictController@editDistrict',
        'as' => 'edit-district'
    ]);

    Route::get('/delete/{id}',[
        'uses' => 'Backend\DistrictController@deleteDistrict',
        'as' => 'delete-district'
    ]);

    Route::post('/update',[
        'uses' => 'Backend\DistrictController@updateDistrict',
        'as' => 'update-district'
    ]);

});


// Product Routes
Route::group(['prefix' => '/product'], function (){

    Route::get('/add',[
        'uses' => 'Backend\ProductController@index',
        'as' => 'add-product'
    ]);

    Route::get('/manage',[
        'uses' => 'Backend\ProductController@manageProduct',
        'as' => 'manage-product'
    ]);

    Route::post('/save',[
        'uses' => 'Backend\ProductController@saveProduct',
        'as' => 'new-product'
    ]);

    Route::get('/unpublished/{id}',[
        'uses' => 'Backend\ProductController@unpublishedProduct',
        'as' => 'unpublished-product'
    ]);

    Route::get('/published/{id}',[
        'uses' => 'Backend\ProductController@publishedProduct',
        'as' => 'published-product'
    ]);

    Route::get('/edit/{id}',[
        'uses' => 'Backend\ProductController@editProduct',
        'as' => 'edit-product'
    ]);

    Route::get('/delete/{id}',[
        'uses' => 'Backend\ProductController@deleteProduct',
        'as' => 'delete-product'
    ]);

    Route::post('/update',[
        'uses' => 'Backend\ProductController@updateProduct',
        'as' => 'update-product'
    ]);

});



