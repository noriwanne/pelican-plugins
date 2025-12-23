<?php

namespace Norivane\DeletableServers\Filament\Server\Pages;

use Filament\Pages\Page;

class DeleteServer extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'tabler-trash';

    protected static ?string $navigationLabel = 'Delete Server';

    protected static ?string $title = 'Delete Server';

    protected static ?string $slug = 'delete-server';

    protected static ?int $navigationSort = 999;

    protected string $view = 'deletable-servers::pages.delete-server';

    public static function canAccess(): bool
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $server = \Filament\Facades\Filament::getTenant();

        if (!$server) {
            return false;
        }

        if ($user->id === $server->owner_id || $user->is_admin) {
            return true;
        }

        return $user->can('s:settings:delete', $server) || $user->can('settings.delete', $server);
    }
}
