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
     </style>
 </head>

 <body class="hold-transition sidebar-mini layout-fixed">
     <div class="wrapper">

         <?php include('_nav.php') ?>

         <div class="content-wrapper">

             <section class="content mt-2">
                 <div class="card">
                     <!-- /.card-header -->
                     <div class='card-header'>
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
                             <p style="font-size:15px;margin-bottom:5px;">Grey colour indicates month is not assigned</p>
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
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Edit Your Address Details</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form>
                         <div class="card-body">
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
                     </form>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-primary" onclick="EditAddress();">Save changes</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

         <script type='text/javascript'>
             var oTable, editId;
             var calmonth = 0,
                 calyear = 0;
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
             $('#blacklist').click(function() {
                 if ($('#blacklist').is(':checked')) {
                     $("#month").val('');
                     $('#month').prop("disabled", true);
                 } else {
                     $('#month').prop("disabled", false);
                 }
             });

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
                                 return `
                    <button class ='btndelete actionbtn btn btn-sm' data-id='${data}'><i class='fa fa-trash'></i>&nbsp;Delete</button>
                    <button class ='btnedit actionbtn btn btn-sm' data-id='${data}'><i class='fa fa-edit'></i>&nbsp;Edit</button>
                    `;
                             }
                         },

                         {
                             title: "First Line",
                             data: "house_no",
                             class: "text-center tdhouse_no "
                         },
                         {
                             title: "Second Line",
                             data: "street",
                             class: "text-center tdstreet"
                         },

                         {
                             title: "City",
                             data: "city",
                             class: "text-center tdcity"
                         },
                         {
                             title: "PostCode",
                             data: "postcode",
                             class: "text-center tdpostcode"
                         },
                         {
                             title: "Country",
                             data: "country",
                             "visible": false,
                             class: "text-center  "
                         },
                         {
                             title: "Month",
                             data: "month",
                             "visible": false,
                             class: "text-center  tdmonth"
                         },
                         {
                             title: "Blacklist",
                             data: "is_blocked",
                             "visible": false,

                             class: "text-center  tdblacklist"
                         }
                     ],
                     fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                         if (aData.is_blocked == "Yes") {
                             $('td', nRow).css('background-color', 'rgb(252 125 125)');
                         } else if (aData.month == "") {
                             $('td', nRow).css('background-color', '#dbcfcf');
                         } else {
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
                 if ($('#blacklist').is(':checked')) {
                     $blacklist_customer = 'Yes';
                 } else {
                     $blacklist_customer = 'No';
                 }
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
                         'blacklist': $blacklist_customer

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

             function AfterDrawTable() {
                 var that = this;
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
                             console.log(response);
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
             }

             $('.year').change(function() {

                 $year = $('.year').val();
                 $month_no = '0';
                 RefreshDatatable($month_no, $year);
                 $.ajax({
                     datatype: 'json',
                     url: 'api/month_count_action.php',
                     type: "post",
                     data: {
                         "action": 'months_count',
                         "year": $year


                     },
                     success: function(response) {
                         $data = JSON.parse(response);
                         $count = $data.length;
                         console.log($count);
                         for (var i = 0; i <= $count; i++) {
                             $index = i + 1;
                             $(".months_" + $index).find("p").text($data[i]);
                         }
                         console.log(response);
                     },
                     error: function(jqXHR, textStatus, errorThrown) {
                         debugger

                         console.log(textStatus, errorThrown);
                     }
                 });
             });
             default_year_results();

             function default_year_results() {
                 $year = new Date().getFullYear();
                 $month_no = '0';
                 $('.year').val($year);
                 RefreshDatatable($month_no, $year);
                 $.ajax({
                     datatype: 'json',
                     url: 'api/month_count_action.php',
                     type: "post",
                     data: {
                         "action": 'months_count',
                         "year": $year


                     },
                     success: function(response) {
                         $data = JSON.parse(response);
                         $count = $data.length;

                         for (var i = 0; i <= $count; i++) {
                             $index = i + 1;
                             $(".months_" + $index).find("p").text($data[i]);
                         }
                         //console.log(response);
                     },
                     error: function(jqXHR, textStatus, errorThrown) {
                         debugger

                         console.log(textStatus, errorThrown);
                     }
                 });
             }

             $(".months_list img,.months_list p").click(function() {

                 $month_no = $(this).parent().attr("data-id");
                 $year = $('.year').val();


                 RefreshDatatable($month_no, $year);

             });
         </script>
 </body>

 </html>