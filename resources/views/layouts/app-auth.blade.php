<!DOCTYPE html>
<html lang="en" dir="">


<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet"/>
    <link href="/css/themes/lite-purple.min.css" rel="stylesheet"/>
    <link href="/css/plugins/perfect-scrollbar.min.css" rel="stylesheet"/>

    @stack('css')
</head>

<body class="text-left">
<div class="app-admin-wrap layout-sidebar-large">
    <div class="main-header">
        <div class="logo">
            <img src="/images/logo.png" alt="">
        </div>
        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="d-flex align-items-center">
            <!-- Mega menu -->
            <div class="dropdown mega-menu d-none d-md-block">
                <a href="#" class="btn text-muted dropdown-toggle mr-3">Serempre</a>
            </div>
        </div>
        <div style="margin: auto"></div>
        <div class="header-part-right">
            <!-- Full screen toggle -->
            <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
            <!-- Grid menu Dropdown -->

            <!-- Notificaiton -->
            <div class="dropdown">
                <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-primary">0</span>
                    <i class="i-Bell text-muted header-icon"></i>
                </div>
                <!-- Notification dropdown -->
                <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none"
                     aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">

                </div>
            </div>
            <!-- Notificaiton End -->
            <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> Timothy Carlson
                        </div>
                        <a class="dropdown-item">Account settings</a>
                        <a class="dropdown-item">Billing history</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.navigation.verticalMenu')
    <!-- =============== Left side End ================-->
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <!-- ============ Body content start ============= -->
        <div class="main-content">
            <div class="breadcrumb">
                <h1>Product List</h1>
                <ul>
                    <li><a href="">UI Kits</a></li>
                    <li>Product List</li>
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>

        @component('components.alert-component')@endcomponent

        <!-- content goes here-->
            <div class="container-fluid">
                @yield('content')
            </div>
            </section><!-- end of main-content -->
        </div><!-- Footer Start -->


        <div class="app-footer">
            <div class="row">
                <div class="col-md-9">
                    <p><strong>Serempre.com</strong></p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero quis beatae officia saepe
                        perferendis voluptatum minima eveniet voluptates dolorum, temporibus nisi maxime nesciunt totam
                        repudiandae commodi sequi dolor quibusdam
                        <sunt></sunt>
                    </p>
                </div>
            </div>
            <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                <a class="btn btn-primary text-white btn-rounded" href="https://www.serempre.com/" target="_blank">Serempre</a>
                <span class="flex-grow-1"></span>
                <div class="d-flex align-items-center">
                    <img class="logo" src="/images/logo.png" alt="">
                    <div>
                        <p class="m-0">&copy; 2018 Gull HTML</p>
                        <p class="m-0">All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- fotter end -->
    </div>
</div><!-- ============ Search UI Start ============= -->

<!-- ============ Search UI End ============= -->
<script src="/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/js/plugins/bootstrap.bundle.min.js"></script>
<script src="/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/js/scripts/script.min.js"></script>
<script src="/js/scripts/sidebar.large.script.min.js"></script>
<script src="/js/jConfirm.js"></script>
<script>
    jQuery(document).ready(function () {
        $.jConfirm.defaults.question = '{{ __("¿Estás seguro?") }}';
        $.jConfirm.defaults.confirm_text = '{{ __("Sí") }}';
        $.jConfirm.defaults.deny_text = '{{ __("No") }}';
        $.jConfirm.defaults.position = 'top';
        $.jConfirm.defaults.theme = 'black';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script src="/js/functions.js"></script>

</body>

</html>
