<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
@yield('stylesheet')
</head>
<body class="p-3">
@yield('content')
@yield('scripts')
</body>
</html>