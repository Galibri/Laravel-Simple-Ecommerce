<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('frontend.home') }}" class="nav-link" target="_blank">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link btn btn-info btn-sm mr-2" href="#"><i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i></button>
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->