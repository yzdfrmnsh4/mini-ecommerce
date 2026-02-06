<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-50 font-sans antialiased">
    <div class="flex h-full">
        <!-- Sidebar -->
        <x-admin.sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header / Topbar -->
            <x-admin.header />

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 px-6 py-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    @if ($errors->any())
        <script>
            document.addEventListener("toast-ready", function() {
                @foreach ($errors->all() as $item)

                    Toast.fire({
                        icon: 'error',
                        title: @json($item, true)
                    })
                @endforeach
            });
        </script>
    @endif
    {{-- @if (session()->has('errors'))
        <script>
            document.addEventListener("toast-ready", function() {

                Toast.fire({
                    icon: 'error',
                    title: '{{ session()->get('errors') }}'
                })
            });
        </script>
    @endif --}}
    @if (session()->has('success'))
        <script>
            document.addEventListener("toast-ready", function() {

                Toast.fire({
                    icon: 'success',
                    title: '{{ session()->get('success') }}'
                })
            });
        </script>
    @endif
</body>

</html>
