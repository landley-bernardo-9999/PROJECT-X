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

Route::get('/propertymgmt', 'AppsController@propertymgmt');

Route::get('/financialmgmt', 'AppsController@financialmgmt');

Route::get('/ancillaryservicesmgmt', 'AppsController@ancillaryservicesmgmt');

Route::get('/dormhealthmgmt', 'AppsController@dormhealthmgmt');

Route::get('/inventorymgmt', 'AppsController@inventorymgmt');

Route::get('/reportsandstats', 'AppsController@reportsandstats');

Route::get('/profile', 'HomeController@profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'rooms'=> 'RoomsController',
    'residents'=> 'ResidentsController',
    'owners'=> 'OwnersController',
    'repairs'=> 'RepairsController',
    'maintenances' => 'MaintenancesController',
    'violations' => 'ViolationsController',
    'contracts' => 'ContractsController',
    'transactions' => 'TransactionsController',
    'coTenants' => 'CoTenantsController',
]);
    
Route::get('/', 'SearchController@index');
Route::get('/action', 'SearchController@action')->name('search.action');