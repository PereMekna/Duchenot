<?php try {
      $db = new PDO('mysql:host=localhost;dbname=duchenot', 'root', '');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
?>