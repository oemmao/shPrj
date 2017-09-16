<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}

header("Content-Type:text/html;charset=utf-8");
include "../db_Info.php";

$cmt_sql = "select * from commentInfo order by idx desc";
$cmt_result = mysqli_query($con, $cmt_sql);
$cmt_total = mysqli_num_rows($cmt_result);

//댓글 페이지 값 가져오기
$cmt_page = ($_GET['cmt_page'])? $_GET['cmt_page'] : 1; //페이지
$cmt_list = 3; //페이지당 게시글 수
$cmt_block = 3; //블록당 페이지 수

//ceil 소수점 올림 함수
$cmt_total = ceil($cmt_total/$cmt_list); //총 페이지 수
$cmt_block_total = ceil($cmt_total/$cmt_block); //총 블록 수
$cmt_now_block = ceil($cmt_page/$cmt_block); //현재 블록 위치


//블록에서 처음 페이지 수
$cmt_start_page = ($cmt_now_block - 1) * $cmt_block + 1;
if ($cmt_start_page <= 1) {
$cmt_start_page = 1;
}
//블록에서 마지막 페이지 수
$cmt_end_page = $cmt_now_block * $cmt_block;
if ($cmt_total <= $cmt_end_page) {
$cmt_end_page = $cmt_total;
}

//댓글 리스트 시작번호 구하기
$cmt_start_num = ($cmt_page - 1) * $cmt_list;
$cmt_sql_list = "select idx, comment, commentDate, userID from commentInfo join memberInfo on commentInfo.member_idx = memberInfo.id where board_idx='$idx' order by cmt_idx limit $cmt_start_num, $cmt_list";
$cmt_list_result = mysqli_query($con, $cmt_sql_list);
//                while ($cmt_row = mysqli_fetch_array($cmt_list_result)) {
//                echo "cmt : ";
//                print_r($cmt_row);
//                echo "<br>";
//                }
?>
