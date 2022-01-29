<head>
	<title>
	  <?=
		   isset($title) 
		      ? $title .' - '. WEB_NAME.' | Tech News'
		      : WEB_NAME.' | Tech News';
	  ?>
  	</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Information sur le tech ">
	<meta name="author" content="philodi.com">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<?php if($title == 'Connexion'): ?> 
	<link rel="stylesheet" href="assets/css/style1.css"> 
		<?php else:?> 
	<link rel="stylesheet" href="assets/css/style.css"> 
	<?php endif ?> 
</head>	 
  