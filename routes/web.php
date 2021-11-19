<?php

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

use App\Models\User;
use  Illuminate\Support\Facades\Cache;
use  Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    Cache::rememberForever('key',fn() => '$value');
	User::create([
		'name' => 'Name' . Str::random(),
		'email' => Str::random() . '@lol.com',
		'password' => bcrypt(Str::random()),
	]);
	$data  = \App\Models\User::all();
	return json_encode($data);

});
