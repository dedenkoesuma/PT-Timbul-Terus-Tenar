<header class="navbar sticky-top flex-md-nowrap p-0 shadow" >
<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/dashboard"><img src="{{asset('images/logo-primary.png')}}" class="ms-5" alt="logo"></a>

    <div class="nav-item me-4 logout text-light">
      <form method="POST" action="{{ route('logout') }}">
      @csrf
        <a class="nav-link d-flex align-items-center gap-2" href="route('logout')" style="color:black;" onclick="event.preventDefault(); this.closest('form').submit();">
          <svg class="bi"><use xlink:href="#door-closed"/></svg>
          Sign out
        </a>
      </form>
    </div>
  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"/></svg>
      </button>
    </li>
  </ul>

</header>

<style>
  .logout a:hover{
    color: #611115;
  }
  @media (max-width: 766px) {
  .logout{
    display:none;
  }
}
</style>