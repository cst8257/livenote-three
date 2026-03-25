<flux:header class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 w-full">
    <flux:navbar class="-mb-px">
        <flux:modal.trigger name="new-note">
            <flux:button class="me-4 cursor-pointer">New Note</flux:button>
        </flux:modal.trigger>
        {{ $slot }}
    </flux:navbar>
</flux:header>