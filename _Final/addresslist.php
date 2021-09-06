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
                <label for="startDate">Date :</label>
                <input name="startDate" id="startDate" class="date-picker" />
            </div>
            <div class="card-body">
                <table id="addresstable" class="table table-bordered table-hover">
                    <thead>                  
                    </thead>
                    <tbody>                  
                    </tbody>                  
                </table>
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
        <h5 class="modal-title">Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea id='txtAddress' style='width:100%;'></textarea>
      </div>
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
var calmonth = 0, calyear = 0;
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            calmonth = inst.selectedMonth+ 1;
            calyear = inst.selectedYear;
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            RefreshDatatable();
        }
    });
    RefreshDatatable();
})

function CallDatatable() {   
    oTable = $('#addresstable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "./api/address_list_action.php",
            // "type": "POST",
            "processing": true,
            "serverSide": true,
            "datetype": "json",
            "data": { 'month': calmonth, 'year':calyear }
        },
        // "ajax": "./api/address_list_action.php",
        "drawCallback": function () {
            AfterDrawTable();
        }
        ,"columns": [
        {
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
            title: "Address",
            data: "Address",
            class: "text-center tdAddress"
        },
        {
            title: "CreatedDate",
            data: "CreatedDate",
            class: "text-center"
        }] 
    });
}

function RefreshDatatable() {
    if (!oTable) {
        CallDatatable();
    }
    else {
        if ($.fn.DataTable.isDataTable('#addresstable')) {
            $('#addresstable').DataTable().destroy();
        }
        CallDatatable();
    }
}

function EditAddress() {
    $.ajax({
        url:'api/address_action.php',
        type: "post",
        data: {
            "action":'edit',
            'id': editId,
            'address': $('#txtAddress').val()
        } ,
        success: function (response) {
            if(response == 'Record udpated successfully') {
                $('#myModal').modal('hide');
                RefreshDatatable();
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
        let address = $(this).closest('tr').find('.tdAddress').text();
        $('#myModal').modal('show');
        $('#txtAddress').val(address);
       
    })
    $(".btndelete").click(function () {
        if(!confirm('Are you sure?')) return false;

        let id = $(this).attr('data-id');
        $.ajax({
            url:'api/address_action.php',
            type: "post",
            data: {
                "action":'delete',
                'id': id
            } ,
            success: function (response) {
                if(response == 'Record delete successfully') {
                    addressTable.ajax.reload();
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

</script>
</body>
</html>
