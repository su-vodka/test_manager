<!-- リクエストがなければindex.phpへリダイレクト -->
<?php
  if (!isset($_REQUEST['test_id'])) {
    header('Location: index.php');
    exit();
  }
?>

<!-- 並び替えの初期値 -->
<?php
  if (!isset($_REQUEST['order'])) {
    $_REQUEST['order'] = 'e.student_id';
  }
  $order = $_REQUEST['order'];
?>

<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- 成績一覧取得 -->
<?php
  $exams = $db->prepare("SELECT e.*, t.name AS test_name, s.name AS student_name, s.id AS student_id FROM tests t, students s, exams e WHERE e.test_id=t.id AND e.student_id=s.id AND t.id=? ORDER BY $order ASC");
  $exams->bindParam(1, $_REQUEST['test_id'], PDO::PARAM_INT);
  $exams->execute();
?>

<!-- リンク用テストID取得 -->
<?php
  $test_id = $db->query('SELECT id, name FROM tests');
?>

<!-- 選択中のテスト名取得 -->
<?php
  $test_name = $db->prepare('SELECT name FROM tests WHERE id=?');
  $test_name->bindParam(1, $_REQUEST['test_id'], PDO::PARAM_INT);
  $test_name->execute();
  $selected_name = $test_name->fetch();
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
      <p>絞り込み：
        <?php foreach($test_id as $value): ?>
          <a href="result.php?test_id=<?php echo htmlspecialchars($value['id']); ?>"><?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?></a> / 
        <?php endforeach; ?>
      </p>
      <p>選択中：<?php echo htmlspecialchars($selected_name['name'], ENT_QUOTES, 'UTF-8'); ?></p>
    <table>
      <tr>
        <th>学生番号</th>
        <th>名前</th>
        <th>国語</th>
        <th>数学</th>
        <th>英語</th>
        <th>理科</th>
        <th>社会</th>
        <th>合計</th>
      </tr>
      <?php foreach ($exams as $exam): ?>
        <tr>
          <td><?php echo htmlspecialchars($exam['student_id'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['student_name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['japanese'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['math'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['english'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['science'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['social_studies'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($exam['total'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
</body>
</html>