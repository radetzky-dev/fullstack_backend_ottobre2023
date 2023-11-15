@extends('../layout')

@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <h3>Lista professori</h3>
    <a href="{{ route('prof.create') }}" class="btn btn-primary btn-sm">Inserisci professore</a> |
    <a href="{{ route('prof.index') }}" class="btn btn-primary btn-sm">Mostra tutti i professori</a>

    |
    <a href="{{ route('mostratutti') }}" class="btn btn-primary btn-sm">Mostra tutti gli studenti</a>
    |
    <a href="{{ route('prof.mail') }}" class="btn btn-primary btn-sm">Cerca materia professore</a>


    <div class="push-top">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
                <tr class="table-warning">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Subject</td>
                    <td>Hours</td>
                    <td>Room</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($prof as $professor)
                    <tr>
                        <td>{{ $professor->id }}</td>
                        <td>{{ $professor->Name }}</td>
                        <td>{{ $professor->Subject }}</td>
                        <td>{{ $professor->Hours }}</td>
                        <td>{{ $professor->Room }}</td>
                        <td class="text-center">
                            <form action="{{ route('prof.destroy', $professor->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
