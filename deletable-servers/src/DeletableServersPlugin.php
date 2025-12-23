<?php

namespace Norivane\DeletableServers;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Filament\Facades\Filament;

class DeletableServersPlugin implements Plugin
{
    public function getId(): string
    {
        return 'deletable-servers';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            \Norivane\DeletableServers\Filament\Server\Pages\DeleteServer::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
    }
}
