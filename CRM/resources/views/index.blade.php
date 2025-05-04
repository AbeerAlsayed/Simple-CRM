<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.header')
        <!-- /.content-header -->

        <!-- Main content -->
       @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('partials.footer')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('partials.scripts')
</body>
</html>
