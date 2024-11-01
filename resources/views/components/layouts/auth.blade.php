<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
  <title>Odontomedics - Clínica Odontológica</title>
  <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">
</head>

<body>
  <div class="main-wrapper">
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
      style="background:url({{ asset('img/auth-bg.jpg') }}) no-repeat center center;">
      <div class="auth-box row">
        <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{ asset('img/auth-image.jpg') }});">
        </div>
        <div class="col-lg-5 col-md-7 bg-white">
          <div class="p-3">
            <div class="text-center">
              <img src="{{ asset('img/auth-decoration.png') }}" alt="wrapkit">
            </div>
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
  <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
  <script>
    $(".preloader").fadeOut();
  </script>
</body>

</html>
