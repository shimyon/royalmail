<?php
include("../lib/connection.php");

if ($_POST['month'] == "13") {
    $where = " is_blocked='Yes' ";
} elseif ($_POST['month'] == "14") {
    $where = " ifnull(month,'')='' and ifnull(is_blocked,'')!='Yes' ";
} else {
    $where = " month=" . $_POST['month'];
}
$sQuery = "select Id, house_no, street, city, postcode, country, month, ifnull(MONTHNAME(STR_TO_DATE(month, '%m')), '') AS month_name, is_blocked, CreatedDate
        From royalmail_address
        Where $where";
// exit($sQuery);

$rResult = mysqli_query($conn, $sQuery) or die(mysqli_error());

$developers_record = array();
while ($developer = mysqli_fetch_assoc($rResult)) {
    $developers_record[] = $developer;
}

echo json_encode($developers_record);
