<?
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$userID = $_POST['inputID'];
$userGender = $_POST['checkGender'];
echo "{$userID}<br>{$userGender}";

?>
