<?php
    include '../include/dbConnect.php';
    include '../include/session.php';
    $testIdx = $_GET['testIdx'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type"
          content="text/html; charset=UTF-8" />
    <title>Edit Test</title>
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
            height: 50px;
            width: 150px;
            font-size: 18px;
            color: white;
            text-align: center;
            margin:auto;
            margin-top: 30px;
            background-color: #373737;
            border: 3px solid #efefef;
            border-radius: 10px

        }
    </style>    
</head>

<?php
    $query = "SELECT * FROM tbTest where testIdx = $testIdx and tbMember_memberIdx = {$_SESSION['ses_index']} ";
    $res = mysqli_query($conn,$query);
    $rows=mysqli_fetch_assoc($res);
    $title = $rows['testTitle'];
    $content = $rows['testContent'];
    $category = $rows['testCategory'];
    $question1 = $rows['question1']; $question2 = $rows['question2'];
    $question3 = $rows['question3']; $question4 = $rows['question4'];
    $question5 = $rows['question5']; $question6 = $rows['question6'];
    $question7 = $rows['question7']; $question8 = $rows['question8'];
    $question9 = $rows['question9']; $question10 = $rows['question10'];
    $label1_1=$rows['label1_1']; $label1_5=$rows['label1_5'];
    $label2_1=$rows['label2_1']; $label2_5=$rows['label2_5'];
    $label3_1=$rows['label3_1']; $label3_5=$rows['label3_5'];
    $label4_1=$rows['label4_1']; $label4_5=$rows['label4_5'];
    $label5_1=$rows['label5_1']; $label5_5=$rows['label5_5'];
    $label6_1=$rows['label6_1']; $label6_5=$rows['label6_5'];
    $label7_1=$rows['label7_1']; $label7_5=$rows['label7_5'];
    $label8_1=$rows['label8_1']; $label8_5=$rows['label8_5'];
    $label9_1=$rows['label9_1']; $label9_5=$rows['label9_5'];
    $label10_1=$rows['label10_1']; $label10_5=$rows['label10_5'];


?>

<body>
    <h1 align = center><br><b>테스트 수정하기</b><br><br></h1>
    <h3 align = center><font color = #373737> [테스트를 자유롭게 수정할 수 있습니다.]</font></h3>
    <h3 align = right style = "padding-right: 8%"> 작성자:&nbsp;&nbsp;<?=$_SESSION['ses_user']?></h3>
        <form action="editTest.php" method="POST" align = center>
        <table style = "padding-top:20px" align = "center">
            <thead>
                <tr>
                <td colspan = 5 height = 60 align = center bgcolor = #373737><font color=white><b>Test <?=$testIdx?></b></font></td></tr>
            </thead>

            <tbody>
                <tr><td colspan = 3 height = 5></td></tr>                
                <tr>
                    <td height = 50 width = 200 align = center bgcolor = #efefef><font>테스트 제목</font></td>
                    <td  height = 50 width = 350 align = right>
                        원하시는 테스트 제목을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="testTitle" style = "height:25px" size=" 90" value = "<?=$title?>">
                    </td>
                </tr>
                

                <tr>
                    <td height = 50 width = 200 align = center bgcolor = #efefef><font>테스트 내용</font></td>
                    <td  height = 50 width = 350 align = right>
                        테스트에 대해 간단하게 설명해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="testContent" style = "height:25px" size=" 90"  value = "<?=$content?>">
                    </td>
                </tr>

                <tr>
                    <td height = 50 width = 200 align = center bgcolor = #efefef><font>테스트 카테고리</font></td>
                    <td  height = 50 width = 350 align = right>
                        테스트 카테고리를 기입해주세요 (ex-심리):&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="testCategory" style = "height:25px" size=" 90" value = "<?=$category?>">
                    </td>
                </tr>

                <tr><td colspan = 3 height = 2></td></tr> 
                <tr>
                    <td colspan = 5 height = 30 align = center bgcolor = #ccc><b>&nbsp;&nbsp;모든 문항은 오지선다로 답변되는 형태여야합니다.</b></td>
                <tr>
                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 1</font></td>
                    <td  height = 50 width = 350 align = right >
                        1번 문항의 질문을 기입해주세요:&nbsp;&nbsp;
                    </td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question1" style = "height:25px" size=" 90" value = "<?=$question1?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label1_1" style = "height:25px" value = "<?=$label1_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label1_5" style = "height:25px" value = "<?=$label1_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 2</font></td>
                    <td  height = 50 width = 350 align = right>
                        2번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question2" style = "height:25px" size=" 90" value = "<?=$question2?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label2_1" style = "height:25px" value = "<?=$label2_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label2_5" style = "height:25px" value = "<?=$label2_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 3</font></td>
                    <td  height = 50 width = 350 align = right>
                        3번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question3" style = "height:25px" size=" 90" value = "<?=$question3?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label3_1" style = "height:25px" value = "<?=$label3_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label3_5" style = "height:25px" value = "<?=$label3_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 4</font></td>
                    <td  height = 50 width = 350 align = right>
                        4번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question4" style = "height:25px" size=" 90" value = "<?=$question4?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label4_1" style = "height:25px" value = "<?=$label4_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label4_5" style = "height:25px" value = "<?=$label4_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 5</font></td>
                    <td  height = 50 width = 350 align = right>
                        5번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question5" style = "height:25px" size=" 90" value = "<?=$question5?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label5_1" style = "height:25px" value = "<?=$label5_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label5_5" style = "height:25px" value = "<?=$label5_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 6</font></td>
                    <td  height = 50 width = 350 align = right>
                        6번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question6" style = "height:25px" size=" 90" value = "<?=$question6?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label6_1" style = "height:25px" value = "<?=$label6_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label6_5" style = "height:25px" value = "<?=$label6_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 7</font></td>
                    <td  height = 50 width = 350 align = right>
                        7번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question7" style = "height:25px" size=" 90" value = "<?=$question7?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label7_1" style = "height:25px" value = "<?=$label7_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label7_5" style = "height:25px" value = "<?=$label7_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 8</font></td>
                    <td  height = 50 width = 350 align = right>
                        8번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question8" style = "height:25px" size=" 90" value = "<?=$question8?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label8_1" style = "height:25px" value = "<?=$label8_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label8_5" style = "height:25px" value = "<?=$label8_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 9</font></td>
                    <td  height = 50 width = 350 align = right>
                        9번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question9" style = "height:25px" size=" 90" value = "<?=$question9?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label9_1" style = "height:25px" value = "<?=$label9_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label9_5" style = "height:25px" value = "<?=$label9_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 10</font></td>
                    <td  height = 50 width = 350 align = right>
                        10번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question10" style = "height:25px" size=" 90"  value = "<?=$question10?>">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label10_1" style = "height:25px" value = "<?=$label10_1?>"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label10_5" style = "height:25px" value = "<?=$label10_5?>">&nbsp;&nbsp;5점 라벨</td>
                </tr>


            </tbody>
        </table>
                <input class = "button" type="submit" align = center name="submit" value ="테스트 제출"><br><br>
                <input type = "hidden" name = "time" value = "<?=$time = date("Y-m-d H:i:s",time())?>">
                <input type = "hidden" name = "testIdx" value = "<?=$testIdx?>">
        </form>


        <?php
        mysqli_free_result($res);
        mysqli_close($conn)
        ?>
</body>
</html>