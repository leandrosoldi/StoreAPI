<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link type="image/png" sizes="16x16" rel="icon" href="{{ asset('/img/favicon.png') }}">

    {{-- styles --}}
    <link rel="stylesheet" href="{{mix('/css/app.css')}}" >

    {{-- scripts --}}
    <script src="{{ mix('/js/app.js')}}" defer></script>
    <script >
        window.addEventListener("DOMContentLoaded",
              function(){
                      $('[data-toggle="tooltip"]').tooltip();
                      $("#overlay").show();
              }
        )
        window.addEventListener("load",
              function(){
                      @yield('onLoadScript')
                      $("#overlay").hide();
              }
        )
    </script>
    @stack('scripts')
    
</head>
<body>
  <div id="overlay" class="overSpinner" style="display: none">
    <div class="loader">Loading...</div>
  </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Store</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ asset('/pedidos') }}">Pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ asset('/clientes') }}">Clientes</a>
              </li>
            </ul>
            
          </div>
          
        </div>
      </nav>
      <div id="content-background" class="container"></div>
      <div id="app" class="container">
        @yield('content')
    </div>
</body>
</html>