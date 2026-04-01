<?php

use App\Models\Note;
use App\Models\Tag;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::dashboard')] class extends Component
{
    public $id;
    public $title = '';
    public $content = '';
    public $tags = '';

    public function mount($id) 
    {
       $note = Note::findOrFail($id);
       $this->id = $note->id;
       $this->title = $note->title;
       $this->content = $note->content;
       $this->tags = Tag::stringify($note->tags);
    }

    public function updated()
    {
        $note = Note::findOrFail($this->id);
        $note->title = $this->title;
        $note->content = $this->content;
        $note->save();

        $this->js('save');
    }

    public function delete()
    {
        $note = Note::findOrFail($this->id);
        $note->delete();

        $this->redirect('/', true);
    }
};
?>

<div>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-layout.header>
        <flux:button href="/" class="me-4" wire:navigate>Back</flux:button>
        <flux:button 
            variant="danger" 
            class="cursor-pointer"
            wire:click="delete"
            wire:confirm="Are you sure you want to delete this note?">
                Delete
        </flux:button>
    </x-layout.header>
    <x-slot name="sidenav">
        <livewire:layout.sidenav />
    </x-slot>
    <x-layout.container>
        <input 
            wire:model.blur.live="title" 
            class="text-5xl font-weight-normal p-4 mb-4 w-full">
        <textarea 
            wire:model.blur.live="content" 
            class="text-2xl p-4 w-full h-50"></textarea>
        <input
            wire:model.blur.live="tags"
            class="text-2xl font-weight-normal p-4 mb-4 w-full text-yellow-500">
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