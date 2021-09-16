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
    }
}

$(function () {
    let curyear = new Date().getFullYear();
    Global.GetCommonValue(curyear);
})