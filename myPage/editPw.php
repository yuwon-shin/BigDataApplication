<?php
    include '../include/dbConnect.php';
    include '../include/session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Password Change</title>
<style>
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
    .font {
            color: #444444;
            font-size: 15px;
            font-weight: bold;
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
    #updateForm{
        width:100%;
        margin-left:auto;
        margin-right:auto;
    }
    #updateForm td:nth-child(1){text-align:right}

    
</style>
</head>
<body>
    
    <div class="wrap">
        <div class = container>
        
        <form id="updateForm" method="post" action="updatePw.php">
            <table align='center'>
                <thead style = "border-bottom: 1px solid #444444" >
                    <tr><td colspan = 2><h1 align="center"><font color = #444444>비밀번호 변경</font></h1></tr>
                </thead>
                <tr>
                    <td class='font'>* 기존 비밀번호&nbsp;&nbsp;</td>
                    <td><input type="password" name="originPw" style = "height:20px" size= "30" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td class='font'>새 비밀번호&nbsp;&nbsp;</td>
                    <td><input type="password" name="newPw" style = "height:20px" size= "30" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td class='font'>새 비밀번호 확인&nbsp;&nbsp;</td>
                    <td><input type="password" style = "height:20px" size= "30" name="newPw2"> </td>
                    <td></td>
                </tr>
            </table>
            <br>
            
            <div align="center">
                <button class = button type="submit" id="updatePwBtn">비밀번호 변경하기</button>

                <input class = button1 type="button" value = "회원정보 수정하기" id="updateBtn" onclick="location.href='editProfile.php';"></input>
                
            </div>
        </form>
    </div></div>


</body>
</html>