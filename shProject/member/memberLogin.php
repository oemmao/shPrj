<?
session_start();
if(!isset($_SESSION['isLogin'])){
//	header('Location: http://sflower121.phps.kr/shProject/index.php');
    echo "<script>document.location.href='http://sflower121.phps.kr/shProject/index.php';</script>";
}

header("Content-Type:text/html;charset=utf-8");
echo "회원가입 또는 로그인 성공 화면";
?>