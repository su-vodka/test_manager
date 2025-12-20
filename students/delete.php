<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト取得 -->
 <?php
  $statement = $db->prepare('SELECT * FROM students WHERE id=?');
  $statement->execute(array($_GET['id']));
  $student = $statement->fetch();
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
    <h2>生徒削除</h2>
      <form action="delete_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($student['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <dl>
          <dt>ID</dt>
          <dd><?php echo htmlspecialchars($student['id'], ENT_QUOTES); ?></dd>
          <dt>学年</dt>
          <dd><?php echo htmlspecialchars($student['year'], ENT_QUOTES);?></dd>
          <dt>クラス</dt>
          <dd><?php echo htmlspecialchars($student['class'], ENT_QUOTES);?></dd>
          <dt>学生番号</dt>
          <dd><?php echo htmlspecialchars($student['number'], ENT_QUOTES);?></dd>
          <dt>氏名</dt>
          <dd><?php echo htmlspecialchars($student['name'], ENT_QUOTES);?></dd>
        </dl>
        <div><a href="index.php">キャンセル</a> | <button type="submit" onclick="return confirm('本当に削除しますか？');">削除する</button></div>
      </form>
    </table>
  </main>
</body>
</html>