<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\HomeController;
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

Route::redirect('/', '/login');

Route::get('/home', function () {
    //dd(session('status'));
    // if (session('status')) {
    //     return redirect()->route('admin.loan-applications.index')->with('status', session('status'));
    // }

    return redirect()->route('admin.loan-applications.index');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {

    // Permissions
    Route::resource('personal', 'UsersProfileController');

    // Occupation
    Route::resource('occupation', 'UsersOccupationController');

    // Income-Bank Details
    Route::resource('income-bank', 'UsersIncomeBankController');

    // Loan Details
    Route::resource('loan-details', 'UsersLoanDetailsController');

    // KYC Documents
    Route::resource('kyc-document', 'UsersKYCDocumentsController');

    // Salary Documents
    Route::resource('salary-document', 'UsersSalaryDocumentsController');

    //Additional Details
    Route::resource('additional-details', 'UsersAdditionalDetailsController');

    Route::get('get-state-list','UsersProfileController@getStateList');
    Route::get('get-city-list','UsersProfileController@getCityList');
    Route::get('get-states','UsersProfileController@getStates');
    Route::get('get-cities','UsersProfileController@getCities');
});

Auth::routes();

//Admins
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Statuses
    Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusesController');

    // Loan Applications
    Route::delete('loan-applications/destroy', 'LoanApplicationsController@massDestroy')->name('loan-applications.massDestroy');
    Route::get('loan-applications/{loan_application}/analyze', 'LoanApplicationsController@showAnalyze')->name('loan-applications.showAnalyze');
    Route::post('loan-applications/{loan_application}/analyze', 'LoanApplicationsController@analyze')->name('loan-applications.analyze');
    Route::get('loan-applications/{loan_application}/send', 'LoanApplicationsController@showSend')->name('loan-applications.showSend');
    Route::post('loan-applications/{loan_application}/send', 'LoanApplicationsController@send')->name('loan-applications.send');
    Route::resource('loan-applications', 'LoanApplicationsController');

    // Comments
    Route::resource('comments', 'CommentsController');

    // Occupations
    Route::delete('occupations/destroy', 'OccupationsController@massDestroy')->name('occupations.massDestroy');
    Route::resource('occupations', 'OccupationsController');

    // Educations
    Route::delete('education-types/destroy', 'EducationTypesController@massDestroy')->name('education-types.massDestroy');
    Route::resource('education-types', 'EducationTypesController');

    // Loan Purposes
    Route::delete('loan-purposes/destroy', 'LoanPurposesController@massDestroy')->name('loan-purposes.massDestroy');
    Route::resource('loan-purposes', 'LoanPurposesController');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }

});