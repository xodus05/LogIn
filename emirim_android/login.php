<?php
$con = mysqli_connect("localhost", "root", "1234", "emirim_db","3307");
mysqli_query($con,'SET NAMES utf8');

$userID = $_POST["userID"];
$userPassword = $_POST["userPassword"];

// $userID = 'a1';
// $userPassword = '111';

$statement = mysqli_prepare($con, "SELECT * FROM user WHERE userID = ? AND userPassword = ?");
mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
mysqli_stmt_execute($statement);


mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $userPassword, $userName, $userAge);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["userID"] = $userID;
    $response["userPassword"] = $userPassword;
    $response["userName"] = $userName;
    $response["userAge"] = $userAge;
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);



?>