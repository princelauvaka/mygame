<!doctype html>
<html lang="en">
<head>

@include('inc.parts.dash.html_start') 

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="wrapper">

	@include('inc.parts.dash.sidebar')

    <div class="main-panel">

	@include('inc.parts.dash.nav')


        <div class="content">
            <div class="container-fluid">
                <div class="row">

				@yield('content')
				
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


@include('inc.parts.dash.html_end')

</body>
</html>
