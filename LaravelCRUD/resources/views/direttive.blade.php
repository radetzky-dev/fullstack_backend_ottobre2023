<html>
<style>
    .font-bold {
        font-weight: bold;
    }

    .p-4 {
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .bg-red {
        background-color: red;
    }
</style>

<body>
    <h1>Ciao, {{ $name }}</h1>

    <p>La tua età {{ $age }}</p>

    <?php
    $records = ['primo disco', 'secondo disco', 'terzo disco'];
    //$records = 1;
    $caso = 3;
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

    <hr>
    @php
        $caso = 2;
    @endphp
    @switch($caso)
        @case(1)
            First case...
        @break

        @case(2)
            Second case...
        @break

        @default
            Default case...
    @endswitch

    <br>

    @unless (is_array($records))
        Non è un array
    @endunless

    <br>

    <?php
    $records = false;
    ?>

    @isset($records)
        is defined and is not null...
    @endisset

    <br>

    @empty($records)
        is "empty"...
    @endempty

    @auth
        Utente loggato
    @endauth

    <br>
    @guest
        Utente ospite. Vai al login...
    @endguest

    @production
        SImao in ambiente di produzione
    @endproduction

    @env('local')
    Siamo in ambiente di sviluppo
    @endenv

    @sectionMissing('navigation')
        <div class="pull-right">
            aggiunto perchè mancava!
        </div>
    @endif

    <hr>
    Ciclo for <br>
    @for ($i = 10; $i >= 1; $i--)
        The current value is {{ $i }}<br>
    @endfor


    @php
        $isActive = false;
        $hasError = true;
    @endphp

    <span @class([
        'p-4',
        'font-bold' => $isActive,
        'text-gray-500' => !$isActive,
        'bg-red' => $hasError,
    ])>La mia scritta</span>

    @php
        $isActive = true;
    @endphp

    <span @style(['background-color: blue', 'font-weight: bold' => $isActive])>Altra scritta</span>



</body>

</html>
