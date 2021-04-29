<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    @auth
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endauth

    <title>
        @yield('title')
    </title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }
        nav {
            width: 100%;
            height: 60px;
            padding: 15px 30px;
            line-height: 30px;
            text-align: right;
        }
        nav a,
        nav a:visited {
            color: inherit;
            text-decoration: none;
            padding: 0 15px;
        }
        nav a:hover,
        nav a:focus,
        nav a:active {
            color: inherit;
            text-decoration: underline;
        }
        h1 {
            font-size: 5vw;
            font-weight: 200;
            margin-top: 0;
        }
        .container {
            text-align: center;
            flex-grow: 1;

            display: flex;
            flex-direction: column;
            justify-content: center;

        }
        .status {
            font-size: 10vw;
            font-weight: bold;
        }
    </style>
</head>

    <body>

        <main>

            @auth
                <nav>
                    <a href="{{ action([App\Http\Controllers\DomainController::class, 'index']) }}">
                        Your domains
                    </a>
                    @component('components.logout-link')
                    @endcomponent
                </nav>
            @endauth

            @yield('content')

        </main>

    </body>

    @if ( env('KOWNTER_APP_URL') )
        <script>
            function httpGetAsync(theUrl, callback)
            {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function() {
                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                        callback(xmlHttp.responseText);
                }
                xmlHttp.open("GET", theUrl, true); // true for asynchronous
                xmlHttp.send(null);
            }
            httpGetAsync( '{{ env('KOWNTER_APP_URL') }}' + '/track?referrer=' + encodeURIComponent( document.referrer ), function() { return true; } );
        </script>
    @endif

</html>
