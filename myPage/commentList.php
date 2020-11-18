<?php
    include '../include/dbConnect.php';

    session_start();
?>

<!DOCTYPE html>
<html lang="ko">
    <head> 
        <meta http-equiv="Content-Type"
            content="text/html; charset=UTF-8" />

        <title>MY</title>

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
            .button{
                width: 100px;
                height: 20px;
                text-align: center;
                margin-top:8px;
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
                height: 32px;
                width: 90px;
                font-size: 13px;
                text-align: center;
                margin-bottom: 5px;
                background-color: white;
                border: 2px solid black;
                border-radius: 4px

            }
            .button2{
                height: 30px;
                width: 120px;
                font-size: 13px;
                text-align: center;
                margin-bottom: 5px;
                background-color: white;
                border: 2px solid black;
                border-radius: 4px

            }
            .text {
                font-size: 15px;
                padding-top:20px;
                text-align:center;
            }
            .text:hover{
                text-decoration: underline;
            }

            .heart {
                width: 500px;
                height: 500px;
                background: #ea2027;
                position: relative;
                transform: rotate(45deg);
            }
            .heart::before,
            .heart::after {
                content: "";
                width: 500px;
                height: 500px;
                position: absolute;
                border-radius: 50%;
                background: #ea2027;
            }
            .heart::before {
                left: -50%;
            }
            .heart::after {
                top: -50%;
            }

            a:link {color : black; text-decoration:none;}
            a:hover { text-decoration : underline;}

        </style>

    </head>
    <body>
        <h1 align="center">내가 쓴 댓글 목록</h1>


            <div style = "margin-top: 20px"  align = center>
                <?php
                $query = "select c.tbTest_testIdx, t.testTitle ,c.commentIdx,c.commentCont,c.commentDate
                        , case when c.tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as tbMember_memberIdx
                        , count(cl.comLikeIdx) as cnt,m.memberNickName 
                        from tbComment c
                        left outer join tbMember m
                        on c.tbMember_memberIdx = m.memberIdx 
                        left outer join tbComLike cl on c.commentIdx = cl.tbComment_commentIdx
                        left outer join tbTest t on c.tbTest_testIdx = t.testIdx
                        where c.tbMember_memberIdx={$_SESSION['ses_index']}
                        group by commentIdx
                        order by commentIdx;";
                $res = mysqli_query($conn, $query);


                //댓글 좋아요 여부
                $query3 = "select commentIdx, MAX(comLikeYN) comLikeYN from
                            (SELECT
                            t.commentIdx
                            , case when sc.tbMember_memberIdx = '".$_SESSION['ses_index']."' then 1 else 0 end as comLikeYN
                            FROM tbComment t
                            left outer join tbComLike sc on t.commentIdx = sc.tbComment_commentIdx 
                            where t.tbMember_memberIdx='".$_SESSION['ses_index']."' order by commentIdx) a group by commentIdx;";
                $res3 = mysqli_query($conn, $query3);
                ?>

                <table align = center width = 1300>
                    <thead>
                    <tr>
                        <td height=30 width = "200" align="center" bgcolor=#ccc><font color=white >테스트</font></td>
                        <td height=30 width = "200" align="center" bgcolor=#ccc><font color=white >등록 날짜</font></td>
                        <td height=30 width = "700" align="center" bgcolor=#ccc><font color=white >댓글</font></td>
                        <td height=30 width = "100" align="center" bgcolor=#ccc><font color=white >작성자</font></td>
                        <td height=30 width = "100" align="center" bgcolor=#ccc><font color=white >좋아요수</font></td>
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
                            <!--테스트-->
                            <td width = "200" align = "center">
                                <a href = "../mainPage/joinTest.php?testIdx=<?php echo $rows['tbTest_testIdx']?>">
                                <?php echo $rows['testTitle']?>
                            </td>

                            <!--댓글 등록 날짜-->
                            <td width = "200" align = "center"><?php echo $rows['commentDate']?></td>

                            <!--댓글 내용-->
                            <td height=20 width = "700" align = "center"><?php echo $rows['commentCont']?></td>

                            <!--작성자 닉네임-->
                            <td width = "100" align = "center"><?php echo $rows['memberNickName']?></td>

                            <!--좋아요 수-->
                            <td  width = "100" align = "center"><?php echo $rows['cnt']?></td>

                            <?php
                            //댓글 좋아요하기
                            while($rows3=mysqli_fetch_array($res3,MYSQLI_ASSOC)){

                                if(isset($_SESSION['ses_user'])){
                                    if ($rows3['comLikeYN']){ ?>
                                        <td width = "150" align = "center">
                                            <form action = '../mainPage/comment.php?&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                                                <input class = "button0"  style = "margin-top: 10px" height = 80% width = 80% type="submit" name="mycomment" value = "❤" >
                                            </form>
                                        </td>

                                        <?php
                                    }else{?>
                                        <td width = "150" align = "center">
                                            <form action = '../mainPage/comment.php?&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                                                <input class = "button0" style = "margin-top: 10px" height = 80% width = 80% type = "submit" name="mycomment"  value = "♡">
                                            </form>
                                        </td>
                                        <?php
                                    }
                                }else{  ?>
                                    <td  width = "150" align = "center">
                                        <form action = '../mainPage/comment.php?&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                                            <input class = "button0" style = "margin-top: 10px" height = 80% width = 80% type = "submit" name="mycomment"  value = "♡" disabled>
                                        </form>
                                    </td>
                                    <?php
                                }
                                break;
                            }
                            ?>

                            <?php

                                if(isset($_SESSION['ses_user'])){
                                    if ($rows['tbMember_memberIdx']==1){?>
                                        <!--삭제 버튼-->
                                        <td width = "50" align = "center">
                                            <form action = '../mainPage/comment.php?&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                                                <input type="hidden" name="comment" value="delete">
                                                <input class = "button6" style = "margin-top: 10px" height = 80% width = 80% type="submit" name="mycomment" value = "x" >
                                            </form>
                                        </td>
                                        <?php
                                    }
                                }else{  ?>

                                    <td width = "50" align = "center"><form action = '../mainPage/comment.php?&commentIdx=<?php echo $rows['commentIdx']?>' method = "post">
                                            <input type="hidden" name="comment" value="delete">
                                            <input class = "button6" style = "margin-top: 10px" height = 80% width = 80% type="submit" name="mycomment" value = "x" disabled>
                                        </form></td>
                                <?php }
                             ?>
                        </tr>
                    <?php   } ?>
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>

                <?php
                mysqli_free_result($res);
                mysqli_close($conn)
            ?>



    </body>
</html>