<?php
include '../include/session.php';

?>
<!DOCTYPE html>
<html lang="ko">
    <head> 
        <meta http-equiv="Content-Type"
            content="text/html; charset=UTF-8" /> 
        <title>MY Page</title>

    <style>
        table{
            border-collapse: collapse;
        }

        tr{
            padding-top: 10px;
        }
        td{
            padding-top: 10px;
        }
        img{
            border: 2px solid #868e96;
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
            height: 40px;
            width: 250px;
            font-size: 13px;
            font-style:#868e96;
            font-weight: bold;
            text-align: center;
            background-color: white;
            border: 2px solid #868e96;
            border-radius: 4px

        }

    </style>

    </head>
    <body>
    <div class = wrap>
        <div class = container>

            <table align='center'>
                <thead style = "border-bottom: 1px solid #444444" >
                    <tr><td colspan = 2><h1 align="center"><font color = #444444>마이 페이지</font></h1></tr>
                </thead>
                <tbody>
                    <tr>
                        <td width = "150" align = "center" rowspan = 3 ><img src = "../profile.png" alt = "profile" width = 100px height = 140px></td>
                        <td width = "300" align = "center"><input class = "button" type = "button"  name="myscraplist"  value = "내가 찜한 테스트 목록" onclick = "location.href= 'scrapList.php'"></td>
                    </tr>
                    <tr>
                        <td width = "300" align = "center"><input class = "button" type = "button"  name="mycomment"  value = "내가 쓴 댓글 목록" onclick = "location.href= 'commentList.php'"></td></tr>
                    <tr>
                        <td width = "300" align = "center"><input class = "button" type = "button"  name="myprofile"  value = "회원정보 수정" onclick = "location.href= 'editProfile.php'"></td></tr>
                    <tr>
                        <td align='center'><font color = #444444><b>User:&nbsp;<?=$_SESSION['ses_user']?></b></font></td>
                        <td></td>
                    </tr>
                </tbody>


            </table>

        </div>
    </div>
    </body>
</html>