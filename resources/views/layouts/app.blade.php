<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
</head>
<body>
    @yield('content')  {{-- Content from other views will be placed here --}}
    {{-- resources/views/layouts/app.blade.php --}}

<div class="container"> 
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')  {{-- Main page content will be inserted here --}}
</div>


</body>
</html>
