//메인으로 이동
var indexPage = function() {
	//alert("come");
	document.location.href='http://sflower121.phps.kr/shProject/index.php';
}

//메인에서 회원가입으로 이동
var insertPage = function() {
	document.location.href='member/memberInsertForm.php';
}
//정보수정 페이지로 이동
var updatePage = function() {
	document.location.href='http://sflower121.phps.kr/shProject/member/memberUpdateForm.php';
}
//로그인 메인으로 이동
var prevPage = function() {
	document.location.href='http://sflower121.phps.kr/shProject/loginMain.php';
}
//탈퇴 페이지로 이동
var deletePage = function() {
	document.location.href='http://sflower121.phps.kr/shProject/member/memberDeleteForm.php';
}
//로그아웃 페이지로 이동
var logoutPage = function() {
	document.location.href='http://sflower121.phps.kr/shProject/member/memberLogout.php';
}
//익명함수
$(function() {
	
	var globalDomain = 'http://sflower121.phps.kr/shProject/';

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
		//form을 다음으로 넘기지 않기 위해 사용..
		event.preventDefault();
		//아이디 중복체크 여부 확인
		if ($('#inputID').attr('isDuCheck') == 1) {
			var isValid = false;
			var userID = $('#inputID').val();
			var userPW = $('#inputPW').val();
			var userPWCheck = $('#inputPWCheck').val();
			var userName = $('#inputName').val();
			//라디오버튼 값 가져오는 방법
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
						var isValid = result.result;
//						alert(isValid);
//						alert(result.message);
						if (isValid) {
							alert(result.message);
//							document.location.href="https://www.naver.com/";
							document.location.href=globalDomain + 'loginMain.php';
							
						} else {
							alert(result.message);
						}
					}
//					error:function(request,status,error){
//						alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
//					}

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
	//회원 로그인
	//form 전송을 하기 위해 submit 이벤트 사용
	$('#memberLogin').submit(function(event){
		alert("come memberLogin");
		//form을 다시 불러오는 것을 방지하기 위해 event.preventDefault() 호출
		event.preventDefault();
		var userID = $('#loginID').val();
		var userPW = $('#loginPW').val();
		var inputData = { "userID" : userID, 
						  "userPW" : userPW };
		
		if (userID == "" || userPW == "") {
			alert('아이디 또는 비밀번호를 입력해 주시기 바랍니다.');
			event.preventDefault();
		} else {
			$.ajax({
				url: 'member/memberLogin.php',
				type: 'post',
				dataType: 'json',
				data: inputData,
				success: function(result) {
					var result = result;
					var check = result.result;
					if(check) {
						alert(result.message);
						document.location.href=globalDomain + 'loginMain.php';
					} else {
						alert(result.message);
					}
				}	
			})
		}
	});

	//회원 정보수정
	$('#memberUpdate').submit(function(event){
		alert('come memberUpdate');
		event.preventDefault();
		var isValid = false;
		var userID = $('#updateID').val();
		var userPW = $('#updatePW').val();
		var userPWCheck = $('#updatePWCheck').val();
		var userName = $('#updateName').val();
		var userGender = $(":input:radio[name=checkGender]:checked").val();
		var inputData = {
							//공백이 있을 수 있기 때문에, trim()함수 사용
							"userID" : userID.trim(),	
							"userPW" : userPW,
							"userPWCheck" : userPWCheck,
							"userName" : userName,
							"userGender" : userGender
						};

		if (userPW == "") {
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
			var isValid = true;
			$.ajax ({
				url: 'memberUpdate.php',
				type: 'post',
				dataType: 'json',
				data: inputData,
				success: function(result) {
					var result = result;
					var isValid = result.result;
					console.log(result.message);
					if (isValid) {
						alert(result.message);
						document.location.href=globalDomain + 'loginMain.php';
					} else {
						alert(result.message);
					}
				}
			})
		}
		if (!isValid) {
			event.preventDefault();
		}
	});

	//회원 탈퇴
	$('#memberDelete').submit(function(event){
		alert('come #memberDelete');
		event.preventDefault();
		var userID = $('#deleteID').val();
		var userPW = $('#deletePW').val();
		console.log("userID : " + userID);
		console.log("userPW: " + userPW);
		var inputData = {
							//공백이 있을 수 있기 때문에, trim()함수 사용
							"userID" : userID.trim(),	
							"userPW" : userPW
						};
		if (userPW == "") {
			alert('비밀번호를 입력해 주시기 바랍니다.');
			event.preventDefault();
		} else {
			console.log("come ajax");
			$.ajax ({
				url: 'memberDelete.php',
				type: 'post',
				dataType: 'json',
				data: inputData,
				success: function(result) {
					var result = result;
					var isValid = result.result;
					console.log(result.message);
					if (isValid) {
						alert(result.message);
						document.location.href=globalDomain+'index.php';
					} else {
						alert(result.message);
					}
				}
			})
		}
	});

});







//function indexPage() {
//	indexPage11();
//}
//
//var indexPage11 = function() {
//	alert("되나");
//}

