<?php
//DB database 持失 号狛
//
//$host = 'localhost:3307';
//$user = 'root';
//$pw = '111111';
//
//$conn = mysqli_connect($host,$user,$pw);
//
//if(!$conn) {
//		die("Connection failed: " . mysqli_connect_error());
//	} 
//
//$creatDB = "create database newTest"; 
//
//if (mysqli_query($conn, $creatDB)) {
//	echo "Database created";
//} else {
//	echo "Error creating database:" .mysqli_error($conn);
//}
//
//mysqli_close($conn);
//
?>

<?php
//DB table 持失 号狛
$host = 'localhost:3307';
$user = 'root';
$pw = '111111';
$dbName = 'newTest';
//$userID = $_POST['id'];
//$userPW = $_POST['pw'];

$conn = mysqli_connect($host,$user,$pw,$dbName);

if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} 

$sql = "create table newTable
(
id int(10) unsigned not null auto_increment,
userID varchar(30) not null,
userPW varchar(30) not null,
userName varchar(30) not null,
primary key(id)
)";

if (mysqli_query($conn, $sql)) {
	echo "Table created";
} else {
	echo "Error creating table:" .mysqli_error($conn);
}

mysqli_close($conn);

?>