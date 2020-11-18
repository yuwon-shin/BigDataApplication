<?php
include '../include/dbConnect.php';
include '../include/session.php';
?>

<!DOCTYPE html>
<html lang="ko">
<div align = right style="padding-right: 40px">
    <?php
    if(isset($_SESSION['ses_user'])){
    echo '<br>';
    echo $_SESSION['ses_user'].'님 안녕하세요 <br>';
    ?>
    <div class = "button">
        <input class = "button1" type = "button" value = "마이페이지" onclick = "location.href= '../myPage/myInfo.php'">
        <input class = "button1" type = "button" value = "로그아웃" onclick = "location.href= '../member/signOut.php'">

        <?php

        }
        else{
            ?>
            <br>
            <input class = "button2" type = "button" value = "로그인/회원가입" onclick = "location.href= '../member/main.php'">

            <?php
        }
        ?>
    </div>
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

$query1 = "select testIdx, count(sc.tbTest_testIdx) as cnt from tbTest as t 
left outer join tbTestScrap as sc on t.testIdx=sc.tbTest_testIdx
group by testIdx";
$res2 = mysqli_query($conn, $query1);
?>

<?php
$query2 = "select a.testIdx, a.tbMember_memberIdx, b.memberNickName from tbtest a INNER JOIN tbMember b ON a.tbMember_memberIdx = b.memberIdx order by a.testIdx";
$res3 = mysqli_query($conn, $query2);
?>

<?php
if(isset($_SESSION['ses_index'])){

    $query3 = "select testIdx, MAX(testScYN) testScYN from
                (SELECT
                t.testIdx
                , case when sc.tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as testScYN
                FROM tbTest t
                left outer join tbTestScrap sc on t.testIdx = sc.tbTest_testIdx) a group by testIdx order by testIdx";
    $res4 = mysqli_query($conn, $query3);
}else{
    //로그인 안했을 경우 index 0으로 부여 (에러 발생 방지)
    $_SESSION['ses_index']=0;
    $query3 = "select testIdx, MAX(testScYN) testScYN from
                (SELECT
                t.testIdx
                , case when sc.tbMember_memberIdx = {$_SESSION['ses_index']} then 1 else 0 end as testScYN
                FROM tbTest t
                left outer join tbTestScrap sc on t.testIdx = sc.tbTest_testIdx) a group by testIdx";
    $res4 = mysqli_query($conn, $query3);
}
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
                <a href = "joinTest.php?testIdx=<?php echo $rows['testIdx']?>">
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
                <td width = "80" align = "center"><?php echo $rows2['cnt']?></td>

                <?php
                break;
            }
            ?>




            <?php
            while($rows4=mysqli_fetch_array($res4,MYSQLI_ASSOC)){

                ?>
                <td width = "50" align = "center">
                    <?php
                    if ($rows4['testScYN']){ ?>
                        <form method = "post">
                            <input class = "button0" type="button" name="insertscrap" value = "❤" onclick = "location.href= 'testScrap.php?scrap=1&testIdx=<?php echo $rows['testIdx']?>'">
                        </form>

                        <?php
                    }else{?>
                        <form method = "post">
                            <input class = "button0" type = "button"  name="deletescrap"  value = "♡" onclick = "location.href= 'testScrap.php?scrap=0&testIdx=<?php echo $rows['testIdx']?>'">
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

<div class = text>
    <?php
    if(isset($_SESSION['ses_user'])){
        ?>
        <font style = "cursor: pointer" onclick = "location.href= 'test.php'">테스트 만들기</font>

</div>

<?php
$query4 = "select re.testIdx,re.testTitle,re.testCategory,re.hit,count(csc.testScrapIdx) as scrap from 
(select tbTest.testIdx,tbTest.testTitle,tbTest.testCategory,tbTest.hit,r.scrapNm as scrap from 
(select * from (select tbTest_testIdx as idx,count(otherscrap.testScrapIdx) as scrapNm from 
(select myscTest,sc.testScrapIdx,sc.tbMember_memberIdx from (select tbTest_testIdx as myscTest from tbTestScrap s 
left outer join tbMember m 
on s.tbMember_memberIdx = memberIdx 
where m.memberIdx= {$_SESSION['ses_index']}) as mytest 
left outer join tbTestScrap sc 
on mytest.myscTest = sc.tbTest_testIdx 
where sc.tbMember_memberIdx!={$_SESSION['ses_index']}) as sameTest
left outer join tbTestScrap otherscrap
on sameTest.tbMember_memberIdx=otherscrap.tbMember_memberIdx
group by tbTest_testIdx) as result
where idx not in (select tbTest_testIdx from tbTestScrap where tbMember_memberIdx={$_SESSION['ses_index']})
order by scrapNm desc limit 3) r
left outer join tbTest 
on r.idx=tbTest.testIdx) re
left outer join tbTestScrap csc
on re.testIdx=csc.tbTest_testIdx
group by tbTest_testIdx;";
$res5 = mysqli_query($conn, $query4);


$query5 = "select re.testIdx,re.testTitle,re.testCategory,re.hit,count(csc.testScrapIdx) as scrap from
(SELECT t.testIdx as testIdx, `testTitle`, `testCategory`, `hit`, r.scrapNm as scrap 
from tbTest as t 
inner join(select s.tbTest_testIdx as idx ,count(testScrapIdx) as scrapNm 
from tbTestScrap s 
left outer join tbMember m 
on s.tbMember_memberIdx = memberIdx where m.memberSex= '{$_SESSION['ses_sex']}'
group by s.tbTest_testIdx) r 
on t.testIdx = r.idx order by scrap desc limit 3 ) re
left outer join tbTestScrap csc
on re.testIdx=csc.tbTest_testIdx
group by tbTest_testIdx";
$res6 = mysqli_query($conn, $query5);

$query6 = "select re.testIdx,re.testTitle,re.testCategory,re.hit,count(csc.testScrapIdx) as scrap from
(SELECT t.testIdx as testIdx, `testTitle`, `testCategory`, `hit`, r.scrapNm as scrap 
from tbTest as t 
inner join(select s.tbTest_testIdx as idx ,count(testScrapIdx) as scrapNm from tbTestScrap s 
left outer join tbMember m on s.tbMember_memberIdx = memberIdx where m.memberAge= '{$_SESSION['ses_age']}'
group by s.tbTest_testIdx) r on t.testIdx = r.idx order by scrap desc limit 3) re
left outer join tbTestScrap csc
on re.testIdx=csc.tbTest_testIdx
group by tbTest_testIdx";
$res7 = mysqli_query($conn, $query6);

$query7 = "select re.testIdx,re.testTitle,re.testCategory,re.hit,count(csc.testScrapIdx) as scrap from
(SELECT t.testIdx as testIdx, `testTitle`, `testCategory`, `hit`, r.scrapNm as scrap
 from tbTest as t inner join(select s.tbTest_testIdx as idx ,count(testScrapIdx) as scrapNm from tbTestScrap s 
 left outer join tbMember m on s.tbMember_memberIdx = memberIdx where m.memberJob= '{$_SESSION['ses_job']}'
    group by s.tbTest_testIdx ) r on t.testIdx = r.idx order by scrap desc limit 3) re
left outer join tbTestScrap csc
on re.testIdx=csc.tbTest_testIdx
group by tbTest_testIdx";
$res8 = mysqli_query($conn, $query7);
?>



<div class = wrap>
    <div class = container>

    <h2><font color = #495057><b>&nbsp;&nbsp;[개인 맞춤형 테스트 추천]</b></font></h2><br>
    <h3 align = left><font color = #868e96><b>&nbsp;&nbsp;&nbsp;&nbsp;나와 취향이 비슷한 사람들은 어떤 테스트를 많이 찜했을까? (나와 같은 테스트를 찜한 사람들)</b></font></h3>
    <div class = container1 >
        <table  algin = center>
            <thead>
                <tr style = "border-bottom: 2px solid #444444">
                    <td width = "100" align="center" style = "background: #efefef"><b>Ranking</b></td>
                    <td width = "80" align = "center">번호</td>
                    <td width = "250" align = "center">제목</td>
                    <td width = "100" align = "center">카테고리</td>
                    <td width = "100" align = "center">조회수</td>
                    <td width = "100" align = "center">찜 수</td>
                    <td width = "150" align = "center"></td>
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
                    <td width = "100" align = "center"><?php echo $rows5['scrap']?></td>
                    <td width = "150" align = "center"><input class = "button3" type = "button"  name="joinTest"  value = "테스트 참여하기" onclick = "location.href= 'joinTest.php?testIdx=<?php echo $rows5['testIdx']?>'"></td>
                </tr>
            <?php    }
            ?>
            </tbody>
        </table>
    </div><br>

        <h3 align = left><font color = #868e96><b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['ses_sex']?> 회원은 어떤 테스트를 많이 찜했을까?</b></font></h3>
    <div class = container1 >
        <table  algin = center>
            <thead>
                <tr style = "border-bottom: 2px solid #444444">
                    <td width = "100" align="center" style = "background: #efefef"><b>Ranking</b></td>
                    <td width = "80" align = "center">번호</td>
                    <td width = "250" align = "center">제목</td>
                    <td width = "100" align = "center">카테고리</td>
                    <td width = "100" align = "center">조회수</td>
                    <td width = "100" align = "center">찜 수</td>
                    <td width = "150" align = "center"></td>
                </tr>
            </thead>

            <tbody>
            <?php
                $i = 0;
                while($rows6 = mysqli_fetch_assoc($res6)){
                    $i++; 

            ?>  <tr>
                    <td width = "100" align = "center" style = "background: #efefef"><b>Top <?=$i?></b></td>
                    <td width = "80" align = "center"><?php echo $rows6['testIdx']?></td>
                    <td width = "250" align = "center"><?php echo $rows6['testTitle']?></td>
                    <td width = "100" align = "center"><?php echo $rows6['testCategory']?></td>
                    <td width = "100" align = "center"><?php echo $rows6['hit']?></td>
                    <td width = "100" align = "center"><?php echo $rows6['scrap']?></td>
                    <td width = "150" align = "center"><input class = "button3" type = "button"  name="joinTest"  value = "테스트 참여하기" onclick = "location.href= 'joinTest.php?testIdx=<?php echo $rows6['testIdx']?>'"></td>
                </tr>
            <?php    }
            ?>
            </tbody>
        </table>
    </div><br>

    <h3 align = left><font color = #868e96><b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['ses_age']?>세 회원은 어떤 테스트를 많이 찜했을까?</b></font></h3>
    <div class = container1 >
        <table  algin = center>
            <thead>
                <tr style = "border-bottom: 2px solid #444444">
                    <td width = "100" align="center" style = "background: #efefef"><b>Ranking</b></td>
                    <td width = "80" align = "center">번호</td>
                    <td width = "250" align = "center">제목</td>
                    <td width = "100" align = "center">카테고리</td>
                    <td width = "100" align = "center">조회수</td>
                    <td width = "100" align = "center">찜 수</td>
                    <td width = "150" align = "center"></td>
                </tr>
            </thead>

            <tbody>
            <?php
                $i = 0;
                while($rows7 = mysqli_fetch_assoc($res7)){
                    $i++; 

            ?>  <tr>
                    <td width = "100" align = "center" style = "background: #efefef"><b>Top <?=$i?></b></td>
                    <td width = "80" align = "center"><?php echo $rows7['testIdx']?></td>
                    <td width = "250" align = "center"><?php echo $rows7['testTitle']?></td>
                    <td width = "100" align = "center"><?php echo $rows7['testCategory']?></td>
                    <td width = "100" align = "center"><?php echo $rows7['hit']?></td>
                    <td width = "100" align = "center"><?php echo $rows7['scrap']?></td>
                    <td width = "150" align = "center"><input class = "button3" type = "button"  name="joinTest"  value = "테스트 참여하기" onclick = "location.href= 'joinTest.php?testIdx=<?php echo $rows7['testIdx']?>'"></td>
                </tr>
            <?php    }
            ?>
            </tbody>
        </table>
    </div><br>

    <h3 align = left><font color = #868e96><b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['ses_job']?> 회원은 어떤 테스트를 많이 찜했을까?</b></font></h3>
    <div class = container1 >
        <table  algin = center>
            <thead>
                <tr style = "border-bottom: 2px solid #444444">
                    <td width = "100" align="center" style = "background: #efefef"><b>Ranking</b></td>
                    <td width = "80" align = "center">번호</td>
                    <td width = "250" align = "center">제목</td>
                    <td width = "100" align = "center">카테고리</td>
                    <td width = "100" align = "center">조회수</td>
                    <td width = "100" align = "center">찜 수</td>
                    <td width = "150" align = "center"></td>
                </tr>
            </thead>

            <tbody>
            <?php
                $i = 0;
                while($rows8 = mysqli_fetch_assoc($res8)){
                    $i++; 

            ?>  <tr>
                    <td width = "100" align = "center" style = "background: #efefef"><b>Top <?=$i?></b></td>
                    <td width = "80" align = "center"><?php echo $rows8['testIdx']?></td>
                    <td width = "250" align = "center"><?php echo $rows8['testTitle']?></td>
                    <td width = "100" align = "center"><?php echo $rows8['testCategory']?></td>
                    <td width = "100" align = "center"><?php echo $rows8['hit']?></td>
                    <td width = "100" align = "center"><?php echo $rows8['scrap']?></td>
                    <td width = "150" align = "center"><input class = "button3" type = "button"  name="joinTest"  value = "테스트 참여하기" onclick = "location.href= 'joinTest.php?testIdx=<?php echo $rows8['testIdx']?>'"></td>
                </tr>
            <?php    }
            ?>
            </tbody>
        </table>
    </div><br>

    </div>
</div><br><br>
    <?php 
    } ?>

<?php
mysqli_free_result($res);
mysqli_free_result($res2);
mysqli_close($conn)
?>
</body>
</html>