<!doctype html>
<html class="no-js" lang="">
<head>
	
	@include('inc.parts.front.html_start') 

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="mcont">


	@include('inc.parts.front.nav')

	@include('inc.parts.front.msgs')

	{{-- {{ Auth::check() ? "Logged In" : "Logged Out" }} --}}

	@yield('content')


</div><!-- eof main container eg .mcont -->
@include('inc.parts.front.html_end')
</body>
</html>