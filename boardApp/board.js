//function commentDelete_click() {
//	var cmt = $('#checkCmtNum').val();
//	alert(cmt);
//	var result = confirm('댓글을 삭제하시겠습니까?');
//	if (result) {
//		alert('삭제 고고');
//		location.replace('deleteComment.php?cmt='+cmt);
//	} else {
//		alert('삭제 안해');
//	}
//}

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

	$(".commentDelete").click(function() {
		var cmt = $(this).attr('id');
		//alert(cmt);
		//id에 저장한 값 가져옴 (게시판번호와 댓글번호)

		var result = confirm('댓글을 삭제하시겠습니까?');
		if (result) {
			//alert('삭제 고고');
			location.replace('deleteComment.php?cmt='+ cmt);
		} else {
			//alert('삭제 안해');
		}
		
	});

//	$("#commentDelete").click(function() {
//		var cmt = $('#checkCmtNum').val();
//		alert(cmt);
//		var result = confirm('댓글을 삭제하시겠습니까? 00');
//		if (result) {
//			alert('삭제 고고');
//			location.replace('deleteComment.php?cmt='+cmt);
//		} else {
//			alert('삭제 안해');
//		}
//		
//	});



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

