<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendEmail',function (){
    $job = (new \App\Jobs\SendEmailJob('nifrasismail@gmail.com'))->delay(now()->addSeconds(5));
    dispatch($job);
    return 'Email Sent';
});
