<?php
    include_once 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang="ko">
    <head> 
        <meta http-equiv="Content-Type"
            content="text/html; charset=UTF-8" /> 
        <title>sample ssssssspage</title>
    </head>
    <body>
        <h1>maisssssn home</h1>
        <div>
            <?php echo "테스트 보기."; ?>
            <?php 
                $query = "select * from tbtest";
                $result = mysqli_query($conn,$query);
                if($result){
                $num = mysqli_num_rows($result);
                printf("데이터 %d",$num);
            }
                mysqli_free_result($result);
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>