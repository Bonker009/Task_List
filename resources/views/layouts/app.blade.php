<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<body>
    <h1>@yield('title')</h1>
    <div>
        @if (session()->has('success'))
            <div class="bg-green-500 text-white p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
