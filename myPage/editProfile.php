<?php
    include '../include/dbConnect.php';

    session_start();

    $sql = "select * from tbMember where memberIdx={$_SESSION['ses_index']}";
    $res = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);

    $_SESSION['ses_user'] = $row['memberNickName'];
    $_SESSION['ses_name'] = $row['memberName'];
    $_SESSION['ses_sex'] = $row['memberSex'];
    $_SESSION['ses_age'] = $row['memberAge'];
    $_SESSION['ses_job'] = $row['memberJob'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title> Log-in / Sign-up </title>
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
            font-size: 48px;
        }
        .wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 10%;
        }
        .container {
            width: 700px;
            height: 400px;
            text-align: center;
            background-color: black;
            padding: 30px;
        }

        .button{
            height: 35px;
            width: 90px;
            font-size: 13px;
            color: white;
            text-align: center;
            margin-top: 30px;
            background-color: #373737;
            border: 3px solid #efefef;
            border-radius: 4px

        }
        .font {
            color: white;
            font-size: 18px;
            font-family: 'HeirofLightBold';
        }
    </style>
</head>
<body>
    
    <div class="container">
        <br>
        <h2 class='title' align="center">마이페이지</h2>
        
        <form id="updateForm" method="post" action="updateProfile.php">
            <table align='center'>
                <tr>
                    <td class='font'>* 이름</td>
                    <td><input type="text" name="userName" value= "<?php echo $_SESSION['ses_name']; ?>" required></td>
                </tr>
                <tr>
                    <td class='font'>닉네임</td>
                    <td><input type="text" name="userNickName" value= "<?php echo $_SESSION['ses_user']; ?>" required></td>
                </tr>
                <tr>
                    <td class='font'>성별</td>
                    <td><label><font color = white>여성</font><input type="radio" name = "userSex" value = "여성"></label>
                        <label><font color = white>&nbsp;남성</font><input type="radio" name = "userSex" value = "남성"></label></td>
                </tr>
                <tr>
                    <td class='font'>나이</td>
                    <td><input type="text" name="userAge" value= "<?php echo $_SESSION['ses_age']; ?>" required></td>
                </tr>
                <tr>
                    <td class='font'>관심계열</td>
                    <td><label><font color = white>이공계열</font><input type="radio" name = "userJob" value = "이공계열"></label>
                        <label><font color = white>&nbsp;인문계열</font><input type="radio" name = "userJob" value = "인문계열"></label>
                        <label><font color = white>&nbsp;사회계열</font><input type="radio" name = "userJob" value = "사회계열"></label>
                        <label><font color = white>&nbsp;의약계열</font><input type="radio" name = "userJob" value = "의약계열"></label><br>
                        <label><font color = white>예체능계열</font><input type="radio" name = "userJob" value = "예체능계열"></label>
                        <label><font color = white>&nbsp;교육계열</font><input type="radio" name = "userJob" value = "교육계열"></label>
                        <label><font color = white>&nbsp;직장인</font><input type="radio" name = "userJob" value = "직장인"></label>
                    </td>
                </tr>
            

                
            </table>

            <br>
            
            <div class="btns" align="center">
                <button type="submit" id="updateBtn">수정하기</button>
                
                <input type="button" value = "비밀번호 변경" id="pwdUpdateBtn" onclick="location.href='editPw.php';"></input>

                <input type="button" value = "탈퇴하기" id="deleteMemberBtn" onclick="location.href='deleteMember.php';"></input>
            </div>
        </form>
    </div>


</body>
</html>