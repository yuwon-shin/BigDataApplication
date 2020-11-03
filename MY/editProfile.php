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
        
        <form id="updateForm" method="post" action="<%=request.getContextPath()%>/update.me">
            <table>
                <tr>
                    <td>* 이름</td>
                    <td><input type="text" name="userName" value= "<?php echo $_SESSION['ses_user']; ?>" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>이메일</td>
                    <td><input type="email" name="email" value= "<?php echo $_SESSION['ses_email']; ?>"> </td>
                    <td></td>
                </tr>
            </table>
            <br>
            
            <div class="btns" align="center">
                <button type="submit" id="updateBtn">수정하기</button>
                
                <button type="button" id="pwdUpdateBtn" onclick="">비밀번호 변경</button>
                <button type="button" id="deleteBtn" onclick="">탈퇴하기</button>
            </div>
        </form>
    </div>


</body>
</html>