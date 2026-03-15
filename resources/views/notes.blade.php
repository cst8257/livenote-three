<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="p-8 max-w-7xl">
        <h1 class="text-5xl font-weight-normal mb-4">Notes</h1>

        <section class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 content-start py-4">
            @foreach ($notes as $index => $note)
            <a href="/note/{{ $index }}" class="block border border-gray-300 p-4 min-h-30 rounded-xl">
                <h2 class="text-xl font-weight-normal mb-2">{{ $note['title'] }}</h2>
                <p class="text-sm text-zinc-500">{{ $note['content'] }}</p>
            </a>
            @endforeach
        </section>
    </section>
</body>
</html>
