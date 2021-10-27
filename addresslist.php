<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address</title>
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php include('_headerlink.php') ?>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
    <style>
        .ui-datepicker-calendar {
            display: none;
        }

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

        .activeTab {
            display: block !important;
        }

        .disableTab {
            display: none !important;
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

        #blacklist:checked+.slider {
            background-color: #ea4f4f;
        }

        .newcheckbox:checked+.slider {
            background-color: #218838;
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

        .months_list img {
            cursor: pointer;
        }

        .months_list p {
            cursor: pointer;
            font-size: 22px;
        }

        .progressLabel {
            margin: 0px;
            margin-left: 10px;
            background: gray;
            color: white;
            padding: 3px 10px 3px 10px;
            border-radius: 15px;
            transition: all 0.5s ease;
        }

        .selectedTabLabel {
            background-color: #2ccf2c;
            transition: all 0.5s ease;
        }

        .timeLabel {
            font-size: 11px;
        }

        #bookingTable,
        .timeTable {
            border-collapse: separate;
            border-spacing: 5px;
        }

        .timeTab,
        .timeTable>tbody>tr>td {

            color: #2ccf2c;
            text-align: center;
            border: 1px solid #b7bebf;
            padding: 5px;
            cursor: pointer;
        }

        .timeTable>tbody>tr>td:hover {
            background: #2ccf2c;
            color: white;
        }

        .tdActive {
            background: #34af71 !important;
            color: white !important;
        }

        .popupLabel {
            background: #3465af !IMPORTANT;
            color: white;
            padding: 2px 10px 2px 9px;
            border-radius: 0px 12px 12px 0px;
        }

        .recommendLabel {
            margin-left: 20px;
            margin-bottom: 10px;
            color: gray;
        }

        @media print {
            .print {
                display: block;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper no-print">

        <?php include('_nav.php') ?>

        <div class="content-wrapper">

            <section class="content mt-2">
                <div class="card">
                    <!-- /.card-header -->
                    <div class='card-header'>
                        <button type="button" class="btn btn-primary btnExport" style="margin-bottom:15px" onclick='exportCsv()'>Export</button>
                        <div class="row d-flex">
                            <!-- <div class="col-sm-1">
                                <label for="year">Year</label>
                                <select class="year" style="width:96%"><option value=""> Select</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option></select>

                            </div> -->
                            <div class="col-sm-12">
                                <div class="row d-flex months_list ">
                                    <div class="col-sm-1 months_1" data-id="01">

                                        <img src="./months/JAN.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>
                                    </div>
                                    <div class="col-sm-1 months_2" data-id="02">

                                        <img src="./months/FEB.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_3" data-id="03">

                                        <img src="./months/MARCH.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_4" data-id="04">

                                        <img src="./months/APRIL.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_5" data-id="05">

                                        <img src="./months/MAY.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_6" data-id="06">

                                        <img src="./months/JUNE.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_7" data-id="07">

                                        <img src="./months/JULY.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_8" data-id="8">

                                        <img src="./months/AUGUST.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_9" data-id="9">

                                        <img src="./months/SEPTEMBER.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_10" data-id="10">

                                        <img src="./months/OCTOBER.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_11" data-id="11">

                                        <img src="./months/NOVEMBER.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                    <div class="col-sm-1 months_12" data-id="12">

                                        <img src="./months/DECEMBER.png" width="100%">
                                        <p style="position: absolute;top: 49%;left: 44%;"></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="addresstable" class="table table-bordered table-hover">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div style="margin-top:15px;">
                            <h6 style="font-size:18px;">*Note</h6>
                            <p style="font-size:15px;margin-bottom: 5px;">Red colour indicates customer is blocked</p>
                            <p style="font-size:15px;margin-bottom:5px;">Light blue colour indicates month is assigned</p>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
        <!-- content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <div class="modal" id='myModal' tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Your Address Details</h5>
                    <div id='tabProgressbar'>
                        <label class='progressLabel' id='label_1'>1</label>
                        <label class='progressLabel' id='label_2'>2</label>
                        <label class='progressLabel' id='label_3'>3</label>
                        <label class='progressLabel' id='label_4'>4</label>
                    </div>
                    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body activeTab" id="first-tab" data-tab='1' style="display:none">
                            <div class="row d-flex ">

                                <div class="form-group col-sm-6">

                                    <label for="houseno">First Line</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="houseno" placeholder="houseno">
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 ">
                                    <label for="street">Second Line</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="street" placeholder="street">

                                    </div>
                                </div>


                                <div class="form-group col-sm-6 ">
                                    <label for="city">City</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="city" placeholder="city">

                                    </div>
                                </div>
                                <div class="form-group col-sm-6">

                                    <label for="postcode">PostCode</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="postcode" placeholder="postcode">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 ">
                                    <label for="country">Country</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="country" placeholder="country" value="United Kingdom" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 ">
                                    <label for="month">Month</label>
                                    <div class="col">
                                        <select class="form-control" id="month">
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
                                </div>
                                <div class="form-group col-sm-12">
                                    <label style="margin-right:15px">Blacklist customer</label>
                                    <label class="switch" style="margin-right:20px">
                                        <input type="checkbox" id="blacklist">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <!-- Third Tab -->
                        <div class="card-body" id="second-tab" data-tab='2' style="display:none">
                            <div class="row">
                                <div class='col-md-2'>
                                    <label class='popupLabel'>Appointment</label>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <label id='lblDate' style='font-size: 50px;color:#2ccf2c;'></label>
                                        </div>
                                        <div class='col-md-7' style='padding:0px;padding-top:15px'>
                                            <label id='lblDay' style='color: #a7a6a6;margin:0px;'></label>
                                            <label id='lblMonth' style='font-size: 20px;margin:0px;'></label>
                                        </div>
                                        <label id='lblTime' style='font-size: 25px;margin-left: 10px;color: #30b6d5;'></label>
                                    </div>
                                </div>
                                <div class="col-md-5" style='border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;padding:0px;'>
                                    <div class="col-md-12" style='margin-bottom: 20px;margin-left: 15px;    padding-top: 30px;'>
                                        <div class="input-group date" data-provide="datepicker" id='dvDatePicker' style='width:50%;float:left;margin-right: 15px;
'>
                                            <div></div>
                                        </div>
                                        <table class='timeTable'>
                                        </table>
                                    </div>
                                    <div class="col-md-12" style='overflow:auto; padding: 0px; padding-top: 5px; border-top: 1px solid #c1c0c0;'>
                                        <label class='popupLabel' style='background:#2ccf2c'>Recommended</label>
                                        <div id='dvRecommend'>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style='padding:0px;'>
                                    <label class='popupLabel' style='background:#2ccf2c'>Bookings</label>
                                    <div style='max-height:270px;overflow:auto;' class='col-md-12'>
                                        <table id='bookingTable' style="width:100%">
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12" style='border-top:1px solid lightgrey'>

                                    <label for="userNote">Note</label>
                                    <div class="col">
                                        <input type="text" class="form-control" id="userNote" placeholder="Note">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="third-tab" data-tab='3' style="display:none">
                            <div class="row d-flex">
                                <div class="form-group col-sm-6 ">
                                    <label for="month">Appliance</label>
                                    <div class="col">
                                        <select class="form-control" id="appliance">
                                            <option value="">None</option>
                                            <option value="1">Stove</option>
                                            <option value="2">Fire</option>
                                            <option value="3">Rayburn</option>
                                            <option value="4">Aga</option>
                                            <option value="5">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 ">
                                    <label for="month">Location</label>
                                    <div class="col">
                                        <select class="form-control" id="location">
                                            <option value="">None</option>
                                            <option value="1">Living room</option>
                                            <option value="2">Dinning room</option>
                                            <option value="3">Bedroom</option>
                                            <option value="4">Boot room</option>
                                            <option value="5">Kitchen</option>
                                            <option value="6">Study</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label style="margin-right:15px">Cowl</label>
                                    <label class="switch" style="margin-right:20px">
                                        <input type="checkbox" id="cowl" class="newcheckbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label style="margin-right:15px">Lined</label>
                                    <label class="switch" style="margin-right:20px">
                                        <input type="checkbox" id="lined" class="newcheckbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="form-group col-sm-6">
                                    <button class='btn btn-primary' type="button" onclick="AddAppliance()" style="margin-right:15px; margin-top:15px;">Add Appliance</button>
                                </div>

                                <div class="col-sm-12">
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th>Appliance</th>
                                                <th>Location</th>
                                                <th>Cowl</th>
                                                <th>Lined</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody id='appliance_list'>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--forth Tab-->

                        <div class="card-body" id="forth-tab" data-tab='4' style="display:none">
                            <div class="row d-flex">
                                <div class="col-sm-5">
                                    <div id="monthinfo" style="margin-bottom: 5px;">
                                        <span>Notification: </span>
                                        <span id="monthinfoname" style="font-size: 14px;" class="badge badge-primary"></span>
                                    </div>
                                    <div id="addressconfirm">

                                    </div>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th>Appliance</th>
                                                <th>Location</th>
                                                <th>Cowl</th>
                                                <th>Lined</th>
                                            </tr>
                                        </thead>
                                        <tbody id='appliance_list_view'>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="col-sm-7" id="map" style="position: relative; overflow:hidden; min-height: 600px; min-width: 500px;">
                                </div>

                                <!-- <div class="col-sm-7" style="position: relative; overflow:auto; ">
                                    <img id="houseimg" src="https://maps.googleapis.com/maps/api/streetview?size=600x300&location=7+Percy+Way,+Walbottle,+Newcastle+upon+Tyne+NE15+8JA,+UK&key=AIzaSyDKxKWPV6KC45B1KkII8ETKsNfdXZ0c8r0" />
                                </div> -->
                            </div>
                        </div>

                        <!--End Third Tab-->
                    </form>
                    <div class="modal-footer no-print">
                        <button type="button" class="btn btn-success" id='btnskip' type="button" onclick="skip();">Skip</button>
                        <button type="button" class="btn btn-success" id='btnprev' type="button" onclick="Prev();">Back</button>
                        <button type="button" class="btn btn-primary" id='btnnext' type="button" onclick="Next();">Next</button>
                        <button type="button" class="btn btn-primary" id='btnsave' type="button" onclick="EditAddress();">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='btnprint' type="button" onclick="printView();">Print</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include('_footerlink.php') ?>

        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKxKWPV6KC45B1KkII8ETKsNfdXZ0c8r0&callback=initMap&v=weekly" async></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script type='text/javascript'>
            var oTable, editId;
            var calmonth = 0;
            var selectedMonth = "";
            var calyear = 0;
            var geocoder;
            var map;
            var taskDateTime;
            var taskDetailArray;
            var timeArray = [
                "09:00 <span class='timeLabel'>AM</span>",
                "10:00 <span class='timeLabel'>AM</span>",
                "11:00 <span class='timeLabel'>AM</span>",
                "12:00 <span class='timeLabel'>AM</span>",
                "01:00 <span class='timeLabel'>PM</span>",
                "02:00 <span class='timeLabel'>PM</span>",
                "03:00 <span class='timeLabel'>PM</span>",
                "04:00 <span class='timeLabel'>PM</span>",
                "05:00 <span class='timeLabel'>PM</span>",
                "06:00 <span class='timeLabel'>PM</span>"
            ];
            var paramMonth = '<?php echo $_GET["month"] ?? "" ?>';
            // $(function() {
            //     $('.date-picker').datepicker({
            //         changeMonth: true,
            //         changeYear: true,
            //         showButtonPanel: true,
            //         dateFormat: 'MM yy',
            //         onClose: function(dateText, inst) {
            //             calmonth = inst.selectedMonth + 1;
            //             calyear = inst.selectedYear;
            //             $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            //             RefreshDatatable();
            //         }
            //     });
            //     RefreshDatatable();
            // })
            $(function() {
                $('#blacklist').click(function() {
                    if ($('#blacklist').is(':checked')) {
                        $("#month").val('');
                        $('#month').prop("disabled", true);
                    } else {
                        $('#month').prop("disabled", false);
                    }
                });


                $(".months_list img,.months_list p").click(function() {

                    $month_no = $(this).parent().attr("data-id");
                    $year = $('.year').val();
                    selectedMonth = $month_no;

                    RefreshDatatable($month_no, $year);

                });
                $('.year').change(function() {
                    $year = $('.year').val();
                    $month_no = '0';
                    RefreshDatatable($month_no, $year);
                    Global.GetCommonValue($year);
                });
                default_year_results();
                $("#myModal .modal-dialog").css("max-width", Math.round($(window).width() / 1.1));
            })

            function printView() {
                $("#myModal").addClass("print");
                window.print();
            }

            function initMap() {
                // var mapOptions = {
                //     center: new google.maps.LatLng(42.345573, -71.098326),
                //     zoom: 2,
                //     mapTypeId: google.maps.MapTypeId.ROADMAP
                // };
                // map = new google.maps.Map(document.getElementById("map"), mapOptions);

                map = new google.maps.StreetViewPanorama(
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
            }

            function codeAddress() {
                if ($("#blacklist").is(":checked")) {
                    $("#monthinfo").hide();
                } else {
                    $("#monthinfo").show();
                    $("#monthinfoname").text($("#month option:selected").text());
                }
                let googleAddress = $('#houseno').val();
                googleAddress += ",+" + $('#street').val();
                googleAddress += ",+" + $('#city').val();
                googleAddress += ",+" + $('#postcode').val();
                googleAddress += ",+" + $('#country').val();
                // let add = googleAddress.replace(/\n/g, ',+');
                googleAddress = googleAddress.replace(/ /g, '+');

                // var windheight = $(window).height() - 200;
                // var windwidht = $(window).width() - 200;
                // $("#houseimg").attr("src", `https://maps.googleapis.com/maps/api/streetview?size=${windheight}x${windwidht}&location=${googleAddress}&key=AIzaSyDKxKWPV6KC45B1KkII8ETKsNfdXZ0c8r0`);


                $.getJSON(`https://maps.googleapis.com/maps/api/geocode/json?address=${googleAddress}&key=AIzaSyDKxKWPV6KC45B1KkII8ETKsNfdXZ0c8r0`, (data) => {
                    let results = data.results;
                    if (results.length > 0) {
                        let loc = results[0].geometry.location;
                        let astorPlace = {
                            lat: loc.lat,
                            lng: loc.lng
                        };
                        var latlng = new google.maps.LatLng(astorPlace.lat, astorPlace.lng);
                        var mapOptions = {
                            zoom: 1,
                            center: latlng
                        };
                        map.setOptions(mapOptions);
                        map.setPosition(astorPlace);


                        google.maps.event.trigger(map, 'resize');
                    }
                }, (err) => {
                    alert(err);
                })
                // geocoder.geocode({
                //     'address': googleAddress
                // }, function(results, status) {
                //     if (status === 'OK') {
                //         if (results.length > 0) {
                //             let loc = results[0].geometry.location;
                //             let astorPlace = {
                //                 lat: loc.lat(),
                //                 lng: loc.lng()
                //             };
                //             var latlng = new google.maps.LatLng(astorPlace.lat, astorPlace.lng);
                //             var mapOptions = {
                //                 zoom: 1,
                //                 center: latlng
                //             };
                //             map.setOptions(mapOptions);
                //             map.setPosition(astorPlace);


                //             google.maps.event.trigger(map, 'resize');
                //         }
                //     } else {
                //         alert('Geocode was not successful for the following reason: ' + status);
                //     }
                // });
            }

            function ShowConfirmTab() {
                codeAddress();
                let googleAddress = $('#houseno').val();
                googleAddress += "<br>" + $('#street').val();
                googleAddress += "<br>" + $('#city').val();
                googleAddress += "<br>" + $('#postcode').val();
                googleAddress += "<br>" + $('#country').val();
                $("#addressconfirm").html(googleAddress);
                $('#appliance_list_view tr').remove();
                $("#appliance_list tr").each(function() {
                    let appdata = {};
                    appdata.appliance_name = $(".tdAppliance", this).text();
                    appdata.location = $(".tdLocation", this).text();
                    appdata.cowl = $(".tdCowl", this).text();
                    appdata.lined = $(".tdLined", this).text();

                    $('#appliance_list_view').append(`
                        <tr>
                            <td class='tdAppliance'>${appdata.appliance_name}</td>
                            <td class='tdLocation'>${appdata.location}</td>
                            <td class='tdCowl'>${appdata.cowl}</td>
                            <td class='tdLined'>${appdata.lined}</td>
                        </tr>
                    `);
                });
            }
            DesignTimeTable();

            function DesignTimeTable() {
                $(".timeTable").append(
                    $("<tbody>").append(
                        $("<tr>").append(
                            $("<td>").html(timeArray[0]),
                            $("<td>").html(timeArray[1])
                        ),
                        $("<tr>").append(
                            $("<td>").html(timeArray[2]),
                            $("<td>").html(timeArray[3])
                        ),
                        $("<tr>").append(
                            $("<td>").html(timeArray[4]),
                            $("<td>").html(timeArray[5])
                        ),
                        $("<tr>").append(
                            $("<td>").html(timeArray[6]),
                            $("<td>").html(timeArray[7])
                        ),
                        $("<tr>").append(
                            $("<td>").html(timeArray[8]),
                            $("<td>").html(timeArray[9])
                        )
                    )
                );

                $(".timeTable tbody>tr>td").click(function() {
                    $(this).hasClass("tdActive") ? $(this).removeClass("tdActive") : $(this).addClass("tdActive");
                    SetTimeLabel();
                });
            }

            function SetTimeLabel() {
                var txt = "";
                $("#lblTime").html("");
                $(".timeTable tbody>tr>td").each(function() {
                    if ($(this).hasClass('tdActive')) {
                        txt += $(this).text() + "<br/>";
                    }
                })
                $("#lblTime").html(txt);
            }

            function FirstTab() {
                $("#appliance_list,#appliance_list_view").empty();
                $(".activeTab").removeClass("activeTab").addClass("disableTab");
                $("#second-tab").addClass("activeTab").removeClass("disableTab");

                $("#dvDatePicker").datepicker({
                    autoclose: true,
                    setDate: new Date(),
                    todayHighlight: true,
                    daysOfWeekDisabled: [0]
                }).on("changeDate   ", function() {
                    SetDateLabel($(this).datepicker("getDate"));
                    SetTasks();
                    // CheckBookingSlot();
                });
                //$(".timeTable tbody>tr>td:eq(0)").click();
                SetDateLabel(new Date());
                $("#userNote").val("");
                Prev();
            }

            function CheckBookingSlot() {
                if (taskDetailArray.length > 0) {

                }
            }

            function SetDateLabel(dateVal) {
                let selectedDate = new Date(dateVal);
                let monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                let dayNames = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Satuarday", "Sunday"];

                $("#lblDate").text(selectedDate.getDate())
                $("#lblDay").text(dayNames[selectedDate.getDay() - 1].toUpperCase());
                $("#lblMonth").text(monthNames[selectedDate.getMonth()].toUpperCase());
                taskDateTime = selectedDate.getFullYear() + "-" + (selectedDate.getMonth() + 1) + "-" + selectedDate.getDate();
            }

            function Next() {
                var obj = $(".activeTab", "#myModal");
                $(".activeTab").removeClass("activeTab").addClass("disableTab");
                $(obj).next(".card-body").addClass("activeTab").removeClass("disableTab");
                var tabIdx = $(".activeTab").data('tab');
                ShowHideTab(tabIdx);
            }

            function Prev() {
                var obj = $(".activeTab", "#myModal");
                $(".activeTab").removeClass("activeTab").addClass("disableTab");
                $(obj).prev(".card-body").addClass("activeTab").removeClass("disableTab");
                var tabIdx = $(".activeTab").data('tab');
                ShowHideTab(tabIdx);
            }

            function ShowHideTab(tabIdx) {
                $("#btnprint").hide();
                $("#btnskip").hide();
                $("#btnnext").hide();
                $("#btnprev").hide();
                $("#btnsave").hide();
                if (tabIdx == '1') {
                    $("#btnnext").show();
                    $("#btnskip").show();
                } else if (tabIdx == "4") {
                    $("#btnprint").show();
                    $("#btnprev").show();
                    $("#btnsave").show();
                } else {
                    $("#btnnext").show();
                    $("#btnprev").show();
                }
                $('.selectedTabLabel').removeClass('selectedTabLabel');
                $("#label_" + tabIdx).addClass('selectedTabLabel');
            }

            function skip() {
                $(".activeTab").removeClass("activeTab").addClass("disableTab");
                $("#third-tab").addClass("activeTab").removeClass("disableTab");
                Next();
            }

            function AddAppliance() {
                if ($("#appliance_list tr").length == 6) {
                    alert("Max 6 appliances will be added");
                    return false;
                }
                let data = {
                    "id": 0,
                    "Appliance": $("#appliance option:selected").text(),
                    "Location": $("#location option:selected").text(),
                    "Cowl": $("#cowl").is(":checked") ? "Yes" : "No",
                    "Lined": $("#lined").is(":checked") ? "Yes" : "No"
                }
                AddApplicationCall(data);
            }

            function AddApplicationCall(data) {
                $("#appliance_list").append(`
                <tr>
                    <td class='tdAppliance'>${data.Appliance}</td>
                    <td class='tdLocation'>${data.Location}</td>
                    <td class='tdCowl'>${data.Cowl}</td>
                    <td class='tdLined'>${data.Lined}</td>
                    <td class='tdLined'>
                        <button type='button' class='btn btn-xs btn-danger btndelete'  onclick="remoteAppliance(this);" data-id='${data.id}' title='delete'>
                            <i class='fa fa-trash'></i>
                        </button>
                    </td>
                </tr>
                `);


            }

            function remoteAppliance(btnOpt) {
                let RemoveId = $(btnOpt).attr('data-id');
                if (!confirm("Are you sure?")) {
                    return;
                }
                if (RemoveId == "0") {
                    $(btnOpt).closest("tr").remove();
                }
                $.ajax({
                    url: 'api/address_action.php',
                    datatype: 'json',
                    type: "post",
                    data: {
                        "action": 'deleteAppliance',
                        'id': RemoveId
                    },
                    success: function(response) {
                        $(btnOpt).closest("tr").remove();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Something went wrong!");
                        console.log(textStatus, errorThrown);
                    }
                });
            }


            function CallDatatable($month, $year) {

                oTable = $('#addresstable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "./api/address_list_action.php",
                        // "type": "POST",
                        "processing": true,
                        "serverSide": true,
                        "datetype": "json",
                        'method': "POST",
                        "iDisplayLength": 100,
                        "bFilter": false,
                        "data": {
                            'month': $month,
                            'year': $year
                        }
                    },
                    // "ajax": "./api/address_list_action.php",

                    "drawCallback": function() {
                        AfterDrawTable();
                    },


                    "columns": [{
                            title: "",
                            data: "Id",
                            render: (data, display, alldata) => {
                                var booked = alldata.taskId != null ? "<em class='fa fa-circle' style='color:#d95858'></em>" : "";
                                return `
                    <button class ='btndelete actionbtn btn btn-sm' data-id='${data}' ><i class='fa fa-trash'></i>&nbsp;Delete</button>
                    <button class ='btnedit actionbtn btn btn-sm' data-id='${data}' ><i class='fa fa-edit'></i>&nbsp;Edit</button>
                    <button class ='btnview actionbtn btn btn-sm' data-id='${data}'><i class="fa fa-file-alt"></i>&nbsp;View</button>
                    ` + booked;
                            }
                        },

                        {
                            title: "First Line",
                            data: "house_no",
                            class: "text-center tdhouse_no "
                        }, {
                            title: "Second Line",
                            data: "street",
                            class: "text-center tdstreet"
                        },

                        {
                            title: "City",
                            data: "city",
                            class: "text-center tdcity"
                        }, {
                            title: "PostCode",
                            data: "postcode",
                            class: "text-center tdpostcode"
                        }, {
                            title: "Country",
                            data: "country",
                            "visible": false,
                            class: "text-center  "
                        }, {
                            title: "Month",
                            data: "month",
                            "visible": false,
                            class: "text-center  tdmonth"
                        }, {
                            title: "Blacklist",
                            data: "is_blocked",
                            "visible": false,

                            class: "text-center  tdblacklist"
                        }
                    ],
                    fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        if (aData.is_blocked == "Yes") {
                            $('td', nRow).css('background-color', 'rgb(252 125 125)');
                        } else if (aData.month && aData.month != "") {
                            $('td', nRow).css('background-color', 'lightblue');
                        } else if (aData.month == "") {
                            $('td', nRow).css('background-color', '');
                        }
                    }
                });
                //hide_data();
            }
            // function hide_data() {
            //     alert("hided");
            //     $('.tdhide').hide();
            // }

            function RefreshDatatable($month, $year) {

                if (!oTable) {

                    CallDatatable($month, $year);
                } else {
                    if ($.fn.DataTable.isDataTable('#addresstable')) {
                        $('#addresstable').DataTable().destroy();
                    }

                    CallDatatable($month, $year);
                }
            }

            function EditAddress() {
                let appliance = [];
                $("#appliance_list tr").each(function() {
                    let appdata = {};
                    appdata.appliance_name = $(".tdAppliance", this).text();
                    appdata.location = $(".tdLocation", this).text();
                    appdata.cowl = $(".tdCowl", this).text();
                    appdata.lined = $(".tdLined", this).text();
                    appliance.push(appdata);
                });
                if ($('#blacklist').is(':checked')) {
                    $blacklist_customer = 'Yes';
                } else {
                    $blacklist_customer = 'No';
                }
                var taskTime = [];
                $(".timeTable tbody>tr>td").each(function() {
                    if ($(this).hasClass('tdActive')) {
                        taskTime.push($(this).text());
                    }
                })

                $.ajax({
                    url: 'api/address_action.php',
                    type: "post",
                    data: {
                        "action": 'edit',
                        'id': editId,
                        'houseno': $('#houseno').val(),
                        'street': $('#street').val(),
                        'city': $('#city').val(),
                        'postcode': $('#postcode').val(),
                        'month': $('#month').val(),
                        'blacklist': $blacklist_customer,
                        'appliance': appliance,
                        'note': $("#userNote").val(),
                        'taskDate': taskDateTime,
                        'taskTime': taskTime.join(',')
                    },
                    success: function(response) {
                        if (response == 'Record udpated successfully') {
                            $('#myModal').modal('hide');
                            $month = 0;
                            $year = 0;
                            RefreshDatatable($month, $year);
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

            function SetTasks() {
                $("#bookingTable tbody").empty();
                $(timeArray).each(function(i, val) {
                    $("#bookingTable tbody").append(
                        $("<tr>").append(
                            $("<td>").html(val).addClass('timeTab').attr("nowrap", "nowrap").css("width", "80px"),
                            $("<td>").html("").css("font-size", "14px"),
                        ).css("cursor", "pointer").attr("onclick", "setExistingBooking(this)")
                    );
                })
                if (taskDetailArray.length <= 0) return;
                if (taskDateTime != undefined && taskDateTime != null) {
                    var slDate = taskDateTime;
                    var idx = 0;
                    $(taskDetailArray).each(function(i, val) {
                        var note = "";
                        $(this).data("note", note);
                        $("#bookingTable tbody tr").each(function() {
                            var time = $("td:eq(0)", this).text();

                            if (val.taskTime != null) {
                                if (val.taskDate == slDate && val.taskTime.indexOf(time) != -1) {
                                    var tDate = new Date(val.taskDate);
                                    var sDate = new Date();
                                    var bkColor = tDate > sDate ? '#feffd7' : '#ffdcdc';
                                    if (idx == 0) {
                                        $("td:eq(1)", this).html(val.address + "<em style='float:right;color: red;' class='fa fa-trash' onclick='RemoveBooking(" + val.id + ",event)'></em>" + "<br/>" + "<b>Note:</b> " + val.note).css({
                                            "background": bkColor,
                                            "padding": "padding: 2px 10px 2px 10px;"
                                        }).data("time", val.taskTime);
                                    } else {
                                        $("td:eq(1)", this).css({
                                            "background": bkColor,
                                            "padding": "padding: 2px 10px 2px 10px;"
                                        });
                                    }
                                    note = val.note != "" && val.note != null ? btoa(val.note) : "";
                                    $(this).data("note", note);
                                    idx++;
                                }
                            }
                        })
                    });
                }
            }

            function RemoveBooking(rowId, event) {
                event.stopPropagation();
                var alertMsg = confirm("Are you sure you want to remove booking?");

                if (alertMsg == true) {
                    $.ajax({
                        url: 'api/address_action.php',
                        datatype: 'json',
                        type: "post",
                        data: {
                            "action": 'deleteBooking',
                            'id': rowId
                        },
                        success: function(response) {
                            console.log(response);
                            getAllTask();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            debugger
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            }

            function setExistingBooking(obj) {
                var note = $(obj).data("note") != "" ? atob($(obj).data("note")) : "";
                var time = $("td:eq(1)", obj).data("time");
                $(".tdActive").removeClass("tdActive");
                if (time != undefined && time != null) {
                    $(".timeTable tbody>tr>td").each(function() {
                        if (time.indexOf($(this).text()) != -1) {
                            $(this).addClass("tdActive");
                        }
                    })
                }
                SetTimeLabel();
                $("#userNote").val(note);
            }

            function AfterDrawTable() {
                var that = this;
                $('.btnview').click(function() {
                    editId = $(this).attr('data-id');
                    $.ajax({
                        url: 'api/month_count_action.php',
                        datatype: 'json',
                        type: "post",
                        data: {
                            "action": 'get_month',
                            'id': editId
                        },
                        success: function(response) {
                            $data = JSON.parse(response);
                            $('#blacklist').prop("checked", false);
                            $('#month').prop("disabled", false);
                            $('#month').val($data['month']);
                            if ($data['is_blocked'] == 'Yes') {
                                $('#blacklist').prop("checked", true);
                                $('#month').prop("disabled", true);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            debugger
                            console.log(textStatus, errorThrown);
                        }
                    });
                    $.ajax({
                        url: 'api/address_action.php',
                        datatype: 'json',
                        type: "post",
                        data: {
                            "action": 'getAppliance',
                            'addressid': editId
                        },
                        success: function(response) {
                            let res = JSON.parse(response);
                            res.forEach(f => {
                                let data = {
                                    "id": f.Id,
                                    "Appliance": f.appliance_name,
                                    "Location": f.location,
                                    "Cowl": f.cowl,
                                    "Lined": $("#lined").is(":checked") ? "Yes" : "No"
                                }
                                AddApplicationCall(data);
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });

                    let houseno = $(this).closest('tr').find('.tdhouse_no').text();
                    $('#myModal').modal('show');
                    $('#houseno').val(houseno);
                    let street = $(this).closest('tr').find('.tdstreet').text();

                    $('#street').val(street);
                    let town = $(this).closest('tr').find('.tdtown').text();

                    $('#town').val(town);
                    let city = $(this).closest('tr').find('.tdcity').text();

                    $('#city').val(city);
                    let postcode = $(this).closest('tr').find('.tdpostcode').text();

                    $('#postcode').val(postcode);
                    let month = $(this).closest('tr').find('.tdmonth').text();

                    $('#month').val(month);
                    let blacklist = $(this).closest('tr').find('.tdblacklist').text();

                    let note = $(this).closest('tr').find(".tdnote").text();
                    $('#userNote').val(note);

                    FirstTab();
                    skip();
                    $("#btnprev, #btnsave").hide();
                    $("#modal-title").text("Customer Card");
                })

                $('.btnedit').click(function() {
                    editId = $(this).attr('data-id');
                    $.ajax({
                        url: 'api/month_count_action.php',
                        datatype: 'json',
                        type: "post",
                        data: {
                            "action": 'get_month',
                            'id': editId
                        },
                        success: function(response) {
                            $data = JSON.parse(response);
                            $('#blacklist').prop("checked", false);
                            $('#month').prop("disabled", false);
                            $('#month').val($data['month']);
                            if ($data['is_blocked'] == 'Yes') {
                                $('#blacklist').prop("checked", true);
                                $('#month').prop("disabled", true);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            debugger
                            console.log(textStatus, errorThrown);
                        }
                    });
                    $.ajax({
                        url: 'api/address_action.php',
                        datatype: 'json',
                        type: "post",
                        data: {
                            "action": 'getAppliance',
                            'addressid': editId
                        },
                        success: function(response) {
                            let res = JSON.parse(response);
                            res.forEach(f => {
                                let data = {
                                    "id": f.Id,
                                    "Appliance": f.appliance_name,
                                    "Location": f.location,
                                    "Cowl": f.cowl,
                                    "Lined": $("#lined").is(":checked") ? "Yes" : "No"
                                }
                                AddApplicationCall(data);
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            debugger
                            console.log(textStatus, errorThrown);
                        }
                    });
                    getAllTask();
                    //adding recommended task date in edit popup
                    $("#dvRecommend").empty();
                    $.ajax({
                        url: 'api/address_action.php',
                        datatype: 'json',
                        type: "post",
                        data: {
                            "action": 'getRecommended',
                            'street': $(this).closest('tr').find('.tdstreet').text()
                        },
                        success: function(response) {
                            let recommend = JSON.parse(response);
                            $(recommend).each(function(i, val) {
                                $("#dvRecommend").append(
                                    $("<label>").text(val.taskDate).addClass('recommendLabel')
                                )
                            })
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                    FirstTab();
                    let houseno = $(this).closest('tr').find('.tdhouse_no').text();
                    $('#myModal').modal('show');
                    $('#houseno').val(houseno);
                    let street = $(this).closest('tr').find('.tdstreet').text();

                    $('#street').val(street);
                    let town = $(this).closest('tr').find('.tdtown').text();

                    $('#town').val(town);
                    let city = $(this).closest('tr').find('.tdcity').text();

                    $('#city').val(city);
                    let postcode = $(this).closest('tr').find('.tdpostcode').text();

                    $('#postcode').val(postcode);
                    let month = $(this).closest('tr').find('.tdmonth').text();

                    $('#month').val(month);
                    let blacklist = $(this).closest('tr').find('.tdblacklist').text();

                    //$('#userNote').val(note);
                    $("#modal-title").text("Edit Your Address Details");
                })

                $(".btndelete").click(function() {
                    if (!confirm('Are you sure?')) return false;
                    let id = $(this).attr('data-id');
                    $.ajax({
                        url: 'api/address_action.php',
                        type: "post",
                        data: {
                            "action": 'delete',
                            'id': id
                        },
                        success: function(response) {
                            if (response == 'Record delete successfully') {
                                $month = 0;
                                $year = 0;
                                RefreshDatatable($month, $year);
                            } else {
                                alert(response);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            debugger
                            console.log(textStatus, errorThrown);
                        }
                    });
                });
                google.maps.event.trigger(map, 'resize');
            }


            function getAllTask() {
                //adding existing booked task  in edit popup
                $.ajax({
                    url: 'api/address_action.php',
                    datatype: 'json',
                    type: "post",
                    data: {
                        "action": 'getTask',
                        'addressid': editId
                    },
                    success: function(response) {
                        let res = JSON.parse(response);
                        taskDetailArray = res;
                        SetTasks();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

            function default_year_results() {
                $year = new Date().getFullYear();
                if (paramMonth == '') {
                    $month_no = '0';
                } else {
                    $month_no = selectedMonth = paramMonth;
                }
                $('.year').val($year);
                RefreshDatatable($month_no, $year);
                Global.GetCommonValue($year);
            }

            function exportCsv() {
                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                const monthName = monthNames[parseInt(selectedMonth)];
                $.ajax({
                    url: "./api/address_list_action.php",
                    type: "get",
                    data: {
                        "month": selectedMonth,
                        'export': "Y"
                    },
                    success: function(response) {

                        var json = JSON.parse(response);
                        if (json.length == 0) {
                            alert("No Data Found");
                            return;
                        }
                        var csv = JSON2CSV(json);
                        var downloadLink = document.createElement("a");
                        var blob = new Blob(["\ufeff", csv]);
                        var url = URL.createObjectURL(blob);
                        var csvName = monthName == undefined || monthName == "" ? "Data" : monthName;
                        downloadLink.href = url;
                        downloadLink.download = csvName + ".csv";

                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(textStatus, errorThrown);
                    }
                });
            }


            function JSON2CSV(objArray) {
                var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
                var str = '';
                var line = '';

                for (var index in array[0]) {
                    line += index + ',';
                }
                str += line + '\r\n';
                line = "";
                for (var i = 0; i < array.length; i++) {
                    var line = '';

                    for (var index in array[i]) {
                        line += array[i][index] + ',';
                    }

                    line = line.slice(0, -1);
                    str += line + '\r\n';
                }
                return str;
            }
        </script>
</body>

</html>