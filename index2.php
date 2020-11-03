<?php
    include_once 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang="ko">
    <head> 
        <meta http-equiv="Content-Type"
            content="text/html; charset=UTF-8" /> 
        <title>Main Page</title>
    </head>
    <body>
        <h1>Main Page</h1>
        <div>

        	
            <?php echo "메인 홈페이지입니다.<br/><br/>"; 

            $query = "select * from tbtest";
            $res = mysqli_query($conn,$query);
            ?>


    	<form action="main.php?testIdx=testIdx" method="GET">
    	<input type="button">
    	<?php

    		if($res){
            while($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC)){
            $testIdx = $newArray['testIdx'];
			$testContent = $newArray['testContent'];
			echo "".$testIdx."번 테스트 : ".$testContent."<br/>";

        }
        }else{
        echo "실패";
    	}
    	mysqli_free_result($res);
    	mysqli_close($conn)
    	?>

    	</form>

        </div>
    </body>
</html>