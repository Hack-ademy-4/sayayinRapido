<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body>
    @include("layouts._navbar")
    @yield('content')
    @include("layouts._footer")





    <script src="{{mix('js/app.js')}}"></script>
    <script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <script>
        //script boton de logout
        const logout = document.getElementById('logoutBtn');
        if (logout) {
            logout.addEventListener('click', (e) => {
                e.preventDefault();
                const form = document.getElementById('logoutForm').submit();
            });
        }
    </script>
</body>

</html>