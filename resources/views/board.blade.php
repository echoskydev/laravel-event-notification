@extends('layouts.app')


@section('content')
<div class="container">
    <h1>Laravel Broadcast Redis Socket io</h1>

    <hr>
    <div class="row stage">
    </div>

    <br>
    <h1>Logs</h1>
    <hr>
    <div id="notification"></div>
</div>
@endsection

@section('scripts')
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
            getCoundAlert(data.user_id);
            $("#notification").append('<div class="alert alert-success">'+data.now+' : '+data.notification+'=>'+data.name+'</div>');
        });

        window.Echo.channel('login-channel')
         .listen('.LoginEvent', (data) => {
            userOnline();
            $("#notification").append('<div class="alert alert-primary">'+data.now+' : '+data.user_id+'=> Login</div>');
        });

        window.Echo.channel('logout-channel')
         .listen('.LogoutEvent', (data) => {
            userOnline();
            $("#notification").append('<div class="alert alert-warning">'+data.now+' : '+data.user_id+'=> Logout</div>');

        });

        window.onload = function () {
            userOnline();
        }

        const getCoundAlert = (user_id) => {
            $.get("{{ URL('alertall') }}/"+user_id,
                function (data, textStatus, jqXHR) {
                    // console.log('data :>> ', data);
                    $('.alert_user_'+user_id).text(data.totals);
                },
                "json"
            );
        }

        const userOnline = () => {
            $('.stage').html('');
            $.get("{{ URL('useronline') }}",
                function (data, textStatus, jqXHR) {
                    if (data.users) {
                        $.each(data.users, function (indexInArray, valueOfElement) {
                            getCoundAlert(valueOfElement.user_id);
                            input = '';
                            var item = $('<div>');
                            item.attr("class", 'col-4');
                            input = '<div class="card text-left">'
                            input +='    <div class="card-body">'
                            input +='        <h4 class="card-title text-primary">'+ valueOfElement.name +'</h4>'
                            input +='        <p class="card-text"><span class="text-success">'+ valueOfElement.email +'</span></p>'
                            input +='        <span style="font-size: 20px;" class="badge badge-danger alert_user_'+ valueOfElement.user_id +'"></span>'
                            input +='    </div>'
                            input +='</div>';
                            item.append(input);
                            $('.stage').append(item);
                        });
                    }
                },
                "json"
            );
        }
</script>
@endsection
