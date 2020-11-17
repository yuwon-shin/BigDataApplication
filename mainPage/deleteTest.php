<?php
include '../include/dbConnect.php';
include '../include/session.php';
$testIdx = $_GET['testIdx'];
$delete = $_GET['delete'];

if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{

	mysqli_autocommit($conn,FALSE);

    $sql = "delete from tbTest where testIdx = $testIdx";
	$res = mysqli_query($conn,$sql);
	if ($res == TRUE) {

	if ($delete==1) { 
			mysqli_query($conn, "COMMIT"); ?>
        <script>
            alert("<?php echo "테스트 삭제가 완료되었습니다."?>");
            location.replace('./index.php');

        </script>
    <?php
    } elseif($delete==0) {
        mysqli_rollback($conn); ?>
        <script>
            alert("<?php echo "테스트 삭제가 최소되었습니다."?>");
            location.replace('./index.php');

        </script>

    <?php
    }

    mysqli_close($conn);
}
}
?>