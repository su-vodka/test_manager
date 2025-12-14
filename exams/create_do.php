<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト作成処理 -->
 <?php
 if (!empty($_POST)) {
  $statement = $db->prepare('INSERT INTO exams SET test_id=?, student_id=?, kokugo=?, sugaku=?, eigo=?, rika=?, shakai=?, goukei=?, created_at=NOW()');
  $statement->execute(array($_POST['test_id'], $_POST['student_id'], $_POST['kokugo'], $_POST['sugaku'], $_POST['eigo'], $_POST['rika'], $_POST['syakai'], $_POST['goukei']));
  header('Location: index.php'); exit();
 }
 ?>
