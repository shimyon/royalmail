<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Address</title>
  <?php include('_headerlink.php') ?>

  <link rel="stylesheet" type="text/css" href="http://api.addressnow.co.uk/css/addressnow-2.20.min.css?key=<?php echo $GLOBALS['ADDRESSNOW_API_KEY']; ?>" />
  <script type="text/javascript" src="http://api.addressnow.co.uk/js/addressnow-2.20.min.js?key=<?php echo $GLOBALS['ADDRESSNOW_API_KEY']; ?>"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include('_nav.php') ?>
    <div class="content-wrapper">
      <section class="content mt-2">

        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Addres</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="address">Enter Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="button" disabled onclick="SaveAddress()" class="btn btn-primary btnsave">Save</button>
            </div>
          </form>
        </div>
        <!-- /.card -->


    </div>
    </section>
  </div>
  </div>
  <!-- ./wrapper -->
  <?php include('_footerlink.php') ?>

  <script type='text/javascript'>
    $(function() {
      $("#address").blur(function() {
        if ($(this).val() == '') {
          $('.btnsave').prop("disabled", true);
        } else {
          $('.btnsave').prop("disabled", false);
        }
      })
    })

    function SaveAddress() {
      $.ajax({
        url: 'api/address_action.php',
        type: "post",
        data: {
          "action": 'insert',
          'address': $("#address").val()
        },
        success: function(response) {
          if (response == 'New record created successfully.') {
            alert("New record created successfully.");
          } else if (response.indexOf('Duplicate entry') > -1) {
            alert("Address already exists.");
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
  </script>
</body>

</html>