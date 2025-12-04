<!-- db接続 -->
<?php
  require('dbconnect.php');
?>

<!-- テスト一覧取得 -->
<?php
  $tests = $db->query('SELECT * FROM tests');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>成績管理</title>

  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header>
    <h1>成績管理</h1>
  </header>
  <main>
    <h2>テスト一覧</h2>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>学年</th>
        <th>テスト名</th>
      </tr>
      <?php foreach ($tests as $test): ?>
        <tr>
          <td><?php echo htmlspecialchars($test['id'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($test['year'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($test['name'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <p><a href="create.php">テスト作成</a></p>
  </main>
</body>
</html>