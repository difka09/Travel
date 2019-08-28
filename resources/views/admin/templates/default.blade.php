<!DOCTYPE html>
<html lang="en">
@include('admin.templates.partials._head')
<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
    @include('admin.templates.partials._header')

    @include('admin.templates.partials._sidebar')
    {{-- @yield('content') --}}
    <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                <h1>Blank Page</h1>
                </div>
                <div class="section-body">
                </div>
            </section>
        </div>
    @include('admin.templates.partials._footer')
        </div>
    </div>
    @include('admin.templates.partials._scripts')
</body>
</html>
