<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
	<br/><br/>
	<h1>Upload file</h1>
	<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		<label>Ảnh minh họa </label>
		<input type="file" name="image" id="image">
		<br/>
		<label>Ảnh kèm theo: </label> <input type="file" name='image_list[]' multiple="">
		<br/>
		<input type="submit" class="button" value="Upload" name="submit">		
	</form>
</body>
</html>