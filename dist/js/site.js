var Global = {
    GetCommonValue: function($year) {
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
    }
}

$(function() {
    let curyear = new Date().getFullYear();
    Global.GetCommonValue(curyear);
})