<?php

namespace Norivane\DeletableServers\Livewire;

use App\Models\Server;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class DeleteServerButton extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public Server $server;

    public function removeServerAction(): Action
    {
        return Action::make('removeServer')
            ->label('Delete Server')
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->requiresConfirmation()
            ->modalHeading('Delete Server')
            ->modalDescription('Are you sure you want to delete this server? This action cannot be undone.')
            ->modalSubmitActionLabel('Yes, delete it')
            ->authorize(function () {
                /** @var \App\Models\User $user */
                $user = auth()->user();
                
                if ($user->id === $this->server->owner_id || $user->is_admin) {
                    return true;
                }

                return $user->can('s:settings:delete', $this->server) || $user->can('settings.delete', $this->server);
            })
            ->action(function () {
                $this->server->delete();

                Notification::make()
                    ->title('Server deleted successfully')
                    ->success()
                    ->send();

                return redirect('/');
            });
    }

    public function render()
    {
        return view('deletable-servers::livewire.delete-server-button');
    }
}
