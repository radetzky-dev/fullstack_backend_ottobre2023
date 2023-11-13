<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Voli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Compagnia</th>
                    <th scope="col">Confermato</th>
                    <th scope="col">Partenza</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Partenza da</th>
                    <th scope="col">Arrivo a</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voli as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->company }}</td>
                        <td>{{ $data->confirmed }}</td>
                        <td>{{ $data->departtime }}</td>
                        <td>{{ $data->ticketprice }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->depart }}</td>
                        <td>{{ $data->destination }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $voli->links() !!}
        </div>
    </div>
</body>

</html>
