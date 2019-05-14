<?php
session_start();
$connection = new PDO ('mysql: host=localhost; dbname=shop; charset=utf8', 'root', '');
$data = $connection->query('SELECT * FROM `admin`');
if ($_POST['login']) {
  foreach ($data as $info) {
    if ($_POST['login'] == $info['login'] && $_POST['password'] == $info['password']) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    header ('Location: admin.php');
    }
  }
}
?>
<style>
  body {
    background-color: #EDEDED
  }
  input, textarea, button {
    margin: 15px;
    display: block;
    font-size: 30px;
  }
  input {
    color: #1B1464;
    background-color: #dbdbdb;
  }
  button {
    padding: 10px;
    color: #1B1464;
    background-color: #FBB03B;
  }
</style>
<h2>Вход в систему</h2>
<form method="POST">
  <input type="text" name="login" placeholder="Логин" required>
  <input type="password" name="password" placeholder="Пароль" required>
  <button>Отправить</button>
</form>