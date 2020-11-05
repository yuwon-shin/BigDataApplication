<?php
    include '../include/dbConnect.php';
    include '../include/session.php';

    $scrap = $_GET['scrap'];
    $testIdx = $_GET['testIdx'];

    if(mysqli_connect_errno()){
        printf("실패");
        exit();
    }
    else{

        if($scrap==0){
            $sql = "insert into tbTestScrap (tbMember_memberIdx,tbTest_testIdx) values ('".$_SESSION['ses_index']."', '".$testIdx."')";
            $res = mysqli_query($conn,$sql);
            if ($res === TRUE) {
                echo "<script> alert('찜 했습니다'); location.href='index.php'; </script>";
            } else {
                printf("Could not insert record: %s\n",mysqli_error($conn));
            }
        }elseif($scrap==1){
            $sql = "delete from tbTestScrap where tbMember_memberIdx = '".$_SESSION['ses_index']."' and tbTest_testIdx= '".$testIdx."'";
            $res = mysqli_query($conn,$sql);
            if ($res === TRUE) {
                echo "<script> alert('찜 취소했습니다'); location.href='index.php'; </script>";
            } else {
                printf("Could not insert record: %s\n",mysqli_error($conn));
            }

        }else{
            echo "오류";
        }



        mysqli_close($conn);
    }
?>