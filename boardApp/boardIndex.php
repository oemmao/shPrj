<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
}

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");

$sql = "select * from boardtest order by num desc";
$result = mysqli_query($conn,$sql);
//DB의 총 row(행) 개수를 반환하는 함수(총 게시물 수를 구할 때 사용)
$board_total_count = mysqli_num_rows($result); 

$page = ($_GET['page'])? $_GET['page'] : 1; //페이지
$page_list = 5; //페이지당 게시글 수
$page_block = 3; //블록당 페이지 수

//ceil 함수는 소수점 올림해줌
$pageNum = ceil($board_total_count / $page_list); //총 페이지
$blockNum = ceil($pageNum / $page_block); //총 블록
$nowBlock = ceil($page / $page_block); //현재 블록 위치

$start_page = ($nowBlock - 1) * $page_block + 1; //블록에서 처음 페이지
//$start_page = ($nowBlock * $page_block) - 2;
if ($start_page <= 1) {
	$start_page = 1;
}

//$page_block = 5;
//$start_page = ($nowBlock * $page_block) - 4;
//1*5-4 = 1
//2*5-4 = 6
//
//$page_block = 10;
//$start_page = ($nowBlock * $page_block) - 9;
//1*10-9 = 1
//2*10-9 = 11
//
//$page_block + 1
//$nowBlock = 1일때, $page_block = 0이어야한다.
//$nowBlock = 2일때, $page_block = 개수 이어야한다.
//$nowBlock = 3일때, $page_block = 개수*2 이어야한다.
//
//($nowBlock-1)*$page_block + 1

$end_page = $nowBlock * $page_block; //블록에서 마지막 페이지
if ($pageNum <= $end_page) {
	$end_page = $pageNum;
}

$start_num = ($page - 1) * $page_list;
$sql_board = "select * from boardtest order by num desc limit $start_num, $page_list";
$total_result = mysqli_query($conn, $sql_board);

////DB의 row 갯수를 구하기 위해 사용
//$sql_count = "select count(*) from boardtest"; //해당 데이터의 개수 출력
//$result_count = mysqli_query($conn, $sql_count);
//$result_row = mysqli_fetch_row($result_count); 
////mysqli_fetch_array처럼 배열로, 최상위 한줄만 출력하는 함수
//$total_row = $result_row[0];

?>
<html>
<head>
	<meta charset="utf-8" />
</head>
<body>
<p>게시판만들기 메인<br>
	<a href="createBoardForm.php" ><input type="button" name="createBoard" value="글쓰기" ></a>
	<p>리스트 나와야 함<br>
		<table>
		<?php
		echo "{$board_total_count}";
//		echo "{$total_row}";
		if ($board_total_count == 0) {
		?>
		<tr>
			<td>게시글 없음</td>
		</tr>
		<?php
		} else {
		?>
		<tr>
			<td>번호</td>
			<td>제목</td>
			<td>글쓴이</td>
			<td>날짜</td>
			<td>조회수</td>
		</tr>
		<?php
			while ($row = mysqli_fetch_array($total_result)) {
			//	echo "{$total_row}";
			//	echo "{$row['writer']}";
			//	echo "{$row['subject']}<br>";
		?>
			<tr>
				<td><?= $row['num'] ?></td>
				<!-- 게시글 읽기로 넘어갈 때, 글번호와 페이지를 같이 넘겨준다 -->
				<td><a href="readBoard.php?page=<?= $page ?>&num=<?= $row['num'] ?>">
					<?= $row['subject'] ?></a></td>
				<td><?= $row['writer'] ?></td>
				<td><?= $row['creatDate'] ?></td>
				<td><?= $row['textView'] ?></td>
			</tr>
		<?php
			}
		}
mysqli_close($conn);
?>		
	</table>

<?php
	
	if ($start_page > $nowBlock) { //$nowBlock보다 크면 이전버튼 생성
	$prev_page = $start_page - 1;
	echo "<a href='$PHP_SELF?page=$prev_page'>이전</a>";
	}

//	for ($i = $start_page; $i <= $end_page; $i++) {
//		echo "<a href='$PHP_SELF?page=$i'>$i</a>";
//	}
	
	//페이지리스트 출력
	for ($i = $start_page; $i <= $end_page; $i++) {
		//현재 페이지를 제외한 페이지에만 링크 생성하기 위해 
		if ($page != $i) {
			echo "<a href='$PHP_SELF?page=$i'>";
		}
		echo "$i&nbsp";
		//현재 페이지를 제외한 페이지에만 링크 생성하기 위해 
		if ($page != $i) {
			echo "</a>";
		}
	}

	if ($nowBlock < $blockNum ) {
	$next_page = $end_page + 1;
	echo "<a href='$PHP_SELF?page=$next_page'>다음</a>";
	}
?>

</body>
</html>