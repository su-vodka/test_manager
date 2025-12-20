<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- セレクトボックス用テストID取得 -->
<?php
  $test_id = $db->query('SELECT id, name FROM tests');
?>
<!-- セレクトボックス用生徒ID取得 -->
<?php
  $student_id = $db->query('SELECT id, name FROM students');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>成績管理</title>
  <link rel="stylesheet" href="../css/style.css" />

  <!-- 合計自動計算 -->
  <script src="../js/calc_total.js"></script>

</head>
<body>
  <header>
    <!-- header.htmlを読み込み -->
    <?php include '../header.html'; ?>
  </header>
  <main>
    <h2>成績登録</h2>
      <form action="create_do.php" method="post">
        <dl>
          <dt>テストID</dt>
          <dd>
            <select name="test_id" required>
              <?php foreach ($test_id as $value): ?>
                <option value="<?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>
                  <?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
              <?php endforeach; ?>
            </select></dd>
          <dt>生徒ID</dt>
          <dd>
            <select name="student_id" required>
              <?php foreach ($student_id as $value): ?>
                <option value="<?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>
                  <?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
              <?php endforeach; ?>
             </select></dd>
          <dt>国語</dt>
          <dd><input type="number" name="japanese" id="japanese" min="0" max="100" required></dd>
          <dt>数学</dt>
          <dd><input type="number" name="math" id="math" min="0" max="100" required></dd>
          <dt>英語</dt>
          <dd><input type="number" name="english" id="english" min="0" max="100" required></dd>
          <dt>理科</dt>
          <dd><input type="number" name="science" id="science" min="0" max="100" required></dd>
          <dt>社会</dt>
          <dd><input type="number" name="social_studies" id="social_studies" min="0" max="100" required></dd>
          <dt>合計</dt>
          <dd><input type="number" name="total" id="total" readonly required></dd>
        </dl>
        <button type="submit">作成</button>
      </form>
  </main>
</body>
</html>