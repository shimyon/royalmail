<?php

include("../lib/connection.php");

if ($_POST['action'] == "getAppliance") {
  $arr = array();
  $addressid = mysqli_real_escape_string($conn, $_POST['addressid']);
  $sql = "select Id, AddressId, appliance_name, location, if(cowl = 1,'Yes','No') as cowl, if(lined = 1,'Yes','No') as lined from royalmail_appliance where AddressId = $addressid";
  $sql_result = $conn->query($sql);
  if ($sql_result->num_rows > 0) {
    while ($row = $sql_result->fetch_assoc()) {
      $arr[] = $row;
    }
  }
  echo json_encode($arr);
}

if ($_POST['action'] == "deleteAppliance") {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $sql = "delete from royalmail_appliance where Id = $id";
  $sql_result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
    echo "Record delete successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if ($_POST['action'] == "getTask") {
  $arr = array();
  $id = mysqli_real_escape_string($conn, $_POST['addressid']);
  $where = "";

  if ($id != "") {
    $where = " WHERE addressid= $id ";
  }

  $sql = "SELECT a.id, DATE_FORMAT(taskDate,'%Y-%m-%d') taskDate,a.note,addressId, ";
  $sql .= "CONCAT( house_no ,', ',street,', ',city,', ',postcode) address,taskTime  ";
  $sql .= "FROM royalmail_taskdetail a LEFT JOIN royalmail_address b ON a.addressid = b.id ";
  $sql .= $where;
  $sql .= "ORDER BY taskDate ";

  $sql_result = $conn->query($sql);
  if ($sql_result->num_rows > 0) {
    while ($row = $sql_result->fetch_assoc()) {
      $arr[] = $row;
    }
  }
  echo json_encode($arr);
}

if ($_POST['action'] == "deleteBooking") {

  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $sql = "DELETE FROM royalmail_taskdetail WHERE ID=$id";

  if ($conn->query($sql) === TRUE) {

    echo "Record deleted successfully";
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if ($_POST['action'] == "getRecommended") {
  $arr = array();
  $street = mysqli_real_escape_string($conn, $_POST['street']);

  $sql = "SELECT DATE_FORMAT(taskDate,'%M %D' ) taskDate ";
  $sql .= "FROM royalmail_taskdetail a LEFT JOIN royalmail_address b ON a.addressid = b.id ";
  $sql .= "WHERE b.street='" . $street . "' AND taskdate > NOW() ORDER BY taskDate ";

  $sql_result = $conn->query($sql);
  if ($sql_result->num_rows > 0) {
    while ($row = $sql_result->fetch_assoc()) {
      $arr[] = $row;
    }
  }
  echo json_encode($arr);
}

if ($_POST['action'] == "insert") {
  $address =  $_POST['address'];
  $blacklist_customer =  $_POST['blacklist_customer'];
  $month =  $_POST['month'];
  $result_exist = "SELECT house_no,street,city,postcode,country,month,is_blocked,month,is_blocked FROM `royalmail_address` WHERE house_no='" . $address[0] . "'AND street='" . $address[1] . "'AND city='" . $address[2] . "'AND postcode='" . $address[3] . "'AND country='" . $address[4] . "'";
  $sql_result = $conn->query($result_exist);
  if ($sql_result->num_rows > 0) {
    while ($row = $sql_result->fetch_assoc()) {
      $customer_month = $row['month'];
      $customer_is_blocked = $row['is_blocked'];
    }
    if ($customer_month == "") {
      $month_message = "and customer is not assigned to any month";
    } else {
      $month_name = get_month_name($customer_month);
      $month_message = "and assigned month is " . $month_name;
    }
    if ($customer_is_blocked == "Yes") {
      $blocked_message = " and this customer is blocked";
    } else {
      $blocked_message = "";
    }
    echo "This customer already exists in your database $month_message" . $blocked_message;
    die();
  } else {
    $sql = "INSERT INTO royalmail_address (house_no,street,city,postcode,country,month,is_blocked) VALUES ('" . $address[0] . "','" . $address[1] . "','" . $address[2] . "','" . $address[3] . "','" . $address[4] . "','" . $month . "','" . $blacklist_customer . "')";
  }
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}



if ($_POST['action'] == "edit") {

  $houseno = mysqli_real_escape_string($conn, $_POST['houseno']);
  $street = mysqli_real_escape_string($conn, $_POST['street']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
  $month = mysqli_real_escape_string($conn, $_POST['month']);
  $blacklist = mysqli_real_escape_string($conn, $_POST['blacklist']);
  $note = mysqli_real_escape_string($conn, $_POST['note']);
  $taskDate = mysqli_real_escape_string($conn, $_POST['taskDate']);
  $taskTime = mysqli_real_escape_string($conn, $_POST['taskTime']);
  $data = $_POST['appliance'] ?? array();

  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $sql = "update royalmail_address set house_no = '" . $houseno . "',street='" . $street . "',city='" . $city . "',postcode='" . $postcode . "',month = '" . $month . "', is_blocked='" . $blacklist . "' where ID = $id";

  if ($conn->query($sql) === TRUE) {
    $sql = "delete from royalmail_appliance where AddressId = $id";
    $conn->query($sql);
    if (isset($data)) {
      foreach ($data as $d) {
        $appliance_name = mysqli_real_escape_string($conn, $d['appliance_name']) ?? "";
        $location = mysqli_real_escape_string($conn, $d['location']) ?? "";
        $cowl = mysqli_real_escape_string($conn, $d['cowl']) == "Yes" ? "1" : "0";
        $lined = mysqli_real_escape_string($conn, $d['lined']) == "Yes" ? "1" : "0";
        $sql = "INSERT INTO royalmail_appliance (AddressId,appliance_name,location,cowl,lined)
                VALUES ('" . $id . "', '" . $appliance_name . "','" . $location . "','" . $cowl . "','" . $lined . "')";
        $conn->query($sql);
      }
    }
    //formatting date
    $taskDate = date("Y-m-d H:i:s", strtotime($taskDate));

    $sql = "INSERT INTO royalmail_taskdetail (addressId,taskDate,note,taskTime) VALUES ('" . $id . "','" . $taskDate . "','" . $note . "','" . $taskTime . "')";
    if (!$conn->query($sql) === TRUE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "Record udpated successfully";
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}



if ($_POST['action'] == "delete") {

  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $sql = "DELETE FROM royalmail_address WHERE ID=$id";



  if ($conn->query($sql) === TRUE) {

    echo "Record delete successfully";
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
function get_month_name($customer_month)
{
  switch ($customer_month) {
    case "01":
      echo " January";
      break;
    case "02":
      echo " February";
      break;
    case "03":
      echo " March";
      break;
    case "04":
      echo " April";
      break;
    case "05":
      echo " May";
      break;
    case "06":
      echo " June";
      break;
    case "07":
      echo " July";
      break;
    case "08":
      echo " August";
      break;
    case "09":
      echo " September";
      break;
    case "10":
      echo " October";
      break;
    case "11":
      echo " November";
      break;
    case "12":
      echo " December";
      break;
    default:
      echo "Your favorite color is neither red, blue, nor green!";
  }
}
