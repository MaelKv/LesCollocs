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
        <td><?= $document["firstname"] ?></td>
        <td><?= $document["lastname"] ?></td>
        <td><?= $document["email"] ?></td>
        <td><?= $document["address"] ?></td>
        <td><?= $document["city"] ?></td>
        <td><?= $document["cp"] ?></td>
        <td><?= $document["country"] ?></td>
        <td><?= $document["latitude"] ?></td>
        <td><?= $document["longitude"] ?></td>
        <td>
          <button class="ui icon button">
            <a href="form.php?user=<?= $document['_id'] ?>">
              <i class="configure icon"></i>
            </a>
          </button>
        </td>
        <td>
          <button class="ui icon button">
            <i class="remove icon"></i>
          </button>
        </td>
      </tr>

     <?php } ?>
   </tbody>
  </table>
</div>
<?php include("footer.php") ?>
