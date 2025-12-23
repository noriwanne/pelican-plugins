<x-filament-panels::page>
    <x-filament::section>
        <div class="flex flex-col items-center justify-center space-y-10 p-8">
            <div class="flex flex-col items-center text-center space-y-4">
                <h2 class="text-2xl font-bold text-gray-950 dark:text-white">
                    Delete Server
                </h2>
                
                <p class="text-base text-gray-500 dark:text-gray-400 max-w-lg">
                    Once you delete this server, all data associated with it will be permanently removed. This action cannot be undone.
                </p>
            </div>

            <div class="w-full border-t border-gray-200 dark:border-white/10"></div>

            <div class="pt-4">
                @livewire('deletable-servers::delete-button', ['server' => \Filament\Facades\Filament::getTenant()])
            </div>
        </div>
    </x-filament::section>
</x-filament-panels::page>
