<?php
include '../include/dbConnect.php';

session_start();


if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{

    $sql = "insert into tbTest (testTitle, testContent, testCategory, question1,question2,question3,question4,question5,question6,question7,question8,question9,question10, tbMember_memberIdx) 
            values('".$_POST['testTitle']."','".$_POST['testContent']."','".$_POST['testCategory']."','".$_POST['question1']."','".$_POST['question2']."','".$_POST['question3']."','".$_POST['question4']."','".$_POST['question5']."','".$_POST['question6']."','".$_POST['question7']."','".$_POST['question8']."','".$_POST['question9']."','".$_POST['question10']."', '".$_SESSION['ses_index']."')";

    $res = mysqli_query($conn,$sql);
    if ($res === TRUE) {
        echo "<script> alert('테스트 등록 완료'); location.href='index.php'; </script>";
    } else {
        printf("Could not insert record: %s\n",mysqli_error($conn));
    }

    mysqli_close($conn);
}
?>