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
    <h1>成績管理</h1>
    <nav>
      <a href="index.php">テスト一覧</a>
      <a href="create.php">テスト作成</a>
      <a href="../students/index.php">生徒一覧</a>
      <a href="../students/create.php">生徒登録</a>
    </nav>
  </header>
  <main>
    <h2>テスト編集</h2>
      <form action="delete_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($test['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <dl>
          <dt>学年</dt>
          <dd><?php echo htmlspecialchars($test['year'], ENT_QUOTES);?></dd>
          <dt>テスト名</dt>
          <dd><?php echo htmlspecialchars($test['name'], ENT_QUOTES);?></dd>
        </dl>
        <div><a href="index.php">キャンセル</a> | <button type="submit" onclick="return confirm('本当に削除しますか？');">削除する</button></div>
      </form>
    </table>
  </main>
</body>
</html>