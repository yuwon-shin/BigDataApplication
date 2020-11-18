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

            a:link {color : black; text-decoration:none;}
            a:hover { text-decoration : underline;}

        </style>
    </head>
    <body>
        <h1 align="middle">내가 찜한 테스트 목록</h1>
        <div>



                <?php
                $query = "select tablea.*, count(sc.tbTest_testIdx) as cnt 
                            from (select t.testIdx, t.testDate, t.testTitle, t.testCategory, t.hit, t.tbMember_memberIdx, b.memberNickName
                            from tbTestScrap ts
                            left outer join tbTest t
                            on ts.tbTest_testIdx = t.testIdx
                            left outer join tbMember b ON t.tbMember_memberIdx = b.memberIdx 
                            where ts.tbMember_memberIdx = '".$_SESSION['ses_index']."'
                            ) tablea 
                            left outer join tbTestScrap as sc on tablea.testIdx=sc.tbTest_testIdx
                            group by testIdx
                            order by testIdx";
                $res = mysqli_query($conn,$query);
                $total = mysqli_num_rows($res);
                ?>

                <?php
                if(isset($_SESSION['ses_index'])){

                    $query3 = "select testIdx, MAX(testScYN) testScYN from
                    (SELECT
                    t.testIdx
                    , case when sc.tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as testScYN
                    FROM tbTest t
                    left outer join tbTestScrap sc on t.testIdx = sc.tbTest_testIdx 
                    where sc.tbMember_memberIdx = '".$_SESSION['ses_index']."') a group by testIdx order by testIdx";
                    $res4 = mysqli_query($conn, $query3);
                }else{
                    //로그인 안했을 경우 index 0으로 부여 (에러 발생 방지)
                    $_SESSION['ses_index']=0;
                    $query3 = "select testIdx, MAX(testScYN) testScYN from
                    (SELECT
                    t.testIdx
                    , case when sc.tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as testScYN
                    FROM tbTest t
                    left outer join tbTestScrap sc on t.testIdx = sc.tbTest_testIdx
                    where sc.tbMember_memberIdx = '".$_SESSION['ses_index']."') a group by testIdx order by testIdx";
                    $res4 = mysqli_query($conn, $query3);
                }
                ?>

                <table align = center>
                    <thead align = "center">
                    <tr>
                        <td width = "50" align="center">번호</td>
                        <td width = "400" align = "center">제목</td>
                        <td width = "100" align = "center">카테고리</td>
                        <td width = "100" align = "center">작성자</td>
                        <td width = "200" align = "center">날짜</td>
                        <td width = "50" align = "center">조회수</td>
                        <td width = "80" align = "center">찜 수</td>
                        <td width = "80" align = "center">찜</td>
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
                                <a href = "../mainPage/joinTest.php?testIdx=<?php echo $rows['testIdx']?>">
                                    <?php echo $rows['testTitle']?></a></td>

                            <td width = "100" align = "center"><?php echo $rows['testCategory']?></td>


                            <td width = "100" align = "center"><?php echo $rows['memberNickName']?></td>



                            <td width = "200" align = "center"><?php echo $rows['testDate']?></td>
                            <td width = "50" align = "center"><?php echo $rows['hit']?></td>



                            <td width = "80" align = "center"><?php echo $rows['cnt']?></td>





                            <?php
                            while($rows4=mysqli_fetch_array($res4,MYSQLI_ASSOC)){

                                ?>
                                <td width = "50" align = "center">
                                    <?php
                                    if ($rows4['testScYN']){ ?>
                                        <form method = "post">
                                            <input class = "button0" type="button" name="insertscrap" value = "❤" onclick = "location.href= '../mainPage/testScrap2.php?scrap=1&testIdx=<?php echo $rows['testIdx']?>'">
                                        </form>

                                        <?php
                                    }else{?>
                                        <form method = "post">
                                            <input class = "button0" type = "button"  name="deletescrap"  value = "♡" onclick = "location.href= '../mainPage/testScrap2.php?scrap=0&testIdx=<?php echo $rows['testIdx']?>'">
                                        </form>
                                        <?php
                                    }

                                    ?>
                                </td></tr>
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
                //



                mysqli_free_result($res);
                mysqli_close($conn)

            ?>

        </div>
    </body>
</html>