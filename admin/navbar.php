<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" id="not-affix" href="index.php"><span>Taverne de Duchenot ADMINISTRATION</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php">Chillboard</a>
                </li>
                <li>
                    <a target="_blank" class="page-scroll" href="../index.php">Accèder au site <span class="glyphicon glyphicon-new-window"></span></a>
                </li>
            </ul>
            <?php if (isset($_SESSION['login'])) {
                    echo '<p class="navbar-text navbar-right">Signed in as '.$_SESSION['login'].' <a href="index.php?a=logout" class="navbar-link"> <span class="glyphicon glyphicon-log-out"></span></a></p>';
                  }
                  else echo '<p class="navbar-text navbar-right">Connexion obligatoire</p>' ?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>