<?php

use App\Models\Note;
use App\Models\Tag;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::dashboard')]class extends Component
{
    public $notes = [];
    public $search = '';
    public $title = '';

    public function mount($tagId = null)
    {
        if (is_null($tagId)) {
            $this->notes = Note::all();
            $this->title = 'All Notes';
            return;
        }

        $tag = Tag::findOrFail($tagId);
        $this->title = $tag->name;
        $this->notes = $tag->notes;
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
    <x-slot name="title">{{ $title }}</x-slot>
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
        <x-elements.title>{{ $title }}</x-elements.title>

        <x-layout.grid>
            @foreach ($notes as $note)
            <x-elements.card :id="$note['id']" :title="$note['title']" :content="$note['content']" />
            @endforeach
        </x-layout.grid>
    </x-layout.container>
</div>