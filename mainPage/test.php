<?php
    include '../include/dbConnect.php';
?>

<!DOCTYPE html>
<html lang="ko">
    <head> 
        <meta http-equiv="Content-Type"
            content="text/html; charset=UTF-8" /> 
        <title>New Test</title>
    </head>
    <body>
        <h1>테스트 만들기</h1>
        <div>

    	<form action="newTest.php" method="POST">
            
        <p>문항1
    	<input type="text" name="question1" size="30">

        <p>문항2
        <input type="text" name="question2" size="30">
        
        <p>문항3
        <input type="text" name="question3" size="30">
        
        <p>문항4
        <input type="text" name="question4" size="30">
        
        <p>문항5
        <input type="text" name="question5" size="30">
        
        <p>문항6
        <input type="text" name="question6" size="30">
        
        <p>문항7
        <input type="text" name="question7" size="30">
        
        <p>문항8
        <input type="text" name="question8" size="30">
        
        <p>문항9
        <input type="text" name="question9" size="30">
        
        <p>문항10
        <input type="text" name="question10" size="30">
        
    	<input type="submit" name="submit" value ="테스트 제출">

    	</form>

        </div>
    </body>
</html>