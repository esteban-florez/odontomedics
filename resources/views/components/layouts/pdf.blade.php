<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }}</title>

  <link href="{{ asset('vendor/css/styles.min.css') }}" rel="stylesheet">
  <link href="{{ asset('app.css') }}" rel="stylesheet">
  {{ $css }}
</head>

<body>
  <div class="d-flex align-items-center justify-content-center gap-1 w-100">
    <header style="background-color: #ccc; padding-bottom: 10px">
      <img height="35" width="35" src="data:image/png;base64,{{ $image }}" alt="Logo"
        style="position: absolute; left: 40%; top: 10px">
      <h3 class="h2 tracking-tighter" style="margin-left: 45%; margin-right: 50%;">Odontomedics</h3>
      <p style="width: 100%; margin-left: 41%; margin-right: 50%;">
        {{ $title }}
      </p>
      <p style="width: 100%; margin-left: 45%; margin-right: 50%; margin-top: -1rem">
        {{ now()->translatedFormat('d-m-Y') }}
      </p>
    </header>
  </div>

  {{ $slot }}
</body>

</html>
