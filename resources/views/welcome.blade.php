@extends('layouts.app')

@section('content')
<!-- component -->

<div class="pt-2 h-1/5 bg-indigo-600 rounded-lg bg-opacity-70 lg:mx-2 sm:w-full">
    <h1 class="block text-white font-bold text-xl text-center -mb-2">Calculadora de Préstamos</h1><br>

    <livewire:calcular-prestamo>
</div>
<div class="fixed bottom-0 pt-2 bg-indigo-600 rounded-b-lg bg-opacity-50 lg:mx-2 w-full">
    <div class="w-full flex gap-2 items-center">
        <div class="hover:font-bold">
            <p class="ml-2 sm:text-sm">Laravel v8.26.1 (PHP v7.4.13) / </p>
        </div>
        <div class="hover:font-bold">
            <p class="sm:text-sm"><a href="https://github.com/mndbl/calculadoraPrestamos" target="_blank">mndbl en Github</a></p>
        </div>
    </div>
</div>
@endsection
