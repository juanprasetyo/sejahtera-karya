<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        @vite('resources/plugins/fontawesome-free/css/all.min.css')
        
        @stack('styles')

        @vite(['resources/css/adminlte.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini">
      <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="{{ Vite::asset('resources/images/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>
      
        <!-- Navbar -->
        <x-admin.navbar />
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        <x-admin.sidebar />
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                @if (isset($header))
                  <div class="col-sm-6">
                    <h1 class="m-0">{{ $header }}</h1>
                  </div><!-- /.col -->
                @endif
                @if (isset($breadcumb))
                  <div class="col-sm-6">
                    {{ $breadcumb }}
                  </div><!-- /.col -->
                @endif
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <!-- Main content -->
          <main class="content">
            {{ $slot }}
          </main>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      
        <!-- Main Footer -->
        <x-admin.footer />
      </div>

        @vite(['resources/plugins/jquery/jquery.min.js', 'resources/plugins/bootstrap/js/bootstrap.bundle.min.js', 'resources/js/adminlte.js'])
        @stack('scripts')
        @livewireScripts
    </body>
</html>
