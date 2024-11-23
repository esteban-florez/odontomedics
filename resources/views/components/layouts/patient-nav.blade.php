@php
    $is_doctor = Auth::user()->doctor;
@endphp

<li class="sidebar-item">
    <a class="sidebar-link sidebar-link" href="{{ route('home') }}" aria-expanded="false">
        <i data-feather="home" class="feather-icon"></i>
        <span class="hide-menu pt-1">Inicio</span>
    </a>
</li>

<li class="list-divider"></li>
<li class="nav-small-cap"><span class="hide-menu">Explorar</span></li>

@if (!$is_doctor)
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="calendar" class="feather-icon"></i>
            <span class="hide-menu pt-1">Mis citas</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item">
                <a href="{{ route('appointments.create') }}" class="sidebar-link">
                    <span class="hide-menu">Agendar cita</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('appointments.index') }}" class="sidebar-link">
                    <span class="hide-menu">
                        Listado de citas
                    </span>
                </a>
            </li>
        </ul>
    </li>
@endif

@if ($is_doctor)
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('appointments.index') }}" aria-expanded="false">
            <i data-feather="calendar" class="feather-icon"></i>
            <span class="hide-menu pt-1">Mis citas</span>
        </a>
    </li>
@endif

<li class="sidebar-item">
    <a class="sidebar-link" href="{{ route('procedures.index') }}" aria-expanded="false">
        <i data-feather="thermometer" class="feather-icon"></i>
        <span class="hide-menu pt-1">Mis tratamientos</span>
    </a>
</li>

@if (!$is_doctor)
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('bills.index') }}" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="hide-menu pt-1">Mis facturas</span>
        </a>
    </li>
@endif
