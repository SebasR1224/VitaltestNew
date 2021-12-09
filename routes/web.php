<?php


use App\Http\Livewire\MedicinesCommerce;
use App\Http\Livewire\MedicinesCommerceCategory;

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

Route::group(['middleware' => 'auth'], function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard/home', [App\Http\Controllers\DashBoardController::class, 'index'])->name('dashboard');



// llamamos al controlador de usuarios para crear uno nuevo
Route::get('/users/create' , [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users' , [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}' , [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::post('status-update/{id}', [App\Http\Controllers\UserController::class, 'statusUser'])->name('update.status');

Route::get('/user/export/pdf',[App\Http\Controllers\UserController::class, 'exportUsersPdf'])->name('export-users-pdf');
Route::get('/user/export/excel',[App\Http\Controllers\UserController::class, 'exportUsersExcel'])->name('export-users-excel');
Route::post('/user/import',[App\Http\Controllers\UserController::class, 'importUsersExcel'])->name('import-users-excel');

//profile
Route::get('/users/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
Route::post('/profiles' , [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.create');
Route::put('/profiles/{id}' , [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::post('/users/updatePassword' , [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('update.password');
Route::post('/profileImage/{id}' , [App\Http\Controllers\UserController::class, 'newImage'])->name('new.image');

//rutas recomendaciones
//partes del cuerpo
Route::get('/recomendaciones/partes', [App\Http\Controllers\ParteController::class, 'show'])->name('partes.show');
Route::post('/recomendaciones/partes', [App\Http\Controllers\ParteController::class, 'save'])->name('parte.save');

//sintomas
Route::get('/recomendaciones/sintomas', [App\Http\Controllers\SintomaController::class, 'show'])->name('sintomas.show');
Route::post('/recomendaciones/sintomas', [App\Http\Controllers\SintomaController::class, 'save'])->name('sintoma.save');


//recomendaciones
Route::get('/recomendaciones/create', [App\Http\Controllers\RecomendacionController::class, 'create'])->name('recomendacion.create');
Route::post('/recomendaciones' , [App\Http\Controllers\RecomendacionController::class, 'store'])->name('recomendacion.store');
Route::get('/recomendaciones', [App\Http\Controllers\RecomendacionController::class, 'index'])->name('recomendacion.index');
Route::get('/recomendaciones/detalles/{id}', [App\Http\Controllers\RecomendacionController::class, 'show'])->name('recomendacion.show');
Route::get('/recomendaciones/{id}/edit', [App\Http\Controllers\RecomendacionController::class, 'edit'])->name('recomendacion.edit');
Route::put('/recomendaciones/{id}' , [App\Http\Controllers\RecomendacionController::class, 'update'])->name('recomendacion.update');



//laboratorio
Route::post('/laboratorios', [App\Http\Controllers\LaboratorioController::class, 'store'])->name('laboratory.create');

//categoria
Route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('category.create');

//Sintoma
Route::post('/sintomas', [App\Http\Controllers\SintomaController::class, 'store'])->name('sintoma.create');

//Contraindicaciones
Route::post('/contraindicaciones', [App\Http\Controllers\EnfermedadController::class, 'store'])->name('contrain.create');



Route::get('/category/laboratory', [App\Http\Controllers\CategoriaController::class, 'index'])->name('config.medicines');
Route::get('/sintomas/contraindicaciones', [App\Http\Controllers\SintomaController::class, 'index'])->name('config.recomen');


Route::post('/categorias/create', [App\Http\Controllers\CategoriaController::class, 'storeAdd'])->name('category.storeAdd');
Route::post('/laboratorios/create', [App\Http\Controllers\LaboratorioController::class, 'storeAdd'])->name('laboratory.storeAdd');
Route::post('/laboratorios/{id}/delete', [App\Http\Controllers\LaboratorioController::class, 'delete'])->name('laboratory.delete');
Route::post('/categorias/{id}/update', [App\Http\Controllers\CategoriaController::class, 'update'])->name('category.update');
Route::post('/laboratorios/{id}/update', [App\Http\Controllers\LaboratorioController::class, 'update'])->name('laboratory.update');
Route::post('/categorias/{id}/delete', [App\Http\Controllers\CategoriaController::class, 'delete'])->name('category.delete');



Route::post('/sintomas/create', [App\Http\Controllers\SintomaController::class, 'storeAdd'])->name('sintoma.storeAdd');
Route::post('/contraindicaciones/create', [App\Http\Controllers\EnfermedadController::class, 'storeAdd'])->name('contrain.storeAdd');
Route::post('/contraindicaciones/{id}/delete', [App\Http\Controllers\EnfermedadController::class, 'delete'])->name('contrain.delete');
Route::post('/sintomas/{id}/update', [App\Http\Controllers\SintomaController::class, 'update'])->name('sintoma.update');
Route::post('/contraindicaciones/{id}/update', [App\Http\Controllers\EnfermedadController::class, 'update'])->name('contrain.update');
Route::post('/sintomas/{id}/delete', [App\Http\Controllers\SintomaController::class, 'delete'])->name('sintoma.delete');

//Permisos
Route::resource('permissions', App\Http\Controllers\PermissionController::class);

//Roles
Route::resource('roles', App\Http\Controllers\RoleController::class);

//medicamentos
Route::resource('medicines', App\Http\Controllers\MedicamentoController::class);
Route::get('/medicine/export/pdf',[App\Http\Controllers\MedicamentoController::class, 'exportPdf'])->name('export-pdf');
Route::get('/medicine/export/excel',[App\Http\Controllers\MedicamentoController::class, 'exportExcel'])->name('export-excel');
Route::post('/medicines/import',[App\Http\Controllers\MedicamentoController::class, 'importExcel'])->name('import-excel');
Route::put('medicines/price/{medicamento}', [App\Http\Controllers\MedicamentoController::class, 'updatePrice']) ->name('price.update');
Route::put('medicines-status/{medicamento}', [App\Http\Controllers\MedicamentoController::class, 'updateStatus']) ->name('price.status');

//commerce
Route::get('/commerce', MedicinesCommerce::class)->name('medicines.commerce');


Route::get('/commerce/{category}', MedicinesCommerceCategory::class)->name('commerce.category');
Route::get('commerce/show/{medicamento}', [App\Http\Controllers\MedicamentoController::class, 'showCommerce']) ->name('commerce-show');


//Formulario de contacto
Route::post('contactanos', [App\Http\Controllers\ContactanosController::class, 'send'])->name('contactanos.send');

// Validated unique data
route::get('search/document', [App\Http\Controllers\ValidateUniqueData::class, 'searchDocument'])->name('search.document');
route::get('search/username', [App\Http\Controllers\ValidateUniqueData::class, 'searchUserName'])->name('search.username');
route::get('search/email', [App\Http\Controllers\ValidateUniqueData::class, 'searchEmail'])->name('search.email');
route::get('search/usernameEdit/{id}', [App\Http\Controllers\ValidateUniqueData::class, 'searchUserNameEdit'])->name('search.usernameEdit');
route::get('search/emailEdit/{id}', [App\Http\Controllers\ValidateUniqueData::class, 'searchEmailEdit'])->name('search.emailEdit');

//chat
route::get('chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');


//test

Route::get('/test-medico', [App\Http\Controllers\TestController::class, 'index'])->name('index');
Route::post('/resultados/test-medico', [App\Http\Controllers\TestController::class, 'resultados'])->name('result-test');

});


