<?php

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    public $title = '';
    public $content = '';
    public $tags = '';

    public function save()
    {
        $note = new Note();
        $note->title = $this->title;
        $note->content = $this->content;
        $note->save();

        if (!empty($this->tags)) {
            $tagNames = Tag::parse($this->tags);
            $tagIds = $tagNames->map(function ($name) {
                return Tag::firstOrCreate(['name' => $name]);
            })->pluck('id');
            $note->tags()->attach($tagIds);
        }

        $this->redirect("/note/{$note->id}", true);
    }
};
?>

<flux:modal name="new-note" class="md:w-96">
    <form class="space-y-6" wire:submit="save">
        <flux:heading size="lg">New Note</flux:heading>
        <flux:input placeholder="New title..." wire:model="title" />
        <flux:textarea placeholder="New content..." wire:model="content" />
        <flux:input placeholder="#tag1 #tag2 #tag3" wire:model="tags" label="Tags" />
        <div class="flex">
            <flux:button type="submit" variant="primary" class="me-4">Add Note</flux:button>
        </div>
    </form>
</flux:modal>