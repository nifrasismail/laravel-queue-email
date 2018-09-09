<?php

namespace App\Http\Controllers;

use App\Jobs\LogginJob;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail(){
        /*
         * $job = (new SendEmailJob('nifrasismail@gmail.com'))->delay(now()->addSeconds(5));
         * dispatch($job);
        */
        //SendEmailJob::dispatch('nifrasismail@gmail.com')->delay(now()->addSeconds(5));
        SendEmailJob::withChain([
            new LogginJob('Custom Logging Message')
        ])->dispatch('nifrasismail@gmail.com')->delay(now()->addSecond(10));
        return 'Email Sent';
    }
}
