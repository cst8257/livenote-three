<?php

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::dashboard')]class extends Component
{
    // public $notes = [];
    public $search = '';
    public $title = '';
    public $tagId = null;

    public function mount($tagId = null)
    {
        $this->tagId = $tagId;
        if (is_null($this->tagId)) {
            // $this->notes = Note::all();
            // $this->notes = Auth::user()->notes;
            $this->title = 'All Notes';
            return;
        }

        $tag = Tag::findOrFail($this->tagId);
        $this->title = $tag->name;
        // $this->notes = $tag->notes()->where('user_id', '=', Auth::id())->get();
    }

    #[Computed()]
    public function notes()
    {
        if (is_null($this->tagId)) {
            return Auth::user()->notes()
            ->where(function ($query) {
                $query->where('title', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('content', 'LIKE', '%' . $this->search . '%');
            })->get();
        }

        $tag = Tag::findOrFail($this->tagId);
        return $tag->notes()
            ->where('user_id', '=', Auth::id())
            ->where(function ($query) {
                $query->where('title', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('content', 'LIKE', '%' . $this->search . '%');
            })->get();
    }

    // public function updatedSearch()
    // {
    //     $this->notes = Auth::user()->notes()
    //         ->where(function ($query) {
    //             $query->where('title', 'LIKE', '%' . $this->search . '%')
    //                 ->orWhere('content', 'LIKE', '%' . $this->search . '%');
    //         })->get();
    // }
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
            @foreach ($this->notes as $note)
            <x-elements.card :id="$note['id']" :title="$note['title']" :content="$note['content']" />
            @endforeach
        </x-layout.grid>
    </x-layout.container>
</div>