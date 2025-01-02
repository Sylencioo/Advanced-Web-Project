@extends('layouts.master')

@section('title', 'Add New Academician')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Add New Academician
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Fill in the details to add a new academician.
    </p>

    <form method="POST" action="{{ route('academicians.store') }}" class="mt-8 max-w-md mx-auto">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Department -->
        <div class="mb-4">
            <x-input-label for="department" :value="__('Department')" />
            <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" required />
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Research Interests -->
        <div class="mb-4">
            <x-input-label for="research_interests" :value="__('Research Interests')" />
            <textarea id="research_interests" class="block mt-1 w-full" name="research_interests" rows="4" required>{{ old('research_interests') }}</textarea>
            <x-input-error :messages="$errors->get('research_interests')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4" style="background-color: var(--accent-color); border-color: var(--accent-color);">
                {{ __('Add Academician') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection