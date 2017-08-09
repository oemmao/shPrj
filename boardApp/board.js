$(function(){
	$("#textSave").click(function() {
		var text = $('form').serialize();
		$.ajax({
			url:'createBoard.php',
			type: 'post',
			data: text,
			success: function(result) {
				if (result == "1") {
					alert("글이 등록되었습니다.");
					document.location.href='boardIndex.php';
				} else {
					alert(result);
				}
			}	
		});
	});

//	$("#textUpdate").click(function() {
//		document.location.href='readBoard.php?num=$_GET['num']';
//		var textUpdate = $('form').serialize();
//		if (textUpdate == "") {
//			alert("빈칸을 모두 채워주세요.");
//		} else {
//			$.ajax({
//				url:'updateBoard.php',
//				type: 'POST',
//				data: textUpdate,
//				success: function(result) {
//					if (result == "1") {
//						alert("");
//						document.location.href='boardIndex.php';
//					} else if (result == "0") {
//						alert(".");
//					} else {
//						alert(result);
//					}
//				}
//			});
//		}
//	});

});

