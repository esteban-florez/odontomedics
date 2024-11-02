<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-lg">
    <div class="navbar-header" data-logobg="skin6">
      <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)">
        <i data-feather="menu"></i>
        <i class="d-none" data-feather="x"></i>
      </a>
      <div class="navbar-brand p-0">
        <div class="d-flex align-items-center justify-content-center gap-1 w-100">
          <a href="index.html">
            <img height="35" src="{{ asset('img/logo.png') }}" alt="Logo">
          </a>
          <h3 class="m-0 h2 tracking-tighter">Odontomedics</h3>
        </div>
      </div>
      <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <i data-feather="more-horizontal"></i>
      </a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <ul class="navbar-nav float-left me-auto ms-lg-3 ps-lg-1">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">
            <form>
              <div class="customize-input">
                <input class="form-control custom-shadow custom-radius border-0 bg-white" type="search"
                  placeholder="Buscar..." aria-label="Search">
                <i class="form-control-icon" data-feather="search"></i>
              </div>
            </form>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav float-end">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle pl-lg-3 position-relative" href="javascript:void(0)" id="bell" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span><i data-feather="bell" class="icon-sm"></i></span>
            <span class="badge text-bg-primary notify-no rounded-circle">5</span>
          </a>
          <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
            <ul class="list-style-none">
              <li>
                <div class="message-center notifications position-relative">
                  <a href="javascript:void(0)"
                    class="message-item d-flex align-items-center border-bottom px-3 py-2">
                    <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay"
                        class="text-white"></i></div>
                    <div class="w-75 d-inline-block v-middle ps-2">
                      <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                      <span class="font-12 text-nowrap d-block text-muted">Just see
                        the my new
                        admin!</span>
                      <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                    </div>
                  </a>
                  <a href="javascript:void(0)"
                    class="message-item d-flex align-items-center border-bottom px-3 py-2">
                    <span class="btn btn-success text-white rounded-circle btn-circle"><i data-feather="calendar"
                        class="text-white"></i></span>
                    <div class="w-75 d-inline-block v-middle ps-2">
                      <h6 class="message-title mb-0 mt-1">Event today</h6>
                      <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                        a reminder that you have event</span>
                      <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                    </div>
                  </a>
                  <a href="javascript:void(0)"
                    class="message-item d-flex align-items-center border-bottom px-3 py-2">
                    <span class="btn btn-info rounded-circle btn-circle"><i data-feather="settings"
                        class="text-white"></i></span>
                    <div class="w-75 d-inline-block v-middle ps-2">
                      <h6 class="message-title mb-0 mt-1">Settings</h6>
                      <span class="font-12 text-nowrap d-block text-muted text-truncate">You
                        can customize this template
                        as you want</span>
                      <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                    </div>
                  </a>
                  <a href="javascript:void(0)"
                    class="message-item d-flex align-items-center border-bottom px-3 py-2">
                    <span class="btn btn-primary rounded-circle btn-circle"><i data-feather="box"
                        class="text-white"></i></span>
                    <div class="w-75 d-inline-block v-middle ps-2">
                      <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                        class="font-12 text-nowrap d-block text-muted">Just
                        see the my admin!</span>
                      <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                    </div>
                  </a>
                </div>
              </li>
              <li>
                <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                  <strong>Check all notifications</strong>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle pl-lg-3 position-relative" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="ms-2">
              <span class="text-dark d-none d-lg-inline-block">
                {{ auth()->user()?->patient?->fullname ?? 'Administrador' }}
              </span>
              <i class="d-inline-block d-lg-none" data-feather="user" class="icon-sm"></i>
              <i data-feather="chevron-down" class="icon-sm"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
            <a class="dropdown-item mt-2" href="javascript:void(0)"><i data-feather="user" class="icon-sm me-2 ms-1"></i>
              Mi Perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)" data-logout>
              <i data-feather="power" class="icon-sm me-2 ms-1"></i>
              Cerrar Sesión
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
