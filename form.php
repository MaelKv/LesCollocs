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

  <form class="ui form" style="width: 100%" action="save.php" method="post">

    <input type="hidden" name="id_user" value="<?= (isset($cursor['_id'])) ? $cursor['_id'] : '' ?>">

    <div class="field">
      <label>Name</label>
      <div class="two fields">
        <div class="field">
          <input type="text" name="_firstname" placeholder="First Name" value="<?= (isset($cursor['_id'])) ? $cursor['firstname'] : ''?>">
        </div>
        <div class="field">
          <input type="text" name="_lastname" placeholder="Last Name" value="<?= (isset($cursor['_id'])) ? $cursor['lastname'] : ''?>">
        </div>
      </div>
    </div>
    <div class="field">
        <input type="text" name="_email" placeholder="Email" value="<?= (isset($cursor['_id'])) ? $cursor['email'] : ''?>">
    </div>
    <div class="field">
      <label>Address</label>
      <div class="fields">
        <div class="twelve wide field">
          <input type="text" name="_address" placeholder="Street Address" value="<?= (isset($cursor['_id'])) ? $cursor['address'] : ''?>">
        </div>
        <div class="four wide field">
          <input type="text" name="_cp" placeholder="Zip Code" value="<?= (isset($cursor['_id'])) ? $cursor['cp'] : ''?>">
        </div>
      </div>
      <div class="two fields">
        <div class="field">
          <input type="text" name="_city" placeholder="City" value="<?= (isset($cursor['_id'])) ? $cursor['city'] : ''?>">
        </div>
        <div class="field">
          <input type="text" name="_country" placeholder="Country" value="<?= (isset($cursor['_id'])) ? $cursor['country'] : ''?>">
        </div>
      </div>
    </div>
    <div class="field">
      <label>Lat / Long</label>
      <div class="two fields">
        <div class="field">
          <input type="text" name="_latitude" placeholder="Latitude" value="<?= (isset($cursor['_id'])) ? $cursor['latitude'] : ''?>">
        </div>
        <div class="field">
          <input type="text" name="_longitude" placeholder="Longitude" value="<?= (isset($cursor['_id'])) ? $cursor['longitude'] : ''?>">
        </div>
      </div>
    </div>
    <input type="submit" class="ui button" value="Valide">
  </form>
</div>
<?php include("footer.php") ?>
