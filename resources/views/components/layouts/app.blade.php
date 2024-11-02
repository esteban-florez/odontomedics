@props(['breadcrumbs' => [], 'title'])

<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
  <title>Odontomedics - Clínica Odontológica</title>
  <link href="{{ asset('vendor/css/styles.min.css') }}" rel="stylesheet">
  @stack('css')
  @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <x-layouts.topbar />
    <x-layouts.sidebar />
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <h1 class="page-title text-truncate text-dark font-weight-medium h3 mb-1">
              {{ $title }}
            </h1>
            <x-layouts.breadcrumbs :breadcrumbs="$breadcrumbs" />
          </div>
          <div>
            {{ $rightbar ?? '' }}
          </div>
        </div>
      </div>
      {{ $slot }}
      <footer class="footer text-center text-muted">
        Todos los derechos reservados | Odontomedics (2024)
      </footer>
    </div>
  </div>
  <form method="POST" action="{{ route('logout') }}" id="logout">
    @csrf @method('DELETE')
  </form>
  <script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/js/app-style-switcher.min.js') }}"></script>
  <script src="{{ asset('vendor/js/feather.min.js') }}"></script>
  <script src="{{ asset('vendor/js/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('vendor/js/sidebarmenu.min.js') }}"></script>
  <script src="{{ asset('vendor/js/custom.min.js') }}"></script>
  @stack('js')
</body>

</html>
