<nav class="navbar navbar-expand-lg bg-secondary fixed-top">
    <div class="container fs-5 d-flex">
        <h1><a class="navbar-brand fw-bold fs-4 text-white" href="/">{{ $title }}</a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="btn btn-primary dropdown-toggle text-white ms-2 me-3" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Donasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="btn btn-primary dropdown-toggle text-white ms-2 me-5" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

                @auth()
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-item text-white btn fs-6 text-uppercase icon-link icon-link-hover" style="--bs-link-hover-color"><i
                            class="bi bi-box-arrow-in-right"></i>Logout</button>
                    </form>
                @else
                    <li class="nav-item ms-3 me-2">
                        <a class="btn btn-primary text-white" href="/Register">Daftar</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-light text-black" href="/Login">Masuk</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
