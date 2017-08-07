<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
//    echo "<script>document.location.href='loginForm.html';</script>";
}

$host = 'localhost:3307';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';
$userID = $_POST['id'];
$userPW = $_POST['pw'];
$userName = $_POST['name'];

$conn = mysqli_connect($host,$user,$pw,$dbName);

if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "update loginTest set userPW='$userPW', userName='$userName', userModifyDate=now() where userID='$userID'";
$result = mysqli_query($conn, $sql);

header('Location: ./loginSession.php');

mysqli_close($conn);

?>
