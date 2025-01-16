<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title }}</title>
  <style>
    {{ file_get_contents(public_path('vendor/css/styles.min.css')) }}
  </style>
  <style>
    {{ file_get_contents(public_path('app.css')) }}
  </style>
  <style>
    *, *::after, *::before {
      box-sizing: border-box;
    }

    body {
      background: white;
      color: black;
      padding: 2.5rem;
      font-family: sans-serif;
    }

    header {
      padding: 1rem 0 0.75rem;
      text-align: center;
    }

    h2 {
      font-weight: bold;
      font-size: 1.2rem;
    }

    .logo {
      width: 3rem;
      height: 3rem;
      padding: .12rem;
      object-fit: contain;
    }

    h1 {
      font-weight: bold;
      text-align: center;
      margin-top: 2rem;
      margin-bottom: 2rem;
      font-size: 1.6rem;
    }

    .bold {
      font-weight: bold;
    }

    footer {
      position: fixed;
      bottom: 2.5rem;
      left: 0;
      right: 0;
      width: 100%;
      text-align: center;
    }
  </style>
  {{ $css ?? '' }}
</head>

<body>
  <header class="bg-primary">
    <img class="bg-white rounded-circle logo" src="data:image/png;base64,{{ $image }}" />
    <h2 class="m-0 text-white">Odontomedics</h2>
    <p class="m-0 h6 text-white">
      {{ now()->locale('es')->translatedFormat('j \d\e F \d\e Y') }}
    </p>
  </header>
  <h1>{{ $title }}</h1>
  {{ $slot }}

  <footer>
    Todos los derechos reservados | Odontomedics ({{ now()->year }})
  </footer>
</body>

</html>
