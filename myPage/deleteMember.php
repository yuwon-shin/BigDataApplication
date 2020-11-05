<?php
    include '../include/dbConnect.php';

    session_start();


    if(mysqli_connect_errno()){
        printf("실패");
        exit();
    }
    else{


    $sql = "delete from tbMember where memberIdx = '".$_SESSION['ses_index']."'";

    $res = mysqli_query($conn,$sql);
    if ($res === TRUE) {
    echo "탈퇴 성공";
    } else {
    printf("Could not insert record: %s\n",mysqli_error($conn));
    }

    mysqli_close($conn);
    }
?>