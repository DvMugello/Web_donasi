<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-secondary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">{{ $company }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('dashboard.admin') }}">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('post.index') }}">
                <i class="bi bi-file-post"></i>
              Post
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('bank.index') }}">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Bank
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('category.index') }}">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Category
            </a>
          </li>
        </ul>
        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/">
              <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/logout">
              <svg class="bi"><use xlink:href="#door-closed"/></svg>
              Sign out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
