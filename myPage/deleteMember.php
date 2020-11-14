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
        echo "<script> alert('탈퇴 완료'); location.href='../mainPage/index.php'; </script>";

    } else {
        printf("Could not insert record: %s\n",mysqli_error($conn));
    }

    unset($_SESSION['ses_user']);
    unset($_SESSION['ses_name']);
    unset($_SESSION['ses_index']);
    unset($_SESSION['ses_email']);
    unset($_SESSION['ses_pw']);
    unset($_SESSION['ses_sex']);
    unset($_SESSION['ses_age']);
    unset($_SESSION['ses_job']);
    mysqli_close($conn);
    }
?>