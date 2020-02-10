<?php include('auth.php'); ?>

<html>
    <head>
        <title>Login page</title>
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
        <form action="login.php" method="POST">
            <?php if(count($auth_error)>0): ?>
                <div>
                    <?php foreach ($auth_error as $print): ?>
                    <p><?php echo $print; ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <table>
            <tr>
                <td><label>Username:</label></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label>Password:</label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="login">Sign in</button></td>
            </tr>
          </table>
            <p>
                Not a member? <a href="register.php">Register</a>
            </p>

        </form>
    </body>
</html>
