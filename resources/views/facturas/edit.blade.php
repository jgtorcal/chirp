<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('facturas.update', $factura) }}">

            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="numero" class="block mb-2 text-sm font-medium text-gray-900">Número</label>
                    <input type="number" id="numero" name="numero" value="{{ old('numero', $factura->numero) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900">Fecha</label>
                    <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $factura->fecha) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            <div class="grid mb-6">
                <label for="conceptos" class="block mb-2 text-sm font-medium text-gray-900">Conceptos</label>
                <textarea id="conceptos" name="conceptos" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('conceptos', $factura->conceptos) }}</textarea>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4">
                <div>
                    <label for="iva" class="block mb-2 text-sm font-medium text-gray-900">IVA</label>
                    <input type="text" id="iva" name="iva" value="{{ old('iva', $factura->iva) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="irpf" class="block mb-2 text-sm font-medium text-gray-900">IRPF</label>
                    <input type="text" id="irpf" name="irpf" value="{{ old('irpf', $factura->irpf) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="base_imponible" class="block mb-2 text-sm font-medium text-gray-900">Base Imponible</label>
                    <input type="text" id="base_imponible" name="base_imponible" value="{{ old('base_imponible', $factura->base_imponible) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="importe_total" class="block mb-2 text-sm font-medium text-gray-900">Importe total</label>
                    <input type="text" id="importe_total" name="importe_total" value="{{ old('importe_total', $factura->importe_total) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>

            <x-input-error :messages="$errors->all()" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Editar factura') }}</x-primary-button>

        </form>
    </div>

</x-app-layout>