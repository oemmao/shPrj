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
//		alert(cmt);
//		alert('deleteComment.php?'+ cmt);
		//id에 저장한 값 가져옴 (게시판번호와 댓글번호)

		var result = confirm('댓글을 삭제하시겠습니까?');
		if (result) {
			//alert('삭제 고고');
			location.replace('deleteComment.php?'+ cmt);
		} else {
			//alert('삭제 안해');
		}
		
	});

	$(".cmtReply_button").click(function() {
		alert("cmtReply show");
		var cmt_id = $(this).attr('id');
		var reply_id = $(".reply").attr('id');
		alert(reply_id);
//		location.replace('createComment_Cmt.php?' + cmt_id);
//		var reply_id = $(".reply").attr('id');
//		alert("cmt_id: "+cmt_id + "reply_id: " +reply_id );
//		if (cmt_id == reply_id) {
//			$(".reply").show();
//		}
		
	});


	$(".cmtReply").click(function() {
		alert("come in");
		$(".c_commentForm").toggle();

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

