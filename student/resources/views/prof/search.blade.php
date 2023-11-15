@extends('../layout')

@section('content')
    <a href="{{ route('prof.index') }}" class="btn btn-primary btn-sm">Mostra tutti i professori</a>

    @if (session()->get('error'))
        <div class="alert alert-success">
            {{ session()->get('error') }}
        </div><br />
    @endif

    <form action="{{ route('prof.search') }}" method="POST">
        @csrf
        <div class="form-group">
            <input id="prof_id" class="form-control" name="prof_id" type="text" value="{{ old('prof_id') }}"
                placeholder="Prof ID">
        </div>
        <input class="btn btn-info" type="submit" value="Cerca">
    </form>
@endsection
