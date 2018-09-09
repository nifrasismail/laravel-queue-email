<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmailController extends Controller
{
    public function sendEmail(){
        $job = (new \App\Jobs\SendEmailJob('nifrasismail@gmail.com'))->delay(now()->addSeconds(5));
        dispatch($job);
        return 'Email Sent';
    }
}
