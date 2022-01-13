<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{ url('/') }}" class="sidebar-brand">
      <!-- <img src="{{ asset('/logo.png') }}"> -->
    Reviews<span>Booster</span>
    </a>
   

    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
     
      <li class="nav-item nav-category">web apps</li>
      <li class="nav-item {{ active_class(['/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#customer" role="button" aria-expanded="{{ is_active_route(['/*']) }}" aria-controls="customer">
          <i class="link-icon" data-feather="smile"></i>
          <span class="link-title">Customer</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['/*']) }}" id="customer">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link {{ active_class(['/']) }}">Customers List</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/add-customer') }}" class="nav-link {{ active_class(['/add']) }}">Add Customer</a>
            </li>
            
           
          </ul>
        </div>
      </li>
      <li class="nav-item {{ active_class(['email/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Sending</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['email/*']) }}" id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/emails-list') }}" class="nav-link {{ active_class(['email/list']) }}">Emails & SMS List</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/redirect-to') }}" class="nav-link {{ active_class(['email/url']) }}">Redirect To URL</a>
            </li>
           
          </ul>
        </div>
      </li>
      
    </ul>
  </div>
</nav>