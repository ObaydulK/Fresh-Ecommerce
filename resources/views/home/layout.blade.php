<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @include('home.navber')
        <main class="content"> 
            @yield('content')
        </main>
    @include('home.footer')

</body>
</html>