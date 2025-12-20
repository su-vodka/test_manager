<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト作成処理 -->
 <?php
 if (!empty($_POST)) {
  $statement = $db->prepare('DELETE FROM exams WHERE id=?');
  $statement->execute(array($_POST['id']));
  header('Location: index.php'); exit();
 }
 ?>
