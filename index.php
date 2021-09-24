<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Address</title>
  <?php include('_headerlink.php') ?>

  <link rel="stylesheet" type="text/css" href="https://api.addressnow.co.uk/css/addressnow-2.20.min.css?key=<?php echo $GLOBALS['ADDRESSNOW_API_KEY']; ?>" />
  <script type="text/javascript" src="https://api.addressnow.co.uk/js/addressnow-2.20.min.js?key=<?php echo $GLOBALS['ADDRESSNOW_API_KEY']; ?>"></script>

  <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 25px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 9px;
      bottom: 0;
      background-color: #3a30306b;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 0px;
      bottom: 0px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: green;
    }

    #blacklist:checked+.slider {
      background-color: #ea4f4f;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include('_nav.php') ?>
    <div class="content-wrapper">
      <section class="content mt-2">

        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header"><BR><img src="./kielderimages/kielderlogo1.png" alt="Kielder logo" width="300" height="141"><BR>
            <h3 class="card-title"><BR></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="address">Enter Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col col-6">
                    <div class="col col-12">
                      <textarea class='form-control' rows="5" readonly id='lineaddress'></textarea>
                    </div>
                    <div class="col col-12" style="margin-top:10px;">
                      <span style="margin-right:15px">Add customer to database</span>
                      <label class="switch" style="margin-right:20px">
                        <input type="checkbox" id="add_customer_to_database">
                        <span class="slider round"></span>
                      </label>
                    </div>
                    <div class="col col-12">
                      <span style="margin-right:15px">Blacklist customer</span>
                      <label class="switch" style="margin-right:20px">
                        <input type="checkbox" id="blacklist">
                        <span class="slider round"></span>
                      </label>
                    </div>
                    <div class="col col-12">
                      <span style="margin-right:15px">Assign customer month</span>
                      <select style="margin-right:15px" class="form-select" id="month">
                        <option value="">None</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </div>
                    <button type="button" style="margin-top:10px;" disabled onclick="SaveAddress()" class="btn btn-primary btnsave">Save Entry</button>

                  </div>
                  <div class="col col-6" id="map" style="position: relative; overflow:hidden;">

                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

          </form>
        </div>
        <!-- /.card -->


    </div>
    </section>
  </div>
  </div>
  <!-- ./wrapper -->
  <?php include('_footerlink.php') ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKxKWPV6KC45B1KkII8ETKsNfdXZ0c8r0&callback=initMap&v=weekly" async></script>
  <script type='text/javascript'>
    var geocoder;
    var map;
    var googleAddress = "northumerland";

    function initMap() {
      // var map = new google.maps.Map(document.getElementById('map'), {
      //   zoom: 8,
      //   center: {
      //     lat: -34.397,
      //     lng: 150.644
      //   }
      // });
      var map = new google.maps.StreetViewPanorama(
        document.getElementById("map"), {
          position: {
            lat: 42.345573,
            lng: -71.098326
          },
          addressControlOptions: {
            position: google.maps.ControlPosition.BOTTOM_CENTER,
          },
          linksControl: false,
          panControl: false,
          enableCloseButton: false,
        }
      );
      geocoder = new google.maps.Geocoder();
      codeAddress(geocoder, map);

    }

    addressNow.listen('load', function(control) {
      control.listen("populate", function(address) {
        document.getElementById("lineaddress").value = address.Label;
        googleAddress = address.Label;
        initMap();
      });
    });

    $(function() {

      $('#add_customer_to_database').click(function() {
        if ($('#add_customer_to_database').is(':checked')) {
          $('#blacklist').prop("checked", false);
          $('#month').prop("disabled", false);
          if ($('#lineaddress').val() != '') {
            $('.btnsave').prop("disabled", false);
          }
        } else {
          $('.btnsave').prop("disabled", true);

        }
      });

      $('#blacklist').click(function() {
        if ($('#blacklist').is(':checked')) {
          $('#add_customer_to_database').prop("checked", false);
          if ($('#lineaddress').val() != '') {
            $('.btnsave').prop("disabled", false);
          }
          $("#month").val('');
          $('#month').prop("disabled", true);
        } else {
          $('.btnsave').prop("disabled", true);
          $('#month').prop("disabled", false);
        }
      });

      // initMap();
    });

    //  $(function() {
    // $("#address").focus(function() {
    //   $('.btnsave').prop("disabled", true);
    // });


    // $("#address").blur(function() {
    //   if ($('#lineaddress').val() == '') {
    //     $('.btnsave').prop("disabled", true);
    //   } else {
    //     $('.btnsave').prop("disabled", false);
    //   }
    // });
    //})

    function SaveAddress() {
      $address = $("#lineaddress").val().split("\n");
      if ($('#blacklist').is(':checked')) {
        $blacklist_customer = 'Yes';
      } else {
        $blacklist_customer = 'No';
      }
      var month = $('#month').val();
      $.ajax({
        url: 'api/address_action.php',
        type: "post",
        data: {
          "action": 'insert',
          'address': $address,
          'blacklist_customer': $blacklist_customer,
          'month': month
        },
        success: function(response) {
          console.log(response);
          if (response == 'New record created successfully') {
            alert("New record created successfully.");
            $("#address, #lineaddress").val('');
            $('.btnsave').prop("disabled", true);
            $('#add_customer_to_database').prop("checked", false);
            $('#blacklist').prop("checked", false);
            $("#month").val('');
            $("#address").focus();
          } else if (response.indexOf('Duplicate entry') > -1) {
            alert("This customer already exists in your database");
          } else {
            alert(response);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          debugger
          console.log(textStatus, errorThrown);
        }
      });
    }

    function codeAddress(geocoder, map) {
      let add = googleAddress.replace(/\n/g,'+');
      geocoder.geocode({
        'address': add
      }, function(results, status) {
        if (status === 'OK') {
          if (results.length > 0) {
            let loc = results[0].geometry.location;
            astorPlace = {
              lat: loc.lat(),
              lng: loc.lng()
            };
            map.setPosition(astorPlace);
            // var latlng = new google.maps.LatLng(astorPlace.lat, astorPlace.lng);
            // var mapOptions = {
            //   zoom: 8,
            //   center: latlng
            // };
            // map.setOptions(mapOptions);
            map.setZoom(8);

            // map.setCenter(results[0].geometry.location);
            // var marker = new google.maps.Marker({
            //   map: map,
            //   position: results[0].geometry.location
            // });
          }
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }
  </script>
</body>

</html>