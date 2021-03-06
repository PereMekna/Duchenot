<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Eczar' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Proza+Libre:600' rel='stylesheet' type='text/css'>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="#240805">
    <title>La Taverne de Duchenot</title>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php 
    require_once('admin/dbConn.php');
    $req = $db->prepare('SELECT * FROM content ORDER BY ID_CONTENT ASC');
    $req->execute(array());
    $resultat = $req->fetchAll();
    $req_prog = $db->prepare('SELECT * FROM concerts ORDER BY DATE_CONCERT ASC');
    $req_prog->execute(array());
    $prog = $req_prog->fetchAll();
     
    include("inc/navbar.php");
    include("inc/header.php");
    include("inc/presentation.php");
    include("inc/concerts.php");
    include("inc/footer.php");
    ?>


    
    
    

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
         $('.parallax').parallax();
      });
    </script>
  </body>
</html>