<!-- Página master onde vai ser colocada toda a informação -->
<!DOCTYPE html>
<html lang="pt" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> @yield('title') - My Garden</title>

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="{{asset('/media/favicon.png')}}" type="image/x-icon"> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- DataTables -->
    <link type="text/css" href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Fontawesome core CSS -->
    <link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel=" stylesheet" type="text/css">

    <!-- CSS Link -->
    <link href="{{asset("/css/app.min.css")}}" rel="stylesheet">
    <link href="{{asset("/css/modal.css")}}" rel="stylesheet">
    @yield('style-links')
</head>

<body id="page-top">
    <!-- Modal para terminar a sessão -->
    @include('layout.partials.modal-logout')

    <div id="wrapper">
        <!-- Sidebar -->
        @include('layout.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('layout.partials.topbar')

                <!-- Content -->
                @yield('content')
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Made with <i class="far fa-heart text-danger"></i> by <a href="https://github.com/ivoafonsobispo" target="_blank">Ivo</a> & <a href="https://github.com/joseareia" target="_blank">José</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- Scripts -->
    @include('layout.partials.footer')
</body>
</html>
