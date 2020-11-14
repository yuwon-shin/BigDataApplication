<?php
    include '../include/dbConnect.php';
    include '../include/session.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type"
          content="text/html; charset=UTF-8" />
    <title>New Test</title>
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

<body>
    <h1 align = center><br><b>테스트 만들기</b><br><br></h1>
    <h3 align = center><font color = #373737> [나만의 테스트를 만들어보세요]</font></h3>
    <h3 align = right style = "padding-right: 8%"> 작성자:&nbsp;&nbsp;<?=$_SESSION['ses_user']?></h3>
        <form action="newTest.php" method="POST" align = center>
        <table style = "padding-top:20px" align = "center">
            <thead>
                <tr>
                <td colspan = 5 height = 60 align = center bgcolor = #373737><font color=white><b>New Test</b></font></td></tr>
            </thead>

            <tbody>
                <tr><td colspan = 3 height = 5></td></tr>                
                <tr>
                    <td height = 50 width = 200 align = center bgcolor = #efefef><font>테스트 제목</font></td>
                    <td  height = 50 width = 350 align = right>
                        원하시는 테스트 제목을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="testTitle" style = "height:25px" size=" 90">
                    </td>
                </tr>
                

                <tr>
                    <td height = 50 width = 200 align = center bgcolor = #efefef><font>테스트 내용</font></td>
                    <td  height = 50 width = 350 align = right>
                        테스트에 대해 간단하게 설명해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="testContent" style = "height:25px" size=" 90">
                    </td>
                </tr>

                <tr>
                    <td height = 50 width = 200 align = center bgcolor = #efefef><font>테스트 카테고리</font></td>
                    <td  height = 50 width = 350 align = right>
                        테스트 카테고리를 기입해주세요 (ex-심리):&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="testCategory" style = "height:25px" size=" 90">
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
                        <input type="text" name="question1" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label1_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label1_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 2</font></td>
                    <td  height = 50 width = 350 align = right>
                        2번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question2" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label2_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label2_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 3</font></td>
                    <td  height = 50 width = 350 align = right>
                        3번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question3" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label3_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label3_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 4</font></td>
                    <td  height = 50 width = 350 align = right>
                        4번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question4" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label4_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label4_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 5</font></td>
                    <td  height = 50 width = 350 align = right>
                        5번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question5" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label5_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label5_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 6</font></td>
                    <td  height = 50 width = 350 align = right>
                        6번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question6" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label6_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label6_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 7</font></td>
                    <td  height = 50 width = 350 align = right>
                        7번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question7" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label7_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label7_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 8</font></td>
                    <td  height = 50 width = 350 align = right>
                        8번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question8" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label8_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label8_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 9</font></td>
                    <td  height = 50 width = 350 align = right>
                        9번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question9" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label9_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label9_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>

                <tr>
                    <td rowspan="2" width = 200 align = center bgcolor = #efefef><font>문항 10</font></td>
                    <td  height = 50 width = 350 align = right>
                        10번 문항의 질문을 기입해주세요:&nbsp;&nbsp;</td>
                    <td height = 50 colspan = 3>
                        <input type="text" name="question10" style = "height:25px" size=" 90">
                    </td>
                </tr>
                <tr>
                    <td  height = 50 width = 350 align = right>
                        라벨을 입력해 주세요&nbsp;&nbsp;</td>
                    <td width='20%'>1점 라벨&nbsp;&nbsp;<input type="text" align = center name="label10_1" style = "height:25px"></td>
                    <td>
                        <input type = "radio" value = "1" disabled>
                        <input type = "radio" value = "2" disabled>
                        <input type = "radio" value = "3" disabled>
                        <input type = "radio" value = "4" disabled>
                        <input type = "radio" value = "5" disabled>
                    </td>
                    <td width='20%'><input type="text" align = center name="label10_5" style = "height:25px">&nbsp;&nbsp;5점 라벨</td>
                </tr>


            </tbody>
        </table>
                <input class = "button" type="submit" align = center name="submit" value ="테스트 제출"><br><br>
                <input type = "hidden" name = "time" value = "<?=$time = date("Y-m-d H:i:s",time())?>">
        </form>

</body>
</html>