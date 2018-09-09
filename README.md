#Laravel - Queue
In this sample is for sending email using queue.

1. First we need to create a basic skelton poject of laravel. I'm using laravel 5.7

   <code>laravel new my-laravel-queue</code>
2. There after we need the following table to maintain the queue

    <code>php artisan queue:table</code>
    
    after the migration created migrate the migration to real tables using migrate command of artisian
    
    <code>php artisan migrate</code>
3. There after we need to adding a Route to sending Email we adding that route as /sendEmail in our main route. which is define in web.php file
    
   <pre>
       Route::get('/sendEmail',function (){
            return 'Email Sent';
       });
   </pre>
4. There after create queue job to sending email using the following command.

    <code>php artisan make:job SendEmailJob</code>
    
    there is a file will be created on **app/Jobs/SendEmailJob.php**
    
    In the above mentioned file adding the Mail sending command on handle() method
    <pre>
        Mail::to('nifrasismail@gmail.com')->send(new SendEmailMailable());
    </pre>
5.  There after <code>dipatch()</code> the Job in route. (You can dispatch the job in Controller too.)
    <pre>
        Route::get('/sendEmail',function (){
            $job = (new \App\Jobs\SendEmailJob())->delay(now()->addSeconds(5));
            dispatch($job);
            return 'Email Sent';
        });
    </pre>
    
That's all about it. you can send your email and can check the email on mailtrap.io.

**Don't forgot to setup your credintials on .env file of yours**    