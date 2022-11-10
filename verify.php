if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $user_name = $_POST["user_name"] ?? ""; 
      $user_pass = $_POST["user_pass"] ?? ""; 
      $pw = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO `ricek20_db`.`users`(`users_id`,`user_name`,`user_pass`,`user_email`,`user_date`,`user_level`) 
            VALUES (0,'$user_name,$pw,'ricek20@wwu.edu',NULL,0);";
      $db->exec($query);
    }

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
  <title>A1 - Verify</title>
</head>

<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # variables
    $f_name = $_POST["f_name"] ?? "";
    $l_name = $_POST["l_name"] ?? ""; 
    $phone = $_POST["phone"] ?? ""; 
    $email = $_POST["email"] ?? ""; 
    $email_var = $_POST["email_var"] ?? ""; 
    $user = $_POST["user"] ?? ""; 
    $password = $_POST["pass"] ?? ""; 
    $password_var = $_POST["pass_var"] ?? "";
    $pw = password_hash($password, PASSWORD_DEFAULT);

    $emails = false;
    $validated = true;

    function FILTER_VALIDATE_PHONE($num) {
      $phone = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
      $phone = str_replace("-", "", $phone);
      if (preg_match('/^[0-9]{10}+$/', $phone)) {
        return true;
      }
      return false;
    }

    function FILTER_VALIDATE_PASSWORD($pw) {
      if (preg_match('/^(?=.*\d)[0-9A-Za-z]{4,10}$/', $pw) && !str_contains($pw, "(") && !str_contains($pw, ")") && !str_contains($pw, "[") && !str_contains($pw, "]") && !str_contains($pw, "{") && !str_contains($pw, "}") && !str_contains($pw, ".")) {
        return true;
      }
      return false;
    }
  }
      
  ?>
  <div id="container">
    <div class="left" id h>

    </div>
    <div class="right" id="register">
      <h1>Register for a New Account</h1>

      <form action="register.php" method="get" id="register">
        <fieldset>
          <legend>Your Information</legend>
          <!-- first name -->
          <?php if (empty($f_name)) { ?>
            <input type="text" name="f_name" placeholder="first name" id="f_name">
            <?php $validated = false;
            echo ("invalid first name");
          } else { ?>
            <div class="info"><?php echo $f_name ?></div>
          <?php }?>

          <!-- last name -->
          <?php if (empty($l_name)) { ?>
            <input type="text" name="l_name" placeholder="last name" id="l_name">

            <?php $validated = false;
            echo ("invalid last name");
          } else { ?>
            <div class="info"><?php echo $l_name ?></div>
          <?php }?>

          <!-- phone -->
          <?php if (!FILTER_VALIDATE_PHONE($phone)) { ?>
            <input type="phone" name="phone" placeholder="phone  ### - ### - ####">

            <?php $validated = false;
            echo ("invalid phone number");
          } else { ?>
            <div class="info"><?php echo $phone ?></div>
          <?php }?>

          <!-- emails -->
          <?php 
          if ($email != $email_var) { ?>
            <input type="text" name="email" placeholder="email" id="email">
            <input type="text" name="email_var" placeholder="email again" id="email_var">
            <?php echo "emails must match";
          } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { ?>
              <input type="text" name="email" placeholder="email" id="email">
              <input type="text" name="email_var" placeholder="email again" id="email_var">
              <?php $validated = false;
              echo "invalid email";
            } else { ?>
              <div class="info"><?php echo $email ?></div> 
              <div class="info"><?php echo $email_var ?></div> 
            <?php }
          } ?>
        </fieldset>

        <fieldset>
          <legend>Log In Information</legend>
          <!-- username -->
          <?php if (strlen($user) < 3) { ?>
            <input type="text" name="user" placeholder="username" id="user">

            <?php $validated = false;
            echo "username must be > 3 characters";
          } else { ?>
            <div class="info"><?php echo $user ?></div>
          <?php } ?>
          
          <!-- passwords -->
          <?php 
          if ($password != $password_var) { ?>
            <input type="password" name="pass" placeholder="password" id="pass">
            <input type="password" name="pass_var" placeholder="password again" id="pass_var">
            <?php echo "passwords must match";
          } else {
            if (!FILTER_VALIDATE_PASSWORD($password)) { ?>
              <input type="password" name="pass" placeholder="password" id="pass">
              <input type="password" name="pass_var" placeholder="password again" id="pass_var">
              <?php $validated = false;
              echo "password must be between 4 and 10 characters, contain a number, and not contain any '()', '[]', '.', or '{}'.";
            } else { ?>
              <div class="info"><?php echo $password ?></div> 
              <div class="info"><?php echo $password_var ?></div> 
            <?php } 
          } ?>
        </fieldset>

        <?php
        if (!$validated) { ?>
          <input type="submit" name="btn" value="try again" id="btn"> <br><br>
          <?php die("Error! Please fill out all required feilds");
        } ?>
      </form>

      
    </div>
  </div>
</body>

</html>