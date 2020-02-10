<?php include('auth.php'); ?>

<html>
    <head>
        <title>Register</title>
        <link rel="icon" href="favicon (3).ico">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif|Rubik|Unna&display=swap" rel="stylesheet">
        <style>
          table{
            margin: 100px auto;
            width: 50%;
            font-size: 20px;
            font-family: 'Noto Serif';
          }
          p{
            text-align: center;
          }
        </style>
    </head>
    <body>
      <div class="header">
        <h1>Pharmacy Inventory System</h1>

    </div>
        <form action="register.php" method="POST">
            <!--display error here-->
            <?php if(count($auth_error)>0): ?>
                <div>
                    <?php foreach ($auth_error as $print): ?>
                    <p><?php echo $print; ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <!--register form-->
            <table>
              <tr>
                <td><label>Username:</label></td>
                <td><input type="text" name="username" value="<?php echo $username ?>"></td>
              </tr>
              <tr>
                <td><label>Email:</label></td>
                <td><input type="text" name="email" value="<?php echo $email ?>"></td>
              </tr>
              <tr>
                <td><label>Password:</label></td>
                <td><input type="password" name="password_1"></td>
              </tr>
            <tr>
                <td><label>Confirm Password:</label></td>
                <td><input type="password" name="password_2"></td>
            </tr>
            <tr>
                <td><button type="submit" name="register">Register</button></td>
            </tr>
          </table>
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>

        </form>
        
        <?php
        
        //display inventory here
        
        ?>
    </body>
</html>
