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
//use App\Task;
//use App\Category;

Route::get('/', 'PagesController@index');

Route::resource('tasks', 'TaskController');

Route::get('/tasks', 'TaskController@index');

Route::get('/tasks/{task}', 'TaskController@show');

Route::resource('category', 'CategoryController');

//Route::get('create_categories', function() {
//$task = Task::findOrFail(1);

//$task->categories()->create([

//'title' => 'after rain',

//]);

//return 'Susses';
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
