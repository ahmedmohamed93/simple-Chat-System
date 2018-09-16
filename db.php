<?php

$sdn    = 'mysql:host=localhost;dbname=chat';
$user   = 'root';
$pass   = '';
$option = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
	$con = new PDO($sdn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connecting";
} catch (PDOException $e) {
	echo "Failed To Connect ". $e->getMessage();
}


/////////////////////////////

function formatDate($date){
    return date('g:i a', strtotime($date));
}