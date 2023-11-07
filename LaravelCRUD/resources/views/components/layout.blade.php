<!-- resources/views/components/layout.blade.php -->

<html>

<head>
    <title>{{ $title ?? 'Todo Manager' }}</title>
</head>

<body>
    <h1>Cose da fare</h1>
    <hr />
    {{ $slot }}
</body>

</html>
