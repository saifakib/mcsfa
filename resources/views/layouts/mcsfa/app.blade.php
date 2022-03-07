
@include('layouts.mcsfa.partials.top')

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" style="font-family:Montserrat;">

    @include('layouts.mcsfa.partials.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.mcsfa.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <a id="back2Top" title="Back to top" href="#">&#10148;</a>
        @include('layouts.mcsfa.partials.footer')
        <div class="control-sidebar-bg"></div>
    </div>
    @include('layouts.mcsfa.partials.script')
</body>
</html>
