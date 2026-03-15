<a href="/note/{{ $id }}" class="block border border-gray-300 p-4 min-h-30 rounded-xl">
    <h2 class="text-xl font-weight-normal mb-2">{{ $title }}</h2>
    <p class="text-sm text-zinc-500">{{ Str::of($content)->limit(75) }}</p>
</a>