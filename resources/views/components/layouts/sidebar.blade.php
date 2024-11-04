<aside class="left-sidebar" data-sidebarbg="skin6">
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        @if (auth()->user()->is_admin)
          <x-layouts.admin-nav />
        @else
          <x-layouts.patient-nav />
        @endif

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Mi cuenta</span></li>

        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" aria-expanded="false" href="javascript:void(0)">
            <i data-feather="user" class="feather-icon"></i>
            <span class="hide-menu pt-1">
              Mi Perfil
            </span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" aria-expanded="false" href="javascript:void(0)" data-logout>
            <i data-feather="log-out" class="feather-icon"></i>
            <span class="hide-menu pt-1">
              Cerrar Sesión
            </span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
