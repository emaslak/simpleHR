<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <a class="navbar-brand" href="/">BP test</a>
            </a>
        </div>
        <ul class="nav navbar-nav">
            @yield('navigation')
        </ul>
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    @yield('content')
</div>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>