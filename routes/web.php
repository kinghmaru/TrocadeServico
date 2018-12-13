<?php

Route::resource('usrs', 'UsuarioController');

Route::resource('serv', 'ServicoController');

Route::resource('servTroca', 'TrocaServicoController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
