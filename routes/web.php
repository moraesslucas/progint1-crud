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
Route::get('/reports/fornecedores/mostbooks', 'FornecedoresController@mostBooks')->name('melhores_fornecedores');
Route::get('/reports/fornecedores/mosteditions', 'FornecedoresController@mostEditions')->name('mais_edicoes');


Route::get('/funcionarios/criar', 'FuncionariosController@create');
Route::get('/funcionarios', 'FuncionariosController@showAll')->name('exibir_funcionarios');
Route::post('/funcionarios/criar', 'FuncionariosController@store')->name('criar_funcionario');
Route::get('/funcionarios/editar/{id}', 'FuncionariosController@edit')->name('editar_funcionario');
Route::put('/funcionarios/editar/{id}', 'FuncionariosController@update')->name('alterar_funcionario');
Route::delete('/funcionarios/{id}', 'FuncionariosController@delete')->name('excluir_funcionario');
Route::get('/reports/funcionarios/mostsupplies', 'FuncionariosController@mostSupplies')->name('mais_estoque');
Route::get('/reports/funcionarios/mostbooks', 'FuncionariosController@mostBooks')->name('mais_livros');

Route::get('/livros/criar', 'LivrosController@create');
Route::get('/livros', 'LivrosController@showAll')->name('exibir_livros');
Route::post('/livros/criar', 'LivrosController@store')->name('criar_livro');
Route::get('/livros/editar/{id}', 'LivrosController@edit')->name('editar_livro');
Route::put('/livros/editar/{id}', 'LivrosController@update')->name('alterar_livro');
Route::delete('/livros/{id}', 'LivrosController@delete')->name('excluir_livro');


Route::get('/estoques/criar', 'EstoquesController@create');
Route::get('/estoques', 'EstoquesController@showAll')->name('exibir_estoques');
Route::post('/estoques/criar', 'EstoquesController@store')->name('criar_estoque');
Route::get('/estoques/editar/{id}', 'EstoquesController@edit')->name('editar_estoque');
Route::put('/estoques/editar/{id}', 'EstoquesController@update')->name('alterar_estoque');
Route::delete('/estoques/{id}', 'EstoquesController@delete')->name('excluir_estoque');
