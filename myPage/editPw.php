<?php
    include '../include/dbConnect.php';

    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style>
    .outer{
        background:black;
        width:600px;
        height:500px;
        color:white;
        margin-top:50px;
        margin-left:auto;
        margin-right:auto;
    }
    #updateForm{
        width:100%;
        margin-left:auto;
        margin-right:auto;
    }
    #updateForm td:nth-child(1){text-align:right}
    #updateForm input{margin:3px}
    
    #updateBtn{background:yellowgreen;}
    #pwdUpdateBtn{background:orangered;}
    #deleteBtn{background:yellow;}
</style>
</head>
<body>
    
    <div class="outer">
        <br>
        <h2 align="center">마이페이지</h2>
        
        <form id="updateForm" method="post" action="updatePw.php">
            <table align='center'>
                <tr>
                    <td>* 기존 비밀번호</td>
                    <td><input type="password" name="originPw" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>새 비밀번호</td>
                    <td><input type="password" name="newPw" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>새 비밀번호 확인</td>
                    <td><input type="password" name="newPw2"> </td>
                    <td></td>
                </tr>
            </table>
            <br>
            
            <div class="btns" align="center">
                <button type="submit" id="updatePwBtn">비밀번호 변경하기</button>

                <input type="button" value = "회원정보 수정하기" id="updateBtn" onclick="location.href='editProfile.php';"></input>
                
            </div>
        </form>
    </div>


</body>
</html>