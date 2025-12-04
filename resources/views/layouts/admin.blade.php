<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin - TechGear Parts' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-neutral-900 text-neutral-100">
    @livewire('partials.navbar')
    <main class="bg-neutral-900">
        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="fixed top-4 right-4 z-50 max-w-sm">
                <div class="bg-green-900/90 border border-green-700 rounded-lg p-4 shadow-lg animate-fade-in">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-green-100">Success!</p>
                            <p class="text-green-200 text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    document.querySelector('[role="alert"]')?.remove();
                }, 5000);
            </script>
        @endif

        @if (session('error'))
            <div class="fixed top-4 right-4 z-50 max-w-sm">
                <div class="bg-red-900/90 border border-red-700 rounded-lg p-4 shadow-lg animate-fade-in">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-red-100">Error!</p>
                            <p class="text-red-200 text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    document.querySelector('[role="alert"]')?.remove();
                }, 5000);
            </script>
        @endif

        @yield('content')
    </main>
    @livewire('partials.footer')
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
</body>

</html>