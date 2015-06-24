<script src="jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
      google.maps.event.addDomListener(window, 'load', function () {
      var places = new google.maps.places.Autocomplete(document.getElementById('Address'));
      google.maps.event.addListener(places, 'place_changed', function () {
      var place = places.getPlace();
      var address = place.formatted_address;
      var mesg = "Address: " + address;
      $.ajax({
         type: "POST",
         url : "server.php",
          data: {address: address},
          success : function(data){
          arr = data.split(',');
          var latitude = arr[0];
          var longitude = arr[1];
          console.log(arr[0]);
          console.log(arr[1]);
          $('#latitude').val(latitude);
          $('#longitude').val(longitude);
          }
        });
        });
        });
    </script>
<input type="text" id="Address">
