<?php

use App\Http\Controllers\entryController;
use App\Http\Controllers\aboutController;
use Illuminate\Support\Facades\Route;


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


/*
Route::get('/', function () {
    //return view('index');
    return view('index', ['entryName' => 'cati']);
});
*/

Route::get('/',[entryController::class,'index'])->name('index');
Route::get('/aboutus',[entryController::class,'aboutus'])->name('aboutus');
Route::post('/create',[entryController::class,'store'])->name('store');
Route::get('/search', [entryController::class,'search'])->name('search');


Route::resource('task', entryController::class);
Route::resource('about', aboutController::class);

Route::any('/search', function(){
    $q = (Input::get('q'));
    if($q != ''){
        $tasks = task::where('task_title', 'like','%'.$q.'%')->paginate(5)->setpath('');
        $tasks->appends(array(
            'q' => Input::get('q'),
        ));
        if(count($tasks)>0){
            return view('welcome')->withData($tasks);
        }
        return view('welcome')->withMessage("No Results Found");
        
    }
})

