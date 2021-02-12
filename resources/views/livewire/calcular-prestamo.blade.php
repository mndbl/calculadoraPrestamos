<div class="sm:block lg:flex gap-2 mb-2">

    <div class="sm:mx-auto lg:ml-2 mt-3 sm:w-full lg:w-1/3">
        @include('livewire.forms.form')
    </div>

    <div class="sm:mx-auto lg:mr-2 mt-3 sm:w-full lg:w-2/3">
        @if($calculado)

        <table class="table sm:w-auto">
            <thead>
                <tr>
                    <th class="p-2">Cuota Nº.</th>
                    <th class="p-2">Monto</th>
                    <th class="p-2">Intereses</th>
                    <th class="p-2">Amortizado</th>
                    <th class="p-2">Capital</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cuotas as $key => $cuota)
                <tr class="">
                    <td class="p-2 text-center">{{ $cuota['numero'] }}</td>
                    <td class="p-2 text-right mr-2">{{ $cuota['cuota'] }}</td>
                    <td class="p-2 text-right mr-2">{{ $cuota['interes'] }}</td>
                    <td class="p-2 text-right mr-2">{{ $cuota['amortizado'] }}</td>
                    <td class="p-2 text-right mr-2">{{ $cuota['vivo'] }}</td>
                </tr>
                @endforeach

                <tr class="">
                    <td class="p-2 text-left mr-2" colspan=5>Monto Total Cancelado: {{number_format($totalGen , 2, ',', '.') }}</td>
                </tr>
                <tr class="">
                    <td class="p-2 text-left mr-2" colspan=5>Monto Total Intereses Generados: {{number_format($intGen , 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>

</div>
