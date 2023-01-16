<!DOCTYPE html>
<html lang="en">
@include('web.partials.head')
<body>

<div class="super_container">

    <!-- Header -->

    @include('web.partials.header')

    <!-- Menu -->
    @yield('content')

    <!-- Footer -->
    @include('web.partials.footer')
</div>
@include('web.partials.foot')

</body>
</html>
