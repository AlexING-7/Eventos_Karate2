<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ASOKarate</title>

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nifty.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nifty-demo-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="font-sans">
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <!--NAVBAR-->
        @include('arbitros.layouts.navbar')

        <!--MAIN NAVIGATION-->
        @include('arbitros.layouts.main-navbar')

        <!-- MAIN CONTENT -->
        <div class="boxed">
            <!--CONTENT CONTAINER-->
            <div id="content-container">
                <div id="page-head">
                    <div class="pad-all text-center">
                        <h3>Welcome back to the Dashboard.</h3>
                        <p class="lead">Scroll down to see quick links and overviews of your Server, To do list, Order status or get some Help using Nifty</p>
                    </div>
                </div>

                <!--Page content-->
                <div id="page-content">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- Profile Information Form -->
                                    <div class="mb-4">
                                        <div class="card shadow rounded-lg">
                                            <div class="card-body p-4">
                                                <div class="max-w-xl">
                                                    @include('arbitros.profile.partials.update-profile-information-form')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password Update Form -->
                                    <div class="mb-4">
                                        <div class="card shadow rounded-lg">
                                            <div class="card-body p-4">
                                                <div class="max-w-xl">
                                                    @include('arbitros.profile.partials.update-password-form')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Account Form -->
                                    <div class="mb-4">
                                        <div class="card shadow rounded-lg">
                                            <div class="card-body p-4">
                                                <div class="max-w-xl">
                                                    @include('arbitros.profile.partials.delete-user-form')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End page content-->
            </div>
            <!--END CONTENT CONTAINER-->
        </div>

        <!-- FOOTER -->
        @include('arbitros.layouts.footer')

        <!-- SCROLL PAGE BUTTON -->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
    </div>

    <!-- JavaScript Files -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/nifty.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('plugins/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/demo/ui-modals.js') }}"></script>

    @livewireScripts

</body>
</html>