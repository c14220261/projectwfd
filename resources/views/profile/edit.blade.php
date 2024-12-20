@vite('resources/css/app.css')
@extends('base.base')
@include('components.navbar')
<script>
    function toggleEditMode(enable) {
        // Get all input elements
        const inputs = document.querySelectorAll('input');
        const saveButton = document.getElementById('save-button');
        const editButton = document.getElementById('edit-button');

        if (enable) {
            // Enable input fields and show Save button
            inputs.forEach(input => input.removeAttribute('disabled'));
            saveButton.style.display = 'inline-block';
            editButton.style.display = 'none';
        } else {
            // Disable input fields and show Edit button
            inputs.forEach(input => input.setAttribute('disabled', true));
            saveButton.style.display = 'none';
            editButton.style.display = 'inline-block';
        }
    }

    // Initialize the form in not-edit mode
    document.addEventListener('DOMContentLoaded', () => {
        toggleEditMode(false);
    });
</script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
