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

Route::get('/', function () {
    return view('welcome');
});
//Route::match('/', ['uses'=>'WelcomeController@execute', 'as'=>'/']);





Route::get('/preview', 'PreviewController@execute')->name('preview');

Route::match(['get', 'post'],'/forecast/{id?}', ['uses'=>'ForecastController@execute', 'as'=>'forecast'], ['id' => 1] ,function ($id = '1'){
    return $id;
});

//Route::get('/forecast/{match_id}', 'ForecastController@execute')->name('forecast');
//Route::post('/forecast', 'ForecastController@execute')->name('forecast');
Route::post('/forecastconfirm', 'ForecastController@execute')->name('forecastconfirm');
Route::get('/complited', 'ComplitedController@execute')->name('complited');
Route::get('/ratings', 'RatingsController@execute')->name('ratings');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// логин через соцсети
Route::post('ulogin', 'UloginController@login');
// подгружаем юмор
Route::post('/humorLoad', 'ajax\humorLoad@load');
// учитываем просмотры
Route::post('/perlViews', 'ajax\humorLoad@views');
// Ставим лайк перлу
Route::post('/perlLikes', 'ajax\humorLoad@likes');
// Добавляем шутку
Route::post('/addPerl', 'ajax\humorLoad@adds');
// Добавляем картинку - аватар для турнира
Route::post('/addAvatar', 'ajax\events@adds');