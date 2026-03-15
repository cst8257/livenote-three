<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-layout.header />
    <x-layout.container>
        <x-elements.title>{{ $title }}</x-elements.title>
        <p class="text-2xl mb-4">{{ $content }}</p>
        <a href="/" class="border border-zinc-300 rounded-md py-2 px-4">Back</a>
    </x-layout.container>
</x-layout>