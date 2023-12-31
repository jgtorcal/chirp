<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('facturas.store') }}">

            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="numero" class="block mb-2 text-sm font-medium text-gray-900">Número</label>
                    <input type="number" id="numero" name="numero" placeholder="{{ __('Número de factura') }}" value="{{ old('numero') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900">Fecha</label>
                    <input type="date" id="fecha" name="fecha" placeholder="{{ __('Fecha') }}" value="{{ old('fecha') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            <div class="grid mb-6">
                <label for="conceptos" class="block mb-2 text-sm font-medium text-gray-900">Conceptos</label>
                <textarea id="conceptos" name="conceptos" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('conceptos') }}</textarea>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4">
                <div>
                    <label for="iva" class="block mb-2 text-sm font-medium text-gray-900">IVA</label>
                    <input type="text" id="iva" name="iva" placeholder="{{ __('21') }}" value="{{ old('iva') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="irpf" class="block mb-2 text-sm font-medium text-gray-900">IRPF</label>
                    <input type="text" id="irpf" name="irpf" placeholder="{{ __('15') }}" value="{{ old('irpf') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="base_imponible" class="block mb-2 text-sm font-medium text-gray-900">Base Imponible</label>
                    <input type="text" id="base_imponible" name="base_imponible" placeholder="{{ __('0') }}" value="{{ old('base_imponible') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="importe_total" class="block mb-2 text-sm font-medium text-gray-900">Importe total</label>
                    <input type="text" id="importe_total" name="importe_total" placeholder="{{ __('0') }}" value="{{ old('importe_total') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            <!-- <textarea name="nombre" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('nombre') }}</textarea>
                <textarea name="direccion" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('direccion') }}</textarea>
                <textarea name="cif" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('cif') }}</textarea> -->

            <x-input-error :messages="$errors->all()" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Añadir nueva factura') }}</x-primary-button>

        </form>
    </div>



    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">

        <!-- Table -->
        <div class="mx-auto max-w-7xl rounded-sm border border-gray-200 bg-white shadow-lg">
            <header class="border-b border-gray-100 px-5 py-4">
                <div class="font-semibold text-gray-800">Facturas</div>
            </header>

            <div class="overflow-x-auto p-3">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                        <tr>
                            <th class="p-2">
                                <div class="text-left font-semibold">Número</div>
                            </th>
                            <th class="p-2">
                                <div class="text-left font-semibold">Fecha</div>
                            </th>
                            <th class="p-2">
                                <div class="text-left font-semibold">Base Imponible</div>
                            </th>
                            <th class="p-2">
                                <div class="text-left font-semibold">Importe total</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Action</div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach ($facturas as $factura)
                        <tr>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500 uppercase"># {{ $factura->numero }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-left">{{ Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</div>
                            </td>
                            <td class="p-2">
                                <div class="font-medium text-gray-800">{{ number_format($factura->base_imponible, 2, ',', '.') }} €</div>
                            </td>
                            <td class="p-2">
                                <div class="font-medium text-gray-800">{{ number_format($factura->importe_total, 2, ',', '.') }} €</div>
                            </td>
                            <td class="p-2">

                                <div class="flex justify-center">
                                    <a href="{{ route('facturas.edit', $factura) }}">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('facturas.destroy', $factura) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('facturas.destroy', $factura) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </a>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

</x-app-layout>