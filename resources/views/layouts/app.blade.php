<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    @include('layouts.header')
    @include('layouts.navbar')

    <main class="flex-grow flex items-center justify-center">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>