<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('clientes.update', $cliente) }}">

            @csrf
            @method('patch')
            <div class="mb-6">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre del cliente</label>
                <input type="text" id="nombre" name="nombre" placeholder="{{ __('Nombre del cliente') }}" value="{{ old('nombre', $cliente->nombre) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900">Dirección postal</label>
                    <input type="text" id="direccion" name="direccion" placeholder="{{ __('Dirección postal') }}" value="{{ old('direccion', $cliente->direccion) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="cif" class="block mb-2 text-sm font-medium text-gray-900">CIF / NIF</label>
                    <input type="text" id="cif" name="cif" placeholder="{{ __('CIF o NIF') }}" value="{{ old('cif', $cliente->cif) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            <!-- <textarea name="nombre" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('nombre') }}</textarea>
            <textarea name="direccion" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('direccion') }}</textarea>
            <textarea name="cif" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('cif') }}</textarea> -->

            <x-input-error :messages="$errors->all()" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Modificar cliente') }}</x-primary-button>
            <a href="{{ route('clientes.index') }}">{{ __('Cancel') }}</a>

        </form>
    </div>

</x-app-layout>