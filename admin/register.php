<?php 
  $err ='';
  require_once('dbConn.php');
  if (isset($_POST["password"]) && isset($_POST["password_conf"]) && $_POST["password_conf"] != $_POST["password"]) {
    $err .= '<span class="label label-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Les mots de passe que vous avez saisis ne correspondent pas.</span><br />';
  }
  if (isset($_POST["login"])) {
    $req = $db->prepare('SELECT COUNT(*) FROM users WHERE LOGIN = :login');
    $req->execute(array(
            'login' => $_POST["login"]));
    $verif = $req->fetchColumn();
    if ($verif != 0) {
      $err .= '<span class="label label-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Identifiant déjà utilisé.</span><br />';
    }
  }
  $req = $db->query('SELECT * FROM content WHERE ID_CONTENT = "validation"');
  $data = $req->fetch();
  if (isset($_POST["validation"]) && $_POST["validation"] != $data["CONTENT"]) {
    $err .= '<span class="label label-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Code de validation incorrect.</span><br />';
  }
  if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["password_conf"]) && isset($_POST["mail"]) && ($_POST["password_conf"] == $_POST["password"] && $verif == 0) && isset($_POST["validation"]) && $_POST["validation"] == $data["CONTENT"]) {
    
    $req = $db->prepare('INSERT INTO users(LOGIN, PASSWD, NAME) VALUES(:login, :password, :mail)');
    $req->execute(array(
            'login' => $_POST["login"],
            'password' => sha1($_POST["password"]),
            'mail' => $_POST["mail"]
            ));
    session_start();
    $_SESSION['login'] = $_POST['login'];
    header('Location: ./index.php');
    exit();
  }
  else {
  
   ?>
  <div class="container">
    <h1>S'inscrire</h1>
          <br />
          <br />
            <form role="form" id="myForm" class="form-horizontal" action="index.php?a=register" method="post" onsubmit="changeActionURL()" >
              <div class="form-group"> 
                <label for="login" class="control-label col-md-2">Identifiant :</label>
                <div class="col-md-4">
                  <input id="login" title="Identifiant" class="form-control" name="login" value='<?php if (isset($_POST["login"])) echo $_POST["login"]; ?>' placeholder="Identifiant" required autofocus>
                </div>
              </div>
              <div class="form-group"> 
                <label for="password" class="control-label col-md-2">Mot de passe :</label>
                <div class="col-md-4">
                  <input id="password" type="password" title="Mot de passe" class="form-control" placeholder="Mot de passe" name="password" required>
                </div>
              </div>
              <div class="form-group"> 
                <label for="password_conf" class="control-label col-md-2">Confirmation :</label>
                <div class="col-md-4">
                  <input id="password_conf" type="password" title="Mot de passe" class="form-control" placeholder="Mot de passe" name="password_conf" required>
                </div>
              </div>
              <div class="form-group"> 
                <label for="mail" class="control-label col-md-2">Adresse mail :</label>
                <div class="col-md-4">
                  <input id="mail" type="email" title="Mail" class="form-control" name="mail" value='<?php if (isset($_POST["mail"])) echo $_POST["mail"]; ?>' placeholder="azerty@azerty.fr" required>
                </div>
              </div>
              <div class="form-group"> 
                <label for="validation" class="control-label col-md-2">Code de validation :</label>
                <div class="col-md-4">
                  <input id="validation" type="text" title="Validation" class="form-control" placeholder="Validation" name="validation" required>
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-4">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> S'inscrire</button>
                </div>
              </div>
              <p class="col-md-offset-2"><?php echo $err ?></p>
            </div>
            </form>
  </div>
  <?php } ?>