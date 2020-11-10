<?php

     include '../include/dbConnect.php';

    session_start();


    if(mysqli_connect_errno()){
        printf("실패");
        exit();
    }
    else{


    $sql = "update tbMember set memberName='".$_POST['userName']."', memberNickName='".$_POST['userNickName']."' where memberIdx = '".$_SESSION['ses_index']."'";

    $res = mysqli_query($conn,$sql);
    if ($res === TRUE) {
    echo "<script> alert('수정 완료'); location.href='editProfile.php'; </script>";

    } else {
    printf("Could not insert record: %s\n",mysqli_error($conn));
    }

    mysqli_close($conn);
    }

?>