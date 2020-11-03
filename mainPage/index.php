<?php
    include '../include/dbConnect.php';
    include '../include/session.php';
?>

<!DOCTYPE html>
<html lang="ko">
    <div align = right>
    <?php
        if(isset($_SESSION['ses_user'])){
        echo '<br>';
        echo $_SESSION['ses_user'].'님 안녕하세요 <br>';
        echo '<input type = "button" value = "마이페이지" onclick = "location.href= \'../member/myPage.php\'"><br>';    
        echo '<input type = "button" value = "로그아웃" onclick = "location.href= \'../member/signOut.php\'">';        
        }
        else{
            echo '<br>';
            echo '<input type = "button" value = "로그인/회원가입" onclick = "location.href= \'../member/main.php\'">';

        }
    ?>
    </div>
    <head> 
        <meta http-equiv="Content-Type"
            content="text/html; charset=UTF-8" /> 
        <title>Main Page</title>
        <style>
        table{
            border-top: 1px solid #444444;
            border-collapse: collapse;
        }
        tr{
            border-bottom: 1px solid #444444;
            padding: 10px;
        }
        td{
            border-bottom: 1px solid #efefef;
            padding: 10px;
        }
        table .even{
            background: #efefef;
        }
        .text {
            font-size: 15px;
            padding-top:20px;
            text-align:center;
        }
        .text:hover{
            text-decoration: underline;
        }
        a:link {color : black; text-decoration:none;}
        a:hover { text-decoration : underline;}

        </style>
    </head>

    <body>
        <h1 align = center>Main Page <br><br></h1>
        
            <?php 
            $query = "SELECT `testIdx`, `testDate`, `testTitle`, `testCategory`, `hit`,`tbMember_memberIdx` FROM `tbtest` order by testIdx ";
            $res = mysqli_query($conn,$query);
            $total = mysqli_num_rows($res);
            ?>

            <?php

            $query1 = "select b.testIdx, count(a.tbTest_testIdx) as cnt from tbTestScrap  a RIGHT JOIN tbtest b ON a.tbTest_testIdx = b.testIdx group by tbTest_testIdx order by b.testIdx";
            $res2 = mysqli_query($conn, $query1);
            ?>

            <?php

            $query2 = "select a.testIdx, a.tbMember_memberIdx, b.memberNickName from tbtest a INNER JOIN tbMember b ON a.tbMember_memberIdx = b.memberIdx order by a.testIdx";
            $res3 = mysqli_query($conn, $query2);
            ?>

        <h2 align = center> 설문조사 LIST </h2>
        <table align = center>
            <thead align = "center">
            <tr>
                <td width = "50" align="center">번호</td>
                <td width = "400" align = "center">제목</td>
                <td width = "100" align = "center">카테고리</td>
                <td width = "100" align = "center">작성자</td>
                <td width = "200" align = "center">날짜</td>
                <td width = "50" align = "center">조회수</td>
                <td width = "80" align = "center">테스트찜</td>
            </tr>
            </thead>

            <tbody>
            <?php


        		if($res){
                while($rows=mysqli_fetch_array($res,MYSQLI_ASSOC)){

                    if($total%2==0){
            ?>        <tr class = "even">
            <?php   }
                    else{
            ?>        <tr>
                    <?php } ?>

                <td width = "50" align = "center"><?php echo $rows['testIdx']?></td>
                <td width = "500" align = "center">
                <a href = "joinTest.php?testIdx =<?php echo $rows['testIdx']?>">
                <?php echo $rows['testTitle']?></a></td>
                <td width = "100" align = "center"><?php echo $rows['testCategory']?></td>

                <?php
               while($rows3=mysqli_fetch_array($res3,MYSQLI_ASSOC)){
               
                    ?>
                <td width = "100" align = "center"><?php echo $rows3['memberNickName']?></td>

                <?php
                    break;
                }
                ?>
                <td width = "200" align = "center"><?php echo $rows['testDate']?></td>
                <td width = "50" align = "center"><?php echo $rows['hit']?></td>
                
                <?php
               while($rows2=mysqli_fetch_array($res2,MYSQLI_ASSOC)){
               
                    ?>
                <td width = "80" align = "center"><?php echo $rows2['cnt']?></td></tr>
                <?php
                   break;
                    }
                $total--;

                }
                }
                ?>
            </tbody>
        </table>

        <?php
        	mysqli_free_result($res);
            mysqli_free_result($res2);
        	mysqli_close($conn)
        ?>

    <div class = text>
        <?php
        if(isset($_SESSION['ses_user'])){
            ?>
        <font style = "cursor: pointer" onclick = "location.href= 'newTest.php'">테스트 만들기</font>
        <?php
        }?>
    </div>

    </body>
</html>