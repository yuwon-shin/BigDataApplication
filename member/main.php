<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title> Log-in / Sign-up </title>
    <style>
        @font-face {
            font-family: 'HeirofLightBold';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_20-07@1.0/HeirofLightBold.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }
        .title {
            color: white;
            font-family: 'HeirofLightBold';
            font-size: 48px;
        }
        .wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 10%;
        }
        .container {
            width: 700px;
            height: 400px;
            text-align: center;
            background-color: black;
            padding: 30px;
        }
        .font {
            color: white;
            font-family: 'HeirofLightBold';
        }
    </style>
</head>

<body style="background-color:#373737;">
<div class="wrap">
    <div class="container">
        <h1 class="title"> Welcome to our page! </h1> 
        <form name="singIn" action="./signIn.php" method="post">  <!--onsubmit="return checkSubmit()""-->
            <div class="line">
                <p class="font">E-mail</p>
                <div class="inputArea">
                    <input type="text" name="memberEmail" class="memberEmail" />
                </div>
            </div>
            <div class="line">
                <p class="font">Password</p>
                <div class="inputArea">
                    <input type="password" name="memberPw" class="memberPw" />
                </div><br/>
            </div>
            <div class="line">
                <input type="submit" value="로그인" class="submit" />
            </div>
        </form><br><br>
        <button type = "button" onclick = "location.href= './signUp.php'">회원가입</button>
    </div>
</div>

</body>
</html>