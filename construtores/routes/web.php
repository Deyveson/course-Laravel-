<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/nome', 'MeuControlador@getNome');
