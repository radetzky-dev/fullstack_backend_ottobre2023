<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body class="antialiased">
    <h3>Prova</h3>
    <h1>Hello, {{ $name }}</h1>
    <?php echo "Ciao ". $name; ?>
</body>

</html>
