<?php
include '../include/dbConnect.php';
include '../include/session.php';
$testIdx = $_GET['testIdx'];


if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{
	$sql1 = "delete from tbTestScrap where tbTest_testIdx = $testIdx";
	$res1 = mysqli_query($conn,$sql1);

	$sql2 = "delete from tbAnswer where tbTest_testIdx = $testIdx";
	$res2 = mysqli_query($conn,$sql2);

	$sql = "select 'commentIdx' from tbcomment where tbTest_testIdx = $testIdx";
	$res = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_assoc($res);

	$sql3 = "delete from tbComlike where tbComment_commentIdx = '".$rows['commentIdx']."'";
	$res3 = mysqli_query($conn,$sql3);   

	$sql4 = "delete from tbComment where tbTest_testIdx = $testIdx";
	$res4 = mysqli_query($conn,$sql4);

	$sql5 = "delete from tbTest where testIdx = $testIdx";
	$res5 = mysqli_query($conn,$sql5);

	if ($res5 === TRUE) { ?>
        <script>
            alert("<?php echo "테스트 삭제가 완료되었습니다."?>");
            location.replace('./index.php');

        </script>
    <?php
    } else {
        printf("Could not delete record: %s\n",mysqli_error($conn));
    }

    mysqli_close($conn);
}

?>