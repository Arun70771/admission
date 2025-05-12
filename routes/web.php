<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\ApplicationFormController;
use App\Http\Controllers\web\ApplicationStatusController;
use App\Http\Controllers\web\ChooseProgramsController;
use App\Http\Controllers\web\ModeAdmissionController;
use App\Http\Controllers\web\EducationDetailsController;
use App\Http\Controllers\web\UploadDocumentsControllerer;

use App\Http\Controllers\web\PayController;
use App\Http\Controllers\web\PreviewController;
use App\Http\Controllers\web\ProgrammeControllerroller;

use App\Http\Controllers\web\RegistrationFormController;
use App\Http\Controllers\web\UserController;
use App\Http\Controllers\web\SauPaymentController;
use App\Http\Controllers\web\PaymentSuccess;
use App\Http\Controllers\web\ApplicationPdf;
use App\Http\Controllers\web\OtpController;
use App\Http\Controllers\web\CoursesFeeController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\OfferLetterController;


use Mews\Captcha\Captcha;
use Illuminate\Support\Facades\Auth;


#Route::get('/', [UserController::class, 'home'])->name('sign-in');
#Route::get('/login', [UserController::class, 'home'])->name('login');


Route::get('/login', function () {
  if (Auth::check()) {
      // If the user is logged in, redirect to 'application-status' route
      return redirect()->route('application-status');
  } else {
      // If the user is not logged in, show the sign-in page
      return view('web.sign-in');
  }
})->name('login');;

Route::get('/', function () {
  if (Auth::check()) {
      // If the user is logged in, redirect to 'application-status' route
      return redirect()->route('application-status');
  } else {
      // If the user is not logged in, show the sign-in page
      return view('web.sign-in');
  }
})->name('sign-in');


Route::get('/otp/{encodedId}', function () { return view('web.otp');})->name('otp');
Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('send-otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('resendOtp');


//Route::post('/send-otp', [OtpController::class, 'sendOtp'])->middleware('throttle:5,1'); // 5 requests per minute
//Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->middleware('throttle:3,1');

Route::get('/forgot', function () { return view('web.forgot');})->name('forgot');
Route::get('/confirm-password', function () { return view('web.confirm-password');})->name('confirm-password');

Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::get('/registration-form', function () { return view('web.registration-form');})->name('registration-form');
Route::post('/register', [RegistrationFormController::class, 'store'])->name('register.store');

Route::get('/registration-form/{encodedId}', [RegistrationFormController::class, 'edit'])->name('register.edit');
Route::put('/registration-form/{encodedId}', [RegistrationFormController::class, 'update'])->name('register.update');


Route::get('/registration-review/{encodedId}', [RegistrationFormController::class, 'review'])->name('registration.review');

Route::post('/sau-payment/success', [SauPaymentController::class, 'paymentResponse'])->name('saupaymentResponse');
Route::get('/sau-payment/success', [SauPaymentController::class, 'paymentResponse'])->name('saupaymentResponse');


Route::group(['prefix' => 'panel'], function () {
    Route::middleware(['auth:user'])->group(function () {

        Route::get('/application-pdf', [ApplicationPdf::class, 'index'])->name('application-pdf');
        Route::get('/payment-success',[PaymentSuccess::class, 'index'])->name('payment-success');

        Route::get('/application-form', [ApplicationFormController::class ,'index'])->name('application-form');
        Route::post('/application-form', [ApplicationFormController::class ,'store'])->name('store.application-form');
        Route::put('/update-application-form/{id}', [ApplicationFormController::class, 'update'])->name('update.application-form');

        Route::post('/application-status',[ApplicationStatusController::class,'index'] )->name('application-status');
        Route::get('/application-status',[ApplicationStatusController::class,'index'] )->name('application-status');
        
        Route::get('/choose-programs',[ChooseProgramsController::class,'index'] )->name('programme.index');
        Route::post('/choose-programs', [ChooseProgramsController::class, 'store'])->name('store.programme');

        Route::get('/mode-of-admissions', [ModeAdmissionController::class,'index'])->name('index.mode-of-admissions');
        Route::post('/mode-of-admissions', [ModeAdmissionController::class,'store'])->name('store.mode-of-admissions');
        Route::put('/mode-of-admission/{id}', [ModeAdmissionController::class, 'update'])->name('update.mode-of-admissions');
       
        Route::get('/educational-details', [EducationDetailsController::class,'index'])->name('index.educational-details');
        Route::post('/educational-details', [EducationDetailsController::class,'store'])->name('store.educational-details');
        Route::put('/educational-details/{id}', [EducationDetailsController::class, 'update'])->name('update.educational-details');

        Route::get('/file-upload', [UploadDocumentsControllerer::class,'index'])->name('index.file-upload');
        Route::post('/file-upload-next', [UploadDocumentsControllerer::class,'next'])->name('document.next');
        Route::post('/document-upload', [UploadDocumentsControllerer::class, 'upload'])->name('document.upload');
        Route::post('/document-upload-pdf', [UploadDocumentsControllerer::class, 'uploadPdf'])->name('document.uploadPdf');

        Route::post('/document-update/{id}', [UploadDocumentsControllerer::class, 'update'])->name('document.update');
        
        Route::get('/preview', [PreviewController::class,'index'])->name('index.preview');
        Route::post('/preview', [PreviewController::class,'store'])->name('store.preview');    

        Route::get('/payment', [PayController::class,'index'])->name('index.payment');
        Route::post('/payment', [PayController::class,'store'])->name('store.payment');
        
        Route::get('/instructions-page', function () { return view('web.instructions-page');})->name('instructions-page');
      
      //  Route::get('/upload-documents',[UploadDocumentsControllerroller::class,'index'])->name('upload-documents');
        Route::get('/logout', [UserController::class, 'userLogout'])->name('user.logout');

        // Route::get('/generate-payment-url', [PaymentController::class, 'generatePaymentUrl'])->name('generate.payment.url');
        // Route::post('/payment/success', [PaymentController::class, 'paymentResponse'])->name('paymentResponse');

        Route::get('/sau-generate-payment-url', [SauPaymentController::class, 'generatePaymentUrl'])->name('saugenerate.payment.url');
        Route::get('/courses-fee-payment',[CoursesFeeController::class, 'coursesFee'])->name('courses-fee-payment');
        Route::get('/custom-fee-payment',[CoursesFeeController::class, 'customPayment'])->name('custom-fee-payment');

       

        

    });
});

Route::get('/payment-complete', [PaymentSuccess::class, 'index'])->name('index.complete');


//Admin Route

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
  Route::get('/logout', [AdminController::class, 'adminLogout'])->name('logout');

  Route::middleware(['auth:admin'])->group(function () {
      Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
      Route::get('/reports/programmes', [ReportController::class, 'programmes'])->name('reports.programmes');
      Route::get('/reports/virtual-compus', [ReportController::class, 'virtualCampusCourses'])->name('reports.virtual');
      Route::get('/reports/results', [ReportController::class, 'ResultsCampusCourses'])->name('reports.results');
      Route::get('/reports/country', [ReportController::class, 'country'])->name('reports.country');
      Route::get('/reports/day', function () { return view('admin.reports.phd'); })->name('reports.day');
      Route::get('/reports/programmes/{course}', [ReportController::class, 'courseReport'])->name('reports.course.report');
      Route::get('/reports/applicant/{application_id}', [ReportController::class, 'applicationDetails'])->name('reports.applicant.application_id');
      Route::get('/reports/applicant/application-pdf/{application_id}', [ReportController::class, 'application_pdf'])->name('reports.applicant.application_pdf.application_id');
      Route::get('/tables', function () { return view('admin.tables'); });

      Route::group(['prefix' => 'offer-letter', 'as' => 'offer.'], function () {
          Route::get('/rejected', [OfferLetterController::class, 'rejected'])->name('rejected');
          Route::get('/documents', [OfferLetterController::class, 'documents'])->name('documents');
          Route::get('/level-1', [OfferLetterController::class, 'level1'])->name('level1');
          Route::get('/level-2', [OfferLetterController::class, 'level2'])->name('level2');
          Route::get('/send-offer-letter', [OfferLetterController::class, 'sendOfferLetter'])->name('send');
      });



    //   Route::group(['prefix' => 'EntranceMode'], function () {
    //     Route::get('/selected-candidate', [SelectedCandidateController::class, 'selectedCandidate'])->name('entrance-mode.selected-candidate');
    // });
     




  });
});



Route::get('/refresh-captcha', function () {
  return response()->json(captcha_src('default'));
});