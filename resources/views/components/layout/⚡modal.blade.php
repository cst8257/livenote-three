<?php

use Livewire\Component;

new class extends Component
{

    private function parseTags($tags)
    {
        return collect(explode(' ', $tags))
            ->filter(fn($tag) => str_starts_with($tag, '#') && strlen($tag) > 1)
            ->map(fn($tag) => ucwords(strtolower(ltrim($tag, '#'))))
            ->unique()
            ->values();
    }
};
?>

<flux:modal name="new-note" class="md:w-96">
    <form class="space-y-6">
        <flux:heading size="lg">New Note</flux:heading>
        <flux:input placeholder="New title..." />
        <flux:textarea placeholder="New content..." />
        {{-- <flux:input placeholder="#tag1 #tag2 #tag3" label="Tags" /> --}}
        <div class="flex">
            <flux:button type="submit" variant="primary" class="me-4">Add Note</flux:button>
        </div>
    </form>
</flux:modal>