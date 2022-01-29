<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Address</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- switch css -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
    rel="stylesheet">
  <!-- select css -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- model css -->
  <!-- datepicker css -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
  <!-- model js -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <!-- select2 Js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

  <!-- datepicker Js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
  <!-- switch js -->
  <script src="dist/js/bootstrap-switch-button.min.js"></script>
  <!-- moment js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"
    integrity="sha512-Dz4zO7p6MrF+VcOD6PUbA08hK1rv0hDv/wGuxSUjImaUYxRyK2gLC6eQWVqyDN9IM1X/kUA8zkykJS/gEVOd3w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    #survey-form {
      width: 100%;
      max-width: 800px;
      margin: auto;
      position: relative;
      border-radius: 10px;
      padding: 20px;
    }

    #button {
      position: fixed;
      top: 50%;
    }

    label,
    input,
    span {
      color: white;
    }

    h1,
    h3,
    h5 {
      color: white;
    }

    li {
      color: #000;
    }

    #title {
      width: 100%;
      background-color: lightgrey;
    }

    .card-body {
      background-image: url('./dist/img/background.png');
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="">
      <section class="content">

        <!-- general form elements -->
        <div class="card card-primary mb-0">
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST">
            <div class="card-body">
              <div class="card bg-success text-white text-center" id="title">
                <div class="card-body bg-color-black">Rerported player</div>
              </div>
              <div class="form-group">
                <img src="./dist/img/Capture.png" class="rounded mx-auto d-block" alt="...">
                <h5 style="text-align: center;font-weight: 100;text-transform: uppercase;">cheat report form</h5>
              </div>
              <br>
              <div id="survey-form">
                <div
                  style="position: absolute;top: 0;width: 110%;height: 105%; background-color: #212522;opacity: 0.6; padding: 20px;left: -20px;top: -20px;border-radius: 5px; z-index: 0;">
                  &nbsp;</div>
                <div style="z-index: 1000; position: relative;">
                  <div class="form-group row">
                    <label for="game" class="col-sm-2 col-form-label">Player</label>
                    <div class="col-sm-10" style="color:red;">
                      <select id="playerselect" class="form-control">
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="game" class="col-sm-2 col-form-label">Game</label>
                    <div class="col-md-4">
                      <span> Call Of Duty Warzone </span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="devloper" class="col-sm-2 col-form-label">Devloper</label>
                    <div class="col-md-10">
                      <span> Raven Software </span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-md-10">
                      <span> Activision </span>
                    </div>
                  </div>
                  <br>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-md-10">
                      <input type="text" name="Name" class="form-control" id="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label">Date</label>&nbsp;&nbsp;&nbsp;
                    <div class='col-sm-4 input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" />
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sponsored" class="col-sm-4 col-form-label">Is this player sponsoerd</label>
                    <div class="col-sm-1">
                      <input type="checkbox" id="IsPlayerSponsored" name="IsPlayerSponsored" data-toggle="switchbutton"
                        data-size="xs" checked>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="monetise" class="col-sm-6 col-form-label">Does this player monetise their
                      gameplayer</label>
                    <div class="col-sm-1">
                      <input type="checkbox" id="IsGamePlayMention" name="IsGamePlayMention" data-toggle="switchbutton"
                        checked data-size="xs">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="evidence" class="col-sm-2 col-form-label">Evidence</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Evidence" name="Evidence"
                        placeholder="Paste your link here">
                    </div>
                  </div>
                  <br>
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="Description" name="Description" rows="3" cols="50"></textarea>
                    </div>
                  </div>
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" onchange="iAccept()">
                    <label class="form-check-label" for="flexCheckChecked">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      I belive based on the evedance I have presented above that the player that the player named in
                      this
                      report(import name) is cheating or exploiting while financially benefitting for this game.
                    </label>
                  </div>
                  <br>
                  <center>
                    <button type="button" style="display: block;width: 200px;" class="btn btn-primary" id="reportsubmit"
                      data-toggle="modal" data-target="#myModal" disabled>
                      REPORT
                    </button>

                  </center>

                </div>
              </div>
              <!-- /.card-body -->

          </form>
        </div>
        <!-- /.card -->

    </div>
    </section>
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">ATTENTION</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            You are about to report ZLaner for cheating.<br />
            Dont report the player out of spite, make sure its backed up with good evidence.<br />
            please be as accurate as possible and your evidence is clear and to the point. <br />
            The information within this form will be sent directly to activision.<br />
            This report will bypass any whitelist within the "in game reporting" and go directly to a senior member of
            staff.<br />
            We have spoken to them directly and they assure us, these reports are taken very seriously.
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="submitForm()">CONTINUE</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">ABORT</button>
          </div>

        </div>
      </div>
    </div>

    <!-- ./wrapper -->
    <script type='text/javascript'>
      $(function () {
        setTimeout(function () {

          $.getJSON("./api/feedback_action.php?action=getplayers", function (data) {
            initPlayers(data);
          });
        }, 1000)
      })

      function initPlayers(data) {
        var selData = [];
        data.forEach(ele => {
          selData.push(
            {
              id: ele.Id,
              text: ele.PlayerName,
              img: ele.ImgName
            }
          );
          // $("<option>").val(ele.Id).text(ele.PlayerName).appendTo("#playerselect");
        });

        $("#playerselect").select2({
          data: selData,
          escapeMarkup: function (markup) {
            return markup;
          },
          templateResult: function (state) {
            if (!state.id) {
              return state.text;
            }
            // var $state = $(
            //   '<span><img src="./dist/img/' + state.img + '" class="img-flag" /> ' + state.text + '</span>'
            // );
            return '<span style="color:black;"><img src="./dist/img/' + state.img + '" class="img-flag" style="width:25px;height:25px;" /> ' + state.text + '</span>';
          }
        });
      }



      function submitForm() {
        $.ajax({
          url: './api/feedback_action.php',
          datatype: 'json',
          type: "post",
          data: {
            "action": 'setFeedback',
            "playerid": $("#playerselect").val(),
            "Name": $("#Name").val(),
            "IsPlayerSponsored": $("#IsPlayerSponsored").is(":checked") ? 1 : 0,
            "IsGamePlayMention": $("#IsGamePlayMention").is(":checked") ? 1 : 0,
            "Date": moment($('#datetimepicker1').data("DateTimePicker").date()).format('YYYY-MM-DD'),
            "Evidence": $("#Evidence").val(),
            "Description": $("#Description").val(),
          },
          success: function (response) {
            if (response == "New record created successfully") {
              alert("Your report have been successfully sent.");
            } else {
              alert(response);
              // alert("There was an error. Try again please!");
            }
          },
        });
      }

      function iAccept() {
        var isChecked = $("#flexCheckChecked").is(":checked");
        $("#reportsubmit").prop("disabled", !isChecked);
      }

      function formatState(state) {
        if (!state.id) {
          return state.text;
        }
        var baseUrl = "/user/pages/images/flags";
        var $state = $(
          '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
      };

      // $("#IsPlayerSponsored").select2({
      //   templateResult: formatState
      // });

      $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'DD/MM/YYYY'
        });
      });
    </script>
</body>

</html>