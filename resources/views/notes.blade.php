<x-layout>
    <x-elements.title>Notes</x-elements.title>

    <x-layout.grid>
        @foreach ($notes as $note)
        <x-elements.card :id="$note['id']" :title="$note['title']" :content="$note['content']" />
        @endforeach
    </x-layout.grid>
</x-layout>