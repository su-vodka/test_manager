<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト作成処理 -->
 <?php
 if (!empty($_POST)) {
  $statement = $db->prepare('INSERT INTO students SET year=?, class=?, number=?, name=?, created_at=NOW()');
  $statement->execute(array($_POST['year'], $_POST['class'], $_POST['number'], $_POST['name']));
  header('Location: index.php'); exit();
 }
 ?>
