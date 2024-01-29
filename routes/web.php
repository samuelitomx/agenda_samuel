<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserComponent;
use App\Http\Livewire\SpaceComponent;
use App\Http\Livewire\CustomerComponent;
use App\Http\Livewire\FormComponent;
use App\Http\Livewire\CalendarComponent;
use App\Http\Livewire\PaymentComponent;
use App\Http\Livewire\ProductComponent;


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

Route::get('/usuarios',UserComponent::class)->middleware('auth')->name('user');
Route::get('/salones',SpaceComponent::class)->middleware('auth')->name('space');
Route::get('/clientes',CustomerComponent::class)->middleware('auth')->name('customer');
Route::get('/formularios',FormComponent::class)->middleware('auth')->name('form');
Route::get('/calendario',CalendarComponent::class)->middleware('auth')->name('calendar');
Route::get('/pagos',PaymentComponent::class)->middleware('auth')->name('payment');
Route::get('/productos',ProductComponent::class)->middleware('auth')->name('product');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
