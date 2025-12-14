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
    <h2>生徒登録</h2>
      <form action="create_do.php" method="post">
        <dl>
          <dt>学年</dt>
          <dd><input type="number" name="year" required></dd>
          <dt>クラス</dt>
          <dd><input type="text" name="class" required></dd>
          <dt>学生番号</dt>
          <dd><input type="text" name="number" required></dd>
          <dt>氏名</dt>
          <dd><input type="text" name="name" required></dd>
        </dl>
        <button type="submit">作成</button>
      </form>
  </main>
</body>
</html>