<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DSSC Vehicle Monitoring</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.js"></script>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="in-active bg-danger">
        <br>
        <h1>
            <a href="index.html" class="logo text-center">
                <img src="{{ asset('img/ribshack.png')  }}" style="width: 70%;">
            </a>
        </h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ route('vales.index') }}">Home</a>
            </li>
            <li>
                <a href="#">Contacts</a>
            </li>
        </ul>
        <div class="footer">
            <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved
            </p>
        </div>
    </nav>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-danger">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fa fa-car" style="margin-right:15px;"></i>Vehicle
                                Monitoring - System</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/logout"><i style="margin-right:15px;" class="fa fa-user"></i>Logout</a>
                        </li>
                        <li class="nav navbar-nav ml-auto">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>
</html>
