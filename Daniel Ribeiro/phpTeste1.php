<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $string = 'Hello World!';
    $string = 'It is Tom\'s house';
    $string1 = 'Hello';
    $string2 = 'World!';
    $stringall = $string1.' '.$string2;
    echo strlen("Hello world!"); // 12
    echo strpos("Hello world!","world"); // 6
    echo str_word_count("Hello world!"); // 2
    ?>
</body>
</html>