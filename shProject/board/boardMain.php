<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}

header("Content-Type:text/html;charset=utf-8");
include "../db_Info.php";
//게시판 리스트 파일
//include "boardList.php";
//리스트를 가져오기 위해 DB전체를 가져옴
//memberInfo에서 userID를 가져오기 위해 join 사용
//게시글 번호, 제목, 아이디, 글등록시간, 조회수
$sql = "select * from boardInfo order by idx desc";
$result = mysqli_query($con, $sql);
//DB의 총 row(행) 개수를 반환하는 함수(총 게시물 수를 구할 때 사용)
$board_total = mysqli_num_rows($result);

//페이지 값 가져오기
$page = ($_GET['page'])? $_GET['page'] : 1; //페이지
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
$sql_list = "select idx, member_idx, subject, content, creatDate, textView, userID from boardInfo join memberInfo on boardInfo.member_idx = memberInfo.id order by idx desc limit $start_num, $page_list";
$board_result = mysqli_query($con, $sql_list);
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>welcome to my homepage</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="all_width">
    <? include "../layout/header.php"; ?>
    <? include "../layout/nav.php"; ?>
    <section>
        <article class="col-xs-10 article_line">
            <div>
                <h3>
                <span>게시판 리스트</span>
                </h3>
<!-- 				<? echo "{$board_total}"; ?> -->
<!-- 				<? echo "{$sql_list}";?> -->
<!-- 				<?echo "{$total_result}";?> -->

				<table class="table">
					<thead>
					<tr>
						<th class="col-xs-1 text-center">번호</th>
						<th class="col-xs-4 text-center">제목</th>
						<th class="col-xs-1 text-center">작성자</th>
						<th class="col-xs-3 text-center">작성일</th>
						<th class="col-xs-1 text-center">조회수</th>
					</tr>
					</thead>
					<? 
					while($row = mysqli_fetch_array($board_result)) {
//						echo "cmt : ";
//						print_r($row);
//						echo "<br>";
					?>
					<tr>
						<td class="text-center"><?= $row['idx']?></td>
						<td><?= $row['subject']?></td>
						<td class="text-center"><?= $row['userID']?></td>
						<td class="text-center"><?= $row['creatDate']?></td>
						<td class="text-center"><?= $row['textView']?></td>
					</tr>
					<?
					}
					mysqli_close($con);
					?>
				</table>
            </div>
            <button type="button" class="btn btn-warning pull-right" onclick="writingPage()" >글쓰기</button>
        </article>
    </section>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/member.js"></script>
<script src="../js/board.js"></script>
</html>
