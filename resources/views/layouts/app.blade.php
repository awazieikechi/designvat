<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        td.negtivenumber {
            font-weight: bold;
            color: red;
        }

    </style>
</head>


<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('role_create') }}">{{ __('User Role') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/customers">{{ __('Customers') }}</a>
                            </li>
                            @if (Auth::user()->role !== 'creditofficer')
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/services/list">{{ __('Service List') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/branches/list">{{ __('Branch List') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/bank">{{ __('Banking') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/expenses">{{ __('Expenses') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/report">{{ __('Report') }}</a>
                                </li>
                            @endif



                        @endauth
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @yield('content')
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.13/sorting/datetime-moment.js"></script>
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>

@include('layouts.route')

</html>
