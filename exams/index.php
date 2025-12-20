<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- 成績一覧取得 -->
<?php
  $exams = $db->query('SELECT e.*, t.name AS test_name, s.name AS student_name FROM tests t, students s, exams e WHERE e.test_id=t.id AND e.student_id=s.id');
?>

<!-- リンク用テストID取得 -->
<?php
  $test_id = $db->query('SELECT id, name FROM tests');
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
    <h2>成績一覧</h2>
      <p>
        <?php foreach($test_id as $value): ?>
          <a href="result.php?test_id=<?php echo htmlspecialchars($value['id']); ?>"><?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?></a> / 
        <?php endforeach; ?>
      </p>
    <table>
      <tr>
        <th>ID</th>
        <th>テスト</th>
        <th>名前</th>
        <th>国語</th>
        <th>数学</th>
        <th>英語</th>
        <th>理科</th>
        <th>社会</th>
        <th>合計</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      <?php foreach ($exams as $exam): ?>
        <tr>
          <td><?php echo htmlspecialchars($exam['id'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['test_name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['student_name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['japanese'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['math'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['english'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['science'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['social_studies'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['total'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><a href="edit.php?id=<?php echo htmlspecialchars($exam['id'], ENT_QUOTES); ?>">編集</a></td>
          <td><a href="delete.php?id=<?php echo htmlspecialchars($exam['id'], ENT_QUOTES); ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
</body>
</html>