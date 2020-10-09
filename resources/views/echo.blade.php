<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Echo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
</head>
<body>
    <div class="flex-center position-ref full-height">
        Echo
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        @if(!empty(Auth::user()))
            window.id = "{{Auth::user()->id}}"
        @endif

        Echo.private('privatePush.17')
            .listen('.privatePush.message', (e) => {
                alert(e.message)
                console.log(e.message);
            });

        Echo.channel('news')
            .listen('.push.message', (e) => {
                alert(e.message)
                console.log(e);
            });
    </script>
</body>
</html>
