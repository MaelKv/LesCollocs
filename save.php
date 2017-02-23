<?php

  $m = new MongoClient();

  // sélection d'une base de données
  $db = $m->db;
  // sélectionne une collection (analogue à une table de base de données relationnelle)
  //firstname,lastname,email,address,city,cp,country,latitude,longitude
  $collection = $db->customers;

  if(isset($_POST['id_user']) and !empty($_POST['id_user'])) {
      $id = new MongoId($_POST['id_user']);
      $query_id = array('_id' => $id);
      $data = array('$set' => array(
        'firstname' => $_POST['_firstname'],
        'lastname' => $_POST['_lastname'],
        'email' => $_POST['_email'],
        'address' => $_POST['_address'],
        'city' => $_POST['_city'],
        'cp' => $_POST['_cp'],
        'country' => $_POST['_country'],
        'latitude' => $_POST['_latitude'],
        'longitude' => $_POST['_longitude']
      ));

      $collection->update($query_id,$data);
  }
  else {
    $id = new MongoId();
    $data = array(
      'firstname' => $_POST['_firstname'],
      'lastname' => $_POST['_lastname'],
      'email' => $_POST['_email'],
      'address' => $_POST['_address'],
      'city' => $_POST['_city'],
      'cp' => $_POST['_cp'],
      'country' => $_POST['_country'],
      'latitude' => $_POST['_latitude'],
      'longitude' => $_POST['_longitude'],
      '_id' => $id
    );

    $collection->insert($data);
  }

  $m->close();

  header('Location: full.php');
  exit;
 ?>
