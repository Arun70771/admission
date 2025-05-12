<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SauPaymentController;
use App\Http\Controllers\ShortPaymentController;
use App\Http\Controllers\MsPaymentController;
use App\Http\Controllers\PhdPaymentController;

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

Route::get('send-mail', [MailController::class, 'index']);

Route::get('/', function () {
    return view('index');
});
Route::get('/b-tech', function () {
    return view('index');
});
Route::get('/m-tech', function () {
    return view('index');
});
Route::get('/PhD', function () {
    return view('index');
});


Route::get('SignIn', function () {
    return view('login');
});
Route::get('ForgetPassword', function () {
    return view('ForgetPassword');
});
Route::post('forget', [App\Http\Controllers\LoginController::class, 'forget']);

Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout']);
Route::get('otp/{id}', function () {
    return view('otp');
});
Route::get('otp/{id}', [App\Http\Controllers\LoginController::class, 'otp']);
Route::post('/checkLogin', [App\Http\Controllers\LoginController::class, 'checkLogin']);
Route::post('verifyOtp', [App\Http\Controllers\LoginController::class, 'verifyOtp']);
Route::post('userRegister', [App\Http\Controllers\LoginController::class, 'userRegister']);
Route::post('index.php/userRegister', [App\Http\Controllers\LoginController::class, 'userRegister']);

Route::get('generate-pdf/{id}', [PDFController::class, 'adminGeneratePDF']);

Route::group(["middleware" => "cauth"], function () {
    Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
    Route::get('candidate-profile', function () {
        return view('candidate-profile');
    });
    Route::get('/addUser', [App\Http\Controllers\LoginController::class, 'addUser']);
    Route::get('/step1', [App\Http\Controllers\HomeController::class, 'step1']);
    Route::get('/step2', [App\Http\Controllers\HomeController::class, 'step2']);
    Route::get('/step3', [App\Http\Controllers\HomeController::class, 'step3']);
    Route::get('/step4', [App\Http\Controllers\HomeController::class, 'step4']);
    Route::get('/step5', [App\Http\Controllers\HomeController::class, 'step5']);
    Route::get('/step6', [App\Http\Controllers\HomeController::class, 'step6']);
    Route::get('/step7', [App\Http\Controllers\HomeController::class, 'step7']);

    Route::post('/insert1', [App\Http\Controllers\HomeController::class, 'insert1']);
    Route::post('/insert2', [App\Http\Controllers\HomeController::class, 'insert2']);
    Route::post('/insert3', [App\Http\Controllers\HomeController::class, 'insert3']);
    Route::post('/insert4', [App\Http\Controllers\HomeController::class, 'insert4']);
    Route::post('/insert5', [App\Http\Controllers\HomeController::class, 'insert5']);
    Route::post('/insert6', [App\Http\Controllers\HomeController::class, 'insert6']);
    Route::get('/insert6', [App\Http\Controllers\HomeController::class, 'insert6']);
    Route::post('/insert7', [App\Http\Controllers\HomeController::class, 'insert7']);

    Route::get('complated', [App\Http\Controllers\HomeController::class, 'complated'])->name('complated');;
    Route::get('application-form-preview', [App\Http\Controllers\HomeController::class, 'preview']);
    Route::get('/submission-closed', function () {return view('submission-close');})->name('submission-close');


    Route::get('/contact-form', [App\Http\Controllers\CaptchaServiceController::class, 'index']);

    Route::get('/short_term_application_fee', [App\Http\Controllers\ApplicationController::class, 'short_term_application_fee']);
    Route::get('/short_term_payment_url', [ShortPaymentController::class, 'generatePaymentUrl'])->name('short.payment.url');


    Route::get('/ms_application_fee', [App\Http\Controllers\ApplicationController::class, 'ms_application_fee']);
    Route::get('/ms_payment_url', [MsPaymentController::class, 'generatePaymentUrl'])->name('ms.payment.url');


    Route::get('/phd_application_fee', [App\Http\Controllers\ApplicationController::class, 'phd_application_fee']);
    Route::get('/php_payment_url', [PhdPaymentController::class, 'generatePaymentUrl'])->name('phd.payment.url');

    

    Route::get('/application_refund', [App\Http\Controllers\ApplicationController::class, 'application_refund_form'])->name('application_refund');
    Route::post('/application_refund', [App\Http\Controllers\ApplicationController::class, 'handle_application_refund'])->name('handle_application_refund');
});

Route::post('/short_term_payment/success', [ShortPaymentController::class, 'paymentResponse'])->name('shortaymentResponse');
Route::post('/ms_payment/success', [MsPaymentController::class, 'paymentResponse'])->name('mspaymentResponse');
Route::post('/phd_payment/success', [PhdPaymentController::class, 'paymentResponse'])->name('mspaymentResponse');


Route::post('/captcha-validation', [App\Http\Controllers\CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [App\Http\Controllers\CaptchaServiceController::class, 'reloadCaptcha']);



Route::controller(FileController::class)->group(function () {
    Route::get('file-upload', 'index');
    Route::post('file-upload', 'store')->name('file.store');
});



Route::get('/payment', function () {
    return view('payment');
});

Route::get('/generate-payment-url', [PaymentController::class, 'generatePaymentUrl'])->name('generate.payment.url');
Route::post('/payment/success', [PaymentController::class, 'paymentResponse'])->name('paymentResponse');



Route::get('/sau-generate-payment-url', [SauPaymentController::class, 'generatePaymentUrl'])->name('saugenerate.payment.url');
Route::post('/sau-payment/success', [SauPaymentController::class, 'paymentResponse'])->name('saupaymentResponse');
//Route::get('/sau-payment/success', [SauPaymentController::class, 'paymentResponse'])->name('saupaymentResponse');