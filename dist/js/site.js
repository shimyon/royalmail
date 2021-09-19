var Global = {
    GetCommonValue: function ($year) {
        $.ajax({
            datatype: 'json',
            url: 'api/month_count_action.php',
            type: "post",
            data: {
                "action": 'months_count',
                "year": $year
            },
            success: function (response) {
                let res = JSON.parse(response);
                $data = res.months;
                $count = $data.length;
                for (var i = 0; i <= $count; i++) {
                    $index = i + 1;
                    $(".months_" + $index).find("p").text($data[i]);
                }
                $('.blocklist p').text(res.blocked_count);
                $('.unassign p').text(res.unassign);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                debugger

                console.log(textStatus, errorThrown);
            }
        });
    },
    Export: function (selectedMonth) {
        $.ajax({
            datatype: 'json',
            url: 'api/address_export.php',
            type: "post",
            data: {
                "action": 'export_month',
                "month": selectedMonth
            },
            success: function (response) {
                var json = JSON.parse(response);
                if (json.length == 0) {
                    alert("No Data Found");
                    return;
                }
                var csv = Global.JSON2CSV(json);
                var downloadLink = document.createElement("a");
                var blob = new Blob(["\ufeff", csv]);
                var url = URL.createObjectURL(blob);
                var csvName = selectedMonth == undefined || selectedMonth == "" ? "Data" : selectedMonth;
                downloadLink.href = url;
                downloadLink.download = csvName + ".csv";

                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                debugger

                console.log(textStatus, errorThrown);
            }
        });
    },
    JSON2CSV: function (objArray) {
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
}

$(function () {
    let curyear = new Date().getFullYear();
    Global.GetCommonValue(curyear);
    $(".exportbtn").click(function () {
        let month = $(this).attr('data-month');
        Global.Export(month);
    })
})