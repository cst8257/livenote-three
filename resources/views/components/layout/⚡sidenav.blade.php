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

<flux:sidebar.nav>
    <flux:sidebar.item icon="home" href="/" wire:navigate>All Notes</flux:sidebar.item> 
    @foreach($tags as $tag)
    <flux:sidebar.item 
        icon="hashtag" 
        :badge="$tag->notes_count" 
        :href="'/tag/'.$tag->id"
        wire:navigate>
            {{ $tag->name }}
    </flux:sidebar.item>
    @endforeach
</flux:sidebar.nav>