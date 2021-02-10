@extends('layouts.app')

@section('content')
<!-- component -->

<div class="pt-2 bg-indigo-600 rounded-t-lg bg-opacity-70 lg:mx-2 mt-2 sm:w-full">
    <h1 class="block text-white font-bold text-xl text-center -mb-2">Calculadora de Préstamos</h1><br>
</div>
<livewire:calcular-prestamo>
    <div class="lg:flex mb-2 mt-2 rounded-b-lg sm:mx-auto lg:mx-2 pl-4 bg-indigo-600 lg:text-left text-sm text-white py-2 sm:w-full">
        <div>
            <p class="hover:font-bold">Laravel v8.26.1 (PHP v7.4.13)</p>
        </div>
        <div><a class="hover:font-bold" href="https://github.com/mndbl/calculadoraPrestamos" target="_blank">mndbl en Github</a></div>
    </div>
    @endsection
