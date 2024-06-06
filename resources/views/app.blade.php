<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{--
    this is a template, a component is passed below the navbar component

    pages should be stored in '/views/pages'
    while individual components that make up a page stored in '/components' instead
    --}}

    {{-- this is the nav, dont change this --}}
    @include('components.nav')

    {{-- now any component or pages should go here --}}
    @yield('content')

    {{-- this is the footer, dont change this --}}
    @include('components.footer')
</body>

</html>
