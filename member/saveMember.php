<?php
include "../include/dbConnect.php";

 
 $memberEmail=$_POST['memberEmail'];
 $memberPw=$_POST['memberPw'];
 $memberPw2=$_POST['memberPw2'];
 $memberName=$_POST['memberName'];
 $memberNickName=$_POST['memberNickName'];
 ?>


<!doctype html>
<html>
<head>
	<title> Signup Confirm </title>
	<style>
        @font-face {
            font-family: 'HeirofLightBold';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_20-07@1.0/HeirofLightBold.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }
        .title {
            color: white;
            font-family: 'HeirofLightBold';
            font-size: 25px;
        }
        .wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 10%;
        }
        .container2{
        	width: 800px;
            height: 200px;
            display: flex;
            align-items: center;
            text-align: center; 	
            justify-content: center;
            background-color: black; 
            padding: 30px;
        }
        .container {
            width: 700px;
            height: 100px;
            text-align: center;
            background-color: white; 
            padding: 30px;
        }
        .button{
            height: 35px;
            width: 90px;
            font-size: 13px;
            color: white;
            text-align: center;
            background-color: black;
            border: 3px solid #373737;
            border-radius: 8px

        }
       
    </style>
</head>
<body style="background-color:#373737;">
	<div class="wrap">
		<div class="container2">
			<h3 class="title"> Sign-up Confirmation </h3> 
			<div class="container">
			 <?php

			 //이메일 중복 검사
			 $sql = "SELECT * FROM tbMemeber WHERE memberEmail = '{$memberEmail}'";
			 $res = mysqli_query($conn, $sql);
			 if($res){
			 	 echo "이미 가입된 이메일입니다.<br><br><br>"; ?>
			 	 <input class = "button" type = "button" value = "돌아가기" onclick = "location.href= './signUp.php'">
			 <?php	exit();
			 }

			//비밀번호 일치 여부 확인
			if($memberPw !== $memberPw2){
				echo "비밀번호가 일치하지 않습니다.<br><br><br>"; ?>
			 	 <input class = "button" type = "button" value = "돌아가기" onclick = "location.href= './signUp.php'">
			 <?php	exit();
			}
			else{
				$memberPw = md5($memberPw);   //비밀번호 암호화
			}

			//누락된 정보 확인
			if($memberName == '' || $memberEmail == '' || $memberPw == '' || $memberPw2 == ''){
				echo "모든 정보를 기입해주세요.<br><br><br>";?>
			 	 <input class = "button" type = "button" value = "돌아가기" onclick = "location.href= './signUp.php'">
			 <?php	exit();
			}

			//이메일 주소가 유효한지 확인
			$checkEmail = filter_var($memberEmail, FILTER_VALIDATE_EMAIL);
			if($checkEmail != true){
				echo "올바른 이메일 주소가 아닙니다.<br><br><br>";?>
			 	 <input class = "button" type = "button" value = "돌아가기" onclick = "location.href= './signUp.php'">
			 <?php	exit();
			}
			?>

			<?php


			 $sql = "insert into tbMember (memberName, memberNickName, memberEmail, memberPw) values('$memberName','$memberNickName', '$memberEmail','$memberPw')";
			 $res = mysqli_query($conn, $sql);
			 if($res){
			  echo '회원가입이 완료되었습니다. <br><br><br>';?> 
			  <input class = "button" type = "button" value = "로그인" onclick = "location.href= './main.php'">
			 <?php 
			}
			 else{
			  echo '회원가입이 제대로 되지 않았습니다. 다시 시도해주세요.<br><br><br>';?>
			 	 <input class = "button" type = "button" value = "돌아가기" onclick = "location.href= './signUp.php'">

			 <?php	
			}
			 mysqli_close($conn);

			?>
		</div>
	</div>
 

	
</div>
</body>
</html>
