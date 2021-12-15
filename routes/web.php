<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Objects;

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
    $items = Objects::get();
    return view('index', compact("items"));
});

Route::post('/object-create', function(Request $request){
    $object = new Objects([
        "title" => $request->input("title"),
        "type" => $request->input("type"),
    ]);
    $object->save();
    return redirect("/");
})->name("object-create");

Route::get('/delete/{id}', function(Request $request, $id){
    Objects::where("id", $id)->delete();
    return redirect("/");
})->name("delete");