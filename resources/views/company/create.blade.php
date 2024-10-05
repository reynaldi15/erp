<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-validation-errors class="mb-4" />
                {{-- <x-welcome /> --}}
                <form action="{{ route('company.store') }}" method="POST">
                    @csrf
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div>
                        <x-label for="mobile" value="{{ __('Phone') }}" />
                        <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" maxlength='12' required autofocus />
                    </div>
                    <x-button class="mt-4">
                        {{ __('Create') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>