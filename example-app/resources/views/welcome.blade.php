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


    <h4>Richiesta</h4>
    <form method="POST" action="richiesta">
        @csrf
        Name <input type="text" id="name" name="name" required>
        <input type="submit" value="Invia" />
    </form>

    <h4>Richiesta Controller</h4>
    <form method="POST" action="richiestacontr">
        @csrf
        Name <input type="text" id="name" name="name" required>
        <input type="submit" value="Invia" />
    </form>
    <?php
    
    $url = route('profile', ['id' => 1]);
    $url2 = route('budget');
    ?>
    <a href="<?php echo $url; ?>">Vai alla tua pagina profilo</a> |
    <a href="user/profile">Vai alla tua pagina profilo</a> |
    <a href="<?php echo $url2; ?>">Vai alla tua pagina budget</a>
    <br>

    <?php
    use Illuminate\Support\Facades\Route;
    
    $route = Route::current(); // Illuminate\Routing\Route
    $name = Route::currentRouteName(); // string
    $action = Route::currentRouteAction(); // string

  //  var_dump($route);

    echo " Name $name Action $action";
    ?>
</body>

</html>
