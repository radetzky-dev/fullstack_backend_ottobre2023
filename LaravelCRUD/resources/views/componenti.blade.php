<html>

{{-- @vite('resources/js/app.js') --}}

<body>
    <h3>Componenti</h3>
    @php
        $message = 'mondo';
        $hello = 'BuonAserA';
        $slot = 'slot di prova';
    @endphp

    <div class="alert-ok">NOTA: Usiamo saluto-comp qui mentre nella classe e nel componente si usa salutoComp (camelCase)
    </div><br>
    <x-alert type="error" :saluto-comp="$hello" :message="$message" />


    <hr>
    <x-prova>
        {{ $slot }}
    </x-prova>
