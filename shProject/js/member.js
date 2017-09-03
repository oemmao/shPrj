//회원가입 메인으로 이동
var indexPage = function() {
	//alert("come");
	document.location.href='../index.php';
}

//익명함수
$(function() {
	//아이디 중복확인
	$('#duCheckID').click(function(){
		//alert('come duCheckID');
		var userID = $('#inputID').val();
		if (userID == "") {
			alert('아이디를 입력해 주시기 바랍니다.');
		} else {
			$.ajax({
				url: 'memberDuCheck.php',
				type: 'post',
				dataType: 'json',
				data: {
					"userID" : userID
				},
				success:function(result) {
					var result = result;
					alert(result.message);
//					console.log(result.result, typeof result.result);
					if (!result.result){
//						console.log(result.result);
						//attr 값 변경하기
						$('#inputID').attr('isDuCheck','1');
					}
//					console.log($('#inputID').attr('isDuCheck'));
				}
			})
		}
// php 서버에서 확인할 때	
//			$.ajax({
//				url: 'memberDuCheck.php',
//				type: 'post',
//				dataType: 'json',
//				data: {
//					"userID" : userID
//				},
//				success:function(result) {
//					var result = result;
//					alert(result.message);
//				}
//			})
	});

	//회원가입
	$('#memberInsert').submit(function(event){
		alert('come memberInsert');
		if ($('#inputID').attr('isDuCheck') == 1) {
			var isValid = false;
			var userID = $('#inputID').val();
			var userPW = $('#inputPW').val();
			var userPWCheck = $('#inputPWCheck').val();
			var userName = $('#inputName').val();
			var userGender = $(":input:radio[name=checkGender]:checked").val();
			var inputData = {	"userID" : userID,
								"userPW" : userPW,
								"userPWCheck" : userPWCheck,
								"userName" : userName,
								"userGender" : userGender	};
			
			if (userID == "") {
				alert('아이디를 입력해 주시기 바랍니다.');	
			} else if (userPW == "") {
				alert('비밀번호를 입력해 주시기 바랍니다.');
			} else if (userPWCheck == "") {
				alert('비밀번호재확인을 입력해 주시기 바랍니다.');
			} else if (userPW != userPWCheck) {
				alert('비밀번호가 일치하지 않습니다. 다시 입력해 주시기 바랍니다.');
			} else if (userName == "") {
				alert('이름을 입력해 주시기 바랍니다.');
			} else if (!userGender) {
				alert('성별을 선택해 주시기 바랍니다.');
			} else {
				isValid = true;	
				$.ajax({
					url: 'memberInsert.php',
					type: 'post',
					dataType: 'json',
					data: inputData,	
					success: function(result) {
						var result = result;
						isValid = result.result;
						alert(isValid);
//						alert(result.message);
						if (isValid) {
							alert(result.message);
//							document.location.href="https://www.naver.com/";
							document.location.href='memberLogin.php';
							
						} else {
							alert(result.message);
						}
					}
				})
			}
			if (!isValid) {
				event.preventDefault();
			}

		} else {
			alert('아이디 중복체크를 해주시기 바랍니다.');
			event.preventDefault();
		}

	});

	$('#memberLogin').click(function(){
		alert('come memberLogin');
		document.location.href='member/memberLogin.php';
	});


});







//function indexPage() {
//	indexPage11();
//}
//
//var indexPage11 = function() {
//	alert("되나");
//}

