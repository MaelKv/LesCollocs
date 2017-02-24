<?php include("header.php") ?>
<div class="ui four column doubling stackable grid container">
  <?php

  // connexion
  $m = new MongoClient();

  // sélection d'une base de données
  $db = $m->db;
  // sélectionne une collection (analogue à une table de base de données relationnelle)
  $collection = $db->customers;

  $cursor = $collection->find();
  //({"address": ''});
  // , $or "city": "", $or "cp": "", $or "country": "", $or "latitude": "", $or "longitude": "");

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

    <div id="floating-panel">
      <input id="address" type="textbox" value="Sydney, NSW">
      <input id="submit" type="button" value="Geocode">
    </div>
    <div id="map"></div>
    <script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: -34.397, lng: 150.644}
  });
  var geocoder = new google.maps.Geocoder();

  document.getElementById('submit').addEventListener('click', function() {
    geocodeAddress(geocoder, map);
  });
}

function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      alert(results[0].geometry.location);
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJtUhFNrCxNK_bxoKyVrgnyT_BUK27yMI&callback=initMap"
        async defer></script>

<?php include("footer.php") ?>
