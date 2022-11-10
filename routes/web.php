<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\login;
use App\Http\Controllers\loginAdmin;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserChangeInfoController;
use App\Http\Controllers\UserOrderHistoryController;
use App\Http\Controllers\UserFeedbackController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminCustomerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



// HOME
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);

//PRODUCT
Route::get('/allProduct', [ProductController::class, 'allProduct']);
Route::get('/srAllProductName', [ProductController::class, 'srAllProductName']);
Route::get('/srAllProductFilter', [ProductController::class, 'srAllProductFilter']);
Route::get('/srAllProductPrice', [ProductController::class, 'srAllProductPrice']);

Route::get('/categoryProduct/{category_id}', [ProductController::class, 'categoryProduct']);
Route::get('/srCategoryProductName/{category_id}', [ProductController::class, 'srCategoryProductName']);
Route::get('/srCategoryProductFilter/{category_id}', [ProductController::class, 'srCategoryProductFilter']);
Route::get('/srCategoryProductPrice/{category_id}', [ProductController::class, 'srCategoryProductPrice']);

Route::get('/productDetail/{id}', [ProductController::class, 'productDetail']);

//CART
Route::get('/cart', [ProductController::class, 'cart']);
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart']);
Route::patch('/update-cart', [ProductController::class, 'update']);
Route::delete('/remove-from-cart', [ProductController::class, 'remove']);

//CHECK OUT
Route::post('/storeOrder', [ProductController::class, 'storeOrder']);


//LOGIN
Route::get('/signUp', [login::class, 'signUp']);
Route::post('postSignUp', [login::class, 'postSignUp']);
Route::get('/signIn', [login::class, 'signIn']);
Route::post('/checkLoginAdmin', [loginAdmin::class, 'checkLoginAdmin']);
Route::get('/logoutAdmin', [loginAdmin::class, 'logoutAdmin']);
Route::get('/logoutUser', [loginAdmin::class, 'logoutUser']);


//ADMIN

Route::prefix('admin')->name('admin')->middleware('CheckLogin:admin')->group(function () {

    //DASHBORAD
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    // PRODUCT
    //*****************************************************************************************************
    Route::get('/viewProduct', [AdminProductController::class, 'index']);

    //CREATE PRODUCT
    Route::get('/createProduct', [AdminProductController::class, 'create']);
    Route::post('/postCreateProduct', [AdminProductController::class, 'postCreate']);
    //UPDATE PRODUCT
    Route::get('/updateProduct/{id}', [AdminProductController::class, 'update']);
    Route::post('/postUpdateProduct/{id}', [AdminProductController::class, 'postUpdate']);
    // *****************************************************************************************************

    //ORDER
    // *****************************************************************************************************
    Route::get('/viewOrder', [AdminOrderController::class, 'index']);
    //UPDATE ORDER (CONFIRM ORDER)
    Route::get('/updateOrder/{id}', [AdminOrderController::class, 'updateOrder']);
    Route::post('/postUpdateOrder/{id}', [AdminOrderController::class, 'postUpdateOrder']);
    //DELETE ORDER
    Route::get('order/deleteOrder/{id}', [AdminOrderController::class, 'deleteOrder']);
    Route::get('order/PostDeleteOrder/{id}', [AdminOrderController::class, 'PostDeleteOrder']);
    // ******************************************************************************************************


    //FEEDBACK
    //***************************************************************************************************** */
    Route::get('/viewFeedback', [AdminFeedbackController::class, 'viewFeedback']);
    // REPLY FEEDBACK
    Route::get('/replyFeedback/{id}', [AdminFeedbackController::class, 'replyFeedback']);
    Route::post('/postReplyFeedback/{id}', [AdminFeedbackController::class, 'postReplyFeedback']);
    // DELETE FEEDBACK
    Route::get('/deleteFeedback/{id}', [AdminFeedbackController::class, 'deleteFeedback']);
    // ******************************************************************************************************

    //STAFF
    //***************************************************************************************************** */
    Route::get('/viewStaff', [AdminStaffController::class, 'viewStaff']);
    // CREATE STAFF
    Route::get('/createStaff', [AdminStaffController::class, 'createStaff']);
    Route::post('/postStaffCreate', [AdminStaffController::class, 'postStaffCreate']);
    // UPDATE STAFF
    Route::get('/updateStaff/{email}', [AdminStaffController::class, 'updateStaff']);
    Route::post('/postStaffUpdate/{email}', [AdminStaffController::class, 'postStaffUpdate']);
    // DELETE STAFF
    Route::get('/deleteStaff/{email}', [AdminStaffController::class, 'deleteStaff']);
    // LOCK STAFF
    Route::get('/lockStaff/{email}', [AdminStaffController::class, 'lockStaff']);
    // ****************************************************************************************************

    //CUSTOMER
    //***************************************************************************************************** */
    Route::get('/viewCustomer', [AdminCustomerController::class, 'viewCustomer']);
     // DELETE CUSTOMER
    Route::get('/deleteCustomer/{email}', [AdminCustomerController::class, 'deleteCustomer']);
     // LOCK CUSTOMER
    Route::get('/lockCustomer/{email}', [AdminCustomerController::class, 'lockCustomer']);
    // ****************************************************************************************************

});

Route::prefix('user_2')->name('user_2')->middleware('CheckLogin:user_2')->group(function () {

    //PROFILE
    Route::get('/info/{id}', [UserProfileController::class, 'info']);
    //CHANGE INFORMATION
    Route::get('/changeInfo/{id}', [UserChangeInfoController::class, 'changeInfo']);
    Route::post('/postChangeInfo/{id}', [UserChangeInfoController::class, 'postChangeInfo']);
    //CHANGE PASSWORD
    Route::get('/changePass/{id}', [UserProfileController::class, 'changePass']);
    Route::post('/postChangePass/{id}', [UserProfileController::class, 'postChangePass']);
    //ORDER HISTORY
    Route::get('/orderHistory/{id}', [UserOrderHistoryController::class, 'orderHistory']);
    Route::get('/orderDelete/{id}', [UserOrderHistoryController::class, 'orderDelete']);
    //FEEDBACK
    Route::get('/postFeedback/{id}', [UserFeedbackController::class, 'postFeedback']);
    //HISTORY FEEDBACK
    Route::get('/feedbackHistory/{id}', [UserFeedbackController::class, 'feedbackHistory']);

});
