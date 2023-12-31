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

    <form method="POST" action="cerca" class="push-top">
        @csrf
        Cerca nome <input type="text" id="name" name="name" required>
        <input type="submit" value="Invia" />
    </form>

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
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Password</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $students)
                    <tr>
                        <td>{{ $students->id }}</td>
                        <td>{{ $students->name }}</td>
                        <td>{{ $students->email }}</td>
                        <td>{{ $students->phone }}</td>
                        <td>{{ $students->password }}</td>
                        <td class="text-center">
                            <a href="{{ route('students.edit', $students->id) }}" class="btn btn-primary btn-sm"">Edit</a>
                            <form action="{{ route('students.destroy', $students->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                            </form>
                            <a href="{{ route('comments', $students->id) }}" class="btn btn-primary btn-sm"">Comments</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
