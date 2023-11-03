<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

        <div class="row">
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Vai alle Aziende</a>
            </div>
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Customers</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('customers.create') }}"> Crea Cliente</a>
                </div>

            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>Email</th>
                <th>Address</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($customers as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->name }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->address }}</td>
                <td>
                    <form action="{{ route('customers.destroy', $cliente->id) }}" method="Post">

                        <a class="btn btn-primary" href="{{ route('custumers.edit', $cliente->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $customers->links() !!}

</body>

</html>