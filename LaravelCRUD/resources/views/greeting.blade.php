<html>

<body>
    <h1>Ciao, {{ $name }}</h1>
    <p>Sono le {{ time() }}</p>

    <?php echo $name; ?>

    @verbatim
        <div class="container">
            questo è javascript o altro non interpretato, {{ $name }}.
        </div>
    @endverbatim
</body>

</html>
