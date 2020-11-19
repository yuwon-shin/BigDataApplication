<?php
include '../include/dbConnect.php';
include '../include/session.php';

$testIdx = $_GET['testIdx'];
$query = "select * from tbTest where testIdx={$testIdx}";
$res = mysqli_query($conn, $query);
$rows=mysqli_fetch_assoc($res);
?>




<!DOCTYPE html>
<html lang="ko">
<head>
    <title>연령 별 결과 분석</title>


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
        .button1{
            height: 60px;
            width: 150px;
            font-size: 18px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px

        }

        .wrap {
            position : relative;
            display: flex;
            flex-direction: row;
            padding-top: 10px;
            align-items: center;
        }

        .circle{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: gray;
            line-height: 30px;
            text-align: center;
        }

    </style>

</head>

<body>
<br><h1 align = center>연령 별 결과 분석<br><br></h1>


<?php
if(isset($_POST['memberAge'])){
}else{
    $_POST['memberAge']=$_SESSION['ses_age'];
}
?>

<form name="memberAge" method="POST" action="resultAge.php?testIdx=<?=$testIdx?>">
    <div align="center">
        비교할 연령을 입력해주세요
        <input type="text" size="30" name="memberAge" value=<?php echo $_POST['memberAge'];?>>
        <input class = "button1" type=submit value="결과보기">

        <br>

    </div>

</form>

<br>

<table align="center">
    <tr>
        <td align="center"><div class = circle></div></td>
        <td align="center"><div class = circle style="background: #FAE0D4;"></div></td>
    </tr>

    <tr>
        <td align="center">나</td>
        <td align="center"><?php echo $_POST['memberAge'];?>세</td>
    </tr>
</table>





<table style = "padding-top:20px" align = center>
    <thead>
    <tr>
        <td height=50 width = "120" align="center" bgcolor=#ccc><font color=white >문항번호</font></td>
        <td height=50 width = "700" align = "center" bgcolor=#ccc><font color=white>문항</font></td>
        <td height=50 width = "120" align = "center" bgcolor=#ccc><font color=white></font></td>
        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>1</font></td>
        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>2</font></td>
        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>3</font></td>
        <td height=50 width = "50" align = "center" bgcolor=#ccc><font color=white>4</font></td>
        <td height=50  width = "50" align = "center" bgcolor=#ccc><font color=white>5</font></td>
        <td height=50 width = "120" align = "center" bgcolor=#ccc><font color=white></font></td>
    </tr>
    </thead>

    <tbody>


    <br>

    <?php

    $query1 = "select round(AVG(answer1),1),round(AVG(answer2),1), round(AVG(answer3),1),round(AVG(answer4),1),round(AVG(answer5),1)
                ,round(AVG(answer6),1),round(AVG(answer7),1),round(AVG(answer8),1),round(AVG(answer9),1),round(AVG(answer10),1)
                from tbanswer as a
                left outer join tbMember as m
                on a.tbMember_memberIdx = m.memberIdx
                where a.tbTest_testIdx = {$testIdx} and m.memberAge='".$_POST['memberAge']."'";
    $res1 = mysqli_query($conn, $query1);
    $rows1 = mysqli_fetch_assoc($res1);


    $i=1;

    while($i < 11){
        ?>
        <tr>
            <td height=30 width = "120" align = "center"><?php echo $i?></td>
            <td height=30 width = "700" align = "center"><?php echo $rows['question'.$i]?></td>
            <td height=30 width = "120" align = "center"><?php echo $rows['label'.$i.'_1']?></td>

            <td colspan=5 width = "50" align = "center">
                <div class=wrap>
                    <!--내 응답 부분-->
                    <div class=circle style="position:absolute; margin-left: <?php echo (($_SESSION['answer'.$i]-1)*20+5).'%'?>"><?php echo $_SESSION['answer'.$i]?></div>
                    <!--평균 부분-->
                    <div class="circle" style="background: #FAE0D4;position:absolute; margin-left: <?php echo (($rows1['round(AVG(answer'.$i.'),1)']-1)*20+5).'%'?>"><?php echo $rows1['round(AVG(answer'.$i.'),1)']?></div>
            </td>

            <td height=30 width = "120" align = "center"><?php echo $rows['label'.$i.'_5']?></td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </tbody>
</table>

<br><br><br>
<div align="middle">
    <button class = "button1" onclick = "location.href = 'result.php?testIdx=<?=$testIdx?>'">전체 분석</button>
    <button class = "button1" onclick = "location.href = 'resultSex.php?testIdx=<?=$testIdx?>'">성별 별 분석</button>
    <button class = "button1" onclick = "location.href = 'resultJob.php?testIdx=<?=$testIdx?>'">분야 별 분석</button>
    <button class = "button1" onclick = "location.href = './index.php'">목록으로</button>
</div>


</body>