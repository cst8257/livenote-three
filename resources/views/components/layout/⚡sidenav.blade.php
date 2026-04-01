<?php

use App\Models\Tag;
use Livewire\Component;

new class extends Component
{
    public $tags = [];

    public function boot()
    {
        // $this->tags = Tag::all();
        $this->tags = Tag::withCount('notes')->get();
    }
};
?>

<div class="flex flex-col justify-between" style="height: calc(0px + 100dvh);">
    <flux:sidebar.nav>
        <flux:sidebar.item icon="home" href="/" wire:navigate>All Notes</flux:sidebar.item> 
        @foreach($tags as $tag)
        <flux:sidebar.item 
            icon="hashtag" 
            :badge="$tag->notes_count" 
            :href="'/tag/'.$tag->id"
            :wire:key="$tag->id"
            wire:navigate>
                {{ $tag->name }}
        </flux:sidebar.item>
        @endforeach
    </flux:sidebar.nav>
    <flux:sidebar.nav>
        <flux:sidebar.item icon="arrow-right-start-on-rectangle">Logout</flux:sidebar.item>
    </flux:sidebar.nav>
</div>