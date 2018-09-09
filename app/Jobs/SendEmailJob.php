<?php

namespace App\Jobs;

use App\Email;
use App\Mail\SendEmailMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /*php artisan queue:work --timeout=30*/
    public $tries = 5;

    public $timeout = 120;

    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailObject = new Email;
        $emailObject->email = $this->email;
        $emailObject->save();
        Log::info($this->email);
        Mail::to($this->email)->send(new SendEmailMailable());
    }
}
