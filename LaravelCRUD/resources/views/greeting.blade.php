<html>

<body>
    <h1>Ciao, {{ $name }}</h1>
    <p>Sono le {{ time() }}</p>

    <?php echo $name;
    
    $age = ['Peter' => 35, 'Ben' => 37, 'Joe' => 43];
    ?>

    <script>
        var app = {{ Js::from($age) }};
    </script>

    @verbatim
        <div class="container">
            questo è javascript o altro non interpretato, {{ $name }}.
        </div>
    @endverbatim
</body>

</html>
