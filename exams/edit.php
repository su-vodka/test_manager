<!-- db接続 -->
<?php
  require('../dbconnect.php');
?>

<!-- 編集するテスト取得 -->
 <?php
  $statement = $db->prepare('SELECT e.*, t.name AS test_name, s.name AS student_name FROM tests t, students s, exams e WHERE e.test_id=t.id AND e.student_id=s.id AND e.id=?');
  $statement->execute(array($_GET['id']));
  $exams = $statement->fetch();
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
    <h2>成績編集</h2>
      <form action="edit_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($exams['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <dl>
          <dt>ID</dt>
          <dd>
            <?php echo htmlspecialchars($exams['id'], ENT_QUOTES); ?>
          </dd>

          <dt>テストID</dt>
          <dd>
            <select name="test_id" required>
              <option value="<?php echo htmlspecialchars($exams['test_id'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($exams['test_id'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($exams['test_name'], ENT_QUOTES, 'UTF-8'); ?> (変更なし)</option>
              <?php foreach ($test_id as $value): ?>
                <option value="<?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>
                  <?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </dd>

          <dt>生徒ID</dt>
          <dd>
            <select name="student_id" required>
              <option value="<?php echo htmlspecialchars($exams['student_id'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($exams['student_id'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($exams['student_name'], ENT_QUOTES, 'UTF-8'); ?> (変更なし)</option>
              <?php foreach ($student_id as $value): ?>
                <option value="<?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>
                  <?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </dd>
          
          <dt>国語</dt>
          <dd><input type="number" name="japanese" id="japanese" min="0" max="100" value="<?php echo htmlspecialchars($exams['japanese'], ENT_QUOTES);?>" required></dd>
          <dt>数学</dt>
          <dd><input type="number" name="math" id="math" min="0" max="100" value="<?php echo htmlspecialchars($exams['math'], ENT_QUOTES);?>" required></dd>
          <dt>英語</dt>
          <dd><input type="number" name="english" id="english" min="0" max="100" value="<?php echo htmlspecialchars($exams['english'], ENT_QUOTES);?>" required></dd>
          <dt>理科</dt>
          <dd><input type="number" name="science" id="science" min="0" max="100" value="<?php echo htmlspecialchars($exams['science'], ENT_QUOTES);?>" required></dd>
          <dt>社会</dt>
          <dd><input type="number" name="social_studies" id="social_studies" min="0" max="100" value="<?php echo htmlspecialchars($exams['social_studies'], ENT_QUOTES);?>" required></dd>
          <dt>合計</dt>
          <dd><input type="number" name="total" id="total" value="<?php echo htmlspecialchars($exams['total'], ENT_QUOTES);?>" readonly require></dd>
        </dl>
        <div><a href="index.php">キャンセル</a> | <button type="submit" onclick="return confirm('本当に更新しますか？');">更新する</button></div>
      </form>
    </table>
  </main>
</body>
</html>