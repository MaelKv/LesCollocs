<?php include("header.php") ?>
<div class="ui four column doubling stackable grid container">
  <?php
    $m = new MongoClient();

    // sélection d'une base de données
    $db = $m->db;
    // sélectionne une collection (analogue à une table de base de données relationnelle)
    $collection = $db->customers;

    if(isset($_GET['user'] ) )
    {
      $id = new MongoId($_GET['user']);
      $Query1 = array('_id' => $id);
      $cursor = $collection->findOne($Query1);
    }
  ?>

  <form class="ui form">
    <div class="field">
      <label>Name</label>
      <div class="two fields">
        <div class="field">
          <input type="text" name="_firstname" placeholder="First Name" value="<?= $cursor['firstname'] ?>">
        </div>
        <div class="field">
          <input type="text" name="_lastname" placeholder="Last Name" value="<?= $cursor['lastname'] ?>">
        </div>
      </div>
    </div>
    <div class="field">
        <input type="text" name="_email" placeholder="Email" value="<?= $cursor['email'] ?>">
    </div>
    <div class="field">
      <label>Address</label>
      <div class="fields">
        <div class="twelve wide field">
          <input type="text" name="_address" placeholder="Street Address" value="<?= $cursor['address'] ?>">
        </div>
        <div class="four wide field">
          <input type="text" name="_cp" placeholder="Zip Code" value="<?= $cursor['cp'] ?>">
        </div>
      </div>
      <div class="two fields">
        <div class="field">
          <input type="text" name="_city" placeholder="City" value="<?= $cursor['city'] ?>">
        </div>
        <div class="field">
          <input type="text" name="_country" placeholder="Country" value="<?= $cursor['country'] ?>">
        </div>
      </div>
    </div>
    <div class="field">
      <label>Lat / Long</label>
      <div class="two fields">
        <div class="field">
          <input type="text" name="_latitude" placeholder="Latitude" value="<?= $cursor['latitude'] ?>">
        </div>
        <div class="field">
          <input type="text" name="_longitude" placeholder="Longitude" value="<?= $cursor['longitude'] ?>">
        </div>
      </div>
    </div>
    <div class="ui button" tabindex="0">Valid</div>
  </form>
</div>
<?php include("footer.php") ?>
