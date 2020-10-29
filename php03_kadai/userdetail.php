<?php
require_once("funcs.php");
//１．PHP
$id= $_GET['id'];
$pdo = db_conn2();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=$id");
$status = $stmt->execute();

//３．データ表示
$view = "";
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
  <title>ユーザー情報更新</title>
  <link href="css/reset.css" rel="stylesheet">
  <link href="css/style_kanri.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>

<body>
<h1>ユーザー情報更新</h1>
<form method="post" action="update_kanri.php" class="kanri">
  <div class="wanted" id="wanted" style="display: block;">
   <fieldset>
     <label>名前：<br><input type="text" name="name" class="form" value="<?= $result['name']?>"></label><br>
     <label>id：<br><input type="text" name="lid" class="form" value="<?= $result['lid']?>"></label><br>
     <label>パスワード：<br><input type="password" name="lpw" class="form"  value="<?= $result['lpw']?>"></label><br>
     <p>管理者区分：</p>
     <label class="my-radio"><input type="radio" name="kanri_flg" <?= $result['kanri_flg']=="0" ? 'checked' : '' ?> required value="0"><span class="radio-mark"></span>一般</label>
     <label class="my-radio"><input type="radio" name="kanri_flg" <?= $result['kanri_flg']=="1" ? 'checked' : '' ?> value="1"><span class="radio-mark"></span>管理者</label><br>
     <p class="label">在職状況：</p>
     <label class="my-radio"><input type="radio" name="life_flg" <?= $result['life_flg']=="1" ? 'checked' : '' ?> value="1" required><span class="radio-mark"></span>在職中</label>
     <label class="my-radio"><input type="radio" name="life_flg" <?= $result['life_flg']=="0" ? 'checked' : '' ?> value="0"><span class="radio-mark"></span>退職済み</label><br>
     <input name="id" value="<?= $result['id']?>" type="hidden">
     <input type="submit" value="更新" class="button" id="add">
    </fieldset>
  </div>
</form>
<div><a href="select_kanri.php" class="link">ユーザー一覧</a></div>
</body>