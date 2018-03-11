<?php
if (!empty($_FILES)) {
    move_uploaded_file($_FILES['testfile']['tmp_name'],'tests.json');
    header('Location: http://university.netology.ru/u/igaev/hw_2.3/list.php');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тест</title>
</head>
<body>
<h1>Загрузите файл с тестом</h1>
<form action="admin.php" enctype="multipart/form-data" method="post">
    <p><input name="testfile" type="file"></p>
    <input type="submit" value="Загрузить">
</form>
</body>
</html>