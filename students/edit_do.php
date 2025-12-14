<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト作成処理 -->
 <?php
 if (!empty($_POST)) {
  $statement = $db->prepare('UPDATE students SET year=?, class=?, number=?, name=? WHERE id=?');
  $statement->execute(array($_POST['year'], $_POST['class'], $_POST['number'], $_POST['name'], $_POST['id']));
  header('Location: index.php'); exit();
 }
 ?>
