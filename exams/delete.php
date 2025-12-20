<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- 削除するテスト取得 -->
 <?php
  $statement = $db->prepare('SELECT e.*, t.name AS test_name, s.name AS student_name FROM tests t, students s, exams e WHERE e.test_id=t.id AND e.student_id=s.id AND e.id=?');
  $statement->execute(array($_GET['id']));
  $exams = $statement->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>成績管理</title>

  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <header>
    <!-- header.htmlを読み込み -->
    <?php include '../header.html'; ?>
  </header>
  <main>
    <h2>成績削除</h2>
      <form action="delete_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($exams['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <dl>
          <dt>ID</dt>
          <dd><?php echo htmlspecialchars($exams['id'], ENT_QUOTES); ?></dd>
          <dt>テストID</dt>
          <dd><?php echo htmlspecialchars($exams['test_id'], ENT_QUOTES);?> <?php echo htmlspecialchars($exams['test_name'], ENT_QUOTES);?></dd>
          <dt>生徒ID</dt>
          <dd><?php echo htmlspecialchars($exams['student_id'], ENT_QUOTES);?> <?php echo htmlspecialchars($exams['student_name'], ENT_QUOTES);?></dd>
          <dt>国語</dt>
          <dd><?php echo htmlspecialchars($exams['japanese'], ENT_QUOTES);?></dd>
          <dt>数学</dt>
          <dd><?php echo htmlspecialchars($exams['math'], ENT_QUOTES);?></dd>
          <dt>英語</dt>
          <dd><?php echo htmlspecialchars($exams['english'], ENT_QUOTES);?></dd>
          <dt>理科</dt>
          <dd><?php echo htmlspecialchars($exams['science'], ENT_QUOTES);?></dd>
          <dt>社会</dt>
          <dd><?php echo htmlspecialchars($exams['social_studies'], ENT_QUOTES);?></dd>
          <dt>合計</dt>
          <dd><?php echo htmlspecialchars($exams['total'], ENT_QUOTES);?></dd>
        </dl>
        <div><a href="index.php">キャンセル</a> | <button type="submit" onclick="return confirm('本当に削除しますか？');">削除する</button></div>
      </form>
    </table>
  </main>
</body>
</html>