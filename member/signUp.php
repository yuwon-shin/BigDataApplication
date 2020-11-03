<!doctype html>
<html>
<head>
  <title>Sign Up</title>
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
        text-align: center;
        background-color: black;
        padding: 30px;
    }
    .comment {
      text-align: center;
      color: white;
      font-family: 'HeirofLightBold';
      font-size: 20px;

    }
    .font {
        color: white;
        font-family: 'HeirofLightBold';
    }
    table {
      margin-left: auto;
      margin-right: auto;
    }

  </style>
</head>


<body style="background-color:#373737;">
  <div class = "wrap">
    <form name="join" method="post" action="saveMember.php">
      <div class="container">
        <h3 class="title">[Sign up] Please insert your information</h3>
        <table border="1">
          <tr>
            <td><p class="font">Name</p></td>
            <td><input type="text" size="30" maxlength = "10" name="memberName"></td>
          </tr>
          <tr>
            <td><p class="font">NickName</p></td>
            <td><input type="text" size="30" maxlength = "10" name="memberNickName"></td>
          </tr>
          <tr>
            <td><p class="font">E-mail</p></td>
            <td><input type="text" size="30" name="memberEmail"></td>
          </tr>
          <tr>
            <td><p class="font">Password</p></td>
            <td><input type="password" size="30" name="memberPw"></td>
          </tr>
          <tr>
            <td><p class="font">Confirm Password</p></td>
            <td><input type="password" size="30" name="memberPw2"></td>
          </tr>
         </table>
         <br><br>
          <input type=submit value="가입하기">
          <input type=reset value="초기화">

      </div> 
    </form>
  </div>
</body>

</html>