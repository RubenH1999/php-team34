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

use App\Http\Controllers\Gebruiker\TimeTableController;

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', function () {
//    return view('home');
//});
Route::get('logout', 'Auth\LoginController@logout');


Route::get('/', 'Gebruiker\HomePageController@index');


Route::resource('ticket_kopen', 'Gebruiker\TicketKopenController');
Route::get('ticket_kopen/add/{id}', 'Gebruiker\TicketKopenController@addToCart');
Route::get('ticket_kopen/delete/{id}', 'Gebruiker\TicketKopenController@deleteFromCart');


Route::get('/medewerker', 'Medewerker\MedewerkerController@index');

Route::middleware(['auth'])->group(function () {
    Route::resource('profiel', 'Gebruiker\ProfielController');
    Route::get('/gebruiker', 'Gebruiker\gebruikerController@index');
    Route::resource('personal-timetable', 'Gebruiker\TimeTableController');
    Route::resource('add/{id}','Gebruiker\ArtiestController', ['parameters'
    => ['{id}' => 'your_name']]);

});



Route::resource('info', 'Gebruiker\InfoController');
Route::get('line-up', 'Gebruiker\ArtiestController@index');
Route::get('line-up/{id}', 'Gebruiker\ArtiestController@show');

Route::resource('info', 'Gebruiker\InfoController');

Route::middleware(['auth', 'medewerker'])->group(function () {
    Route::get('/medewerker', 'Medewerker\MedewerkerController@index');
    Route::resource('shifts', 'Medewerker\MedewerkerShiftController');
    Route::resource('shifts-employees', 'Medewerker\ShiftController');

});

Route::get('help', function()
{
    if (auth()->user()->type_id == 4)
    {
        return view('Help/verantwoordelijke');
    }
    elseif(auth()->user()->type_id == 3)
    {
        return view('Help/medewerker');
    }
    elseif (auth()->user()->type_id == 2){
        return view('Help/gebruiker');
    }
});




Route::middleware(['auth', 'verantwoordelijke'])->group(function () {
    Route::resource('performances', 'Verantwoordelijke\PerformanceController');
    Route::resource('employees', 'Verantwoordelijke\EmployeeController');
    Route::resource('news', 'Verantwoordelijke\NewsController');
    Route::resource('Uurrooster', 'Verantwoordelijke\UurroosterBeherenController');
    Route::get('/verantwoordelijke', 'Verantwoordelijke\VerantwoordelijkeController@index');
    Route::resource('tasks', 'Verantwoordelijke\TaskController');
    Route::resource('artists', 'Verantwoordelijke\ArtistController');
    Route::resource('tickets', 'Verantwoordelijke\TicketController');
    Route::resource('festivals', 'Verantwoordelijke\FestivalController');


});


Route::middleware(['auth'])->group(function () {
    Route::resource('profiel', 'Gebruiker\ProfielController');
    Route::get('/gebruiker', 'Gebruiker\gebruikerController@index');
});
