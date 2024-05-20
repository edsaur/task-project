<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tasks </title>
    <script src="https://cdn.tailwindcss.com"></script>
     
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn-danger {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 bg-red-500 hover:bg-red-400 text-slate-700;
        }

        .btn-success {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 bg-green-500 hover:bg-green-400 text-slate-700;
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500;
        }

        label {
            @apply block text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-3xl mb-4">@yield('title')</h1>
    <div>
        @yield('content')
    </div>
</body>
</html>