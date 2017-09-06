<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}

header("Content-Type:text/html;charset=utf-8");
include "../db_Info.php";

//리스트를 가져오기 위해 DB전체를 가져옴
//memberInfo에서 userID를 가져오기 위해 join 사용
//게시글 번호, 제목, 아이디, 글등록시간, 조회수
$sql = "select * from boardInfo order by id desc";
$result = mysqli_query($con, $sql);
//DB의 총 row(행) 개수를 반환하는 함수(총 게시물 수를 구할 때 사용)
$board_total = mysqli_num_rows($result);

//페이지 값 가져오기
$page = ($_GET['page'])? $_GET['page'] : 1;  
$page_list = 5; //페이지당 게시글 수
$page_block = 3; //블록당 페이지 수

//ceil 소수점 올림 함수
$page_total = ceil($board_total/$page_list); //총 페이지 수
$block_total = ceil($page_total/$page_block); //총 블록 수
$now_block = ceil($page/$page_block); //현재 블록 위치

//블록에서 처음 페이지 수
$start_page = ($now_block - 1) * $page_block + 1;
if ($start_page <= 1) {
	$start_page = 1;
}
//블록에서 마지막 페이지 수
$end_page = $now_block * $page_block;
if ($page_total <= $end_page) {
	$end_page = $page_total;
}

//리스트 시작번호 구하기
$start_num = ($page - 1) * $page_list;
$sql_list = "select idx, member_idx, subject, content, creatDate, textView, userID from boardInfo order by idx desc limite $start_num, $page_list";
$board_result = mysqli_query($con, $sql_list);
?>