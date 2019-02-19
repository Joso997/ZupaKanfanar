@include('partials/_head')

<body>

@yield('stylesheet')

@include('partials._nav')

<div id="app">

    @include('partials/_messages')

    @yield('content')

    @include('partials/_footer')

</div><!-- end of .container -->

@include('partials/_scripts')

</body>
</html>