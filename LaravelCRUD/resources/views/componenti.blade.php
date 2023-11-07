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
        $hello = 'BuonAserA';
    @endphp

    NOTA: Usiamo saluto-comp qui mentre nella classe e nel componente si usa salutoComp (camelCase)<br>
    <x-alert type="error" :saluto-comp="$hello" :message="$message" />
