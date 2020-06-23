## About 
<img src="https://storage.googleapis.com/echosky-bucket/Screen%20Shot%202563-06-23%20at%2017.31.25.png">

<img src="https://storage.googleapis.com/echosky-bucket/Screen%20Shot%202563-06-23%20at%2017.31.35.png">

## Require
- https://redis.io/
- composer require predis/predis
- composer require laravel-echo-server
- npm install laravel-echo socket.io-client         
  
## How
- php artisan make:event SendNotification
- php artisan make:event LoginEvent
- php artisan make:event LogoutEvent
- app/Providers/EventServiceProvider.php

`` protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\UserLoggedOut',
        ],
    ];``
    
- php artisan event:generate
- php artisan session:table
- php artisan migrate
