<?php
include("dbc.php");
session_start();

$storeID = strip_tags($_POST["storeID"]);
$UserID = strip_tags($_POST["UserID"]);
$Password = $_POST["Password"];
$Password = base64_encode(base64_encode($Password));
$StoreError = "";
$UserError = "";
$PasswordError = "";
$UKey = "";
$storequery = mysqli_query($dbc, "SELECT * FROM `stores` WHERE `StoreID` = $storeID");
$storequery = mysqli_fetch_assoc($storequery);
if ($storequery){
    $store = mysqli_query($dbc, "SELECT * FROM `storeemployees` WHERE `StoreID` = $storeID AND `UserID` = $UserID");
    $store = mysqli_fetch_assoc($store);
    if ($store){
        $UserpassQuery = mysqli_query($dbc, "SELECT * FROM `users` WHERE `ID` = $UserID");
        $UserpassQuery = mysqli_fetch_assoc($UserpassQuery);

        

        if ($UserpassQuery["Password"] === $Password) {
            
            $UKey = substr(base64_encode($Password), 0, 4 ).substr(base64_encode(microtime()), 6, 10) ;
            $UKeyquery = mysqli_query($dbc, "UPDATE `users` SET `UKey` = '$UKey' WHERE `ID` = $UserID");
            if ($UKeyquery){
                setcookie("UserID", $UserID, time() + (86400 * 30), "/");
                setcookie("UKey", $UKey, time() + (86400 * 30), "/");
                $redirect =  "http://localhost/projects/Shift-Swap/";
            } else {
                $PasswordError = "Error logging in, please try again.";
            }

        } else {
            $PasswordError = "Password is incorrect, please try again.";
        }
        
    } else {
        $UserError = "This User ID is not linked to this store.";
    }
} else {
    $StoreError = "This Store ID is not in the database.";
};

$userquery = mysqli_query($dbc, "SELECT * FROM `users` WHERE `ID` = $UserID");
$userquery = mysqli_fetch_assoc($userquery);
if (!$userquery){
    $UserError = "This User ID does not exist, please create an account.";
};


echo json_encode( array(
    "redirect" => $redirect,
    "StoreError" => $StoreError,
    "UserError" => $UserError,
    "PasswordError" => $PasswordError
));