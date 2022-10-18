<?php
$con = mysqli_connect("localhost", "root", "1234", "emirim_db","3307");
mysqli_query($con,'SET NAMES utf8');

$userID = $_POST["userID"];
$userPassword = $_POST["userPassword"];
$userName = $_POST["userName"];
$userAge = $_POST["userAge"];

// $userID = "a6";
// $userPassword = "555";
// $userName = "김태연";
// $userAge = 17;

$statement = mysqli_prepare($con, "INSERT INTO user VALUES (?,?,?,?)");
mysqli_stmt_bind_param($statement, "sssi", $userID, $userPassword, $userName, $userAge);
mysqli_stmt_execute($statement);


$response = array();
$response["success"] = true;


echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>