<html>

<body>
    <h1>Quest'area è riservata</h1>

    @if ($errors->any())
        <h4>{{ $errors->first() }}</h4>
    @endif
    <form action="testmid" method="post">
        @csrf
        <input type="text" name="token" id="token" />
        <input type="submit" value="Invia" />
</body>

</html>
