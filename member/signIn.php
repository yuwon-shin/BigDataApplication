<?php
    include "../include/session.php";
    include "../include/dbConnect.php"; 

    $memberEmail = $_POST['memberEmail'];
    $memberPw = md5($memberPw = $_POST['memberPw']);
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
       
    </style>
</head>

<body style="background-color:#373737;">
    <div class="wrap">
        <div class="container2">
            <h3 class="title"> Log in </h3> 
            <div class="container">
            <?php
                $sql = "SELECT * FROM tbMember WHERE memberEmail = '{$memberEmail}' AND memberPw = '{$memberPw}'";

                $res = $conn->query($sql);

                    $row = $res->fetch_array(MYSQLI_ASSOC);


                    if ($row != null) {
                        $_SESSION['ses_user'] = $row['memberNickName'];
                        $_SESSION['ses_index'] = $row['memberIdx'];
                        $_SESSION['ses_email'] = $row['memberEmail'];
                        echo '<br>';
                        echo $_SESSION['ses_user'].'님 안녕하세요.<br><br><br>';
                        echo '<input type = "button" value = "메인페이지로 이동" onclick = "location.href= \'../mainPage/index.php\'"> <br><br>';
                        echo '<input type = "button" value = "로그아웃" onclick = "location.href= \'./signOut.php\'">';
                    }

                    if($row == null){
                        echo '<br>[로그인 실패] 아이디와 비밀번호가 일치하지 않습니다.<br><br><br><br><br>';
                        echo '<input type = "button" value = "돌아가기" onclick = "location.href= \'./main.php\'">';
                    }
            ?>
            </div>
        </div>
    </div>
</body>
</html>


