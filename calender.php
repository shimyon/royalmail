<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calender</title>
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php include('_headerlink.php') ?>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.1apis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .datepicker,
        .table-condensed {
            width: 500px;
            height: 500px;
        }

        #bookingTable {
            border-collapse: separate;
            border-spacing: 5px;
        }

        .timeTab {

            color: #2ccf2c;
            text-align: center;
            border: 1px solid #b7bebf;
            padding: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper no-print">

        <?php include('_nav.php') ?>
        <div class="content-wrapper">

            <section class="content mt-2">
                <div class="card">
                    <div class='card-header' style='padding: 5px;'>
                        <button class='btn btn-info btn-sm' style='float:right;' onclick="ExportCsv()">Export</button>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class="input-group date" data-provide="datepicker" id='dvDatePicker' style='width:50%;float:left;margin-right: 15px;'>
                                <div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6' style='max-height:500px; overflow:auto;'>
                            <table id='bookingTable'>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include('_footerlink.php') ?>

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        var taskDetailArray = [];
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

        $("#dvDatePicker").datepicker({
            changeMonth: true,
            changeYear: true,
            autoclose: true,
            setDate: new Date(),
            todayHighlight: true,
            daysOfWeekDisabled: [0],
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [day != 0,''];
            },
            onSelect: function() {
                //SetDateLabel($(this).datepicker("getDate"));
                SetTasks();
                // CheckBookingSlot();
            }
        }).on("onSelect", function() {
            debugger
            //SetDateLabel($(this).datepicker("getDate"));
            SetTasks();
            // CheckBookingSlot();
        });

        function getAllTask() {
            //adding existing booked task  in edit popup
            $.ajax({
                url: 'api/address_action.php',
                datatype: 'json',
                type: "post",
                data: {
                    "action": 'getTask',
                    'addressid': ""
                },
                success: function(response) {
                    taskDetailArray = JSON.parse(response);
                    SetTasks();
                },
                error: function(jqXHR, textStatus, errorThrown) {
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
            var nDate = $("#dvDatePicker").datepicker('getDate');
            nDate = nDate == null ? new Date() : nDate;
            let month = (nDate.getMonth() + 1);
            month = month < 10 ? "0" + month : month;

            let dateNum = nDate.getDate();
            dateNum = dateNum < 10 ? "0" + dateNum : dateNum;
            var taskDateTime = nDate.getFullYear() + "-" + month + "-" + dateNum;

            if (taskDateTime != undefined && taskDateTime != null) {
                var slDate = taskDateTime;
                $(taskDetailArray).each(function(i, val) {
                    var note = "";
                    $(this).data("note", note);
                    var idx = 0;
                    $("#bookingTable tbody tr").each(function() {
                        var time = $("td:eq(0)", this).text();

                        if (val.taskTime != null) {
                            if (val.taskDate == slDate && val.taskTime.indexOf(time) != -1) {
                                var tDate = new Date(val.taskDate);
                                var sDate = new Date();
                                var bkColor = tDate > sDate ? '#feffd7' : '#ffdcdc';
                                // if (idx == 0) {
                                    $("td:eq(1)", this).html(val.address + "<br/>" + "<b>Note:</b> " + val.note).css({
                                        "background": bkColor,
                                        "padding": "padding: 2px 10px 2px 10px;"
                                    });
                                // } else {
                                //     $("td:eq(1)", this).css({
                                //         "background": bkColor,
                                //         "padding": "padding: 2px 10px 2px 10px;"
                                //     });
                                // }
                                note = val.note != "" && val.note != null ? btoa(val.note) : "";
                                $(this).data("note", note);
                                idx++;
                            }
                        }
                    })
                });
            }
        }

        function ExportCsv() {
            try {
                var nDate = $("#dvDatePicker").datepicker('getDate');
                nDate = nDate == null ? new Date() : nDate;
                var taskDateTime = nDate.getFullYear() + "-" + (nDate.getMonth() + 1) + "-" + nDate.getDate();
                var json = [];
                var column = ['Date', 'Time', 'Address', 'Note'];
                json.push(column);

                $(taskDetailArray).each(function(i, val) {
                    if (val.taskDate == taskDateTime) {
                        var newArr = [];
                        newArr.push(val.taskDate);
                        newArr.push(val.taskTime.replace(/,/g, ' '));
                        newArr.push(val.address.replace(/,/g, ' '));
                        newArr.push(val.note);
                        json.push(newArr);
                    }
                })
                if (json.length <= 0) {
                    alert("No Booking Available");
                    return;
                }

                var csv = JSON2CSV(json);
                var downloadLink = document.createElement("a");
                var blob = new Blob(["\ufeff", csv]);
                var url = URL.createObjectURL(blob);
                var csvName = taskDateTime;
                downloadLink.href = url;
                downloadLink.download = csvName + ".csv";

                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            } catch (e) {
                alert("Error 103 : Unable to export data");
                console.log(e.message);
            }
        }

        function JSON2CSV(objArray) {
            var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
            var str = '';
            var line = '';

            // for (var index in array[0]) {
            //     line += index + ',';
            // }
            // str += line + '\r\n';
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

        getAllTask();
    </script>
</body>

</html>