<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('layouts.partials.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('layouts.partials.topbar')
                    <div class="container-fluid">
                        <h1 class="h5 mb-4 font-weight-bold text-gray-800">@yield('page-heading')</h1>
                        @yield('content')
                    </div>
                </div>
                @include('layouts.partials.footer')
            </div>
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>   
        @include('layouts.partials.footer-scripts')

        @yield('modals')
        @include('modals.logout')
    </body>
</html>
