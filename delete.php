<?php
  $m = new MongoClient();

  // sélection d'une base de données
  $db = $m->db;
  // sélectionne une collection (analogue à une table de base de données relationnelle)
  $collection = $db->customers;

  if(isset($_GET['id'] ) )
  {
    $id = new MongoId($_GET['id']);
    $Query1 = array('_id' => $id);
    $cursor = $collection->remove($Query1);
  }

  $m->close();

  header('Location: full.php');
  exit;
?>
