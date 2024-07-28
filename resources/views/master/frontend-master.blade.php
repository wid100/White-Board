<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>White Board</title>
    @include('layouts.frontend.style')
</head>

<body>
    @include('layouts.frontend.header')

    @yield('content')
    @include('layouts.frontend.footer')

    @include('layouts.frontend.js')
    @yield('js')
</body>

</html>
