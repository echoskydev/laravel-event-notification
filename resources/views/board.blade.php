<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Broadcast Redis Socket io Tutorial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Laravel Broadcast Redis Socket io Tutorial</h1>

        <div id="notification"></div>
    </div>
</body>

<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="{{ asset('js/laravel-echo-setup.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    var i = 0;
        window.Echo.channel('notification-channel')
         .listen('.NotificationEvent', (data) => {
             console.log('data :>> ', data);
            i++;
            $("#notification").append('<div class="alert alert-success">'+data.now+' : '+data.notification+'=>'+data.name+'</div>');
        });
</script>

</html>
