@extends('layouts.master')

@section('title', 'Edit Milestone')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Edit Milestone
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Update the details of the milestone.
    </p>

    <form method="POST" action="{{ route('milestones.update', $milestone->id) }}" class="mt-8 max-w-md mx-auto">
        @csrf
        @method('PUT')

        <!-- Milestone Name -->
        <div class="mb-4">
            <x-input-label for="milestone_name" :value="__('Milestone Name')" />
            <x-text-input id="milestone_name" class="block mt-1 w-full" type="text" name="milestone_name" :value="$milestone->milestone_name" required autofocus />
            <x-input-error :messages="$errors->get('milestone_name')" class="mt-2" />
        </div>

        <!-- Target Completion Date -->
        <div class="mb-4">
            <x-input-label for="target_completion_date" :value="__('Target Completion Date')" />
            <x-text-input id="target_completion_date" class="block mt-1 w-full" type="date" name="target_completion_date" :value="$milestone->target_completion_date" required />
            <x-input-error :messages="$errors->get('target_completion_date')" class="mt-2" />
        </div>

        <!-- Deliverable -->
        <div class="mb-4">
            <x-input-label for="deliverable" :value="__('Deliverable')" />
            <textarea id="deliverable" class="block mt-1 w-full" name="deliverable" rows="4" required>{{ $milestone->deliverable }}</textarea>
            <x-input-error :messages="$errors->get('deliverable')" class="mt-2" />
        </div>

        <!-- Status -->
        <div class="mb-4">
            <x-input-label for="status" :value="__('Status')" />
            <select id="status" name="status" class="block mt-1 w-full" required>
                <option value="pending" {{ $milestone->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $milestone->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="overdue" {{ $milestone->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4" style="background-color: var(--accent-color); border-color: var(--accent-color);">
                {{ __('Update Milestone') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection