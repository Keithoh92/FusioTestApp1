<div class="mynav">
    <nav class="navbar navbar-dark bg-dark">
        <ul class="navbar-nav flex-wrap">
            <!--            <li class="nav-item">-->
            <!--                <span class="navbar-toggler-icon"></span>-->
            <!--            </li>-->
            <!--            <span class="navbar-toggler-icon"></span>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>Navbar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Login</a>
                    <a class="dropdown-item" href="#">Register</a>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                </div>
            </li>
            <li class="nav-item text-white">
                <span class="dots">...</span>
            </li>

        </ul>


    </nav>
</div>
