<?php
include '../include/dbConnect.php';

session_start();
$testIdx = $_GET['testIdx'];

if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{

    $sql = "insert into tbComment (commentCont, tbTest_testIdx, tbMember_memberIdx) 
            values('".$_POST['writeComment']."', '".$testIdx."' , '".$_SESSION['ses_index']."')";

    $res = mysqli_query($conn,$sql);
    if ($res === TRUE) {
        echo "<script> alert('댓글 등록 완료'); location.href='joinTest.php?testIdx=$testIdx'; </script>";
    } else {
        printf("Could not insert record: %s\n",mysqli_error($conn));
    }

    mysqli_close($conn);
}

?>