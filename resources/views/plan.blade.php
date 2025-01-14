<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan') }}
        </h2>
    </x-slot>

    <div class="flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-2 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('plano.store') }}">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="short_description" :value="__('Pequena descrição')" />
                    <x-text-input id="short_description" class="block mt-1 w-full" type="text" name="short_description" :value="old('short_description')" />
                    <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="price" :value="__('Preço')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="cod" :value="__('Código')" />
                    <x-text-input id="cod" class="block mt-1 w-full" type="text" name="cod" :value="old('cod')" />
                    <x-input-error :messages="$errors->get('cod')" class="mt-2" />
                </div>

                <div class="mt-4 flex justify-end">
                    <x-primary-button>
                        {{ __('CADASTRAR') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>