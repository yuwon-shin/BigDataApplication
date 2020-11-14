<?php
    include '../include/dbConnect.php';
    include '../include/session.php';

    $testIdx = $_GET['testIdx'];
    $query = "select * from tbTest where testIdx={$testIdx}";
    $res = mysqli_query($conn, $query);
    $rows=mysqli_fetch_assoc($res);


    $query1 = "select round(AVG(answer1),1),round(AVG(answer2),1), round(AVG(answer3),1),round(AVG(answer4),1),round(AVG(answer5),1)
                    ,round(AVG(answer6),1),round(AVG(answer7),1),round(AVG(answer8),1),round(AVG(answer9),1),round(AVG(answer10),1)
                    from tbanswer as a
                    left outer join tbMember as m
                    on a.tbMember_memberIdx = m.memberIdx
                    where a.tbTest_testIdx = {$testIdx} and m.memberSex = '여성'";
    $res1 = mysqli_query($conn,$query1);
    $rows1 = mysqli_fetch_assoc($res1);

    $query2 = "select round(AVG(answer1),1),round(AVG(answer2),1), round(AVG(answer3),1),round(AVG(answer4),1),round(AVG(answer5),1)
                    ,round(AVG(answer6),1),round(AVG(answer7),1),round(AVG(answer8),1),round(AVG(answer9),1),round(AVG(answer10),1)
                    from tbanswer as a
                    left outer join tbMember as m
                    on a.tbMember_memberIdx = m.memberIdx
                    where a.tbTest_testIdx = {$testIdx} and m.memberSex = '남성'";
    $res2 = mysqli_query($conn,$query2);
    $rows2 = mysqli_fetch_assoc($res2);

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <title>성별 별 결과 분석</title>

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

        /*남성*/
        .circle0{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            left-margin: 0px;
            background: #0A6ECD;
            line-height: 30px;
        }
        /*나*/
        .circle1{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            left-margin: 0px;
            background: #000000;
            line-height: 30px;
        }
        /*여성*/
        .circle2{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            left-margin: 0px;
            background: #FF607F;
            line-height: 30px;
        }
    </style>

</head>

<body>
<br><h1 align = center>성별 별 결과 분석<br><br></h1>
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

    <?php
    $i=1;

    while($i < 11){
        ?>
        <tr>
            <td height=30 width = "120" align = "center"><?php echo $i?></td>
            <td height=30 width = "700" align = "center"><?php echo $rows['question'.$i]?></td>
            <td height=30 width = "120" align = "center"><?php echo $rows['label'.$i.'_1']?></td>


            <td colspan=5 width = "250" align="left">
                <!--시험-->


                <!--여성 평균-->
                <div class ='circle2' style="margin-left: <?php echo ($rows1['round(AVG(answer'. $i .'),1)']*50)."px" ?>"></div>
                <!--남성 평균-->
                <div class ='circle0' style="margin-left: <?php echo ($rows2['round(AVG(answer'. $i .'),1)']*50)."px" ?>"></div>
                <!--나-->
                <div class ='circle1' style="margin-left: <?php echo ($_SESSION['answer'.$i]*50)."px" ?>"></div>
            </td>

            <!--
            <td height=30 width = "50" align = "center"><?php echo $_SESSION['answer'.$i]?></td>
            <td height=30 width = "50" align = "center"><?php echo $rows1['round(AVG(answer'.$i.'),1)']?></td>
            <td height=30 width = "50" align = "center"><?php echo $rows2['round(AVG(answer'.$i.'),1)']?></td>-->

            <td height=30 width = "120" align = "center"><?php echo $rows['label'.$i.'_5']?></td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </tbody>
</table>

</body>