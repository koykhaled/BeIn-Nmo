<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/icons/favicon.ico') }}" type="image/x-icon" />
    @vite('resources/css/app.css')
    <title>BeInMedia</title>
</head>

<body>



    <div id="app"></div>






    @vite('resources/js/app.js')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    {{--
    <script src="{{ secure_asset('vendor/mckenziearts/laravel-notify/js/notify.js') }}"></script> --}}
</body>

</html>