<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }} | @yield('title', '')</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  @livewireStyles
  @yield('styles')


  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" integrity="sha512-G8JE1Xbr0egZE5gNGyUm1fF764iHVfRXshIoUWCTPAbKkkItp/6qal5YAHXrxEu4HNfPTQs6HOu3D5vCGS1j3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="{{ asset('js/charts-lines.js') }}" defer></script> -->
  <!-- <script src="{{ asset('js/charts-pie.js') }}" defer></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <style>
    .chips-container {
      border: 2px solid #e2e8f0;
      border-radius: 5px;
      width: auto;
      padding: 5px;
    }

    .chips-input {
      border: none;
      appearance: none;
      margin: 5px;
    }

    .chips-input:focus-visible {
      border: none;
      appearance: none;
      outline: none;
    }

    .focus {
      list-style-type: none;
      overflow: auto;
    }

    .focus li a {
      color: #9061f9;
    }

    .focus li.active a {
      color: white;
    }

    .focus li.active {
      background: #9061f9;
    }

    .focus:focus,
    .focus:active {
      outline: none;
    }

    .active-menu {
      color: #9061f9;
    }

    /* Toggle B */
    input:checked~.dot {
      transform: translateX(100%);
      background-color: #48bb78 !important;
    }
  </style>

</head>