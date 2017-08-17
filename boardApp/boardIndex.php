<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
}

$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';

$conn = mysqli_connect($host, $user, $pw, $dbName);

if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}
 
$sql = "select * from boardtest order by num desc";
$result = mysqli_query($conn,$sql);
$board_num = mysqli_num_rows($result);


$page = ($_GET['page'])? $_GET['page'] : 1;
$page_list = 5; //페이지당 게시글 수
$page_block = 3; //블록당 페이지 수

$pageNum = ceil($board_num / $page_list); //총 페이지
$blockNum = ceil($pageNum / $page_block); //총 블록
$nowBlock = ceil($page / $page_block); //현재 블록 위치

$start_page = ($nowBlock * $page_block) - 2;
if ($start_page <= 1) {
	$start_page = 1;
}
$end_page = $nowBlock * $page_block;
if ($pageNum <= $end_page) {
	$end_page = $pageNum;
}

$start_no = ($page - 1) * $page_list;
$sql_board = "select * from boardtest order by num desc limit $start_no, $page_list";
$total_result = mysqli_query($conn,$sql_board);

//DB의 row 갯수를 구하기 위해 사용
$sql_count = "select count(*) from boardtest"; //해당 데이터의 개수 출력
$result_count = mysqli_query($conn, $sql_count);
$result_row = mysqli_fetch_row($result_count);
$total_row = $result_row[0];

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
		//echo "{$total_row}";
		if ($total_row == 0) {
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
				<td><a href="readBoard.php?num=<?= $row['num'] ?>&page=<?= $page ?>">
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
	
	if ($start_page > $nowBlock) {
	$prev_page = $start_page - 1;
	echo "<a href='$PHP_SELF?page=$prev_page'>이전</a>";
	}

	for ($i = $start_page; $i <= $end_page; $i++) {
		echo "<a href='$PHP_SELF?page=$i'>$i</a>";
	}
	
	if ($nowBlock < $blockNum ) {
	$next_page = $end_page + 1;
	echo "<a href='$PHP_SELF?page=$next_page'>다음</a>";
	}

?>

</body>
</html>