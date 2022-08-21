<!doctype html>
<html >
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield('page-title') - {{ settings('app_name') }}</title>
<meta name="viewport" content="width=device-width,height = device-height, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
	<base href="/frontend/LobbyBlack/html5/" target="_blank" >
	<style type="text/css" media="screen">
		html, body, body.sidebars { width:100%; height:100%; margin:0; padding:0;}
	</style>
	<script src="../js/jquery.js"></script>
	<script src="device.min.js"></script>
	
</head>
	<body >
		@yield('content')
	</body>
</html>
