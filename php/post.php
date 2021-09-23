<?php
$X = !empty($_POST['X']) ? $_POST['X'] : '';
$Y = !empty($_POST['Y']) ? $_POST['Y'] : '';
$R = !empty($_POST['R']) ? $_POST['R'] : '';
?>
<html>
<head>
    <title>Обработка POST-запроса</title>
</head>
<body>
<p>
    Переданный X: <?= $X ?>
    <br>
    Переданный Y: <?= $Y ?>
    <br>
    Переданный R: <?= $R ?>
</p>
</body>
</html>