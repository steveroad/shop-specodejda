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

if (count($_POST) > 0) {
  header('Location: admin.php');
}
?>
<style>
  body {
    margin: 20px;
    background-color: #212121;
  }
  h1 {
    color: #757575;
  }
  span {
    color: #757575;
  }
  form {
    border: 2px solid #757575;
    border-radius: 10px;
    padding-top: 15px;
    padding-left: 5%;
    padding-bottom: 15px;
    background-color: #212121;
    width: 50%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }
  p {
    color: #FFC107;
    font-size: 40px;
  }
  label {
    color: #BDBDBD;
  }
  * {
    font-size: 30px;
  }
  button {
    margin-top: 20px;
  }
</style>

  <h1>Форма администратора</h1>
  <form method="POST">
    <input type="submit" name="unlogin" value="Выйти из формы администратора">
  </form>

  <hr>
  <span>Работа с категориями</span>
  <hr>



<?php
define("DB_HOST", "localhost");
define("DB_NAME", "shop");
define("DB_USER", "root");
define("DB_PASS", "");
$connection = new PDO ('mysql: host=localhost; dbname=shop; charset=utf8', 'root', '');
$db_categories = $connection->query('SELECT * FROM `categories`');
$db_cloth = $connection->query('SELECT * FROM `cloth`');

//Добавление категории
if ($_POST['category_add']) {
    $category = htmlspecialchars($_POST['category_add']);
    $connection->query("INSERT INTO `categories` (`category`) VALUES ('$category')");
}

//Добавление ткани
if ($_POST['cloth_title_add']) {
  $cloth_title = htmlspecialchars($_POST['cloth_title_add']);
  $connection->query("INSERT INTO `cloth` (`cloth_title`) VALUES ('$cloth_title')");
}
?>
  <!--  Работа с категориями -->
  <!--  Добавление -->
  <form method="POST">
    <p>Добавление категории</p>
    <label for="category_add">Название категории:</label>
    <input type="text" name="category_add" required placeholder="Название категории">
    <input type="submit" value="Добавить">
  </form>

  <!--  Изменение -->
  <form method="POST">
    <p>Изменение категории</p>
    <label for="category_change">Название категории</label>
    <select name="category_change" id="category_change"
    <?php
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8"); 
    $sql = ("SELECT * FROM categories"); 
    $result = mysqli_query($db_connection, $sql) 
    or die(mysqli_error($db_connection)); 
    echo "<select name='category_change'>";
    while($row = mysqli_fetch_row($result)){
    echo "<option value='".$row[0]."'> $row[1] </option>"; 
    } 
    echo "</select>";
    
    ?>
    </select>
    <?php
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8");
    $qw1=$_POST["category_change"];
    $category_change_n=$_POST['category_change_n']; 
    $sqlo = "UPDATE `categories` SET `category` = '$category_change_n' WHERE `categories`.`id`=('".$qw1."')"; 
    $result = mysqli_query($db_connection, $sqlo) 
    or die(mysqli_error($db_connection)); 
    ?>
    <label for="category_change_n">Изменение категории</label>
    <input type="text" name="category_change_n" id="category_change_n" required>
    <input type="submit" value="Изменить">
  </form>

  <!--  Удаление -->
  <form method="POST">
    <p>Удаление категории</p>
    <label for="category_del">Название категории</label>
    <select name="category_del" id="category_del"
    <?php
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8"); 
    $sql = ("SELECT * FROM categories"); 
    $result = mysqli_query($db_connection, $sql) 
    or die(mysqli_error($db_connection)); 
    echo "<select name='category_del'>";
    while($row = mysqli_fetch_row($result)){
    echo "<option value='".$row[0]."'> $row[1] </option>"; 
    } 
    echo "</select>";
    ?>
    </select>
    <?php 
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8"); 
    $delz=$_POST['category_del'];
    $query = "DELETE FROM categories WHERE (id='".$delz."')"; 
    $result = mysqli_query($db_connection, $query) 
    or die(mysqli_error($db_connection)); 
    ?>
    <input type="submit"  value="Удалить">
  </form>

  <hr>
  <span>Работа с тканью</span>
  <hr>

    <!--  Работа с тканью -->
    <!--  Добавление -->
  <form method="POST">
    <p>Добавление ткани</p>
    <label for="cloth_title_add">Название ткани:</label>
    <input type="text" name="cloth_title_add" required placeholder="Название ткани">
    <input type="submit" value="Добавить">
  </form>

    <!--  Изменение -->
    <form method="POST">
    <p>Изменение ткани</p>
    <label for="cloth_change">Название ткани</label>
    <select id="cloth_change"
    <?php
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8"); 
    $sql = ("SELECT * FROM cloth"); 
    $result = mysqli_query($db_connection, $sql) 
    or die(mysqli_error($db_connection)); 
    echo "<select name='cloth_change'>";
    while($row = mysqli_fetch_row($result)){
    echo "<option value='".$row[0]."'> $row[1] </option>"; 
    } 
    echo "</select>";
    ?>
    </select>
    <?php
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8");
    $qw1=$_POST["cloth_change"];
    $category_change_n=$_POST['cloth_change_n']; 
    $sqlo = "UPDATE `cloth` SET `cloth_title` = '$category_change_n' WHERE `cloth`.`id`=('".$qw1."')"; 
    $result = mysqli_query($db_connection, $sqlo) 
    or die(mysqli_error($db_connection)); 
    ?>
    <label for="cloth_change_n">Изменение категории</label>
    <input type="text" name="cloth_change_n" id="cloth_change_n" required>
    <input type="submit" value="Изменить">
  </form>

  <!--  Удаление -->
  <form method="POST" action="">
    <p>Удаление ткани</p>
    <label for="cloth_del">Название ткани</label>
    <select id="cloth_del"
    <?php
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8"); 
    $sql = ("SELECT * FROM cloth"); 
    $result = mysqli_query($db_connection, $sql) 
    or die(mysqli_error($db_connection)); 
    echo "<select name='cloth_del'>";
    while($row = mysqli_fetch_row($result)){
    echo "<option value='".$row[0]."'> $row[1] </option>"; 
    } 
    echo "</select>";
    ?>
    </select>
    <?php 
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
    mysqli_set_charset($db_connection, "utf8"); 
    $delz=$_POST['cloth_del'];
    $query = "DELETE FROM cloth WHERE (id='".$delz."')"; 
    $result = mysqli_query($db_connection, $query) 
    or die(mysqli_error($db_connection)); 
    ?>
    <input type="submit"  value="Удалить">
  </form>