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
        <h1>내가 찜한 테스트 목록</h1>
        <div>

            <?php 
                $query = "select t.testIdx, t.testTitle
                            from tbTestScrap ts
                            left outer join tbTest t
                            on ts.tbTest_testIdx = t.testIdx
                            where ts.tbMember_memberIdx = '".$_SESSION['ses_index']."'";
                $result = mysqli_query($conn,$query);
            

                if($result){
                while($newArray=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $testIdx = $newArray['testIdx'];
                $testTitle = $newArray['testTitle'];
                ?>
                <table border cols=2>
                <tr>

                <td>
                <?php echo $testIdx."<br/>";?>
                </td>

                <td>
                <?php echo $testTitle."<br/>";?>
                </td>

                </tr>
                </table>
                <?php
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