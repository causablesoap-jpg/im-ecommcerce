<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'TechGear Parts' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="min-h-screen bg-neutral-800 text-slate-100">

    @livewire('partials.navbar')
    <main class="bg-neutral-800">
        {{ $slot }}
    </main>
    @livewire('partials.footer')
    @livewireStyles

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @livewireScripts
</body>

</html>