<?php
    include '../include/dbConnect.php';
    include '../include/session.php';
    $testIdx = $_GET['testIdx'];

    if(!isset($_SESSION['ses_user'])){
        ?>
        <script>
            alert("<?php echo "답변을 등록하시려면 로그인을 해주세요."?>");
        </script>
        <div align = right style="padding-right: 40px">
            <div class = "button2" ><br>
            <input class = "button3" align = "right" type = "button" value = "로그인" onclick = "location.href= '../member/main.php'"></div></div>
    <?php          
     }
    ?>

<?php 
    $query = "SELECT * FROM tbtest where testIdx = $testIdx";
    $res = mysqli_query($conn,$query);
    $rows=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="ko">
        <?php 
            $title = $rows['testTitle'];
            $content = $rows['testContent'];
            $category = $rows['testCategory'];
            $hit = "update tbtest set hit = hit+1 where testIdx = $testIdx";
            mysqli_query($conn,$hit)
//            $user = $_SESSION['ses_user'];
         ?>
    <head > 
        <title>Join Test <?=$testIdx?></title>
        <style>
            .button{
                width: 700px;
                height: 30px;
                text-align: center;
                margin: auto;
                margin-top:20px;
            }
            .button1{
                height: 40px;
                width: 100px;
                font-size: 18px;
                text-align: center;
                background-color: white;
                border: 2px solid black;
                border-radius: 10px
            }
            .button2{
            width: 100px;
            height: 20px;
            text-align: center;
            margin-top:8px;
            }
            .button3{
            height: 25px;
            width: 90px;
            font-size: 13px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 4px

        }
        </style>
    </head>

        <h1 class  = "title" align = center><?=$title?><br></h1>
         

        <h3 align = center>- <?=$content?> -<br></h3>
        <h4 align="right" style = "padding-right: 50px">[Category] <?=$category?></h4>
        <form method = "post" action = "./saveAnswer.php">
            <table style = "padding-top:20px" align = center>
                <thead>
                    <tr>
                        <td height=50 width = "120" align="center" bgcolor=#ccc><font color=white >문항번호</font></td>
                        <td height=50 width = "700" align = "center" bgcolor=#ccc><font color=white>문항</font></td>
                        <td height=50 width = "70" align = "center" bgcolor=#ccc><font color=white>1</font></td>
                        <td height=50 width = "70" align = "center" bgcolor=#ccc><font color=white>2</font></td>
                        <td height=50 width = "70" align = "center" bgcolor=#ccc><font color=white>3</font></td>
                        <td height=50 width = "70" align = "center" bgcolor=#ccc><font color=white>4</font></td>
                        <td height=50  width = "70" align = "center" bgcolor=#ccc><font color=white>5</font></td>
                    </tr>
                </thead>

            <tbody>
                
                <?php
                    $i=1; 

                    while($i < 11){
                        ?>
                        <tr>
                            <td height=30 width = "120" align = "center"><?php echo $i?></td>
                            <td height=30 width = "700" align = "center"><?php echo $rows['question'.$i]?></td>
                            <td height=30 width = "70" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "1" ></td>
                            <td height=30 width = "70" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "2"></td>
                            <td height=30 width = "70" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "3"></td>
                            <td height=30 width = "70" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "4"></td>
                            <td height=30 width = "70" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "5"></td>
                        </tr>
                <?php
                    $i++;
                    }
                ?>
                </tbody>
            </table>
            
            <input type = "hidden" name = "time" value = "<?=$time = date("Y-m-d H:i:s",time())?>">
            <input type = "hidden" name = "member" value = "<?=$_SESSION['ses_user']?>">
            <input type = "hidden" name = "testIdx" value = "<?=$testIdx?>">
            <div class = "button" align = "center">
            <?php
                if(isset($_SESSION['ses_user'])){ ?>

                        <input class = "button1" type = "submit" value = "등록하기" >

            <?php }?>

        </form>

            <button class = "button1" onclick = "location.href = './index.php'">목록으로</button>

        <p></p>



        <form action="comment.php?testIdx=<?php echo $testIdx?>" method="post">
            <input type="text" name="writeComment">
            <p><input type="submit" name="submit" value="댓글 등록하기"></p>
        </form>


        <div>
            <?php
            $query = "select * from tbComment";
            $res = mysqli_query($conn, $query);

            $query1 ="select a.commentIdx, a.tbMember_memberIdx, b.memberNickName from tbComment a INNER JOIN tbMember b ON a.tbMember_memberIdx = b.memberIdx";
            $res1= mysqli_query($conn, $query1);

            if($res){
                while($rows=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                    echo "<p></p>등록 날짜 :".$rows['commentDate'];
                    echo "<p></p>".$rows['commentCont'];
                    echo "<p></p> 좋아요 수 :".$rows['commentLikeNum'];
                    ?>
                    <?php

                    while($rows1=mysqli_fetch_array($res1,MYSQLI_ASSOC)){
                        echo "<p></p>작성자 :".$rows1['memberNickName'];
                        echo "<br><br><br> ";
                        break;
                    }
                }
            }
            ?>

        </div>
            
        <?php
            mysqli_free_result($res);
            mysqli_close($conn)
        ?>



</body>
</html>


