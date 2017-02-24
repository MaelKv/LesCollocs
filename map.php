<?php include("header.php");

$m = new MongoClient();
$db = $m->db;
$collection = $db->customers;

$cursor = $collection->find();
foreach ($cursor as $doc) {
    $locations[] = [$doc['lastname'],
    				$doc['latitude'],
    				$doc['longitude']
    			];
}
?>
 
<?php $locations = json_encode($locations); ?>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGZVNMtoQhmn4RsU04TMDCVXVhEpKFKEc"></script> 

  <div id="map" style="width: 100%; height: 600px;" align="center"></div>

  <script type="text/javascript">
      locations = <?php echo $locations?>;


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 2,
      center: new google.maps.LatLng(50, 50),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    console.log(locations);
  </script>

<?php include("footer.php") ?>
