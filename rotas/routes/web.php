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
    return "<h1>Laravel</h1>";
});

Route::get('/ola', function () {
    return "<h1>Seja Bem Vindo !!</h1>";
});

Route::get('/ola/sejabemvindo', function () {
    return view('welcome');
});

Route::get('/nome/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return "<h1>Ola, $nome $sobrenome</h1>";
});

Route::get('/repetir/{nome}/{n}', function ($nome, $n) {

    if (is_integer($n)) {
        for ($i = 0; $i < $n; $i++) {
            echo "<h1>Ola, $nome ! </h1>";
        }
    } else {
        echo "Você não digitou um inteiro";
    }

});

Route::get('/comregra/{nome}/{n}', function ($nome, $n) {
    for ($i = 0; $i < $n; $i++) {
        echo "<h1>Ola, $nome ($i)! </h1>";
    }
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');
// `where` para restringir  tipos de dados nos parametros, usando expressão regulares

Route::get('/semregra/{nome?}', function ($nome = null) {
    if (isset($nome)) {
        echo "<h1>Ola, $nome! </h1>";
    } else {
        echo "Você não passou nenhum nome";
    }
});
// default parameter, quando o parametro não for passado

Route::prefix('app')->group(function () {
    Route::get("/", function () {
        return "Page main";
    });
    Route::get("profile", function () {
        return "Page Profile";
    });
    Route::get("abount", function () {
        return "My abount";
    });
});

Route::redirect('/aqui', '/ola', 301);
//redirecionando rota, REQUIRED: a rota deve existir ex: "/ola"


// ****** Chamando uma View, caminho '/resouces/views'
Route::get('/hello', function () {
    return view('hello');
});
// Modo convecional

Route::view('/hello', 'hello');
// Modo Abreviado


//**********************Passando parametro pra minha view**********************

Route::view('/viewnome', 'hellonome', ['nome' => 'Deyveson', 'sobrenome' => 'Willian']);

Route::get('/hellonome/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return view('hellonome', ['nome' => $nome, 'sobrenome' => $sobrenome]);
});



