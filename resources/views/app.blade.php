<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/35c34487a7.js" crossorigin="anonymous"></script>
    {{-- JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="bg-blue-200">
    {{-- navbar --}}
    @include('layouts.navbar')

    <div class="container items-center px-5 my-12 mx-12 bg-gray-200 rounded-md border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        @yield('app.content')
    </div>

    {{-- Template JS File --}}
    <script src="{{ asset('../path/to/flowbite/dist/flowbite.js') }}"></script>
    <script src="{{ asset('https://unpkg.com/flowbite@1.4.1/dist/flowbite.js') }}"></script>
</body>
</html>