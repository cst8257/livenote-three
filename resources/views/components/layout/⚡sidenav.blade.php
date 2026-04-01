<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public $tags = [];

    #[On('note-updated')]
    public function boot()
    {
        // $this->tags = Tag::all();
        // $this->tags = Tag::withCount('notes')->get();
        $this->tags = Tag::whereHas('notes', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->withCount(['notes' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->get();
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        $this->redirect('/login', true);
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
        <flux:sidebar.item 
            icon="arrow-right-start-on-rectangle" 
            wire:click="logout">
            Logout
        </flux:sidebar.item>
    </flux:sidebar.nav>
</div>