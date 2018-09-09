<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail(){
        /*
         * $job = (new SendEmailJob('nifrasismail@gmail.com'))->delay(now()->addSeconds(5));
         * dispatch($job);
        */
        SendEmailJob::dispatch('nifrasismail@gmail.com')->delay(now()->addSeconds(5));
        return 'Email Sent';
    }
}
