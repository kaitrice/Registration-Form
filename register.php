<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
  <title>A1 - Register</title>
</head>

<body>
  <div id="container">
    <div class="left" id h>

    </div>
    <div class="right" id="register">
      <h1>Register for a New Account</h1>

      <form action="verify.php" method="post" id="register">
        <fieldset>
          <legend>Your Information</legend>
          <input type="text" name="f_name" placeholder="first name" id="f_name">
          <input type="text" name="l_name" placeholder="last name" id="l_name">
          <input type="phone" name="phone" placeholder="phone  ### - ### - ####">
          <input type="text" name="email" placeholder="email" id="email">
          <input type="text" name="email_var" placeholder="email again" id="email_var">
        </fieldset>

        <fieldset>
          <legend>Log In Information</legend>
          <input type="text" name="user" placeholder="username" id="user">
          <input type="password" name="pass" placeholder="password" id="pass">
          <input type="password" name="pass_var" placeholder="password again" id="pass_var">
        </fieldset>

        <input type="submit" name="btn" placeholder="Register" id="btn">
      </form>
    </div>
  </div>
</body>

</html>