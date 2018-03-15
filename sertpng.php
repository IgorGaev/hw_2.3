<?php
if (array_key_exists('userName', $_POST)) {
    $name = (string)$_POST['userName'];
    $rating = '5';
    $textName = 'Молодец ' . $name . '!';
    $textRating = 'Оценка: ' . $rating;

    // Генерируем сертификат

    $image = imagecreatetruecolor(300, 424);

    $backColor = imagecolorallocate($image, 255, 255, 255);
    $textColor = imagecolorallocate($image, 0, 0, 0);

    $boxFile = __DIR__ . '/certback.png';
    if (!file_exists($boxFile)) {
        echo 'Файл с картинкой не найден!';
        exit;
    }

    $inBox = imagecreatefrompng($boxFile);

    imagecopy($image, $inBox, 0, 0, 0, 0, 300, 424);

    $fontFile = __DIR__ . '/times.ttf';

    if (!file_exists($fontFile)) {
        echo 'Файл с картинкой не найден!';
        exit();
    }

    imagettftext($image, 14, 0, 75, 200, $textColor, $fontFile, $textName);
    imagettftext($image, 14, 0, 100, 240, $textColor, $fontFile, $textRating);

    header('Content-Type: image/png');
    imagepng($image);

    imagedestroy($image);
}
