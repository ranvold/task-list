<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 12 Task List App</title>
        @yield('styles')
    </head>
    <body>
        <div class="container">
            @if (session()->has('success'))
                <div>{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </body>
</html>
