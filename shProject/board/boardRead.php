<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");

echo "글읽기<br>";
$page = $_GET['page'];
$idx = $_GET['idx'];
echo "{$page} {$idx}";
?>