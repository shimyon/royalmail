<?php
include("../lib/connection.php");

if (isset($_GET['action']) && $_GET['action'] == "getplayers") {
    $arr = array();
    $sql = "select * from players ";
    $sql_result = $conn->query($sql);
    if ($sql_result->num_rows > 0) {
      while ($row = $sql_result->fetch_assoc()) {
        $arr[] = $row;
      }
    }
    echo json_encode($arr);
} 

if (isset($_POST['action']) && $_POST['action'] == "setFeedback") {
  $playerid =  $_POST['playerid'];
  $Name = $_POST['Name'];
  $IsPlayerSponsored =  $_POST['IsPlayerSponsored'];
  $IsGamePlayMention =  $_POST['IsGamePlayMention'];
  $Date =  $_POST['Date'];
  $Evidence =  $_POST['Evidence'];
  $Description =  $_POST['Description'];
    if ($playerid == "") {
        $errMsg = "Please enter the Player Name.";  
    }
    if ($Name == "") {
      $errMsg = "Please enter the Player Name.";  
  }
    if ($IsPlayerSponsored == "") {
        $errMsg = "Please select the Sponsoerd.";  
    }
    if ($IsGamePlayMention == "") {
        $errMsg = "Please select the Monetise.";  
    }
    if ($Date == "") {
      $errMsg = "Please select the date.";  
  }
    if ($Evidence == "") {
        $errMsg = "Please select the Evidence.";  
    }
    if ($Description == "") {
        $errMsg = "Please enter the Description.";  
    }
    $sql = "INSERT INTO feedback (PlayerId,Name,IsPlayerSponsored,IsGamePlayMention,Date,Evidence,Description) VALUES ($playerid ,'$Name','$IsPlayerSponsored','$IsGamePlayMention','$Date','$Evidence','$Description')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: /emoiss/royalmail/mail.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
