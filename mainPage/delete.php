<?php
include '../include/dbConnect.php';
include '../include/session.php';
$testIdx = $_GET['testIdx'];


if(mysqli_connect_errno()){
    printf("실패");
    exit();
}
else{
?>
	<script>
		alert("테스트를 정말 삭제하시겠습니까?");
		location.replace('./view.php?type=0&testIdx=<?=$testIdx?>');

	</script>	
<?php
}
?>