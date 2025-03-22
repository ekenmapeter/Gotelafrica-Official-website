<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ContestSubmissionController;
use App\Http\Controllers\ContestController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//GENERAL URL
Route::get('/logout-user', [UserController::class, 'logout'])->name('logout-user');
Route::get('product', [ProductController::class, 'show'])->name('product');
Route::get('creative-contest', [CommunityController::class, 'contest'])->name('creative.contest');
Route::get('apply', [CommunityController::class, 'apply'])->name('apply');

/*Administrator Login Route */
Route::middleware(['auth', 'roles:1'])->group(function()
{
    Route::get('/administrator', [AdministratorController::class, 'indexAdmin'])->name('administrator');
    Route::get('/all-product', [AdministratorController::class, 'allProduct'])->name('all-product');
    Route::get('/all-order', [AdministratorController::class, 'allOrder'])->name('all-order');
    Route::get('/all-transaction', [AdministratorController::class, 'indexTransaction'])->name('all-transaction');
    Route::get('/admin/details/{id}', [AdministratorController::class, 'adminTransDetails'])->name('admin/details');
    Route::get('/fund-wallet', [AdministratorController::class, 'fundWallet'])->name('fund-wallet');
    Route::get('/withdraw-request', [AdministratorController::class, 'WithdrawRequest'])->name('withdraw-request');
    Route::get('/admin/withdraw/details/{id}', [AdministratorController::class, 'adminWithdrawDetails'])->name('admin/withdraw/details');
    Route::get('/approve/withdraw/{id}', [AdministratorController::class,'approveWithdraw'])->name('approve/withdraw');
    Route::get('/allusers', [AdministratorController::class, 'allUsers'])->name('allusers');
    Route::get('/delete/user/{id}', [AdministratorController::class, 'deleteUser'])->name('delete/user');
    Route::get('/deposit/details/{id}', [AdministratorController::class, 'adminDepositDetails'])->name('deposit/details');
    Route::get('/deposit', [AdministratorController::class, 'userDeposit'])->name('deposit');
    Route::get('/deposit/approve/{id}', [AdministratorController::class, 'approveDeposit'])->name('deposit/approve');
    Route::get('/deposit/reject/{id}', [AdministratorController::class, 'rejectDeposit'])->name('deposit/reject');
    Route::get('/product/activate/{id}', [AdministratorController::class, 'activateProduct'])->name('product/activate');
    Route::get('/product/deactivate/{id}', [AdministratorController::class, 'deactivateProduct'])->name('product/deactivate');
    Route::get('/product/delete/{id}', [AdministratorController::class, 'deleteProduct'])->name('product/delete');


    Route::post('product-edit', [AdministratorController::class, 'editProduct'])->name('product-edit');
    Route::post('product-create', [AdministratorController::class, 'createProduct'])->name('product-create');
    Route::post('admin-fund-wallet', [AdministratorController::class,'fundWalletRequest'])->name('admin-fund-wallet');

    Route::patch('admin/submissions/{submission}/approve', [ContestController::class, 'approveSubmission'])
    ->name('approve.submission');

    // Route for the contestant page
    Route::get('/admin/contest', [AdministratorController::class, 'contestant'])->name('admin.contest');
    Route::delete('/delete/submission/{id}', [AdministratorController::class, 'deleteSubmission'])->name('delete/submission');

});

/*user Login Route */
Route::middleware(['auth', 'roles:2'])->group(function()
{
    Route::get('team', [TeamController::class, 'show'])->name('team');
    Route::get('myorder', [UserController::class, 'myOrder'])->name('myorder');
    Route::get('community', [CommunityController::class, 'show'])->name('community');
    Route::get('dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('mybankaccount', [UserController::class, 'mybankaccount'])->middleware(['auth', 'verified'])->name('mybankaccount');
    Route::get('resetpassword', [UserController::class, 'resetPasswordShow'])->middleware(['auth', 'verified'])->name('resetpassword');
    Route::get('withdrawpassword', [UserController::class, 'withdrawpassword'])->middleware(['auth', 'verified'])->name('withdrawpassword');
    Route::get('customerservice', [UserController::class, 'customerservice'])->middleware(['auth', 'verified'])->name('customerservice');
    Route::get('transaction', [UserController::class, 'transaction'])->middleware(['auth', 'verified'])->name('transaction');
    Route::get('recharge', [UserController::class, 'recharge'])->middleware(['auth', 'verified'])->name('recharge');
    Route::get('withdraw', [UserController::class, 'withdraw'])->middleware(['auth', 'verified'])->name('withdraw');
    Route::get('refer', [UserController::class, 'refer'])->middleware(['auth', 'verified'])->name('refer');
    Route::get('/details/{id}', [UserController::class, 'transDetails'])->middleware(['auth', 'verified'])->name('details');
    Route::get('/invest/{id}', [InvestController::class, 'investID'])->middleware(['auth', 'verified'])->name('invest');


    Route::post('withdraw_request', [UserController::class,'withdrawRequest'])->name('withdraw_request');
    Route::post('updateAccount', [UserController::class,'accountUpdate'])->name('updateAccount');
    Route::post('resetPasswordSave', [UserController::class,'resetPasswordSave'])->name('resetPasswordSave');
    Route::post('rechargePayment', [UserController::class, 'rechargePaymentUpload'])->name('rechargePayment');
    Route::post('investPay', [InvestController::class,'investPay'])->name('investPay');

});


/*contest Login Route */
Route::middleware(['auth', 'roles:3'])->group(function()
{
    Route::post('/contest/upload', [ContestController::class, 'upload'])->name('contest.upload');

    Route::get('/contest/dashboard', [ContestController::class, 'dashboard'])->name('contest.dashboard');
});
//General Route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/submit-entry', [ContestSubmissionController::class, 'register'])->name('submit-entry');



require __DIR__.'/auth.php';
