<div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Manage Profile</h3>
                </div>
            </div>
            <div class="content-body"><!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Zero configuration</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <x-form-section submit="updatePassword">
                                            <x-slot name="title">
                                                {{ __('Update Password') }}
                                            </x-slot>
                                        
                                            <x-slot name="description">
                                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                            </x-slot>
                                        
                                            <x-slot name="form">
                                                <div class="col-span-6 sm:col-span-4">
                                                    <x-label for="current_password" value="{{ __('Current Password') }}" />
                                                    <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
                                                    <x-input-error for="current_password" class="mt-2" />
                                                </div>
                                        
                                                <div class="col-span-6 sm:col-span-4">
                                                    <x-label for="password" value="{{ __('New Password') }}" />
                                                    <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
                                                    <x-input-error for="password" class="mt-2" />
                                                </div>
                                        
                                                <div class="col-span-6 sm:col-span-4">
                                                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                                    <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
                                                    <x-input-error for="password_confirmation" class="mt-2" />
                                                </div>
                                            </x-slot>
                                        
                                            <x-slot name="actions">
                                                <x-action-message class="mr-3" on="saved">
                                                    {{ __('Saved.') }}
                                                </x-action-message>
                                        
                                                <x-button>
                                                    {{ __('Save') }}
                                                </x-button>
                                            </x-slot>
                                        </x-form-section>
                                        <br><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
