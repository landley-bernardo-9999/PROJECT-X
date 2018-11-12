<?php
 use Illuminate\Support\Facades\Input;
 use Illuminate\Database\Query\Builder;
 use App\Residents;
 use App\Contracts;
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
    if(Auth::guest()){
        return view('auth.login');
    }
    else
        return view('/home');
});

Route::get('/propertymgmt', 'AppsController@propertymgmt')->middleware('verified');

Route::get('/financialmgmt', 'AppsController@financialmgmt');

Route::get('/ancillaryservicesmgmt', 'AppsController@ancillaryservicesmgmt');

Route::get('/dormhealthmgmt', 'AppsController@dormhealthmgmt');

Route::get('/inventorymgmt', 'AppsController@inventorymgmt');

Route::get('/reportsandstats', 'AppsController@reportsandstats');

Route::get('/profile', 'HomeController@profile')->middleware('verified');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resources([
    '/propertymgmt/rooms'=> 'RoomsController',
    '/propertymgmt/residents'=> 'ResidentsController',
    '/propertymgmt/owners'=> 'OwnersController',
    '/propertymgmt/repairs'=> 'RepairsController',
    '/propertymgmt/maintenances' => 'MaintenancesController',
    '/propertymgmt/violations' => 'ViolationsController',
    '/propertymgmt/contracts' => 'ContractsController',
    '/propertymgmt/transactions' => 'TransactionsController',
]);


Route::get('/search/residents{s?}', 'ResidentsController@index')->where('s', '[\w\d]+');
Route::get('/search/rooms{s?}', 'RoomsController@index')->where('s', '[\w\d]+');



    

