<header id="header">
<div class="container">
<div class="row">
<div class="col-md-10">
<h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Gestions des utilisateurs <small>Admnistrator YABISOLAB</small></h3>
</div>
<div class="col-md-2">
<div class="dropdown">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Creer un utilisateur<span class="caret">
</span>
</button>
<ul class="dropdown-menu">
<li><a href="#"><span class="glyphicon glyphicon-user"></span>Dompteurs</a></li>
<li><a href="#"><span class="glyphicon glyphicon-picture"></span> Zoos</a></li>
<li><a href="#"><span class="glyphicon glyphicon-screenshot"></span> Chasseurs</a></li>
<li class="divider"></li>
<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Autres témoignages</a></li>
</ul>
</div>

</div>
</div>
</div>
</header>

<section id="breadcrumb">

<div class="container">

<ol class="breadcrumb ">
<li class="active">Gestion des utilisateurs</li>

</ol>

</div>
</section>

<section id="main">

<div class="container">
<div class="row">
<div class="col-md-3">
<div class="list-group">
<a href="#" class="list-group-item active main-color-bg" ><span class="glyphicon glyphicon-cog"></span> Parametres <span class="badge">15</span> </a>
<a href="article.php" class="list-group-item" > <span class="glyphicon glyphicon-list-alt"></span>  Article

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

		<h3 class="panel-title">Enregistrement d'un Utilisateur</h3>
		</div>
		<div class="panel-body">
       <?php include_once("includes/errors.php"); ?>
    <?php include_once("includes/flash.php"); ?>

		<form data-parsley-validate method="post" enctype="multipart/form-data" autocomplete="off">
  	
  <div class="row">

                <div class="col-md-6">
      <div class="form-group" autofocus>
      <label> Nom</label>  
      <input type="text" name="nom" class="form-control" value="<?= get_input('nom')?>"> </div>
      </div>


      <div class="col-md-6">
      <div class="form-group">
        <label> Prénom</label>  
      <input  type="text" name="prenom"  class="form-control" value="<?= get_input('prenom')?>" > </div>
    </div>
    </div>

    <div class="row">

    	<div class="col-md-6">
    	<div class="form-group">
    		<label>votre sexe </label>  
    			<select name="sexe" class="form-control" >

    				<option value="Homme">Masculin</option>
    				<option value="Femme">Féminin</option>

    			</select>
    		</div>
    </div>

      <div class="col-md-6">
      <div class="form-group">
      		<label> Numero de Télephone</label>  
      				<input type="tel" name="tel" class="form-control" value="<?= get_input('tel')?>">
      			</div>
      </div>

    </div>

     <div class="row">

                <div class="col-md-6">
      <div class="form-group" autofocus>
      <label> Date de naissance</label>  
      <input type="text" name="datnaiss" class="form-control" placeholder="jj/mm/aaaa" value="<?= get_input('datnaiss')?>"> </div>
      </div>


      <div class="col-md-6">
      <div class="form-group">
        <label> Profession</label>  
      <input  type="text" name="profession"  class="form-control" value="<?= get_input('profession')?>" > </div>
    </div>
    </div>

<div class="row">

    	<div class="col-md-6">
    	<div class="form-group">
    		<label>Adresse Physique </label>  
    			<input type="text"  name="adresse"  class="form-control" id="newpass" value="<?= get_input('adresse')?>">
    		</div>
    </div>
    


      <div class="col-md-6">
      <div class="form-group">
      		<label> Adresse Electronique</label>  
      				<input type="email" name="mail" class="form-control" placeholder="example@site.com">
      			</div>
      </div>

    </div>


    <div class="row">

    	<div class="col-md-6">
    	<div class="form-group">
    		<label>Nouveau mot de passe * </label>  
    			<input type="password"  name="newpass"  class="form-control" id="newpass">
    		</div>
    </div>
    


      <div class="col-md-6">
      <div class="form-group">
      		<label> Confirmer mot de passe *</label>  
      				<input type="password" name="confpsw" class="form-control">
      			</div>
      </div>

    </div>

     <div class="col-md-6">
      <div class="form-group">
      		<label> votre Biographie</label>  
      		<textarea type="text" name="bio" class="form-control" value="<?= get_input('bio')?>">
   
      			</textarea>
      			</div>
      </div>

      <div class="col-md-3">
<div class="form-group">
<label> Ajouter Avatar</label> 
<input type="file" name="avatar" class="form-control">

</div>

      </div>

      <div class="col-md-6-4">
      <div class="btn-group btn-group-justified">
      <button type="submit" name="register" class="btn-primary btn-lg">Valider</button>
  </div>
  </div>
 </form>     	

</div>
</div>

</div>

</section>
