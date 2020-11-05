<?php
    include '../include/dbConnect.php';

    session_start();
?>

<!DOCTYPE html>
<html lang="ko">
    <head> 
        <meta http-equiv="Content-Type"
            content="text/html; charset=UTF-8" /> 
        <title>MY</title>
    </head>
    <body>
        <h1>댓글 목록</h1>
        <div>


            <?php
                //댓글 목록
                $query = "select commentIdx,commentCont,commentDate from tbComment where tbMember_memberIdx = '".$_SESSION['ses_index']."'";
                $result = mysqli_query($conn,$query);


            

                if($result){
                while($newArray=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $commentIdx = $newArray['commentIdx'];
                $commentCont = $newArray['commentCont'];
                $commentDate = $newArray['commentDate'];
                echo $commentIdx." ".$commentCont." ".$commentDate."<br/>";
                }
                }else{
                echo "실패";
                }
                mysqli_free_result($result);
                mysqli_close($conn)
            ?>



        </div>
    </body>
</html>