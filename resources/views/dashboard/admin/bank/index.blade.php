<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    @include('partials.dashboardstyle')
  </head>
  <body>
    @include('partials.svg')

    <header class="navbar sticky-top bg-secondary flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">{{ $company }}</a>

        <ul class="navbar-nav flex-row d-md-none">
          <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
              <svg class="bi"><use xlink:href="#search"/></svg>
            </button>
          </li>
          <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <svg class="bi"><use xlink:href="#list"/></svg>
            </button>
          </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
          <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
      </header>

<div class="container-fluid">
  <div class="row">
    @include('partials.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">{{ $title }}</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a type="button" href="{{ route('bank.create') }}" class="btn btn-sm btn-outline-secondary">Create Bank</a>
            </div>
            <form class="d-flex"  action="{{ route('bank.index') }}" role="search">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-secondary" type="submit">Search</button>
              </form>
          </div>
        </div>

        <h2>Section Dashboard</h2>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
              </tr>
            </thead>
            @foreach ($list as $bank)
            <tbody>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bank->name }}</td>
                <td>{{ $bank->slug }}</td>

                <td><a href="{{ route('bank.edit',$bank->id) }}"
                    class="badge bg-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <form action="{{ route('bank.destroy',$bank->id) }}" method="post"
                        class="d-inline">
                        @method('delete')
                        @csrf
                        <td>
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Hapus Data Ini?')"><i
                                    class="bi bi-x-circle"></i></button>
                        </td>
                    </form>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </main>
  </div>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
