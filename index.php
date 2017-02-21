<?php include("header.php") ?>

<?php
$m = new MongoClient();

// sélection d'une base de données
$db = $m->db;
// sélectionne une collection (analogue à une table de base de données relationnelle)
$collection = $db->customers;

$cursor = $collection->find();

//firstname,lastname,email,address,city,cp,country,latitude,longitude

foreach ($cursor as $document) {
        echo $document["firstname"] . "-" . $document["lastname"] . "<br />";
   }

?>


<?php include("footer.php") ?>
