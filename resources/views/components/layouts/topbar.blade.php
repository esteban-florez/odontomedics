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
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <x-layouts.notifications />
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pl-lg-3 position-relative" href="javascript:void(0)"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ms-2">
                            <span class="text-dark d-none d-lg-inline-block">
                                {{ auth()->user()?->patient?->fullname ?? (auth()->user()?->doctor?->fullname ?? 'Administrador') }}
                            </span>
                            <i class="d-inline-block d-lg-none" data-feather="user" class="icon-sm"></i>
                            <i data-feather="chevron-down" class="icon-sm"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item mt-2" href="javascript:void(0)"><i data-feather="user"
                                class="icon-sm me-2 ms-1"></i>
                            Mi Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-form="logout">
                            <i data-feather="power" class="icon-sm me-2 ms-1"></i>
                            Cerrar Sesión
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
