<?php

// db接続
  require('../dbconnect.php');

// 成績一覧取得
  $exams = $db->query('SELECT * FROM exams');
  // $exams = $db->query('SELECT id, test_id, student_id, japanese, math, english, science, social_studies, total, created_at, updated_at FROM exams');

// csvファイル作成
  $filepath = '../csv/exams' . uniqid() . '.csv';
  $fp = fopen($filepath,'w');

  $header = ['id', 'test_id', 'student_id', 'japanese', 'math', 'english', 'science', 'social_studies', 'total', 'created_at', 'updated_at'];

  fputcsv($fp, $header);
  foreach($exams as $line) {
    // fputcsv($fp, $line); このコードでは、カラムが2つずつ重複して出力される。出力するカラム名を指示する必要あり
    fputcsv($fp, [
        $line['id'], $line['test_id'], $line['student_id'], $line['japanese'], $line['math'], $line['english'], $line['science'], $line['social_studies'], $line['total'], $line['created_at'], $line['updated_at']
    ]);
  }

// csvファイルダウンロード
  header('Content-Type: application/octet-stream'); // ファイルタイプの指定
  header('Content-Length:'.filesize($filepath)); // ファイルサイズの指定
  header('Content-Disposition: attachment; filename=download.csv'); // ファイルの処理方法とファイル名を指定
  readfile($filepath); // ファイル出力
  unlink($filepath); // ファイル削除 ※ココをコメントにすると、サーバー上にファイルが残っていきます
  fclose($fp);

?>