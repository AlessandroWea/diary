<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title;?></title>
	<link rel="stylesheet" type="text/css" href="<?=SERVER_PATH . 'public/css/style.css'?>">
	<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
	<script src="<?=SERVER_PATH . 'public/js/request.js';?>"></script>
</head>
<body>
	<?php echo $content;?>
</body>
<script>
	let SERVER_PATH = 'http://localhost/diary/';
</script>
</html>