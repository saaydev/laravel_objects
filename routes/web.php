<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Objects;
use App\Models\ObjectsArticles;

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
foreach(Objects::get() as $item){

    Route::get("{object_type}", function(Request $request, $object_type){
        
        $item = Objects::where("type", $object_type)->first();
        $items = $item->get_items();
        $menu = Objects::get();
        return view("object", compact("item", "items", "menu"));
    });
}

Route::post("/objects/article/create/", function(Request $request){

    $objectArticle = new ObjectsArticles($request->input());
    $objectArticle->save();
    return redirect($request->server("HTTP_REFERER"));

})->name("object-article-create");

Route::get("/objects/article/edit/{id}", function(){
    $article = ObjectArticles::where("id", $id);
    return view("article-edit", compact("article"));
})->name("objects-article-edit");

Route::get('/', function () {
    $items = Objects::get();
    $menu = $items;
    return view('objects', compact("items", "menu"));
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

Route::get('delete/article/{id}', function(Request $request){
    
});