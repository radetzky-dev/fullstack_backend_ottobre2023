<html>

<body>
    <h1>Ciao, {{ $name }}</h1>

    <p>La tua età {{ $age }}</p>

    <?php
    $records = ['primo disco', 'secondo disco', 'terzo disco'];
    //$records = 1;
    ?>

    @if (is_array($records))
        Sì, è un array
        @if (count($records) === 1)
            I have one record!
        @elseif (count($records) > 1 and count($records) < 3)
            I have some records!
        @elseif (count($records) >= 3)
            I have multiple records!
        @else
            I don't have any records!
        @endif
    @endif

    <br>

    @unless (is_array($records))
        Non è un array
    @endunless

    <br>

    <?php
    $records = true;
    ?>

    @isset($records)
        is defined and is not null...
    @endisset

    <br>

    @empty($records)
        is "empty"...
    @endempty


</body>

</html>