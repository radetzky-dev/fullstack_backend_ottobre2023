<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body class="antialiased">
    <h3>Hello Laravel</h3>
    <form method="POST" action="rispondi">
        <!-- https://laravel.com/docs/10.x/csrf  -->
        @csrf
        <input type="text" id="testo" name="testo" required>
        <input type="submit" value="Invia" />
    </form>

    <h4>Tutto</h4>
    <form method="POST" action="tutto">
        <!-- https://laravel.com/docs/10.x/csrf  -->
        @csrf
        <input type="text" id="testo" name="testo" required>
        <input type="submit" value="Invia" />
    </form>
</body>

</html>
