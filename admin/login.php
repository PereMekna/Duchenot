<?php 
    $err = '';
    require_once('dbConn.php');
    if (isset($_POST["login"]) && isset($_POST["password"])) {
      $req = $db->prepare('SELECT * FROM users WHERE LOGIN = :login AND PASSWD = :password');
      $req->execute(array(
          'login' => $_POST["login"],
          'password' => sha1($_POST["password"])));
      $resultat = $req->fetch();
      if (!$resultat)
      {
          $err = '<span class="label label-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Mauvais identifiant ou mot de passe !</span>';
      }
      else
      {
          session_start();
          $_SESSION['login'] = $_POST['login'];
          header('Location: ./index.php');
          exit();
      }
    }
    ?>
    <div class="container">
      <h1>Se connecter</h1>
      <br /><br />
      <form role="form" class="form-horizontal" action="index.php" method="post" >
        <div class="form-group">
          <label for="login" class="control-label col-md-2">Identifiant :</label>
          <div class="col-md-4">
            <input id="login" title="Identifiant" class="form-control" name="login" placeholder="Identifiant" required autofocus>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="control-label col-md-2">Mot de passe :</label>
          <div class="col-md-4">
            <input id="password" type="password" title="Mot de passe" class="form-control" name="password" placeholder="Mot de passe" required autofocus>
          </div>
        </div>
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
          </div>
        </div>
        <a class="col-md-offset-2" href="index.php?a=register">Créer un compte</a>
        <p class="col-md-offset-2"><?php echo $err ?></p>
      </form>