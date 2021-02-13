<div id="div" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="sm_w-full lg:w-1/2 mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="sistema">
            @error('sistema')<strong class="text-red-700 font-bold">Requerido</strong>@else Sistema de Cálculo @enderror
        </label>
        <select wire:model="sistema" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="periodo" id="periodo" type="periodo" required="">
            <option selected>Seleccione</option>
            <option value="Frances">Francés</option>
            <option value="Aleman">Alemán</option>
            <option value="EEUU">Americano</option>
        </select>
    </div>
    <div class="sm:block lg:flex gap-2">
        <div class="sm_w-full lg:w-1/2 mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="monto">
                @error('monto')<strong class="text-red-700 font-bold">Requerido</strong>@else Monto del Préstamo @enderror
            </label>
            <input wire:model="monto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="monto" id="monto" type="number" step="any" required="">
        </div>

        <div class="sm_w-full lg:w-1/2 mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="periodo">
                @error('periodo')<strong class="text-red-700 font-bold">Requerido</strong>@else Períodos @enderror
            </label>
            <select wire:model="periodo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="periodo" id="periodo" type="periodo" required="">
                <option value="">Seleccione</option>
                <option value="Mensual">Mensual</option>
                <option value="Bimestral">Bimestral</option>
                <option value="Trimestral">Trimestral</option>
                <option value="Semetral">Semetral</option>
                <option value="Anual">Anual</option>
                <option value="Semanal">Semanal</option>
                <option value="Diario">Diario</option>
            </select>
        </div>
    </div>

    <div class="sm:blobk lg:flex gap-2">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tasa">
                Tasa (Anual) @error('tasa')<strong class="text-red-700 font-bold">Requerido</strong>@enderror
            </label>
            <input title="Ingrese Tasa Anual" wire:model="tasa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tasa" id="tasa" type="number" step="any" required="">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="plazo">
                Plazo @error('plazo')<strong class="text-red-700 font-bold">Requerido</strong>@enderror
            </label>
            <input wire:model="plazo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="plazo" id="plazo" type="number" step="any" required="">
        </div>
    </div>


    <div class="flex items-center justify-between">
        <button id="submit" wire:click="calcular()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            <i class="fa fa-calculator" aria-hidden="true"></i> Calcular
        </button>
        <button id="cancel" wire:click="borrar()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <i class="fa fa-times-circle" aria-hidden="true"></i> Borrar
        </button>
    </div>

    <div class="mb-4">
    </div>
</div>
