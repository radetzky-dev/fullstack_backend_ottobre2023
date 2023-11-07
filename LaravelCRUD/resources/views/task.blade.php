@php
    $tasks = ['leggere', 'fare la spesa', 'pagare bollette'];
    $todo = 'Elenco cose da fare';
@endphp


<x-layout>
    <x-slot:title>
        {{ $todo }}
    </x-slot>
    @foreach ($tasks as $task)
        {{ $task }}<br>
    @endforeach
</x-layout>
