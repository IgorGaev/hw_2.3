<?php
    if (array_key_exists('testNumber', $_GET)) {
        $data = json_decode(file_get_contents(__DIR__ . '/tests.json'), true);
        $filter = FILTER_VALIDATE_INT; # задаем параметры фильтра
        $options = ['options' => ['min_range' => 1,'max_range' => 4]];
        $validate = filter_input(INPUT_GET, 'testNumber', $filter, $options);}
?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if ($validate):
    $selectNumber = $_GET['testNumber'];
    $quest = $data[$selectNumber]['question'];
    $answers = $data[$selectNumber]['answers'];
    $correctAnswerNum = (int)$data[$selectNumber]['correct_answer_num'] ?>
    <h3>Выберите правильный ответ</h3>
    <form method="post">
        <p><b><?php echo $quest?></b> <br>
            <?php foreach ($answers as $answerNum => $answer) : ?>
                <label>
                    <input type="radio" name="answer" value="<?php echo $answerNum?>">
                </label> <?php echo $answer?>
        </p>
            <?php endforeach;?>
        <input type="submit" value="Выбрать">
    </form>
<?php else:
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');?>
    <h1>404 Not Found</h1>
<?php endif; ?>

<?php if (!empty($_POST)):
    $userAnswerNum = (int)++$_POST['answer'];
    if($correctAnswerNum === $userAnswerNum): ?>
        <b><p>Ответ правильный, тест пройден</p></b>
    <?php else: ?>
        <b><p>Ответ неправильный, тест не пройден</p></b>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>