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
    <h1>成績管理</h1>
    <nav>
      <a href="../tests/index.php">テスト一覧</a>
      <a href="../tests/create.php">テスト作成</a>
      <a href="index.php">生徒一覧</a>
      <a href="create.php">生徒登録</a>
    </nav>
  </header>
  <main>
    <h2>生徒編集</h2>
      <form action="edit_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($student['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <dl>
          <dt>ID</dt>
          <dd><?php echo htmlspecialchars($student['id'], ENT_QUOTES); ?></dd>
          <dt>学年</dt>
          <dd><input type="number" name="year" value="<?php echo htmlspecialchars($student['year'], ENT_QUOTES);?>" required></dd>
          <dt>クラス</dt>
          <dd><input type="text" name="class" value="<?php echo htmlspecialchars($student['class'], ENT_QUOTES);?>" required></dd>
          <dt>学生番号</dt>
          <dd><input type="text" name="number" value="<?php echo htmlspecialchars($student['number'], ENT_QUOTES);?>" required></dd>
          <dt>氏名</dt>
          <dd><input type="text" name="name" value="<?php echo htmlspecialchars($student['name'], ENT_QUOTES);?>" required></dd>
        </dl>
        <button type="submit">更新</button>
      </form>
    </table>
  </main>
</body>
</html>