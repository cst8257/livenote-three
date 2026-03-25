<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Notes'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
    @fluxAppearance()
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
    <div class="flex">
        <x-layout.sidebar>
            {{ $sidenav }}
        </x-layout.sidebar>
        <main class="grow">
            {{ $slot }}
            <livewire:layout.modal />
        </main>
    </div>

    @livewireScripts()
    @fluxScripts()
</body>
</html>
