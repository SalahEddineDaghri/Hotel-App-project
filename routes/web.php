<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

// (Hotel) USER index
Route::get('/myaccount/edit', [UserController::class, 'cusedit']);
Route::post('/myaccount/addimage', [UserController::class, 'cusfoto']);
Route::get('/myaccount/{id}/delete-foto', [UserController::class, 'delfoto']);
Route::post('/myaccount/{id}/update', [UserController::class, 'updatefront']);
Route::get('/myaccount', [UserController::class, 'profile']);
Route::get('/history', [UserController::class, 'history']);
// (Hotel) Index route
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/rooms', [IndexController::class, 'room']);
Route::post('/rooms', [IndexController::class, 'roompost']);
Route::get('/facilities', [IndexController::class, 'facility']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/pesan', [IndexController::class, 'pesan'])->name('pesan');
// (Hotel) Order index
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);
Route::post('/order', [OrderController::class, 'index']);
Route::post('/order/post', [OrderController::class, 'order']);
Route::get('/bayar/{id}', [OrderController::class, 'pembayaran']);
Route::post('/bayar', [OrderController::class, 'bayar']);
// (Hotel) Payment Dashboard Function & invoice
Route::post('/dashboard/payment/tolak', [PaymentController::class, 'tolak']);
Route::post('/dashboard/payment/confirm', [PaymentController::class, 'confirmation']);
Route::get('/dashboard/payment/invoice', [TransactionController::class, 'paymentinvoice']);
// (Hotel) Room Index
Route::get('/rooms/{no}', [RoomController::class, 'roomshow']);
Route::post('/rooms/{no}', [RoomController::class, 'roomshowpost']);

// (Hotel) dashboard Index
Route::get('/dashboard', [DashboardController::class, 'index']);
// (Hotel) Room Dashboard Index & function CRUD data & image
Route::get('/dashboard/data/room', [RoomController::class, 'index']);
Route::get('/dashboard/data/room/{room:no}/add-image', [RoomController::class, 'addimage']);
Route::post('/dashboard/data/room/{room:no}/store-image', [RoomController::class, 'storeimage']);
Route::any('/dashboard/data/room/26D/image/{id}/delete', [RoomController::class, 'deleteimage']);
Route::get('/dashboard/data/room/create', [RoomController::class, 'create']);
Route::get('/dashboard/data/room/{id}/edit', [RoomController::class, 'edit']);
Route::get('/dashboard/data/room/{room:no}', [RoomController::class, 'show']);
Route::post('/dashboard/data/room/{id}/update', [RoomController::class, 'update']);
Route::post('/dashboard/data/room/post', [RoomController::class, 'post']);
Route::any('/dashboard/data/room/{id}/delete', [RoomController::class, 'delete'])->name('room.delete');
// (Hotel) Status Dashboard Index & function CRUD data
Route::get('/dashboard/data/status', [StatusController::class, 'index']);
Route::get('/dashboard/data/status/create', [StatusController::class, 'create']);
Route::post('/dashboard/data/status/post', [StatusController::class, 'post']);
Route::get('/dashboard/data/status/{id}/edit', [StatusController::class, 'edit']);
Route::post('/dashboard/data/status/{id}/update', [StatusController::class, 'update']);
Route::any('/dashboard/data/status/{id}/delete', [StatusController::class, 'delete']);
// (Hotel) Type Dashboard Index & function CRUD data
Route::get('/dashboard/data/type', [TypeController::class, 'index']);
Route::get('/dashboard/data/type/create', [TypeController::class, 'create']);
Route::get('/dashboard/data/type/{id}/edit', [TypeController::class, 'edit']);
Route::post('/dashboard/data/type/post', [TypeController::class, 'post']);
Route::post('/dashboard/data/type/{id}/update', [TypeController::class, 'update']);
Route::post('/dashboard/data/type/delete', [TypeController::class, 'delete']);
// (Hotel) User Dashboard Index & function CRUD data
Route::get('/dashboard/user', [UserController::class, 'index']);
Route::get('/dashboard/user/create', [UserController::class, 'create']);
Route::get('/dashboard/user/{user:username}/edit', [UserController::class, 'edit']);
Route::post('/dashboard/user/post', [UserController::class, 'post']);
Route::post('/dashboard/user/update', [UserController::class, 'update']);
Route::any('/dashboard/user/{id}/delete', [UserController::class, 'delete']);
// (Hotel) Ordering Dashboard (Order offline via admin) payment etc
Route::get('/dashboard/order', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/dashboard/order/history', [TransactionController::class, 'history']);
Route::get('/dashboard/order/create-identity', [TransactionController::class, 'create_identity'])->name('createidentity');
Route::post('/dashboard/order/viewcountperson', [TransactionController::class, 'viewperson'])->name('countperson');
Route::get('/dashboard/order/viewcountperson', [TransactionController::class, 'errorget'])->name('countget');
Route::post('/dashboard/order/chooseroom', [TransactionController::class, 'chooseroom'])->name('chooseroom');
Route::get('/dashboard/order/chooseroom', [TransactionController::class, 'errorget'])->name('chooseroomget');
Route::get('/dashboard/order/pick', [TransactionController::class, 'pick'])->name('pick');
Route::post('/dashboard/order/confirmation', [TransactionController::class, 'confirmation'])->name('confirmation');
Route::get('/dashboard/order/confirmation', [TransactionController::class, 'errorget'])->name('confirmationget');
Route::post('/dashboard/order/pay', [TransactionController::class, 'payDownPayment'])->name('payDownPayment');
// (Hotel) History payment & debt payment & invoice
Route::get('/dashboard/order/history-pay', [PaymentController::class, 'index'])->name('py');
Route::get('/dashboard/order/history-pay/{id}', [PaymentController::class, 'invoice'])->name('payment.invoice');
Route::get('/dashboard/order/{id}/pay-debt', [PaymentController::class, 'debt']);
Route::post('/dashboard/order/debt', [PaymentController::class, 'pays'])->name('paydebt');
// (Hotel) Notifiable dashboard
Route::post('/dashboard/notif', [DashboardController::class, 'notifiable']);
Route::get('/dashboard/markall', [DashboardController::class, 'markall']);

// Login Register Logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [LoginController::class, 'store']);
Route::any('/logout', [LoginController::class, 'logout']);

// // payment
// Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
// Route::post('/payment/paypal', [PaymentController::class, 'paypal'])->name('payment.paypal');
// Route::post('/payment/bank-transfer', [PaymentController::class, 'bankTransfer'])->name('payment.bank-transfer');
// Route::post('/payment/mobile-money', [PaymentController::class, 'mobileMoney'])->name('payment.mobile-money');

// // routes/web.php
// Route::get('/stripe/checkout', [StripeController::class, 'checkout']);
// Route::get('/stripe/success', [StripeController::class, 'success']);
// Route::get('/stripe/cancel', [StripeController::class, 'cancel']);

// // routes/web.php
// Route::get('/paypal/pay', [PayPalController::class, 'createPayment'])->name('paypal.payment');
// Route::get('/paypal/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.success');
// Route::get('/paypal/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.cancel');

// routes/web.php
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');

// Étape 2 : rediriger vers Stripe Checkout

Route::post('/stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');

// Success / Cancel
Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');


Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ar'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');


Route::get('/currency/{currency}', function ($currency) {
    $currencies = ['MAD', 'USD', 'EUR'];  // العملات اللي كتدعمها
    if (in_array($currency, $currencies)) {
        Session::put('currency', $currency);
    }
    return redirect()->back();
})->name('currency.switch');
