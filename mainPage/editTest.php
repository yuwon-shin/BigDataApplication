<?php
include '../include/dbConnect.php';
include '../include/session.php';
$time = $_POST['time'];
$testIdx = $_POST['testIdx'];


if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{ 

    $sql = "update tbTest set testDate = '$time', testTitle = '".$_POST['testTitle']."', testContent = '".$_POST['testContent']."', testCategory = '".$_POST['testCategory']."', question1 = '".$_POST['question1']."',question2 = '".$_POST['question2']."',question3 = '".$_POST['question3']."',question4 = '".$_POST['question4']."',question5 = '".$_POST['question5']."',question6 = '".$_POST['question6']."',question7 = '".$_POST['question7']."',question8 = '".$_POST['question8']."',question9 = '".$_POST['question9']."',question10 = '".$_POST['question10']."' where testIdx = '".$testIdx."' and tbMember_memberIdx = {$_SESSION['ses_index']} ";


    $res = mysqli_query($conn,$sql);
    if ($res === TRUE) { ?>
        <script>
            alert("<?php echo "테스트 수정이 완료되었습니다."?>");
            location.replace('./view.php?type=1&testIdx=<?=$testIdx?>');

        </script>
    <?php
    } else {
        printf("Could not update record: %s\n",mysqli_error($conn));
    }

    mysqli_close($conn);
}
?>