<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 space-y-8">

            <!-- Update Profile Information -->
            <div class="card bg-base-200 shadow-lg rounded-lg">
                <div class="card-body">
                    <h3 class="card-title text-gray-900 dark:text-gray-100">{{ __('Profile Information') }}</h3>
                    <div class="mt-4">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Update Password -->
            <div class="card bg-base-200 shadow-lg rounded-lg">
                <div class="card-body">
                    <h3 class="card-title text-gray-900 dark:text-gray-100">{{ __('Update Password') }}</h3>
                    <div class="mt-4">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete User -->
            <div class="card bg-red-900 shadow-lg rounded-lg">
                <div class="card-body p-6">
                    <h3 class="card-title text-red-200">{{ __('Delete Account') }}</h3>
                    <div class="mt-4">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
