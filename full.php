<?php include("header.php") ?>
<?php

// connexion
$m = new MongoClient();

// sélection d'une base de données
$db = $m->db;
// sélectionne une collection (analogue à une table de base de données relationnelle)
$collection = $db->customers;

//firstname,lastname,email,address,city,cp,country,latitude,longitude

$cursor = $collection->find();
//({"address": ''});
// , $or "city": "", $or "cp": "", $or "country": "", $or "latitude": "", $or "longitude": "");

foreach ($cursor as $document) {
        echo $document["firstname"] . "-" . $document["lastname"] . "<br />";
   }

?>
<?php include("footer.php") ?>
