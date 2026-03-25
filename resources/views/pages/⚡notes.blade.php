<?php

use App\Models\Note;
use Livewire\Component;

new class extends Component
{
    public $notes = [];
    public $search = '';

    public function mount()
    {
        $this->notes = Note::all();
    }

    public function updatedSearch()
    {
        $this->notes = Note::where('title', 'LIKE', '%' . $this->search . '%')
            ->orWhere('content', 'LIKE', '%' . $this->search . '%')
            ->get();
    }
};
?>

<div>
    <x-layout.header>
        <flux:input
                icon="magnifying-glass"
                name="search"
                variant="filled"
                placeholder="Search..."
                wire:model.live="search" />
    </x-layout.header>
    <x-slot name="sidenav">
        <livewire:layout.sidenav />
    </x-slot>
    <x-layout.container>
        <x-elements.title>Notes</x-elements.title>

        <x-layout.grid>
            @foreach ($notes as $note)
            <x-elements.card :id="$note['id']" :title="$note['title']" :content="$note['content']" />
            @endforeach
        </x-layout.grid>
    </x-layout.container>
</div>