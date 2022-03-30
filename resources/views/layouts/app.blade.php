<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>Shopping store</title>
</head>

<body>
    <header class=" bg-primary row pb-2">
        <div class="col-sm-2 bg-secondary">
            <img class="mx-auto d-block rounded-circle p-3" src="{{ asset('img/ham.png') }}"
                alt="description of myimage" width="200" height="200">
        </div>
        <div class="col-sm-8 bg-third text-center p-3">
            <h1>HAM</h1>
            <p>So that you can give the greatest potential, in the best style</p>
            <nav class="barnav d-flex justify-content-around">
                <ul class="bg-primary">
                    <li><a href="{{ route('home.index') }}">HOME</a></li>
                    <li><a href="#news">OFERTS</a></li>
                    <li><a href="#contact">CONTACT</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-sm-2 bg-secondary">
            @guest
                <nav class="barnav d-flex justify-content-center p-3">
                    <ul class="bg-primary">
                        <li><a href="{{ route('login') }}"> Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </nav>
            @else
                <nav class="barnav d-flex justify-content-center p-3">
                    <ul class="bg-primary">
                        <li><a href="{{ route('myaccount.orders') }}"> My Orders</a></li>
                        @admin
                        <li><a href="{{ route('admin.home.index') }}"> Admin Panel</a></li>
                        @endadmin
                        <li>
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="nav-link active"
                                    onclick="document.getElementById('logout').submit();">Logout</a>
                                @csrf
                            </form>
                        </li>
                        
                    </ul>
                </nav>
            @endguest
        </div>
    </header>
    <main class="row bg-primary">
        @yield('content')
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
