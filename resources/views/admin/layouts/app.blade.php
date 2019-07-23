<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link href="{{ mix('/css/admin/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet">

    {{-- You can put page wise internal css style in styles section --}}
    @stack('styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    {{-- Header --}}
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{--  Logo  --}}
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
            <span class="navbar-brand-full">{{ config('app.name') }}</span>
            <span class="navbar-brand-minimized">{{ config('app.name') }}</span>
        </a>

        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{--  Header Navbar  --}}
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('images/admin-avatar.png') }}" class="img-avatar" alt="Admin avatar">
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Settings</strong>
                    </div>

                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="fa fa-user"></i>
                        Profile
                    </a>

                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                        <i class="fa fa-lock"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        {{--  Sidebar  --}}
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">MENU</li>

                    <li class="nav-item{{ $page == 'dashboard' ? '  active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-tachometer"></i>
                            Dashboard
                            <span class="badge badge-primary">NEW</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'impressora' ? ' active' : '' }}">
                        <a href="{{ route('admin.impressoras.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Impressoras</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'suprimento' ? ' active' : '' }}">
                        <a href="{{ route('admin.suprimentos.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Suprimentos</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'proprietario' ? ' active' : '' }}">
                        <a href="{{ route('admin.proprietarios.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Proprietarios</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'usuario' ? ' active' : '' }}">
                        <a href="{{ route('admin.usuarios.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'perfil' ? ' active' : '' }}">
                        <a href="{{ route('admin.perfils.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Perfils</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'setor' ? ' active' : '' }}">
                        <a href="{{ route('admin.setors.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Setors</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'requisicao' ? ' active' : '' }}">
                        <a href="{{ route('admin.requisicaos.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Requisicaos</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'status' ? ' active' : '' }}">
                        <a href="{{ route('admin.statuses.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Statuses</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'contagem' ? ' active' : '' }}">
                        <a href="{{ route('admin.contagems.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Contagems</span>
                        </a>
                    </li>

                    <li class="nav-item{{ $page == 'servico' ? ' active' : '' }}">
                        <a href="{{ route('admin.servicos.index') }}" class="nav-link">
                            <i class="fa fa-arrow-right"></i>
                            <span>Servicos</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>


        <main class="main mt-4">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="card">

                        @if ($errors->all())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{--  Page Content  --}}
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{--  Footer  --}}
    <footer class="app-footer justify-content-between">
        <strong>
            Created with
            <i class="fa fa-heart"></i>
            by
            <a href="https://laravelfactory.com" target="_blank">
                Laravel Factory
            </a>.
        </strong>

        <div class="d-none d-sm-block">
            Anything you want
        </div>
    </footer>

    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>

    @if (session('message'))
        <script>
            showNotice("{{ session('type') }}", "{{ session('message') }}");
        </script>
    @endif

    {{-- You can put page wise javascript in scripts section --}}
    @stack('scripts')
</body>
</html>