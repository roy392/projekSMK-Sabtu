<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('html_header')
@include('items.html_header')
@show

<body>
    <!-- Page Loader -->
    <div class="preloader" id="preloader" style=" position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 100000;
        backface-visibility: hidden;
        background: #ffffff;">
            <div class="preloader_img" style="width: 200px;
        height: 200px;
        position: absolute;
        left: 48%;
        top: 48%;
        background-position: center;
        z-index: 999999">
        <img src="{{ asset('img/loader.gif')}}" style=" width: 50px;" alt="loading...">
    </div>
</div>
    <!-- #END# Page Loader -->
    <div id="wrapper">

        @include('items.mainheader')

        @include('items.sidebar_admin')

        <!-- Content Wrapper. Contains page content -->
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    @yield('main-content')
                </div>
            </div>
        </div>
    </div> <!-- /.Wrapper -->
    @section('scripts')
    @include('items.scripts')
    @show

</body>

</html>