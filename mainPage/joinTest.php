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
    <head>
        <title>Join Test <?=$testIdx?></title>
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
            .button{
                width: 400px;
                height: 23px;
                text-align: center;
                margin: auto;

            }
            .button0{
                height: 32px;
                width: 32px;
                font-size: 20px;
                text-align: center;
                color:red;
                margin-bottom: 5px;
                background: 0;
                border: 0;
                border-radius: 4px;
                outline: 0;
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
            height: 25px;
            text-align: center;
            margin-top:8px;
            }
            .button3{
            height: 32px;
            width: 120px;
            font-size: 13px;
            text-align: center;
            margin-bottom: 5px;
            background-color: white;
            border: 2px solid black;
            border-radius: 4px

            }
            .button4{
                height: 37px;
                width: 120px;
                font-size: 15px;
                text-align: center;
                background-color: #ccc;
                border: 2.5px solid black;
                border-radius: 10px
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
                width: 1200px;
                text-align: center;
                background-color: #f1f3f5;
                border: 4px solid #adb5bd;
                border-radius: 10px;
                padding: 30px;
            }
            .container1 {
                width: 1000px;
                text-align: center;
                background-color: white;
                border: 4px solid #868e96;
                border-radius: 10px;
                padding: 30px;
                margin-left:70px;
            }
        </style>
    </head>

        <h1 class  = "title" align = center><?=$title?><br></h1>
         

        <h3 align = center>- <?=$content?> -<br></h3>
        <h4 align="right" style = "padding-right: 7%">[Category] <?=$category?></h4>
        <form method = "post" action = "./saveAnswer.php">
            <table style = "padding-top:20px" align = center>
                <thead>
                    <tr>
                        <td height=50 width = "120" align="center" bgcolor=#ccc><font color=white >문항번호</font></td>
                        <td height=50 width = "600" align = "center" bgcolor=#ccc><font color=white>문항</font></td>
                        <td height=50 width = "170" align = "center" bgcolor=#ccc><font color=white></font></td>
                        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>1</font></td>
                        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>2</font></td>
                        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>3</font></td>
                        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>4</font></td>
                        <td height=50  width = "50" align = "center" bgcolor=#ccc><font color=white>5</font></td>
                        <td height=50 width = "170" align = "center" bgcolor=#ccc><font color=white></font></td>
                    </tr>
                </thead>

            <tbody>
                
                <?php
                    $i=1; 

                    while($i < 11){
                        ?>
                        <tr>
                            <td height=30 width = "120" align = "center"><?php echo $i?></td>
                            <td height=30 width = "600" align = "center"><?php echo $rows['question'.$i]?></td>
                            <td height=30 width = "170" align = "center"><?php echo $rows['label'.$i.'_1']?></td>
                            <td height=30 width = "50" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "1" ></td>
                            <td height=30 width = "50" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "2"></td>
                            <td height=30 width = "50" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "3"></td>
                            <td height=30 width = "50" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "4"></td>
                            <td height=30 width = "50" align = "center"><input type = "radio" name = "answer<?php echo $i;?>" value = "5"></td>
                            <td height=30 width = "170" align = "center"><?php echo $rows['label'.$i.'_5']?></td>
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
            <div class = "button" style = "padding-top: 10px">
            <?php
                if(isset($_SESSION['ses_user'])){ ?>

                        <input class = "button1" type = "submit" value = "등록하기" >

            <?php }?>
            </div>
        </form>

        <?php 
            $query5 = "SELECT testIdx, case when tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as memberMatch FROM tbTest";
            $res5 = mysqli_query($conn, $query5);
            ?>

        <!--테스트 목록으로/수정하기/삭제하기 버튼-->
    <div class = "button">
        <?php
        while($rows5 = mysqli_fetch_assoc($res5)){
            if($testIdx==$rows5['testIdx'] && $rows5['memberMatch']){
        ?>
            <br><button class = "button1" style = "margin-right: 6px" onclick = "location.href = './index.php'">목록으로</button>
                <button class = "button1" style = "margin-right: 6px" onclick = "location.href = './edit.php?testIdx=<?php echo $rows['testIdx']?>'">수정하기</button>
                <button class = "button1"  onclick = "location.href = './delete.php?testIdx=<?php echo $rows['testIdx']?>'">삭제하기</button>
        <?php break;}
        elseif ($testIdx==$rows5['testIdx'] && !($rows5['memberMatch'])){ ?>
            <br><button class = "button1" onclick = "location.href = './index.php'">목록으로</button>

        <?php break;}
        }?>
        </div>

    
        <br><br>

        <!--비슷한 테스트 추천 부분-->


        <div class = text>
            <?php
            if(isset($_SESSION['ses_user'])){
            ?>
        </div>

        <?php
        $query4 = "select t.testIdx, t.testTitle,t.testCategory,t.hit, tbnew.answerNm  from (
                    select a.tbTest_testIdx, count(a.answerIdx) as answerNm from (select answerIdx,tbTest_testIdx,tbMember_memberIdx from tbAnswer
                    where tbTest_testIdx = $testIdx) as testMember
                    left outer join tbAnswer a
                    on testMember.tbMember_memberIdx = a.tbMember_memberIdx
                    where a.tbMember_memberIdx!={$_SESSION['ses_index']} and a.tbTest_testIdx!=$testIdx
                    group by a.tbTest_testIdx
                    order by answerNm desc) as tbnew
                    left outer join tbTest t
                    on t.testIdx=tbnew.tbTest_testIdx;";
        $res5 = mysqli_query($conn, $query4);

        ?>



            <div class = wrap>
                <div class = container>

                    <h2><font color = #495057><b>&nbsp;&nbsp;[비슷한 테스트 추천]</b></font></h2><br>
                    <h3 align = left><font color = #868e96><b>&nbsp;&nbsp;&nbsp;&nbsp;이 테스트를 응답한 사람들은 어떤 테스트를 응답했을까?</b></font></h3>
                    <div class = container1 >
                        <table  algin = center>
                            <thead>
                            <tr style = "border-bottom: 2px solid #444444">
                                <td width = "100" align="center" style = "background: #efefef"><b>Ranking</b></td>
                                <td width = "80" align = "center">번호</td>
                                <td width = "250" align = "center">제목</td>
                                <td width = "100" align = "center">카테고리</td>
                                <td width = "100" align = "center">조회수</td>
                                <td width = "100" align = "center">응답수</td>
                                <td width = "150" align = "center">찜</td>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i = 0;
                            while($rows5 = mysqli_fetch_assoc($res5)){
                                $i++;

                                ?>  <tr>
                                    <td width = "100" align = "center" style = "background: #efefef"><b>Top <?=$i?></b></td>
                                    <td width = "80" align = "center"><?php echo $rows5['testIdx']?></td>
                                    <td width = "250" align = "center"><?php echo $rows5['testTitle']?></td>
                                    <td width = "100" align = "center"><?php echo $rows5['testCategory']?></td>
                                    <td width = "100" align = "center"><?php echo $rows5['hit']?></td>
                                    <td width = "100" align = "center"><?php echo $rows5['answerNm']?></td>
                                    <td width = "150" align = "center"><input class = "button3" type = "button"  name="joinTest"  value = "테스트 참여하기" onclick = "location.href= 'joinTest.php?testIdx=<?php echo $rows5['testIdx']?>'"></td>
                                </tr>
                            <?php    }
                            ?>
                            </tbody>
                        </table>
                    </div><br>


                    </tbody>
                    </table>
                </div><br>

            </div>
            </div><br><br>
        <?php
        } ?>




        <?php
        //댓글 작성 부분
        if(isset($_SESSION['ses_user'])){ ?>
            <h3 align = left style = "padding-left: 10%"><b>[댓글 작성]</b></h3>

            <form action="comment.php?testIdx=<?php echo $testIdx?>" method="post">
            <table align = center width = 1300>
                <tr>
                <td align = center width = 100>
                    <b><?=$_SESSION['ses_user']?></b></td>
                <td><input type="hidden" name="comment" value="insert">
                    <input type="text"  style = "height:20px" size=" 140" name="inputcomment"></td>
                <td align = right style = "padding-right: 3%" width = 200><input class = button4 type="submit" name="submit" value="댓글 등록하기"></td>
                </tr>
            </table>
            <br><br>

            </form>
        <?php
        } ?>






        <!--댓글 목록 부분-->
        <div style = "margin-top: 20px"  align = center>
            <?php
            $query = "select * from tbComment where tbTest_testIdx= '".$testIdx."' order by commentIdx";
            $res = mysqli_query($conn, $query);

            //댓글 좋아요 수
            $query0 = "select commentIdx, count(sc.tbComment_commentIdx) as cnt from tbComment as t 
                    left outer join tbComLike as sc on t.commentIdx=sc.tbComment_commentIdx where t.tbTest_testIdx='".$testIdx."'
                    group by commentIdx  order by t.commentIdx ;";
            $res0 = mysqli_query($conn, $query0);

            //댓글 작성자 닉네임
            $query1 ="select a.commentIdx, a.tbMember_memberIdx, b.memberNickName from tbComment a INNER JOIN tbMember b ON a.tbMember_memberIdx = b.memberIdx where tbTest_testIdx= '".$testIdx."' order by commentIdx";
            $res1= mysqli_query($conn, $query1);

            //댓글 작성 여부
            $query2 = "select commentIdx, case when tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as tbMember_memberIdx
                    FROM tbComment where tbTest_testIdx= '".$testIdx."' order by commentIdx";
            $res2 = mysqli_query($conn, $query2);

            //댓글 좋아요 여부
            $query3 = "select commentIdx, MAX(comLikeYN) comLikeYN from
                    (SELECT
                    t.commentIdx
                    , case when sc.tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as comLikeYN
                    FROM tbComment t
                    left outer join tbComLike sc on t.commentIdx = sc.tbComment_commentIdx where tbTest_testIdx= '".$testIdx."' order by commentIdx) a group by commentIdx";
            $res3 = mysqli_query($conn, $query3);
            ?>

            <table align = center width = 1300>
                <thead>
                    <tr>
                        <td height=30 width = "200" align="center" bgcolor=#ccc><font color=white >등록 날짜</font></td>
                        <td height=30 width = "700" align="center" bgcolor=#ccc><font color=white >댓글</font></td>
                        <td height=30 width = "100" align="center" bgcolor=#ccc><font color=white >작성자</font></td>
                        <td height=30 width = "100" align="center" bgcolor=#ccc><font color=white >좋아요 수</font></td>
                        <td height=30 width = "150" align="center" bgcolor=#ccc><font color=white >좋아요</font></td>
                        <td height=30 width = "50" align="center" bgcolor=#ccc><font color=white >&nbsp;&nbsp;</font></td>
                    </tr>
                </thead>
                <tbody>
            <?php
            if($res){
            
                while($rows=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                 ?> 
                
                    <tr>
                        <td width = "200" align = "center"><?php echo $rows['commentDate']?></td>
                        <td height=20 width = "700" align = "center"><?php echo $rows['commentCont']?></td>
                        <?php
                            while($rows1=mysqli_fetch_array($res1,MYSQLI_ASSOC)){
                        ?>
                        <td width = "100" align = "center"><?php echo $rows1['memberNickName']?></td>
                        <?php
                        break; }
                        ?>

                        <?php
                            while($rows0=mysqli_fetch_array($res0,MYSQLI_ASSOC)){
                        ?>
                        <td  width = "100" align = "center"><?php echo $rows0['cnt']?></td>
                        <?php
                        break; }
                        ?>

                        <?php
                        //댓글 좋아요하기
                        while($rows3=mysqli_fetch_array($res3,MYSQLI_ASSOC)){

                        if(isset($_SESSION['ses_user'])){
                        if ($rows3['comLikeYN']){ ?>
                        <td width = "150" align = "center"><form action = 'comment.php?testIdx=<?php echo $testIdx?>&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                            <input class = "button0"  style = "margin-top: 10px" height = 80% width = 80% type="submit" name="comment" value = "❤" >
                        </form></td>

                        <?php
                        }else{?>
                        <td width = "150" align = "center"><form action = 'comment.php?testIdx=<?php echo $testIdx?>&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                            <input class = "button0" style = "margin-top: 10px" height = 80% width = 80% type = "submit" name="comment"  value = "♡">
                        </form></td>
                        <?php
                        }  
                        }else{  ?>
                            <td  width = "150" align = "center"><form action = 'comment.php?testIdx=<?php echo $testIdx?>&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                            <input class = "button0" style = "margin-top: 10px" height = 80% width = 80% type = "submit" name="comment"  value = "♡" disabled>
                        </form></td>
                        <?php
                        }
                        break;
                        }
                        ?>

                        <?php
                        while($rows2=mysqli_fetch_array($res2, MYSQLI_ASSOC)){
                        if(isset($_SESSION['ses_user'])){    
                        if ($rows2['tbMember_memberIdx']==1){?>
                            <!--삭제 버튼-->
                            <td width = "50" align = "center"><form action = 'comment.php?testIdx=<?php echo $testIdx?>&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                                <input type="hidden" name="comment" value="delete">
                                <input class = "button6" style = "margin-top: 10px" height = 80% width = 80% type="submit" name="comment" value = "x" >
                            </form></td>
                    <?php
                        }
                    }else{  ?>

                        <td width = "50" align = "center"><form action = 'comment.php?testIdx=<?php echo $testIdx?>&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                                <input type="hidden" name="comment" value="delete">
                                <input class = "button6" style = "margin-top: 10px" height = 80% width = 80% type="submit" name="comment" value = "x" disabled>
                            </form></td>
                    <?php }
                        break;
                    } ?>
                    </tr>                            
             <?php   } ?>
                </tbody>
            <?php 
            }
            ?>
        </table>
        </div>
        <br><br>
        <?php
            mysqli_free_result($res);
            mysqli_close($conn)
        ?>



</body>
</html>


