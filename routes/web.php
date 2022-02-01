<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UrlController;
use App\Models\Customer;
use App\Models\Url;
use App\Models\emailCustomer;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PredefinedEmailsController;
use App\Http\Controllers\TwilioSMSController;

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


Route::get('/doc', function () {
    $customers=Customer::all();
    return view('doc');
})->middleware(['auth'])->name('doc');
Route::get('/', function () {
    $customers=Customer::all();
    return view('pages.customersList',compact('customers'));
})->middleware(['auth'])->name('customers-list');
Route::get('/link/{id}', function ($id) {
$uniqueID=emailCustomer::findOrFail($id);
$uniqueID->link_clicked=1;
$uniqueID->save();
$customer=Customer::findOrFail($uniqueID->customer_id);
$customer->link_clicked=1;
$customer->save();
// print_r($customer); 
$url=Url::where('status',1)->pluck('url');
if(!empty($url[0])) {
return redirect($url[0]);} 
return redirect("error/404");
})->name('link-clicked');

Route::get('/send-email', [EmailController::class, 'sendEmail']);
// Route::post('/getdeliveries', [EmailController::class, 'getdeliveries']);

// Route::get('/save-url/{id}', [UrlController::class, 'save'])->name('save-url');
Route::post('/saveurl', [UrlController::class, 'save'])->name('saveurl');
Route::get('/redirect-to', [UrlController::class, 'index'])->name('url-list');
// Route::get('/sendSMS', [TwilioSMSController::class, 'index']);

Route::get('/emails-list', [PredefinedEmailsController::class, 'index'])->middleware(['auth', 'verified'])->name('emails-list');
Route::get('/email/{id}/update', [ PredefinedEmailsController::class ,'updateView'])->middleware(['auth', 'verified'])->name('update-email');
Route::post('/updateemail',[ PredefinedEmailsController::class ,'update'])->middleware(['auth', 'verified'])->name("updateemail");

require __DIR__.'/auth.php';
Route::get('/customer/{id}/invite', [ CustomerController::class ,'invite'])->middleware(['auth', 'verified'])->name('invite-customer');

// Route::get('/customers-list', [ CustomerController::class ,'index'])->middleware(['auth', 'verified'])->name('customers-list');
Route::get('/add-customer', function () { return view('pages.addCustomer'); })->middleware(['auth', 'verified'])->name('add-customer');
Route::post('/storecustomer',[ CustomerController::class ,'store'])->middleware(['auth', 'verified'])->name("storecustomer");

Route::get('/customer/{id}/update', [ CustomerController::class ,'updateView'])->middleware(['auth', 'verified'])->name('update-customer');
Route::post('/updatecustomer',[ CustomerController::class ,'update'])->middleware(['auth', 'verified'])->name("updatecustomer");

Route::get('/customer/{id}/delete', [ CustomerController::class ,'deleteView'])->middleware(['auth', 'verified'])->name('delete-customer');
Route::post('/deletecustomer',[ CustomerController::class ,'delete'])->middleware(['auth', 'verified'])->name("deletecustomer");

// Route::group(['prefix' => 'email'], function(){
//     Route::get('inbox', function () { return view('pages.email.inbox'); });
//     Route::get('read', function () { return view('pages.email.read'); });
//     Route::get('compose', function () { return view('pages.email.compose'); });
// });

// Route::group(['prefix' => 'apps'], function(){
//     Route::get('chat', function () { return view('pages.apps.chat'); });
//     Route::get('calendar', function () { return view('pages.apps.calendar'); });
// });

// Route::group(['prefix' => 'ui-components'], function(){
//     Route::get('accordion', function () { return view('pages.ui-components.accordion'); });
//     Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
//     Route::get('badges', function () { return view('pages.ui-components.badges'); });
//     Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
//     Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
//     Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
//     Route::get('cards', function () { return view('pages.ui-components.cards'); });
//     Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
//     Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
//     Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
//     Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
//     Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
//     Route::get('modal', function () { return view('pages.ui-components.modal'); });
//     Route::get('navs', function () { return view('pages.ui-components.navs'); });
//     Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
//     Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
//     Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
//     Route::get('progress', function () { return view('pages.ui-components.progress'); });
//     Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
//     Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
//     Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
//     Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
//     Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
// });

// Route::group(['prefix' => 'advanced-ui'], function(){
//     Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
//     Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
//     Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
// });

// Route::group(['prefix' => 'forms'], function(){
//     Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
//     Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
//     Route::get('editors', function () { return view('pages.forms.editors'); });
//     Route::get('wizard', function () { return view('pages.forms.wizard'); });
// });

// Route::group(['prefix' => 'charts'], function(){
//     Route::get('apex', function () { return view('pages.charts.apex'); });
//     Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
//     Route::get('flot', function () { return view('pages.charts.flot'); });
//     Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
//     Route::get('peity', function () { return view('pages.charts.peity'); });
//     Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
// });

// Route::group(['prefix' => 'tables'], function(){
//     Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
//     Route::get('data-table', function () { return view('pages.tables.data-table'); });
// });

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

// Route::group(['prefix' => 'general'], function(){
//     Route::get('blank-page', function () { return view('pages.general.blank-page'); });
//     Route::get('faq', function () { return view('pages.general.faq'); });
//     Route::get('invoice', function () { return view('pages.general.invoice'); });
//     Route::get('profile', function () { return view('pages.general.profile'); });
//     Route::get('pricing', function () { return view('pages.general.pricing'); });
//     Route::get('timeline', function () { return view('pages.general.timeline'); });
// });

// Route::group(['prefix' => 'auth'], function(){
//     Route::get('login', function () { return view('pages.auth.login'); });
//     Route::get('register', function () { return view('pages.auth.register'); });
// });

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');