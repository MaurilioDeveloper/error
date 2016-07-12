<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function(){

Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/cadastrar', 'ProdutoController@create');
Route::post('/produtos/cadastrar', 'ProdutoController@store');
Route::get('/produtos/editar/{id}', 'ProdutoController@edit');
Route::post('/produtos/editar/{id}', 'ProdutoController@update');
Route::get('/produtos/deletar/{id}', 'ProdutoController@destroy');

Route::get('/users', 'UserController@index');
Route::get('/users/cadastrar', 'UserController@create');
Route::post('/users/cadastrar', 'UserController@store');
Route::get('/users/editar/{id}', 'UserController@edit');
Route::post('/users/editar/{id}', 'UserController@update');
Route::get('/users/deletar/{id}', 'UserController@destroy');

Route::get('/carros/json', 'CarroController@CarrosJson');
Route::get('/carros', 'CarroController@index');
Route::get('/carros/ajax-list', 'CarroController@CarrosAjax');
Route::get('/carros/cadastrar', 'CarroController@create');
Route::post('/carros/cadastrar', 'CarroController@store');
Route::get('/carros/editar/{id}', 'CarroController@edit');
Route::post('/carros/editar/{id}', 'CarroController@update');
Route::get('/carros/deletar/{id}', 'CarroController@destroy');

});


/*
Route::get('sessao/gravar', function(){
    echo "GRAVAR: Sessão";
    session(['msg' => 'Gravando sessão no Laravel...']);
    return '';
});

Route::get('sessao/exibir', function(){
    $msg = session('msg');
    
    return $msg;
});

Route::controller('collection', 'CollectionController');

Route::get('email', function(){
    
    Mail::raw('Mensagem de teste Puro', function($m){
        $m->to('negoso97@hotmail.com', 'Maurilio')->subject('Novo Usuário Cadastrado');
    });
    
});

Route::get('teste', function(){
   /*
   $filtro1 =  'BMW';
   $marca = 'BMW';
   
   dd(DB::table('carros')
      ->join('marcas_carro', 'carros.id_marca', '=', 'marcas_carro.id')
      ->where('carros.nome', $filtro1)
      ->where('marcas_carro.nome', $marca)
      ->orderBy('carros.nome', 'asc')
      ->get());
    * 
    */
    //dd(DB::table('carros')->insert(['nome' => 'Teste', 'placa' => 'AAA-2222']));
    /*
   dd(DB::table('carros')->where('id', 1)
      ->update(['nome' => 'Toyota 2016', 'placa' => 'DJO-3399']));
     * 
     */
    //dd(DB::table('carros')->where('id', 4)->delete());
    //dd(DB::table('carros')->get()->toJson());
    //dd(\App\Models\Carro::find(1)->getChassi()->get()->toJson());
    //dd(\App\Models\Carro::find(1)->getMarca()->get()->toJson());
/*
    dd(\App\Models\Carro::find(1)->getLigaCores()->get()->toJson());
});

Route::get('mutators', function(){
    $carros = \App\Models\Carro::get();
    foreach ($carros as $carro){
        echo "Nome: $carro->nome"."<br/>";
    }
    
});
 * 
 */