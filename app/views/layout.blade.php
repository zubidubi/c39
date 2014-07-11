<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen'))}}
	</head>
    <body>
    	<div id="wrap">
    		<div class="container">
    			@yield('content')
    		</div>
    	</div>
    	<script src="//code.jquery.com/jquery.js"></script>
    	{{ HTML::script('assets/js/bootstrap.min.js')}}
    </body>
</html>