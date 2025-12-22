<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テスト取得 -->
 <?php
  $statement = $db->prepare('SELECT * FROM tests WHERE id=?');
  $statement->execute(array($_GET['id']));
  $test = $statement->fetch();
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
    <h2>テスト編集</h2>
      <form action="edit_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($test['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <dl>
          <dt>ID</dt>
          <dd><?php echo htmlspecialchars($test['id'], ENT_QUOTES); ?></dd>
          <dt>学年</dt>
          <dd><input type="number" name="year" min="1" max="9" value="<?php echo htmlspecialchars($test['year'], ENT_QUOTES);?>" required></dd>
          <dt>テスト名</dt>
          <dd><input type="text" name="name" value="<?php echo htmlspecialchars($test['name'], ENT_QUOTES);?>" required></dd>
        </dl>
        <div><a href="index.php">キャンセル</a> | <button type="submit" onclick="return confirm('本当に更新しますか？');">更新する</button></div>
      </form>
    </table>
  </main>
</body>
</html>