<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>UNA Web App Center</title>
        {{ Asset::styles() }}
        {{ Asset::scripts() }} 
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#">UNA Web App Center</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            @section('navigation')
                            <!-- <li class="active"><a href="home">Home</a></li> -->
                            <li class="active"><a href="dashboard">Schedule</a><li>
                            <li><a href="registration">Registration</a><li>
                            <li><a href="class">Manage Classes</a><li>
                            @yield_section
                        </ul>
                    </div><!--/.nav-collapse -->
                    @section('post_navigation')
                    @yield_section
                </div>
            </div>
        </div>

        <div class="container">
            @include('plugins.status')
            @yield('content')
            <hr>
            <footer>
                <p>&copy; UNA Web App Center 2012</p>
            </footer>
        </div> <!-- /container -->    

      @section('form_edit')
        @if (Auth::check())
            @include('plugins.edit_job')
        @endif
        @yield_section</body>
</html>