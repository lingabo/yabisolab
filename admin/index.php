<?php
	session_start();
	#require_once 'filters/auth_filter.php';
	require_once 'includes/function.php';
	$title = 'Tableau de bord';
?>

<!DOCTYPE html>
<html>
	<?php include_once("navigation/header.php"); ?>
<body>
	<?php include_once("navigation/nav.php"); ?>
	<?php include_once("view/home.view.php"); ?>
</body>
	<?php include_once("footer.php"); ?>
</html>
