<!DOCTYPE html>
<html  lang="en">
 <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Harrybxchange | Fast. Secure. Trusted Exchange.</title>

   
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- End Style CSS -->

    <link rel="shortcut icon" href="/assets/images/harrybfavicon.png" />
    <link
      rel="apple-touch-icon-precomposed"
      href="/assets/images/harrybfavicon.png"
    />

    @vite(['resources/css/app.css','resources/css/custom.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')

     <!-- Style CSS -->
    <link rel="stylesheet" href="/app/dist/app.css" />
  </head>

  <body class="body header-fixed">
    <livewire:home.layout.header />

    {{ $slot }}


    <livewire:home.layout.footer />
    
    
    <script data-navigate-track src="app/js/aos.js"></script>
    <script data-navigate-track src="app/js/jquery.min.js"></script>
    <script data-navigate-track src="app/js/jquery.easing.js"></script>
    <script data-navigate-track src="app/js/popper.min.js"></script>
    <script data-navigate-track src="app/js/bootstrap.min.js"></script>
    <script data-navigate-track src="app/js/jquery.peity.min.js"></script>
    <script data-navigate-track src="app/js/Chart.bundle.min.js"></script>
    {{-- <script data-navigate-track src="app/js/apexcharts.js"></script> --}}
    <script data-navigate-track src="app/js/switchmode.js"></script>

    {{-- <script data-navigate-track src="app/js/chart.js"></script> --}}
    <script data-navigate-track src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    <!-- Swiper JS -->
    <script data-navigate-track src="app/js/swiper-bundle.min.js"></script>

    <script data-navigate-track src="app/js/swiper.js"></script>

    <script data-navigate-track src="app/js/app.js"></script>
    <!--End of Tawk.to Script-->
    @livewireScripts
    @stack('scripts')
  </body>
</html>