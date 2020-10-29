<?php

require_once("funcs.php");

//1. GETデータ取得
$id= $_GET["id"];


//2. DB接続します
$pdo= db_conn();

// 3. 1件取り出し
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=$id");
$status = $stmt->execute(); //実行

//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>update comment</title>
  <link href="css/reset.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Main[Start] -->
<h1>コメント編集</h1>
<form method="post" action="bm_update.php">
  <div class="wanted" id="wanted" style="display: block;">
   <fieldset>
     <label>タイトル：<br><input type="text" name="title" id="form_title" readonly value="<?= $result['title']?>"></label><br>
     <label>著者：<br><input type="text" name="author" id="form_author" readonly value="<?= $result['author']?>"></label><br>
     <input type="hidden" name="url" id="form_page" value="<?= $result['url']?>">
     <input type="hidden" name="img" id="form_img" value="<?= $result['img']?>">
     <label>コメント：<br><textArea name="comment" rows="4" cols="40" id="comment" placeholder="コメントを書く"><?= $result['comment']?></textArea></label><br>
     <input type="hidden" name="id" id="form_id" value="<?= $result['id']?>">
     <input type="submit" value="修正" class="button" id="add">
    </fieldset>
  </div>
</form>

<div><a href="select.php" class="link">ほしい本リスト</a></div>
<!-- Main[End] -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$("#add").on("click", function(){
  const comment= $("#comment").val();
  if (comment=="") {
    $("#comment").val("なし");
    }
});
</script>
</body>
</html>