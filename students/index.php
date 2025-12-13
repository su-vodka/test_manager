<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- 生徒一覧取得 -->
<?php
  $students = $db->query('SELECT * FROM students');
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
    </nav>
  </header>
  <main>
    <h2>生徒一覧</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>学年</th>
        <th>クラス</th>
        <th>出席番号</th>
        <th>氏名</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      <?php foreach ($students as $student): ?>
        <tr>
          <td><?php echo htmlspecialchars($student['id'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($student['year'], ENT_QUOTES, 'UTF-8'); ?>年</td>
          <td><?php echo htmlspecialchars($student['class'], ENT_QUOTES, 'UTF-8'); ?>組</td>
          <td><?php echo htmlspecialchars($student['number'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><a href="edit.php?id=<?php echo htmlspecialchars($student['id'], ENT_QUOTES); ?>">編集</a></td>
          <td><a href="delete.php?id=<?php echo htmlspecialchars($student['id'], ENT_QUOTES); ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
</body>
</html>