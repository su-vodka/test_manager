<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト作成処理 -->
 <?php
 if (!empty($_POST)) {
  $statement = $db->prepare('UPDATE tests SET year=?, name=?, created_at=NOW() WHERE id=?');
  $statement->execute(array($_POST['year'], $_POST['name'], $_POST['id']));
  header('Location: index.php'); exit();
 }
 ?>
