<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shutrit software development</title>
	<link rel="stylesheet" href="/asset/css/style.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body >
	<div class="welcome">
<section>
<h2>Add an important composer to our collection</h2>
<br>

{{Form::open(array('url'=>'/api/composers/add'))}}
<div class="form-group">
{{ Form::label('composer', 'composer name')}}
{{ Form::text('name', null, array('class'=>'form-control')) }}
</div>
<br>
<div class="form-group">
{{ Form::label('Century', 'Century')}}
{{ Form::select('century', array('15th' => '15th' , '16th' => '16th', '17th' => '17th', '18th'=>'18th', '19th'=>'19th', '20th'=>'20th', '21th'=>'21th'),null,array('class'=>'form-control'))}}
</div>

<div class="form-group">
{{ Form::label('Country', 'Country')}}
{{ Form::text('country', null, array('class'=>'form-control'))}}
</div>

<br>
<div class="form-group">

{{ Form::submit('Add composer', array('class'=>'btn btn-default')) }}
{{ Form::close()}}
</div></section>

	</div>

</body>
</html>
