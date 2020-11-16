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
            background: gray;
            line-height: 30px;
            text-align: center;
        }

        .button1{
            height: 60px;
            width: 150px;
            font-size: 18px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;

        }

        .wrap {
            position : relative;
            display: flex;
            flex-direction: row;
            padding-top: 10px;
            align-items: center;
        }


    </style>

</head>

<body>
<br><h1 align = center>관심 분야 별 결과 분석<br><br></h1>

<form name="member" method="POST" action="resultJob.php?testIdx=<?=$testIdx?>">
    <div align="center">
        나<input type="checkbox" name="me" <?php if (isset($_POST['me']) and $_POST['me']='on'){ ?>checked='checked'<?php }else{} ?>>
        <?php
        $jobs = array("이공계열","인문계열","사회계열","의약계열","예체능계열","교육계열","직장인");
        for($i=0;$i<count($jobs);$i=$i+1){
        echo $jobs[$i]?>
        <input type=checkbox name="<?php echo $jobs[$i]?>" <?php if (isset($_POST[$jobs[$i]]) and $_POST[$jobs[$i]]='on'){ ?>checked='checked'<?php }else{} ?>>
        <?php } ?>
        <br><br>
        <input class = "button1" type=submit value="결과보기">
        <br><br>
    </div>
</form>

<?php
for($i=0;$i<count($jobs);$i=$i+1){
    if(isset($_POST[$jobs[$i]])){$_POST[$jobs[$i]]='on';}
    else{$_POST[$jobs[$i]]=0;}
}
if(isset($_POST['me'])){$_POST['me']='on';}
else{$_POST['me']=0;}

?>

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

            <td colspan=5 style="padding:0px">
                <div class = wrap>
                <!--내 응답 부분-->
                <?php if($_POST['me']) {?>
                    <div class='circle' style="position:absolute; margin-left: <?php echo (($_SESSION['answer'.$i]-1)*20+5).'%'?>"><?php echo $_SESSION['answer'.$i]?></div>
                <?php } else{}?>

                <?php
                    for($j=0;$j<count($jobs);$j=$j+1){
                        if($_POST[$jobs[$j]]){?>
                            <div class="circle" style="position:absolute; margin-left:<?php echo ((${'rows'.$j}['round(AVG(answer'.$i.'),1)']-1)*20+5).'%'?>" >
                            <?php echo ${'rows'.$j}['round(AVG(answer'.$i.'),1)']?></div>
                        <?php } else{}
                    }


                ?>
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
    <button class = "button1" onclick = "location.href = 'resultAge.php?testIdx=<?=$testIdx?>'">연령 별 분석</button>
</div>

</body>