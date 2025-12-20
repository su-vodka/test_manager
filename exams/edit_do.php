<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト作成処理 -->
 <?php
 if (!empty($_POST)) {
  $statement = $db->prepare('UPDATE exams SET test_id=?, student_id=?, japanese=?, math=?, english=?, science=?, social_studies=?, total=? WHERE id=?');
  $statement->execute(array($_POST['test_id'], $_POST['student_id'], $_POST['japanese'], $_POST['math'], $_POST['english'], $_POST['science'], $_POST['social_studies'], $_POST['total'], $_POST['id']));
  $a = 1;
  header('Location: index.php'); exit();
 }
 ?>
