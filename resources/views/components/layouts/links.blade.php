<li class="sidebar-item">
  <a class="sidebar-link sidebar-link" href="{{ route('home') }}" aria-expanded="false">
    <i data-feather="home" class="feather-icon"></i>
    <span class="hide-menu pt-1">Inicio</span>
  </a>
</li>

<li class="list-divider"></li>
<li class="nav-small-cap"><span class="hide-menu">Gestión</span></li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="calendar" class="feather-icon"></i>
    <span class="hide-menu pt-1">Citas</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="form-inputs.html" class="sidebar-link">
        <span class="hide-menu">Listado de Citas</span>
      </a>
    </li>
  </ul>
</li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="calendar" class="feather-icon"></i>
    <span class="hide-menu pt-1">Tratamientos</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="form-inputs.html" class="sidebar-link">
        <span class="hide-menu">Lista de Tratamientos</span>
      </a>
    </li>
  </ul>
</li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="file-text" class="feather-icon"></i>
    <span class="hide-menu pt-1">Facturación</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="form-inputs.html" class="sidebar-link">
        <span class="hide-menu">Historial de Facturas</span>
      </a>
    </li>
  </ul>
</li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="clipboard" class="feather-icon"></i>
    <span class="hide-menu pt-1">Inventario</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="form-inputs.html" class="sidebar-link">
        <span class="hide-menu">Historial de Inventario</span>
      </a>
    </li>
  </ul>
</li>

<li class="list-divider"></li>
<li class="nav-small-cap"><span class="hide-menu">Registros</span></li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="users" class="feather-icon"></i>
    <span class="hide-menu pt-1">Pacientes</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="{{ route('patients.index') }}" class="sidebar-link">
        <span class="hide-menu">Listado de Pacientes</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{ route('patients.create') }}" class="sidebar-link">
        <span class="hide-menu">Registrar Paciente</span>
      </a>
    </li>
  </ul>
</li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="activity" class="feather-icon"></i>
    <span class="hide-menu pt-1">Doctores</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="{{ route('doctors.index') }}" class="sidebar-link">
        <span class="hide-menu">Listado de Doctores</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{ route('doctors.create') }}" class="sidebar-link">
        <span class="hide-menu">Registrar Doctor</span>
      </a>
    </li>
  </ul>
</li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="plus-square" class="feather-icon"></i>
    <span class="hide-menu pt-1">Servicios</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="{{ route('treatments.index') }}" class="sidebar-link">
        <span class="hide-menu">Listado de Servicios</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{ route('treatments.create') }}" class="sidebar-link">
        <span class="hide-menu">Registro de Servicio</span>
      </a>
    </li>
  </ul>
</li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="package" class="feather-icon"></i>
    <span class="hide-menu pt-1">Insumos</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="{{ route('products.index') }}" class="sidebar-link">
        <span class="hide-menu">Listado de Insumos</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="{{ route('products.create') }}" class="sidebar-link">
        <span class="hide-menu">Registrar Insumo</span>
      </a>
    </li>
  </ul>
</li>

<li class="sidebar-item">
  <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
    <i data-feather="truck" class="feather-icon"></i>
    <span class="hide-menu pt-1">Proveedores</span>
  </a>
  <ul aria-expanded="false" class="collapse first-level base-level-line">
    <li class="sidebar-item">
      <a href="form-inputs.html" class="sidebar-link">
        <span class="hide-menu">Listado de Proveedores</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a href="form-inputs.html" class="sidebar-link">
        <span class="hide-menu">Registrar Proveedor</span>
      </a>
    </li>
  </ul>
</li>

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
