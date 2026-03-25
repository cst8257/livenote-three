<?php

use App\Models\Note;
use Livewire\Component;

new class extends Component
{
    public $id;
    public $title = '';
    public $content = '';

    public function mount($id) 
    {
       $note = Note::findOrFail($id);
       $this->id = $note->id;
       $this->title = $note->title;
       $this->content = $note->content;
    }
};
?>

<div>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-layout.header>
        <flux:button href="/" class="me-4" wire:navigate>Back</flux:button>
        <flux:button 
            variant="danger" 
            class="cursor-pointer">
                Delete
        </flux:button>
    </x-layout.header>
    <x-slot name="sidenav">
        <livewire:layout.sidenav />
    </x-slot>
    <x-layout.container>
        <input 
            wire:model="title" 
            class="text-5xl font-weight-normal p-4 mb-4 w-full">
        <textarea 
            wire:model="content" 
            class="text-2xl p-4 w-full h-50"></textarea>

        <livewire:elements.toast />
    </x-layout.container>
</div>

<script>
    this.$js.save = () => {
        document.querySelector('[data-ui-toast-text]').textContent = 'Your note has been saved.'
        document.querySelector('[data-ui-toast]').classList.remove('hidden');
        setTimeout(function () {
            document.querySelector('[data-ui-toast]').classList.add('hidden');
        }, 3000)
    }
</script>