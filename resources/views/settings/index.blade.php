<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>
    {{ $settings }}

    <div>
        <form action="{{ route('settings.update') }}" method="post">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="mt-4">
                    <label for="theme-select">{{ ucfirst( __('theme')) }}</label>

                    <select name="theme" id="theme-select">
                        <option value="">--Please choose an option--</option>
                        @foreach ($themeNames as $name => $value)
                            <option value="{{ $name }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    </div>


</x-app-layout>
