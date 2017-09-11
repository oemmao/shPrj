<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include "../db_Info.php";

$idx = $_GET['idx'];
$page = $_GET['page'];

$sql = "delete from boardInfo where idx='$idx'";
mysqli_query($con, $sql);
mysqli_close($con);

header('Location: ./boardMain.php');
?>