<html>

<body>
    <h3>Lista utenti</h3>


    @foreach ($users as $user)
        <p>This is user id {{ $user->id }} name {{ $user->name }} </p>
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
