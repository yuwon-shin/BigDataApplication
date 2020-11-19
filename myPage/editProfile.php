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
    <title> My Info </title>
    <style>
        table{
            border-collapse: collapse;
        }

        tr{
            padding-top: 10px;
            align-content: center;
        }
        td{
            padding-top: 10px;
            padding-left: 10px;
            align-content: center;
        }
        .wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 40px;
            align-self: auto;
        }
        .container {
            width: 600px;
            text-align: center;
            background-color: #f1f3f5;
            border: 4px solid #adb5bd;
            border-radius: 10px;
            padding: 30px;
        }
        .button{
            height: 35px;
            width: 130px;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
            background-color: white;
            border: 2px solid #868e96;
            border-radius: 4px

        }
        .button1{
            height: 35px;
            width: 130px;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
            background-color: #adb5bd;
            border: 2px solid #868e96;
            border-radius: 4px

        }
        .font {
            color: #444444;
            font-size: 18px;
            font-weight: bold;
        }
        .font1 {
            color: #444444;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class = wrap>
        <div class = container>
       
        <form id="updateForm" method="post" action="updateProfile.php">
            <table align='center'>
                <thead style = "border-bottom: 1px solid #444444">
                    <tr><td colspan = 2><h1 align="center"><font color = #444444>나의 정보</font></h1></td></tr>
                </thead>
                <tr>
                    <td width = 100 style = "border-right: 1px solid #444444" class = 'font' align = right>* 이름&nbsp;&nbsp;</td>
                    <td><input type="text" name="userName"style = "height:20px" size= "40"value= "<?php echo $_SESSION['ses_name']; ?>" required></td>
                </tr>
                <tr>
                    <td width = 100 style = "border-right: 1px solid #444444" class='font' align = right>닉네임&nbsp;&nbsp;</td>
                    <td><input type="text" name="userNickName" style = "height:20px" size= "40" value= "<?php echo $_SESSION['ses_user']; ?>" required></td>
                </tr>
                <tr>
                    <td width = 100 style = "border-right: 1px solid #444444"  class='font' align = right>성별&nbsp;&nbsp;</td>

                    <td class = 'font1'><label>여성<input type="radio" name = "userSex" value = "여성" <?php if (isset($_SESSION['ses_sex']) && $_SESSION['ses_sex'] == '여성'): ?>checked='checked'<?php endif; ?> /></label>
                        <label>&nbsp;남성<input type="radio" name = "userSex" value = "남성" <?php if (isset($_SESSION['ses_sex']) && $_SESSION['ses_sex'] == '남성'): ?>checked='checked'<?php endif; ?>></label></td>
                </tr>
                <tr>
                    <td width = 100 style = "border-right: 1px solid #444444" class='font' align = right>나이&nbsp;&nbsp;</td>
                    <td><input type="text" name="userAge" style = "height:20px" size= "40" value= "<?php echo $_SESSION['ses_age']; ?>" required></td>
                </tr>
                <tr>
                    <td width = 100 style = "border-right: 1px solid #444444" class='font' align = right>관심계열&nbsp;&nbsp;</td>
                    <td class='font1'><label>이공계열<input type="radio" name = "userJob" value = "이공계열" <?php if (isset($_SESSION['ses_job']) && $_SESSION['ses_job'] == '이공계열'): ?>checked='checked'<?php endif; ?>></label>
                        <label>&nbsp;인문계열<input type="radio" name = "userJob" value = "인문계열" <?php if (isset($_SESSION['ses_job']) && $_SESSION['ses_job'] == '인문계열'): ?>checked='checked'<?php endif; ?>></label>
                        <label>&nbsp;사회계열<input type="radio" name = "userJob" value = "사회계열" <?php if (isset($_SESSION['ses_job']) && $_SESSION['ses_job'] == '사회계열'): ?>checked='checked'<?php endif; ?>></label>
                        <label>&nbsp;의약계열<input type="radio" name = "userJob" value = "의약계열" <?php if (isset($_SESSION['ses_job']) && $_SESSION['ses_job'] == '의약계열'): ?>checked='checked'<?php endif; ?>></label><br>
                        <label>예체능계열<input type="radio" name = "userJob" value = "예체능계열" <?php if (isset($_SESSION['ses_job']) && $_SESSION['ses_job'] == '예체능계열'): ?>checked='checked'<?php endif; ?>></label>
                        <label>&nbsp;교육계열<input type="radio" name = "userJob" value = "교육계열" <?php if (isset($_SESSION['ses_job']) && $_SESSION['ses_job'] == '교육계열'): ?>checked='checked'<?php endif; ?>></label>
                        <label>&nbsp;직장인<input type="radio" name = "userJob" value = "직장인" <?php if (isset($_SESSION['ses_job']) && $_SESSION['ses_job'] == '직장인'): ?>checked='checked'<?php endif; ?>></label>
                    </td>
                </tr>
            

                
            </table>

            <br>
            
            <div align="center">
                <button class = button type="submit" id="updateBtn">수정하기</button>
                
                <input class = button type="button" value = "비밀번호 변경" id="pwdUpdateBtn" onclick="location.href='editPw.php';"></input>

                <input class = button1 type="button" value = "탈퇴하기" id="deleteMemberBtn" onclick="location.href='deleteMember.php';"></input>
            </div>
        </form>
    </div>
</div>
</body>
</html>