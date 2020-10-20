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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fornecedores/criar', 'FornecedoresController@create');
Route::get('/fornecedores', 'FornecedoresController@showAll')->name('exibir_fornecedores');
Route::post('/fornecedores/criar', 'FornecedoresController@store')->name('criar_fornecedor');
Route::get('/fornecedores/editar/{id}', 'FornecedoresController@edit')->name('editar_fornecedor');
Route::put('/fornecedores/editar/{id}', 'FornecedoresController@update')->name('alterar_fornecedor');
Route::delete('/fornecedores/{id}', 'FornecedoresController@delete')->name('excluir_fornecedor');


Route::get('/funcionarios/criar', 'FuncionariosController@create');
Route::get('/funcionarios', 'FuncionariosController@showAll')->name('exibir_funcionarios');
Route::post('/funcionarios/criar', 'FuncionariosController@store')->name('criar_funcionario');
Route::get('/funcionarios/editar/{id}', 'FuncionariosController@edit')->name('editar_funcionario');
Route::put('/funcionarios/editar/{id}', 'FuncionariosController@update')->name('alterar_funcionario');
Route::delete('/funcionarios/{id}', 'FuncionariosController@delete')->name('excluir_funcionario');
