<?php
include '../include/dbConnect.php';
include '../include/session.php';

$testIdx = $_GET['testIdx'];
$query = "select * from tbTest where testIdx={$testIdx}";
$res = mysqli_query($conn, $query);
$rows=mysqli_fetch_assoc($res);

$jobs = array("이공계열","인문계열","사회계열","의약계열","예체능계열","교육계열","직장인");
for($i=0;$i<count($jobs);$i=$i+1){
    ${'query'.$i} = "select round(AVG(answer1),1),round(AVG(answer2),1), round(AVG(answer3),1),round(AVG(answer4),1),round(AVG(answer5),1)
                ,round(AVG(answer6),1),round(AVG(answer7),1),round(AVG(answer8),1),round(AVG(answer9),1),round(AVG(answer10),1)
                from tbanswer as a
                left outer join tbMember as m
                on a.tbMember_memberIdx = m.memberIdx
                where a.tbTest_testIdx = {$testIdx} and m.memberJob='".$jobs[$i]."'";
    ${'res'.$i} = mysqli_query($conn,${'query'.$i});
    ${'rows'.$i} = mysqli_fetch_assoc(${'res'.$i});
}


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <title>관심 분야 별 결과 분석</title>


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
        .circle{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            left-margin: 0px;
            background: #0A6ECD;
            line-height: 30px;
        }


    </style>

</head>

<body>
<br><h1 align = center>관심 분야 별 결과 분석<br><br></h1>
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

            <!--내 응답 부분-->
            <td height=30 width = "50" align = "center"><?php echo $_SESSION['answer'.$i]?></td>

            <td colspan=3 width = "50" align = "center"><hr></td>

            <!--평균 부분-->
            <td height=30 width = "50" align = "center"><?php echo $rows1['round(AVG(answer'.$i.'),1)'],$rows2['round(AVG(answer'.$i.'),1)']?></td>

            <td height=30 width = "120" align = "center"><?php echo $rows['label'.$i.'_5']?></td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </tbody>
</table>

</body>