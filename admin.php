<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Вход в систему</title>
  <style>
    body {
      margin: 20px;
    }
    * {
      font-size: 30px;
    }
    button {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <?php
    session_start();
    if (!$_SESSION['login'] || !$_SESSION['password']) {
      header(string: 'Location: login.php');
      die();
    }

    if ($_POST['unlogin']) {
      session_destroy();
      header(string: 'Location: login.php')
    }
  ?>

  <h1>Форма администратора</h1>

  <hr>

  <form method="POST">
    <input type="submit" name="unlogin" value="Выйти из формы администратора">
  </form>

</body>
</html>