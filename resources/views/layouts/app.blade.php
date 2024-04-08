<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
</head>
<body>
    @yield('content') 

<div class="container"> 
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')  
</div>


</body>
</html>
