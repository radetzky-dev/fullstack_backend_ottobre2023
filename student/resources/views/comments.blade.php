@extends('layout')

@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <h3>Lista studenti</h3>
    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Inserisci Studente</a> |
    <a href="{{ route('mostratutti') }}" class="btn btn-primary btn-sm">Mostra tutti gli Studenti</a> |
    <a href="{{ route('prof.index') }}" class="btn btn-primary btn-sm">Mostra tutti i professori</a>


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
                    <td>Studente</td>
                    <td>Email</td>
                    <td>Commento</td>

                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $commento)
                    <tr>
                        <td>{{ $commento->id }}</td>
                        <td>{{ $commento->student->name }} </td>
                        <td>{{ $commento->student->email }} </td>
                        <td>{{ $commento->comment }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
