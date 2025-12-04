<!-- db接続 -->
<?php
  require('dbconnect.php');
?>

<!-- テスト作成処理 -->
 <?php
 if (!empty($_POST)) {
  $statement = $db->prepare('INSERT INTO tests SET year=?, name=?, created_at=NOW()');
  $statement->execute(array($_POST['year'], $_POST['name']));
  header('Location: index.php'); exit();
 }
 ?>
