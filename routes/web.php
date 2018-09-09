<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendEmail','EmailController@sendEmail');
