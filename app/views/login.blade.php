<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shutrit software development</title>
	<link rel="stylesheet" href="asset/css/style.css" type="text/css">
	
</head>
<body>
	<div class="welcome">

<h1>Login</h1>
{{Form::open(array('url'=>'login'))}}
{{ Form::label('username', 'username')}}
{{ Form::text('username') }}
<br>

{{ Form::label('password', 'password')}}
{{ Form::text('password')}}

<br>
{{ Form::submit('login') }}
{{ Form::close()}}
	</div>

</body>
</html>
