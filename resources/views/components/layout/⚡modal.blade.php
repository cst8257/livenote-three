<?php

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    #[Validate('required|max:25')] 
    public $title = '';
    #[Validate('required|min:3')]
    public $content = '';
    #[Validate('nullable|regex:/^(#\w+\s*)*$/')]
    public $tags = '';

    public function save()
    {
         $this->validate();

        $note = new Note();
        $note->title = $this->title;
        $note->content = $this->content;
        $note->user_id = Auth::id();
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
        <flux:field>
            <flux:input placeholder="New title..." wire:model.live.blur="title" />
            <flux:error name="title" />
        </flux:field>   
        <flux:field>
            <flux:textarea placeholder="New content..." wire:model.live.blur="content" />
            <flux:error name="content" />
        </flux:field>
        <flux:input placeholder="#tag1 #tag2 #tag3" wire:model.live.blur="tags" label="Tags" />
        <div class="flex">
            <flux:button type="submit" variant="primary" class="me-4">Add Note</flux:button>
        </div>
    </form>
</flux:modal>