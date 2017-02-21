<?php

// connexion
$m = new MongoClient();

// sélection d'une base de données
$db = $m->db;
// sélectionne une collection (analogue à une table de base de données relationnelle)
$collection = $db->customers;

// ajoute un enregistrement

$row = 1;

//Si on a bien un fichier On crée un pointeur "handle"
//tant que $champs contient une ligne
//On compte le nombre de champs
//On rajoute un numéro de ligne

if (($handle = fopen("virgule.csv", "r")) !== FALSE) {
    while (($champs = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $nbChamps = count($champs);
        echo "<p> $nbChamps champs à la ligne $row: <br /></p>\n";
        if ($row==1){
        	$entete = $champs;
        }
        else {
          for ($c=0; $c < $nbChamps; $c++) {
              $document[$entete[$c]] = $champs[$c];
          }
          $document['_id'] = new MongoId();
          var_dump($document);
        	echo "hey";
          $collection->insert($document);
          //$collection->batchinsert($document);
          echo "done!:)";
        }

        $row++;
    }
    echo "here";
    fclose($handle);
}
else{
	echo "fichier introuvable";
}

?>
