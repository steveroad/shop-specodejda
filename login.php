<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Вход в систему</title>
  <style>
    body {
      margin: 50% auto;
    }
    input, textarea, button {
      margin: 15px;
      display: block;
      font-size: 30px;
    }
  </style>
</head>
<body>

<?php
  session_start();
  $conection = new PDO (dsn: 'mysql:host=localhost; dbname=shop charset=utf-8', username: 'root', passw: '');
  $data = $conection->query(statement: 'SELECT * FROM `admin`');
  if ($_POST['login']) {
    foreach ($data as $info) {
      if ($_POST['login'] == $info['login'] && $_POST['password'] == $info['password']) {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        header (string: 'Location: admin.php')
      }
    }
  }
?>

  <h2>Вход в систему</h2>
  <form method="POST">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button>Отправить</button>
  </form>

</body>
</html>