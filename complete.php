<?php include("header.php") ?>
<div class="ui four column doubling stackable grid container">
  <?php

  // connexion
  $m = new MongoClient();

  // sélection d'une base de données
  $db = $m->db;
  // sélectionne une collection (analogue à une table de base de données relationnelle)
  $collection = $db->customers;

  //firstname,lastname,email,address,city,cp,country,latitude,longitude
  $Query1 = array('address' => "");
  $Query2 = array('city' => "");
  $Query3 = array('cp' => "");
  $Query4 = array('country' => "");
  $Query5 = array('latitude' => "");
  $Query6 = array('longitude' => "");

  $cursor = $collection->find($Query1);
  // {'address':''},{'city':''},{'cp':''},{'country':''},{'latitude':''},{'longitude':''}  //$Query1, $Query2, $Query3, $Query4, $Query5, $Query6
  // $or "city": "", $or "cp": "", $or "country": "", $or "latitude": "", $or "longitude": "");

  $count = $cursor->count();

  ?>
  <table class="ui black table">
  <thead>
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Address</th>
      <th>City</th>
      <th>Zip Code</th>
      <th>Country</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($cursor as $document) { ?>

      <tr>
        <td><?= (!empty($document["firstname"])) ? $document["firstname"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["lastname"])) ? $document["lastname"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["email"])) ? $document["email"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["address"])) ? $document["address"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["city"])) ? $document["city"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["cp"])) ? $document["cp"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["country"])) ? $document["country"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["latitude"])) ? $document["latitude"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td><?= (!empty($document["longitude"])) ? $document["longitude"] : '<i class ="warning sign red icon"></icon>' ?></td>
        <td>
          <a href="form.php?user=<?= $document['_id'] ?>">
            <button class="ui icon button">
              <i class="configure icon"></i>
            </button>
          </a>
        </td>
        <td>
          <a href="delete.php?id=<?= $document['_id'] ?>">
            <button class="ui icon button">
              <i class="remove icon"></i>
            </button>
          </a>
        </td>
      </tr>

     <?php } ?>
   </tbody>
  </table>

  <a href="form.php">
    <button class="ui button">
      Add
    </button>
  </a>

  <div class="ui label">
    <i class="ordered list icon"></i> <?= $count ?>
  </div>

</div>
<?php include("footer.php") ?>
