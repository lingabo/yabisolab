<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Espace Administrateur</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/image/d1.jpg" height="25" class="img-circle"> 
                    <span class="caret"></span>
                </button>

                <ul class="dropdown-menu">
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span> Profil
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-picture"></span> Editer Profil
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="logout.php">
                            <span class="glyphicon glyphicon-list-alt"></span> Deconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </ul>

    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Tableau de Bord</a></li>
            <li><a href="article.php">Article</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="utilisateur.php">Utilisateur</a></li>
        </ul>
    </div>
</nav>