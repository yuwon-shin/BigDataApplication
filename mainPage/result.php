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
                where a.tbTest_testIdx = {$testIdx}";
    $res1 = mysqli_query($conn,$query1);
    $rows1 = mysqli_fetch_assoc($res1);

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <title>결과 분석</title>


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
        /*시험*/
        .circle0{
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: red;
            line-height: 10px;
        }

        /*평균*/
        .circle{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #000000;
            line-height: 30px;
        }
        /*나*/
        .circle1{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #00d3d3;
            line-height: 30px;
        }

    </style>

</head>

<body>
    <br><h1 align = center>전체 결과 분석<br><br></h1>



    <table style = "padding-top:20px" align = center>
        <thead>
        <tr>
            <td height=50 width = "120" align="center" bgcolor=#ccc><font color=white >문항번호</font></td>
            <td height=50 width = "700" align = "center" bgcolor=#ccc><font color=white>문항</font></td>
            <td height=50 width = "120" align = "center" bgcolor=#ccc><font color=white></font></td>
            <td height=50px width = "50px" align = "center" bgcolor=#ccc><font color=white>1</font></td>
            <td height=50px width = "50px" align = "center" bgcolor=#ccc><font color=white>2</font></td>
            <td height=50px width = "50px" align = "center" bgcolor=#ccc><font color=white>3</font></td>
            <td height=50px width = "50px" align = "center" bgcolor=#ccc><font color=white>4</font></td>
            <td height=50px  width = "50px" align = "center" bgcolor=#ccc><font color=white>5</font></td>
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


                <td colspan=5 style="padding:0px">
                    <!--시험-->
                    <div class = 'circle0' style="position:relative; center:0%" align="center"></div>
                    <div class = 'circle0' style="position:relative; left:10%"></div>
                    <div class = 'circle0' style="position:relative; left:20%"></div>
                    <div class = 'circle0' style="position:relative; left:30%"></div>
                    <div class = 'circle0' style="position:relative; left:40%"></div>
                    <div class = 'circle0' style="position:relative; left:50%"></div>
                    <div class = 'circle0' style="position:relative; left:60%"></div>
                    <div class = 'circle0' style="position:relative; left:70%"></div>
                    <div class = 'circle0' style="position:relative; left:80%"></div>
                    <div class = 'circle0' style="position:relative; left:90%"></div>
                    <div class = 'circle0' style="position:relative; left:100%"></div>
                    <div class = 'circle0' style="position:relative; left:<?php echo ($rows1['round(AVG(answer'. $i .'),1)']*25-25)."%" ?>"></div>
                    <!--평균-->
                    <div class ='circle' style="display:flex;position:relative; margin-left: <?php echo ($rows1['round(AVG(answer'. $i .'),1)']*50-40)."px" ?>"></div>
                    <!--나-->
                    <div class ='circle1' style="display:flex;position:relative; margin-left: <?php echo ($_SESSION['answer'.$i]*50-40)."px" ?>"></div>
                    <hr>
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
        <button class = "button1" onclick = "location.href = 'resultSex.php?testIdx=<?=$testIdx?>'">성별 별 분석</button>
        <button class = "button1" onclick = "location.href = 'resultJob.php?testIdx=<?=$testIdx?>'">분야 별 분석</button>
        <button class = "button1" onclick = "location.href = 'resultAge.php?testIdx=<?=$testIdx?>'">연령 별 분석</button>
    </div>
</body>