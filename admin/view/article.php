<!DOCTYPE html>
<html>
<head>
	<title>YABISOLAB</title>

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
<link href="assets/css/style1.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/quill.snow.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>		
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-header">
<button type="button" data-target=".navbar-collapse" data-
toggle="collapse" class="navbar-toggle">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="#" class="navbar-brand">Espace Administrateur</a>
</div>


<ul class="nav navbar-right">
<div class="col-md-2">

<div class="dropdown">
<button class="btn btn-dark dropdown-toggle" data-toggle="dropdown"><img src="image/d1.jpg" height="30" class="img-circle"> <span class="caret">
</span>
</button>
<ul class="dropdown-menu">
<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
<li><a href="#"><span class="glyphicon glyphicon-picture"></span> Editer Profil</a></li>
<li class="divider"></li>
<li><a href="login.php"><span class="glyphicon glyphicon-list-alt"></span> Deconnexion</a></li>
</ul>
</div>

</div>
</ul>

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li ><a href="admin1.php">Tableau de Bord</a></li>
<li class="active"><a href="article.php">Article</a></li>
<li><a href="#">Pages</a></li>
<li><a href="utilisateur.php">Utilisateur</a></li>
</ul>

</div>

</nav>

<header id="header">


<div class="container">
<div class="row">
<div class="col-md-5">
<h3><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Gestion des articles <small>Admnistrator YABISOLAB</small></h3>
</div>

	<div class="col-md-5 topbas">
<div class="input-group stylish-input-group">
                    <input type="text" class="form-control"  placeholder="Rechercher">
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
</div>

<div class="col-md-2">
<div class="dropdown">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Creer un Article <span class="caret">
</span>
</button>
<ul class="dropdown-menu">
<li><a href="#"><span class="glyphicon glyphicon-user"></span>Nouveau Article</a></li>
<li><a href="#"><span class="glyphicon glyphicon-picture"></span>Afficher tout</a></li>
<li><a href="#"><span class="glyphicon glyphicon-screenshot"></span>Article par auteur</a></li>
<li class="divider"></li>
<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Autres</a></li>
</ul>
</div>

</div>
</div>
</div>
</header>

<section id="breadcrumb">

<div class="container">

<ol class="breadcrumb ">
<li class="active"> Gestion des Articles</li>

</ol>

</div>
</section>

<section id="main">

<div class="container">
<div class="row">
<div class="col-md-3">
<div class="list-group">
<a href="#" class="list-group-item active main-color-bg" ><span class="glyphicon glyphicon-cog"></span> Parametres <span class="badge">15</span> </a>
<a href="article.php" class="list-group-item " > <span class="glyphicon glyphicon-list-alt"></span>  Article

<span class="badge">15</span></a>
<a href="#" class="list-group-item " > <span class="glyphicon glyphicon-pencil"></span> Commentaire


<span class="badge">900</span></a>
<a href="utilisateur.php" class="list-group-item " > <span class="glyphicon glyphicon-user"></span> Utilisateur

<span class="badge">800</span></a>
<a href="#" class="list-group-item " > <span class="glyphicon glyphicon-cog"></span> Publication
<span class="badge">15</span></a>

</div>
<div class="well">
<h4>Espaces disque dur utilisé</h4>
<div class="progress">

<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%;">60%


</div>
</div>

<h4>Bande Passante</h4>
<div class="progress">

<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:40%;">40%


</div>
</div>


</div>
</div>

<div class="col-md-9">
		<div class="panel panel-default">

		<div class="panel-heading main-color-bg">

		<h3 class="panel-title">Modification des articles</h3>
		</div>
		<div class="panel-body">
<div class="row">
                    <div class="col-md-6">
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Latest Posts</h4>
                            </div>
                            <div class="comment-widgets scrollable">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
      <div class="p-2"><img src="image/d1.jpg" alt="user" width="100" height="60" class="img-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Auteur: Lingabo Junior</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">April 14, 2019</span> 
                                            <button type="button" class="btn btn-primary btn-sm">Modifier</button>
                                            <button type="button" class="btn btn-success btn-sm">Publier</button>
                                            <button type="button" class="btn btn-danger btn-sm">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
		


		</div>
		</div>

</div>
</div>

</div>
</div>

<div class="panel panel-default">

		<div class="panel-heading main-color-bg">

		<h3 class="panel-title">Gestionnaire d'Article</h3>
		</div>
		<div class="panel-body">

<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nouveau Article</h4>
                                <!-- Create the editor container -->
                                <div id="editor" style="height: 300px;">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<!-- editor -->
                

		</div>
	</div>

</div>

   	
</section>
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src='assets/js/quill.min.js'></script>
<script src='assets/js/quill.min.js.map'></script>
<script>
        
        var quill = new Quill('#editor', {
            theme: 'snow'

        });

    </script>
</body>
</html>