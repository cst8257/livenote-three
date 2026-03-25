<?php

use App\Models\Tag;
use Livewire\Component;

new class extends Component
{

};
?>

<flux:sidebar.nav>
    <flux:sidebar.item icon="home" href="/" wire:navigate>All Notes</flux:sidebar.item>    
    <flux:sidebar.item icon="hashtag" badge="1">Personal</flux:sidebar.item>
</flux:sidebar.nav>