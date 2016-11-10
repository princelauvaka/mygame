<!doctype html>
<html class="no-js" lang="">
<head>
	
	@include('inc.parts.dash.html_start') 

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="mcont">


	@include('inc.dash.front.nav')

	@include('inc.dash.front.msgs')

	{{-- {{ Auth::check() ? "Logged In" : "Logged Out" }} --}}

	@yield('content')


</div><!-- eof main container eg .mcont -->
@include('inc.parts.dash.html_end')
</body>
</html>