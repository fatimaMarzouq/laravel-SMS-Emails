<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    
    <ul class="navbar-nav">

      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i data-feather="user"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            
            <div class="text-center">
              <p class="tx-16 fw-bolder text-capitalize">{{ Auth::user()->name }}</p>
              <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <!-- <li class="dropdown-item py-2">
              <a href="{{ url('/general/profile') }}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Profile</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Edit Profile</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="repeat"></i>
                <span>Switch User</span>
              </a>
            </li> -->
            <a href="route('logout')" class="text-body ms-0" onclick="event.preventDefault(); this.closest('form').submit();">
            <form method="POST" action="{{ route('logout') }}">
              <li class="dropdown-item py-2">
                            @csrf
              
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Log Out</span>
              
            </li> 
          </a>
            </form>
            
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
