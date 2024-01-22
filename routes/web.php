<?php
use Illuminate\Support\Facades\Route;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

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

Route::get('/', function () {

    return view('welcome', [
        'countries' => Country::all(),
        'states' => State::all(),
        'cities' => City::find(1),
    ]);
});

Route::get('api/country/states/{country}', function (Country $country) {
    $State = State::where('country_id', $country->id)->get();
    return response()->json($State);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
