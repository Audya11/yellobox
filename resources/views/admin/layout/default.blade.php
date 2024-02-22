    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>YelloBox | {{ $title }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

        {{-- icon --}}
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- Styles -->


        <link id="pagestyle" href="/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />


        <link rel="stylesheet" href="/css/material-dashboard.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="/css/color.css">
    </head>

    <body class="antialiased">

        <div class="g-sidenav-show" style="background-color: #BBE2EC">
            @include('admin.layout.sidebar')

            @yield('content')

        </div>


        <script src="/js/material-dashboard.js"></script>
        <script src="/js/material-dashboard.min.js"></script>
        <script src="/js/core/bootstrap.min.js"></script>
        <script src="/js/core/popper.min.js"></script>
        <script src="/js/plugins/bootstrap-notify.js"></script>
        <script src="/js/plugins/Chart.extension.js"></script>
        <script src="/js/plugiins/chartjs.min.js"></script>
        <script src="/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="/js/plugins/world.js"></script>

        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
    </body>

    </html>
