<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>

    {{-- <style>
        .dropdown-item:hover {
            color: white;
            background-color: blue
        }
    </style> --}}
    
    @yield('page-styles')
</head>

<body>
    @include('includes.navbar')


    @yield('content')

    @yield('page-scripts')
</body>

</html>