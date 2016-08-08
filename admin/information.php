<?php 
$err = '';
require_once('dbConn.php');
if (isset($_POST['update_info'])) {
	$req = $db->prepare('UPDATE content SET CONTENT = :content WHERE ID_CONTENT = "ACCES"');
  	$req->execute(array('content' => $_POST['acces']));
  	$req = $db->prepare('UPDATE content SET CONTENT = :content WHERE ID_CONTENT = "ASSO"');
  	$req->execute(array('content' => $_POST['asso']));
  	$req = $db->prepare('UPDATE content SET CONTENT = :content WHERE ID_CONTENT = "INFOS"');
  	$req->execute(array('content' => $_POST['infos']));
  	$err .= '<span class="label label-success">Informations mises à jour</span>';
}


  $req = $db->prepare('SELECT * FROM content ORDER BY ID_CONTENT ASC');
  $req->execute(array());
  $resultat = $req->fetchAll();
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
         <h1>Informations</h1>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="index.php?a=info" method="post" >
            <div class="form-group">
              <label for="desc" class="control-label col-md-2">Accès :</label>
              <div class="col-md-10">
                <textarea id="desc" class="form-control" rows="5" required title="Accès " name="acces" autofocus><?php echo $resultat[0]["CONTENT"]; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="desc" class="control-label col-md-2">Asso :</label>
              <div class="col-md-10">
                <textarea id="desc" class="form-control" rows="5" required title="Asso " name="asso" autofocus><?php echo $resultat[1]["CONTENT"]; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="desc" class="control-label col-md-2">Menus :</label>
              <div class="col-md-10">
                <textarea id="mce" class="form-control" rows="5" required title="Infos " name="infos" autofocus><?php echo $resultat[2]["CONTENT"]; ?></textarea>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-primary" name="update_info"><span class="glyphicon glyphicon-edit"></span> Modifier</button>
              </div>
            </div>
            <p class="col-md-offset-2"><?php echo $err ?></p>
       </form>
</div>