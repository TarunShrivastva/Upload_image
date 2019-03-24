<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
<div class="container">

	<header class="row">
		@include('includes.header')
	</header>

	<div id="main" class="row">

		<!-- main content -->
		<div id="content" class="col-md-8">
			@yield('content')
		</div>

		<!-- sidebar content -->
		<div id="sidebar" class="col-md-4">
			@include('includes.sidebar')
		</div>

	</div>
	
	<br>
	<footer class="row">
		@include('includes.footer')
	</footer>


</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>
