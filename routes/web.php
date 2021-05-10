<?php

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', function () {
    $project1 = Project::create([
        'title' => 'project One',
    ]);
    $project2 = Project::create([
        'title' => 'project Two',
    ]);
    $user1 = User::create([
        'name' => "admin1",
        'email' => 'admin1@mail.com',
        'password' => Hash::make('admin1mail')
    ]);
    $user2 = User::create([
        'name' => "admin2",
        'email' => 'admin2@mail.com',
        'password' => Hash::make('admin2mail')
    ]);
    $user3 = User::create([
        'name' => "admin3",
        'email' => 'admin3@mail.com',
        'password' => Hash::make('admin3mail')
    ]);
    $project1->users()->attach($user1);
    $project1->users()->attach($user2);
    $project1->users()->attach($user3);

    $project2->users()->attach($user1);
    $project2->users()->attach($user3);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
