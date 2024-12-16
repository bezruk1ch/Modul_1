<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание нового заявления') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('reports.store') }}">
                    @csrf
                    <!-- Number -->
                    <div class="mb-4">
                        <x-input-label for="number" :value="__('Номер автомобиля')" />
                        <x-text-input
                            id="number"
                            class="block mt-1 w-full"
                            type="text"
                            name="number"
                            required
                        />
                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Описание')" />
                        <textarea
                            id="description"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            rows="5"
                            name="description"
                            required
                        ></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <x-primary-button>
                            {{ __('Создать') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
