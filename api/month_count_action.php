<?php

include("../lib/connection.php");
if ($_POST['action'] == "months_count") {
	$year = $_POST['year'];
	//$first_month= $year."01";
	//$last_month=$year
	$months = 12;
	$row = '';
	$blockcount = 0;
	$unassign = 0;
	$data = array();
	for ($i	= 1; $i <= $months; $i++) {
		if ($i < 10) {
			$date = "0" . $i;
		} else {
			$date = $i;
		}
		$sql = "SELECT COUNT(*) AS `month_count` FROM `royalmail_address` WHERE month = '" . $date . "'";
		$sql_result = $conn->query($sql);
		if ($sql_result->num_rows > 0) {

			while ($row = $sql_result->fetch_assoc()) {
				array_push($data, $row['month_count']);
			}
		}

		$sql = "SELECT COUNT(*) AS `blocked_count` FROM `royalmail_address` WHERE is_blocked='Yes'";
		$sql_result = $conn->query($sql);
		if ($sql_result->num_rows > 0) {

			while ($row = $sql_result->fetch_assoc()) {
				$blockcount = $row['blocked_count'];
			}
		}

		$sql = "SELECT COUNT(*) AS `unassign` FROM `royalmail_address` WHERE ifnull(month,'')='' and ifnull(is_blocked,'')!='Yes'";
		$sql_result = $conn->query($sql);
		if ($sql_result->num_rows > 0) {

			while ($row = $sql_result->fetch_assoc()) {
				$unassign = $row['unassign'];
			}
		}
	}
	$res = array(
		"months" => $data,
		"blocked_count" => $blockcount,
		"unassign" => $unassign
	);

	echo json_encode($res);
}
if ($_POST['action'] == "get_month") {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$sql = "SELECT `month`,`is_blocked`  FROM `royalmail_address` WHERE  Id = $id ";
	$sql_result = $conn->query($sql);
	if ($sql_result->num_rows > 0) {
		$data = array();
		while ($row = $sql_result->fetch_assoc()) {
			$data['month'] = $row['month'];
			$data['is_blocked'] = $row['is_blocked'];
		}
	}
	echo json_encode($data);
}
