<?php
include '../include/dbConnect.php';
include '../include/session.php';
$time = $_POST['time'];


if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{

    $sql = "insert into tbTest 
            (testDate, testTitle, testContent, testCategory, question1,question2,question3,question4,question5,question6,question7,question8,question9,question10
            ,label1_1,label1_5,label2_1,label2_5,label3_1,label3_5,label4_1,label4_5,label5_1,label5_5,label6_1,label6_5,label7_1,label7_5,label8_1,label8_5,label9_1,label9_5,label10_1,label10_5
            , tbMember_memberIdx) 
            values('$time','".$_POST['testTitle']."','".$_POST['testContent']."','".$_POST['testCategory']."'
            ,'".$_POST['question1']."','".$_POST['question2']."','".$_POST['question3']."','".$_POST['question4']."','".$_POST['question5']."','".$_POST['question6']."','".$_POST['question7']."','".$_POST['question8']."','".$_POST['question9']."','".$_POST['question10']."'
            ,'".$_POST['label1_1']."','".$_POST['label1_5']."','".$_POST['label2_1']."','".$_POST['label2_5']."','".$_POST['label3_1']."','".$_POST['label3_5']."','".$_POST['label4_1']."','".$_POST['label4_5']."','".$_POST['label5_1']."','".$_POST['label5_5']."'
            ,'".$_POST['label6_1']."','".$_POST['label6_5']."','".$_POST['label7_1']."','".$_POST['label7_5']."','".$_POST['label8_1']."','".$_POST['label8_5']."','".$_POST['label9_1']."','".$_POST['label9_5']."','".$_POST['label10_1']."','".$_POST['label10_5']."'
            ,'".$_SESSION['ses_index']."')";

    $res = mysqli_query($conn,$sql);
    if ($res === TRUE) {
        echo "<script> alert('테스트 등록 완료'); location.href='index.php'; </script>";
    } else {
        printf("Could not insert record: %s\n",mysqli_error($conn));
    }

    mysqli_close($conn);
}
?>