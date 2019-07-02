<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        @include('partials.head')
</head>
<body>

    <div id="app">
        
        @include('partials.navigation')

        <main class="px-5">
            @include('partials.message')
            @yield('content')
        </main>
    </div>

    @include('partials.popup')
    @include('partials.javascript')
</body>
</html>
