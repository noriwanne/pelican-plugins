<?php

namespace Norivane\DeletableServers\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Norivane\DeletableServers\Livewire\DeleteServerButton;
use App\Models\Subuser;

class DeletableServersPluginProvider extends ServiceProvider
{
    public function register(): void
    {
        Subuser::registerCustomPermissions('settings', ['delete']);
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'deletable-servers');

        Livewire::component('deletable-servers::delete-button', DeleteServerButton::class);
    }
}
