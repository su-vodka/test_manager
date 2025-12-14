<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- テストID取得 -->
<?php
  $test_id = $db->query('SELECT id, name FROM tests');
?>
<!-- 生徒ID取得 -->
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
  <script>
    (function(){
      const ids = ['kokugo','sugaku','eigo','rika','syakai'];
      function calcTotal(){
        let total = 0;
        ids.forEach(id => {
          const el = document.getElementById(id);
          if (!el) return;
          const v = parseInt(el.value, 10);
          if (!isNaN(v)) total += v;
        });
        const out = document.getElementById('goukei');
        if (out) out.value = total;
      }
      document.addEventListener('DOMContentLoaded', () => {
        ids.forEach(id => {
          const el = document.getElementById(id);
          if (el) el.addEventListener('input', calcTotal);
        });
        calcTotal();
      });
    })();
  </script>

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
          <dd><input type="number" name="kokugo" id="kokugo" min="0" max="100" required></dd>
          <dt>数学</dt>
          <dd><input type="number" name="sugaku" id="sugaku" min="0" max="100" required></dd>
          <dt>英語</dt>
          <dd><input type="number" name="eigo" id="eigo" min="0" max="100" required></dd>
          <dt>理科</dt>
          <dd><input type="number" name="rika" id="rika" min="0" max="100" required></dd>
          <dt>社会</dt>
          <dd><input type="number" name="syakai" id="syakai" min="0" max="100" required></dd>
          <dt>合計</dt>
          <dd><input type="number" name="goukei" id="goukei" readonly required></dd>
        </dl>
        <button type="submit">作成</button>
      </form>
  </main>
</body>
</html>