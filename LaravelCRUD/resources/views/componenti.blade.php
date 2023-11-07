<html>
<style>
    .alert-error {
        background-color: red;
    }
</style>

<body>
    <h3>Componenti</h3>
    @php
        $message = 'mondo';
        $hello = 'Buongiorno';
    @endphp

    <x-alert type="error" :saluto="$hello" :message="$message" />
