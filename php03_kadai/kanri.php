<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/reset.css" rel="stylesheet">
  <link href="css/style_kanri.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>

<body>
<h1>ユーザー登録</h1>
<form method="post" action="insert_kanri.php" class="kanri">
  <div class="wanted" id="wanted" style="display: block;">
   <fieldset>
     <label>名前：<br><input type="text" name="name" class="form"></label><br>
     <label>id：<br><input type="text" name="lid" class="form"></label><br>
     <label>パスワード：<br><input type="password" name="lpw" class="form"></label><br>
     <p>管理者区分：</p>
     <label class="my-radio"><input type="radio" name="kanri_flg" value="0" required><span class="radio-mark"></span>一般</label>
     <label class="my-radio"><input type="radio" name="kanri_flg" value="1"><span class="radio-mark"></span>管理者</label><br>
     <p class="label">在職状況：</p>
     <label class="my-radio"><input type="radio" name="life_flg" value="1" required><span class="radio-mark"></span>在職中</label>
     <label class="my-radio"><input type="radio" name="life_flg" value="0"><span class="radio-mark"></span>退職済み</label><br>
     <input type="submit" value="リストに追加" class="button" id="add">
    </fieldset>
  </div>
</form>
<div><a href="select_kanri.php" class="link">ユーザー一覧</a></div>
</body>
</html>