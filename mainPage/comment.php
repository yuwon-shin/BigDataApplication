<?php
include '../include/dbConnect.php';
include '../include/session.php';

if(isset($_GET['testIdx'])){
    $testIdx = $_GET['testIdx'];
}
if(isset($_GET['commentIdx'])){
    $commentIdx = $_GET['commentIdx'];
}

if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{
    if(isset($_POST['comment'])){
        switch($_POST['comment']){
            case "x":
                $sql1 = "delete from tbComment where commentIdx= '".$commentIdx."'";
                $res1 = mysqli_query($conn,$sql1);

                if ($res1 === TRUE) {
                    echo "<script> alert('댓글 삭제 완료'); location.href='joinTest.php?testIdx=$testIdx'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }

                break;

            case "insert":
                $sql = "insert into tbComment (commentCont, tbTest_testIdx, tbMember_memberIdx) 
                values('".$_POST['inputcomment']."', '".$testIdx."' , '".$_SESSION['ses_index']."')";

                $res = mysqli_query($conn,$sql);
                if ($res === TRUE) {
                    echo "<script> alert('댓글 등록 완료'); location.href='joinTest.php?testIdx=$testIdx'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }

                break;

            case "좋아요하기":
                echo "좋아요하기";
                $sql2 = "insert into tbComLike (tbMember_memberIdx,tbComment_commentIdx) values ('".$_SESSION['ses_index']."', '".$commentIdx."')";
                $res2 = mysqli_query($conn,$sql2);

                if ($res2 === TRUE) {
                    echo "<script> alert('좋아요 완료'); location.href='joinTest.php?testIdx=$testIdx'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }
                break;

            case "좋아요취소":
                echo "좋아요취소하기";
                $sql3 = "delete from tbComLike where tbMember_memberIdx = '".$_SESSION['ses_index']."' and tbComment_commentIdx= '".$commentIdx."'";
                $res3 = mysqli_query($conn,$sql3);

                if ($res3 === TRUE) {
                    echo "<script> alert('좋아요 취소 완료'); location.href='joinTest.php?testIdx=$testIdx'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }
                break;

        }
    }
    if(isset($_POST['mycomment'])){
        switch($_POST['mycomment']){
            case "x":
                $sql1 = "delete from tbComment where commentIdx= '".$commentIdx."'";
                $res1 = mysqli_query($conn,$sql1);

                if ($res1 === TRUE) {
                    echo "<script> alert('댓글 삭제 완료'); location.href='../myPage/commentList.php'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }

                break;

            case "insert":
                $sql = "insert into tbComment (commentCont, tbTest_testIdx, tbMember_memberIdx) 
                values('".$_POST['inputcomment']."', '".$testIdx."' , '".$_SESSION['ses_index']."')";

                $res = mysqli_query($conn,$sql);
                if ($res === TRUE) {
                    echo "<script> alert('댓글 등록 완료'); location.href='../myPage/commentList.php'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }

                break;

            case "좋아요하기":
                echo "좋아요하기";
                $sql2 = "insert into tbComLike (tbMember_memberIdx,tbComment_commentIdx) values ('".$_SESSION['ses_index']."', '".$commentIdx."')";
                $res2 = mysqli_query($conn,$sql2);

                if ($res2 === TRUE) {
                    echo "<script> alert('좋아요 완료'); location.href='../myPage/commentList.php'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }
                break;

            case "좋아요취소":
                echo "좋아요취소하기";
                $sql3 = "delete from tbComLike where tbMember_memberIdx = '".$_SESSION['ses_index']."' and tbComment_commentIdx= '".$commentIdx."'";
                $res3 = mysqli_query($conn,$sql3);

                if ($res3 === TRUE) {
                    echo "<script> alert('좋아요 취소 완료'); location.href='../myPage/commentList.php'; </script>";
                } else {
                    printf("Could not insert record: %s\n",mysqli_error($conn));
                }
                break;

        }
    }





}

?>