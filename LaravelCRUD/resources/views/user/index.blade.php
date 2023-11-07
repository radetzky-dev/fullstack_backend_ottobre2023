<html>

<body>
    <h3>Lista utenti</h3>


    @foreach ($users as $user)
        <p>This is user id {{ $user->id }} name {{ $user->name }} </p>
    @endforeach

    <hr>

    @foreach ($users as $user)
        @if ($loop->first)
            This is the first iteration.
        @endif

        @if ($loop->last)
            This is the last iteration.
        @endif

        <p>This is user {{ $user->name }} fatti {{ $loop->iteration }} ne restano {{ $loop->remaining }}</p>
    @endforeach

    <?php
    // var_dump($users);
    $users = [];
    $x = 2;
    ?>

    @forelse ($users as $user)
        <p>Utente {{ $user->name }}</p>
    @empty
        <p>No users</p>
    @endforelse


    @while ($x < 4)
        <p>I'm looping forever. {{ $x }}</p>
        @php
            $x++;
        @endphp
    @endwhile
