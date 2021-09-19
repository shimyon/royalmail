<?php
include("../lib/connection.php");

$aColumns = array('Id', 'house_no', 'street', 'city', 'postcode', 'country', 'month', 'is_blocked', 'CreatedDate');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "Id";

/* DB table to use */
$sTable = "royalmail_address";

/* Database connection information */
$gaSql['user']       = $GLOBALS['username'];
$gaSql['password']   = $GLOBALS['password'];
$gaSql['db']         = $GLOBALS['dbname'];
$gaSql['server']     = $GLOBALS['servername'];

// print_r( $gaSql);
// exit();

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */


/*
	 * Paging
	 */
$sLimit = "";
if (isset($_GET['start']) && $_GET['length'] != '-1') {
	$sLimit = "LIMIT " . mysqli_real_escape_string($conn, $_GET['start']) . ", " .
		mysqli_real_escape_string($conn,  $_GET['length']);
}


/*
	 * Ordering
	 */
$sOrder = '';
if (isset($_GET['iSortCol_0'])) {
	$sOrder = "ORDER BY  ";
	for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
		if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
			$sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
				 	" . mysqli_real_escape_string($conn, $_GET['sSortDir_' . $i]) . ", ";
		}
	}

	$sOrder = substr_replace($sOrder, "", -2);
	if ($sOrder == "ORDER BY") {
		$sOrder = "";
	}
}


/*
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
$sWhere = "";
if (isset($_GET['search']) && $_GET['search'] != "") {
	$sWhere = "WHERE (";
	for ($i = 0; $i < count($aColumns); $i++) {
		$searchval = mysqli_real_escape_string($conn, $_GET['search']['value']);
		$sWhere .= $aColumns[$i] . " LIKE '%" . $searchval . "%' OR ";
	}
	$sWhere = substr_replace($sWhere, "", -3);
	$sWhere .= ')';
}


/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
	if (isset($_GET['searchable_' . $i]) && $_GET['searchable_' . $i] == "true" && $_GET['search_' . $i] != '') {
		if ($sWhere == "") {
			$sWhere = "WHERE ";
		} else {
			$sWhere .= " AND ";
		}
		$sWhere .= $aColumns[$i] . " LIKE '%" . mysqli_real_escape_string($conn, $_GET['search_' . $i]) . "%' ";
	}
}



if (isset($_GET['month']) && $_GET['month'] != "0" && $_GET['month'] != "") {
	if (trim($sWhere) == "") {
		$sWhere .= " WHERE month = {$_GET['month']} ";
	} else {
		$sWhere .= ' AND ( month = ' . $_GET['month'] . ') ';
	}
}
// if ( isset($_GET['year']) && $_GET['year'] != "0" )
// {
// 	if (trim($sWhere) == "")
// 	{
// 		$sWhere .= " WHERE YEAR(CreatedDate) = ${$_GET['year']} ";
// 	}
// 	else
// 	{
// 		$sWhere .= ' AND (YEAR(CreatedDate) = '. $_GET['year'] . ') ';
// 	}
// }

/*
	 * SQL queries
	 * Get data to display
	 */
$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ifnull(MONTHNAME(STR_TO_DATE(month, '%m')), '') AS month_name, " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";

// exit($sQuery);
$rResult = mysqli_query($conn, $sQuery) or die(mysqli_error());

/* Data set length after filtering */
$sQuery = "
		SELECT FOUND_ROWS()
	";
$rResultFilterTotal = mysqli_query($conn, $sQuery) or die(mysqli_error());
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
$sQuery = "
		SELECT COUNT(" . $sIndexColumn . ")
		FROM   $sTable
	";
$rResultTotal = mysqli_query($conn, $sQuery) or die(mysqli_error());
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];


/*
	 * Output
	 */
$developers_record = array();
while ($developer = mysqli_fetch_assoc($rResult)) {
	$developers_record[] = $developer;
}

/*
	if export yes then it will export file
	*/
if (isset($_GET['export']) && $_GET['export'] == 'Y') {
	echo json_encode($developers_record);
} else {

	$developer_data = array(
		"sEcho" => intval($_GET['draw']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => $developers_record
	);

	echo json_encode($developer_data);
}
