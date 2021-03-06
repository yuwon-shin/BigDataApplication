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
        .wrap {
            position : relative;
            display: flex;
            flex-direction: row;
            padding-top: 10px;
            align-items: center;
        }

        /*남성*/
        .circle0{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #0A6ECD;
            line-height: 30px;
            text-align: center;
        }
        /*나*/
        .circle1{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: gray;
            line-height: 30px;
            text-align: center;
        }
        /*여성*/
        .circle2{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #FF607F;
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
            text-align: center;

        }
    </style>

</head>

<body>
<br><h1 align = center>성별 별 결과 분석<br><br></h1>




<form name="member" method="POST" action="resultSex.php?testIdx=<?=$testIdx?>">
    <div align="center">
        나<input type="checkbox" name="me" <?php if (isset($_POST['me']) and $_POST['me']='on'){ ?>checked='checked'<?php }else{} ?>>
        여자<input type="checkbox" name="girl" <?php if (isset($_POST['girl']) and $_POST['girl']='on'){ ?>checked='checked'<?php }else{} ?>>
        남자<input type="checkbox" name="boy" <?php if (isset($_POST['boy']) and $_POST['boy']='on'){ ?>checked='checked'<?php }else{} ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input class = "button1"type=submit value="결과보기">
        <br><br>
    </div>
</form>

<?php
if(isset($_POST['me'])){$_POST['me']='on';}
else{$_POST['me']=0;}

if(isset($_POST['boy'])){$_POST['boy']='on';}
else{$_POST['boy']=0;}

if(isset($_POST['girl'])){$_POST['girl']='on';}
else{$_POST['girl']=0;}
?>


<table align="center">
    <tr align="center">
        <td><div class = circle1></div></td>
        <td><div class = circle2></div></td>
        <td><div class = circle0></div></td>
    </tr>

    <tr align="center">
        <td>나</td>
        <td>여자</td>
        <td>남자</td>
    </tr>
</table>

<br>


<table style = "padding-top:20px" align = center>
    <thead>
    <tr>
        <td height=50 width = "120" align="center" bgcolor=#ccc><font color=white >문항번호</font></td>
        <td height=50 width = "700" align = "center" bgcolor=#ccc><font color=white>문항</font></td>
        <td height=50 width = "120" align = "center" bgcolor=#ccc><font color=white></font></td>
        <td height=50 width = "50px" align = "center" bgcolor=#ccc><font color=white>1</font></td>
        <td height=50 width = "50px" align = "center" bgcolor=#ccc><font color=white>2</font></td>
        <td height=50 width = "50px" align = "center" bgcolor=#ccc><font color=white>3</font></td>
        <td height=50 width = "50px" align = "center" bgcolor=#ccc><font color=white>4</font></td>
        <td height=50  width = "50px" align = "center" bgcolor=#ccc><font color=white>5</font></td>
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
                    <!--남성 평균-->
                    <?php if($_POST['boy']){?>
                        <div class ='circle0' style="position:absolute; margin-left: <?php echo(($rows2['round(AVG(answer'. $i .'),1)']-1)*20+5)."%" ?>">
                        <?php echo $rows2['round(AVG(answer'. $i .'),1)']?>
                        </div><?php }
                    else{}?>
                    <!--나-->
                    <?php if($_POST['me']){?><div class ='circle1' style="position:absolute; margin-left: <?php echo (($_SESSION['answer'.$i]-1)*20+5)."%" ?>">
                        <?php echo $_SESSION['answer'.$i]?>
                        </div><?php }
                    else{}?>
                    <!--여성 평균-->
                    <?php if($_POST['girl']){?><div class ='circle2' style="position:absolute; margin-left: <?php echo (($rows1['round(AVG(answer'. $i .'),1)']-1)*20+5)."%"?>">
                        <?php echo $rows1['round(AVG(answer'. $i .'),1)']?>
                        </div><?php }
                    else{}
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
    <button class = "button1" onclick = "location.href = 'resultJob.php?testIdx=<?=$testIdx?>'">분야 별 분석</button>
    <button class = "button1" onclick = "location.href = 'resultAge.php?testIdx=<?=$testIdx?>'">연령 별 분석</button>
    <button class = "button1" onclick = "location.href = './index.php'">목록으로</button>
</div>

</body>