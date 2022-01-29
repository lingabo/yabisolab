<?php include_once("config/database.php"); ?>
<!DOCTYPE html>
<html>
	<?php include_once("navigation/header.php"); ?>
<body>
<?php include_once("navigation/nav.php"); ?>

<div class="container">
	<div class="row col-sm-14 ">
        <?php include_once("view/aside/aside-left.view.php"); ?>
        <?php include_once("view/principal.view.php"); ?>
    </div>
</div>

    <?php include_once('view/footer.view.php');?>
</body>
</html>