<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="p-8 max-w-7xl">
        <h1 class="text-5xl font-weight-normal mb-4">{{ $title }}</h1>
        <p class="text-2xl mb-4">{{ $content }}</p>
        <a href="/" class="border border-zinc-300 rounded-md py-2 px-4">Back</a>
    </section>
</body>
</html>
