<?php
session_start();
if (!$_SESSION['login'] || !$_SESSION['password']) {
  header('Location: login.php');
  die();
}
if ($_POST['unlogin']) {
  session_destroy();
  header('Location: login.php');
}
?>
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

  <h1>Форма администратора</h1>

  <hr>

  <form method="POST">
    <label for="title">Название товара: </label>
    <input type="text" name="title" placeholder="Название товара">
    <input type="submit" value="Добавить">
  </form>

  <form method="POST">
    <label for="">Название товара: </label>
    <input type="text" name="" placeholder="Название товара">
    <input type="submit" value="Изменить">
  </form>

  <form method="POST">
    <label for="">Название товара: </label>
    <input type="text" name="" placeholder="Название товара">
    <input type="submit" value="Удалить">
  </form>

  <form method="POST">
    <input type="submit" name="unlogin" value="Выйти из формы администратора">
  </form>