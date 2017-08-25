<?php

include "db_info.php";
$userID = $_POST['insertID'];

$sql = "select * from logintest where leaveCheck='F' and userID='$userID'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 0) { //사용가능한 아이디
	$checkidResult = "1";
	echo "{$checkidResult}";
} else {
	$checkidResult = "0"; //아이디 중복
	echo "{$checkidResult}";
}

mysqli_close($conn);
?>