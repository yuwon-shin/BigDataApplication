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
    .button1{
          height: 35px;
          width: 90px;
          font-size: 13px;
          color: white;
          text-align: center;
          margin-bottom: 10px;
          background-color: #373737;
          border: 3px solid #efefef;
          border-radius: 4px

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
          <tr>
            <td><p class="font">Sex</p></td>
            <td><label><font color = white>여성</font><input type="radio" name = "memberSex" value = "여성"></label>
                <label><font color = white>&nbsp;남성</font><input type="radio" name = "memberSex" value = "남성"></label></td>
          </tr>
          <tr>
            <td><p class="font">Age</p></td>
            <td><font style = "font-size: 13px" color = white>[숫자만 입력]&nbsp;</font><input type="text" size="15" name="memberAge"></td>
          </tr>
          <tr>
            <td><p class="font">Job</p></td>
            <td><label><font color = white>이공계열</font><input type="radio" name = "memberJob" value = "이공계열"></label>
              <label><font color = white>&nbsp;인문계열</font><input type="radio" name = "memberJob" value = "인문계열"></label>
              <label><font color = white>&nbsp;사회계열</font><input type="radio" name = "memberJob" value = "사회계열"></label>
              <label><font color = white>&nbsp;의약계열</font><input type="radio" name = "memberJob" value = "의약계열"></label><br>
              <label><font color = white>예체능계열</font><input type="radio" name = "memberJob" value = "예체능계열"></label>
              <label><font color = white>&nbsp;교육계열</font><input type="radio" name = "memberJob" value = "교육계열"></label>
              <label><font color = white>&nbsp;직장인</font><input type="radio" name = "memberJob" value = "직장인"></label>
            </td>
          </tr>

         </table>
         <br><br>
         
          <input class = "button1"type=submit value="가입하기">
          <input class = "button1"type=reset value="초기화">
        
      </div> 
    </form>
  </div>
</body>

</html>