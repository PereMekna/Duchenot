<?php 
require_once('dbConn.php');
 ?>
<div class="container">
	<?php 
	if (isset($_POST['update_prog']) && isset($_GET['b'])) {
		$req_update = $db->prepare('UPDATE concerts SET VIDEO_URL = :video, NOM = :nom, IMG_URL = :img, DESCRIPTION = :description, DATE_CONCERT = :date_concert, HOUR_CONCERT = :hour_concert WHERE ID_PROG = :id');
		$req_update->execute(array(
						'video' => $_POST['video_url'],
                        'nom' => $_POST['nom'],
                        'img' => $_POST['img_url'],
                        'description' => $_POST['desc'],
                        'date_concert' => $_POST['date_concert'],
                        'hour_concert' => $_POST['hour_concert'],
						'id' => $_GET['b']
						));
	}
	if (isset($_POST['new_prog']) && isset($_GET['b'])) {
		$req_update = $db->prepare('INSERT INTO concerts(VIDEO_URL, NOM, IMG_URL, DESCRIPTION, DATE_CONCERT, HOUR_CONCERT) VALUES (:video, :nom, :img, :description, :date_concert, :hour_concert)');
		$req_update->execute(array(
						'video' => $_POST['video_url'],
						'nom' => $_POST['nom'],
						'img' => $_POST['img_url'],
                        'description' => $_POST['desc'],
                        'date_concert' => $_POST['date_concert'],
                        'hour_concert' => $_POST['hour_concert']
						));
	}
	if (!isset($_GET['b'])) {
	$req_prog = $db->prepare('SELECT * FROM concerts ORDER BY ID_PROG ASC');
	$req_prog->execute(array());
	$prog = $req_prog->fetchAll(); ?>
    <div class="row">
        <div class="col-sm-6">
         <h1>Programmation</h1>
        </div>
    </div>
    <div class="well">
    <?php foreach ($prog as $artiste) { ?>
	  <div class="col-sm-6 col-md-4">
	    <a href="index.php?a=prog&b=<?php echo $artiste['ID_PROG'] ?>" class="thumbnail">
	      <p><?php echo $artiste['NOM'] ?><br /><span class="glyphicon glyphicon-edit"></span></p>
	    </a>
	  </div>

    <?php } ?>
    <div class="col-sm-6 col-md-4">
      <a href="index.php?a=prog&b=new" class="thumbnail">
        <p>Ajouter un artiste<br /><span class="glyphicon glyphicon-plus"></span></p>
      </a>
    </div>
    <div style="clear: both;"></div>
    </div>
    <?php }
    else if (isset($_GET['b']) /*&& !isset($_POST['update_prog']) */&& $_GET['b'] != 'new') {
    $req_prog = $db->prepare('SELECT * FROM concerts WHERE ID_PROG = :id');
    $req_prog->execute(array('id' => $_GET['b']));
    $artiste = $req_prog->fetch();
    ?>
    	<div class="row">
    	    <div class="col-sm-6">
    	     <h1><?php echo $artiste['NOM'] ?></h1>
    	    </div>
    	</div>
    	<form role="form" class="form-horizontal" action="index.php?a=prog&b=<?php echo $_GET['b']; ?>" method="post" >
    	        <div class="form-group">
    	          <label for="desc" class="control-label col-md-2">Nom :</label>
    	          <div class="col-md-4">
    	            <input name="nom" id="nom" type="text" class="form-control" placeholder="Nom" value="<?php echo $artiste['NOM'] ?>" />
    	          </div>
    	        </div>
                <div class="form-group">
                  <label for="desc" class="control-label col-md-2">Date :</label>
                  <div class="col-md-4">
                    <input name="date_concert" id="date" type="date" class="form-control" value="<?php echo $artiste['DATE_CONCERT'] ?>"/>
                  </div>
                  <label for="desc" class="control-label col-md-2">Heure :</label>
                  <div class="col-md-4">
                    <input name="hour_concert" id="hour" type="text" class="form-control" value="<?php echo $artiste['HOUR_CONCERT'] ?>"/>
                  </div>
                </div>
    	        <div class="form-group">
    	          <label for="desc" class="control-label col-md-2">Lien vidéo :</label>
    	          <div class="col-md-4">
    	            <input name="video_url" id="video_url" type="text" class="form-control" placeholder="Lien vidéo" value="<?php echo $artiste['VIDEO_URL'] ?>" />
    	          </div>
    	        </div>
    	        <div class="form-group">
    	          <label for="desc" class="control-label col-md-2">Url de l'image :</label>
    	          <div class="col-md-4">
    	            <input name="img_url" id="img_url" type="text" class="form-control" placeholder="http://" value="<?php echo $artiste['IMG_URL'] ?>" />
    	          </div>
    	          <a id="img_show" href="#">Aperçu de l'image</a>
    	        </div>
    	        <div class="form-group">
    	        	<div class="col-sm-offset-2" id="img_area"></div>
    	        </div>
                <div class="form-group">
                  <label for="desc" class="control-label col-md-2">Description :</label>
                  <div class="col-md-4">
                    <textarea id="desc" class="form-control" rows="5" required title="description" name="desc" autofocus><?php echo $artiste["DESCRIPTION"]; ?></textarea>
                  </div>
                </div>
    	        <div class="form-group"> 
    	          <div class="col-sm-offset-2 col-sm-4">
    	            <button type="submit" class="btn btn-primary" name="update_prog"><span class="glyphicon glyphicon-edit"></span> Modifier</button>
    	          </div>
    	        </div>
    	   </form>
    	   <a href="index.php?a=prog">Retour à la programmation</a>
    <?php }
    else if (isset($_GET['b']) /*&& !isset($_POST['update_prog']) */&& $_GET['b'] == 'new') {
    ?>
    	<div class="row">
    	    <div class="col-sm-6">
    	     <h1>Nouvel artiste</h1>
    	    </div>
    	</div>
    	<form role="form" class="form-horizontal" action="index.php?a=prog&b=new" method="post" >
    	        <div class="form-group">
    	          <label for="desc" class="control-label col-md-2">Nom :</label>
    	          <div class="col-md-4">
    	            <input name="nom" id="nom" type="text" class="form-control" placeholder="Nom" />
    	          </div>
    	        </div>
                <div class="form-group">
                  <label for="desc" class="control-label col-md-2">Date :</label>
                  <div class="col-md-4">
                    <input name="date_concert" id="date" type="date" class="form-control" />
                  </div>
                  <label for="desc" class="control-label col-md-2">Heure :</label>
                  <div class="col-md-4">
                    <input name="hour_concert" id="hour" type="text" class="form-control" />
                  </div>
                </div>
    	        <div class="form-group">
    	          <label for="desc" class="control-label col-md-2">Lien vidéo Youtube :</label>
    	          <div class="col-md-4">
    	            <input name="video_url" id="video_url" type="text" class="form-control" placeholder="Lien vidéo" />
    	          </div>
    	        </div>
    	        <div class="form-group">
    	          <label for="desc" class="control-label col-md-2">Url de l'image :</label>
    	          <div class="col-md-4">
    	            <input name="img_url" id="img_url" type="text" class="form-control" placeholder="http://" />
    	          </div>
    	          <a id="img_show" href="#">Aperçu de l'image</a>
    	        </div>
    	        <div class="form-group">
    	        	<div class="col-sm-offset-2" id="img_area"></div>
    	        </div>
                <div class="form-group">
                  <label for="desc" class="control-label col-md-2">Description :</label>
                  <div class="col-md-4">
                    <textarea id="desc" class="form-control" rows="5" required title="Accès " name="desc" autofocus></textarea>
                  </div>
                </div>
    	        <div class="form-group"> 
    	          <div class="col-sm-offset-2 col-sm-4">
    	            <button type="submit" class="btn btn-primary" name="new_prog"><span class="glyphicon glyphicon-edit"></span> Nouveau</button>
    	          </div>
    	        </div>
    	   </form>
    	   <a href="index.php?a=prog">Retour à la programmation</a>
    <?php } ?>

</div>