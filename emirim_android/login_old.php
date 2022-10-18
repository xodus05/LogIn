<?php
$con = mysqli_connect("localhost", "root", "1234", "emirim_db","3307");
mysqli_query($con,'SET NAMES utf8');


// $userID = $_POST["id"];
// $userPassword = $_POST["pwd"];

$userID = 'a1';
$userPassword = '111';

$statement = mysqli_prepare($con, "SELECT * FROM member WHERE id = ? AND pwd = ?");
mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
mysqli_stmt_execute($statement);


mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $userPassword, $userName);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["userID"] = $userID;
    $response["userPassword"] = $userPassword;
    $response["userName"] = $userName;
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

//echo json_encode($response);



?>
