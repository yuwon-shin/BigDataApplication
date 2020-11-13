<?php
	include "../include/dbConnect.php";
	include "../include/session.php";


	$member = $_POST['member'];

    $qry = "select memberIdx from tbMember where memberNickName = '$member'";
    $res = mysqli_query($conn,$qry);
    $rows= mysqli_fetch_assoc($res);
    $memberIdx = $rows['memberIdx'];

	$testIdx = $_POST['testIdx'];
	$time = $_POST['time'];
    $_SESSION['answer1'] = $_POST['answer1']; $_SESSION['answer2'] = $_POST['answer2'];
    $_SESSION['answer3'] = $_POST['answer3']; $_SESSION['answer4'] = $_POST['answer4'];
    $_SESSION['answer5'] = $_POST['answer5']; $_SESSION['answer6'] = $_POST['answer6'];
    $_SESSION['answer7'] = $_POST['answer7']; $_SESSION['answer8'] = $_POST['answer8'];
    $_SESSION['answer9'] = $_POST['answer9']; $_SESSION['answer10'] = $_POST['answer10'];

	$query = "insert into tbanswer (answerDate, answer1, answer2, answer3, answer4, answer5, answer6, answer7, answer8, answer9, answer10, tbTest_testIdx, tbMember_memberIdx) 
            VALUES ('$time','".$_SESSION['answer1']."', '".$_SESSION['answer2']."', '".$_SESSION['answer3']."', '".$_SESSION['answer4']."', '".$_SESSION['answer5']."'
            , '".$_SESSION['answer6']."', '".$_SESSION['answer7']."', '".$_SESSION['answer8']."', '".$_SESSION['answer9']."', '".$_SESSION['answer10']."', '$testIdx', '$memberIdx')";
	$result = mysqli_query($conn,$query);

	if($result){ ?>

		<script>
			alert("<?php echo "답변이 등록되었습니다."?>");
			location.replace('./result.php?testIdx=<?=$testIdx?>');

		</script>
	<?php
	}
	else{
		echo "FAIL";
	}

	mysqli_close($conn);
?>