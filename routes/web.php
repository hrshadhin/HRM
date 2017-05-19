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

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/','UserController@login')->name('home');
Route::get('/login','UserController@login')->name('user.login');
Route::post('/login','UserController@postLogin');
Route::group(['middleware' => 'role'], function () {
    Route::resource('user','UserController');
    Route::get('/dashboard','DashboardController@index')->name('user.dashboard');
    Route::get('/profile','UserController@profile')->name('user.profile');
    Route::get('/logout','UserController@logout')->name('user.logout');
    Route::get('/lock','UserController@lock')->name('user.lock');
    Route::resource('project','ProjectController');
    Route::get('/project-by-type/{ptype}','ProjectController@projectByType')->name('project.bytype');
    Route::resource('flat','FlatController');
    Route::get('/flats-by-project/{project}','FlatController@flatByProject')->name('flat.byproject');
    Route::resource('customer','CustomerController');
    Route::get('/customer-ajax/{customerId}','CustomerController@customerAjax')->name('customer.ajax');
    Route::resource('rent','RentController');
    Route::get('/rent/customers/{projectId}','RentController@customerByProject')->name('customer.byproject');
    Route::get('/rent/flats/{customerId}','RentController@flatsByCustomer')->name('flat.bycustomer');
    Route::resource('collection','CollectionController');
    Route::resource('expense','ExpenseController');

    Route::get('/report/projects','ReportController@projects')->name('report.projects');
    Route::get('/report/flats','ReportController@flats')->name('report.flats');
    Route::get('/report/customers','ReportController@customers')->name('report.customers');
    Route::get('/report/rents','ReportController@rents')->name('report.rents');
    Route::get('/report/collections','ReportController@collections')->name('report.collections');
    Route::get('/report/dues','ReportController@dues')->name('report.dues');
    Route::get('/report/expenses','ReportController@expenses')->name('report.expenses');
    Route::get('/report/balance','ReportController@balance')->name('report.balance');

    Route::get('/mail-compose','DashboardController@mailCompose')->name('mail.compose');
    Route::post('/mail-send','DashboardController@mailSend')->name('mail.send');

});

Route::get('/make-link',function(){
    App::make('files')->link(storage_path('app/public'), public_path('storage'));
    return 'Done link';
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return 'clear cache';
});
Route::get('/notification-read','DashboardController@deleteNotification')->name('notification.read');
