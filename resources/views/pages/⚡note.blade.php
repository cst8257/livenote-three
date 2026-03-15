<?php

use App\Models\Note;
use Livewire\Component;

new class extends Component
{
    public $title = '';
    public $content = '';

    public function mount($id) 
    {
       $note = Note::findOrFail($id);
       $this->title = $note->title;
       $this->content = $note->content;
    }
};
?>

<div>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-layout.header />
    <x-layout.container>
        <x-elements.title>{{ $title }}</x-elements.title>
        <p class="text-2xl mb-4">{{ $content }}</p>
        <a 
            href="/" 
            class="border border-zinc-300 rounded-md py-2 px-4" 
            wire:navigate>
                Back
        </a>
    </x-layout.container>
</div>