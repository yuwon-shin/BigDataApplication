<?php
    include '../include/dbConnect.php';

    session_start();

    $originPw = md5($_POST['originPw']);
    $newPw = md5($_POST['newPw']);
    $newPw2 = md5($_POST['newPw2']);


    if(mysqli_connect_errno()){
        printf("실패");
        exit();
    }
    else{

    if($originPw!=$_SESSION['ses_pw']){
        echo $originPw;
        echo "다음";
        echo $_SESSION['ses_name'];
        echo $_SESSION['ses_user'];
        echo $_SESSION['ses_pw'];
        echo "비밀번호가 틀렸습니다.";
    }else{
        if($newPw!=$newPw2){
            echo "비밀번호가 일치하지 않습니다.";
        }else{
            $sql = "update tbMember set memberPw='$newPw' where memberIdx = '".$_SESSION['ses_index']."'";

            $res = mysqli_query($conn,$sql);
            if ($res === TRUE) {
            echo "<script> alert('비밀번호 변경 완료'); location.href='editPw.php'; </script>";
            } else {
            printf("Could not insert record: %s\n",mysqli_error($conn));
            }

        }
    }


    
    mysqli_close($conn);
    }
?>