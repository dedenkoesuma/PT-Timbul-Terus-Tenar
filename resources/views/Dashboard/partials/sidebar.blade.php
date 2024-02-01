<div class="container-fluid">
  <div class="row">
    <div class="sidebar col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="/dashboard">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/product">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/slider">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Home Slider
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/category">
                <img src="{{asset('images/categories.png')}}" width="20px" alt="">
                Category
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/brand">
                <img src="{{asset('images/brand-image.png')}}" width="20px" alt="">
                Brand
              </a>
            </li>
          </ul>

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
              <a class="nav-link d-flex align-items-center gap-2" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
            </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
