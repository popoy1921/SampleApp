<?php

use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;

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

// Route definitions
/*
    1. Basic Route
    2. Route Parameter
    3. Name  Routes
    4. Group Routes
    5. Route Prefixes
    6. Route Middleware
    7. Resourceful Routes
    8. API Routes
*/

// ====== Basic Route 
Route::get('/Sample1', [SampleController::class, 'ShowPage']);

// ====== Basic Route 
Route::get('/home', function () {
    return view('home');
});

// ====== Route Parameters
Route::get('/RouteParameters/{id}', function ($id) {
    return 'User ID: ' . $id;
});
Route::get('/RouteParameters/{id}/{page}', function ($id, $page) {
    return 'User ID: ' . $id  . '-' . $page;
});

// ====== Named Routes
Route::get('/NamedRoutes/Sample', function () {
    return route('NamedRoutes1');
})->name('NamedRoutes');
Route::get('/NamedRoutes/Sample1', function () {
    return redirect()->route('NamedRoutes');
})->name('NamedRoutes1');

// ====== Group Route
Route::middleware(['tester'])->group(function () {
    Route::get('/GroupRoute1', function () {
        return "Group Route 1";
    });
    Route::get('/GroupRoute2', function () {
        return "Group Route 2";
    });
});

// ======= Route Prefixes
Route::middleware(['tester'])->prefix('RoutePrefixe')->group(function () {
    Route::get('/Sample1', function () {
        return "Route Prefixe Sample 1";
    });
    Route::get('/Sample2', function () {
        return "Route Prefixe Sample 2";
    });
});

// Route Middleware
Route::get('/admin', function () {
    //
})->middleware('auth');

// Resourceful Routes
/*
    Laravel provides a convenient way to define routes for CRUD operations on a resource, such as a database model.
*/
Route::resource('photos', 'PhotoController');

// API Routes
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });