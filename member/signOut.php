<?php
    include "../include/session.php";
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
            font-size: 40px;
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
            height: 150px;
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
            <h3 class="title"> Log out </h3> 
            <div class="container">
				<?php
					echo '<br>';
				    echo $_SESSION['ses_user'].'님 로그아웃 하겠습니다.<br><br><br><br>';

				    if($_SESSION['ses_user']){
				    	unset($_SESSION['ses_user']);
				        echo "<script> alert('로그아웃 완료'); self.close(); </script>";
				        
				    }?> 
                    <input class = "button" type = "button" value = "메인페이지" onclick = "location.href= '../mainPage/index.php'">
				
			</div>
		</div>
	</div>
</body>
</html>