@extends('../layout')

@section('content')

    <style>
        .container {
            max-width: 450px;
        }

        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="card push-top">
        <div class="card-header">
            Add Prof
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('prof.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" />
                </div>
                <div class="form-group">
                    <label for="Subject">Subject</label>
                    <input type="text" class="form-control" name="Subject" />
                </div>
                <div class="form-group">
                    <label for="Hours">Hours</label>
                    <input type="numeric" class="form-control" name="Hours" />
                </div>
                <div class="form-group">
                    <label for="Room">Room</label>
                    <input type="text" class="form-control" name="Room" />
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Prof</button>
            </form>
        </div>
    </div>
@endsection
