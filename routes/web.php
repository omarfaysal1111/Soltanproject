<?php


use App\Http\Controllers\API\HistoryController;
use App\Models\history_models;
use App\Models\User;


use Illuminate\Support\Facades\Route;
global $i;
$i=["0"];
Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list', [HistoryController::class, 'index']);
Route::get('/form/{id}', [HistoryController::class, 'createForm']);
Route::get('/', [HistoryController::class, 'createForm2']);

Route::get('/new', [HistoryController::class, 'store']);
Route::get('/search', [HistoryController::class, 'search'])->name('search');
Route::get('/remove/{id}', function($id){
    history_models::destroy($id);
    return back();

});
Route::get('Login', [HistoryController::class,'Login'])->name('login');
Route::get('/removeAll', function(){
    history_models::truncate();
    return back();

});

Route::get('/addId/{id}', function($id){

// return $GLOBALS["ids"][0];
    //log($ids.'');
});
Route::get('/newUser',[HistoryController::class,'storeUser']);
Route::get('/all-tweets-csv',[HistoryController::class,'listID'])->name('down');

