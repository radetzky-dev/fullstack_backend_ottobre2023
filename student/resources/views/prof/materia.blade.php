@extends('../layout')

@section('content')
    <a href="{{ route('prof.index') }}" class="btn btn-primary btn-sm">Mostra tutti i professori</a>

    <h3 class="text-center page-title">Nome professore: {{ $professor->Name }}</h3>
    <b>Materia</b>: {{ $professor->Subject }}
    <br>
    <b>Classe</b>: {{ $professor->Room }}
@endsection
