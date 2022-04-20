<!-- Jose Alejandro Sanchez -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', __('adminpage.title'))</title>
</head>

<body>
    <div class="row g-0 body">
        <!-- sidebar -->
        <div class="p-3 col fixed text-white bg-dark">
            <a href="{{route('admin.home.index')}}" class="text-white text-decoration-none">
                <span class="fs-4">{{__('home.admin.panel')}}</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- {{__('home.home')}}</a></li>
                <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- {{__('home.products')}}</a>
                </li>
                <li><a href="{{ route('admin.category.index') }}" class="nav-link text-white">- {{__('home.categories')}}</a>
                </li>
                <li><a href="{{ route('admin.goal.index') }}" class="nav-link text-white">- {{__('home.goals')}}</a>
                </li>
                <li>
                    <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">{{__('adminpage.gb')}}</a>
                </li>
            </ul>

            <form id="logout" action="{{ route('logout') }}" method="POST">
                <a role="button" class="mt-2 btn bg-primary text-white"
                    onclick="document.getElementById('logout').submit();">{{__('home.logout')}}</a>
                @csrf
            </form>
        </div>
        <!-- sidebar -->
        <div class="col content-grey">
            <nav class="p-3 shadow text-end">
                <h2>
                    <span class="profile-font">@yield('subtitle','Admin Home Page - Ham Store')</span>
                </h2>

                <img class="img-profile rounded-circle" src="{{ asset('/img/ham.png') }}">
            </nav>
            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - HAM Clothing Shop
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
