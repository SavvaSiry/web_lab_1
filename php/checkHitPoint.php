<?php
session_start();
$start = microtime(true);

if (isset($_POST['x'])) $x = $_POST['x'];
if (isset($_POST['y'])) $y = $_POST['y'];
if (isset($_POST['r'])) $r = $_POST['r'];

$fail = "Промах";
if (($x < -2 || $x > 2) || ($y < -5 || $y > 5) || ($r > 5 || $r < 0)) {
    $fail = "Науршена валидация\n";
} else if ($y < 0 && $x < 0) {
    if (($y > (-$x - $r))) $fail = "Попал\n";
} elseif ($x < 0 && $y > 0) {
    if ($x > (-$r / 2) && $y < $r) $fail = "Попал\n";
} elseif ($x > 0 && $y > 0) {
    if (pow($r, 2) > (pow($x, 2) + pow($y, 2))) $fail = "Попал\n";
} elseif ($x > 0 && $y < 0) {
    $fail = "Промах\n";
} elseif ($x == 0 && $y == 0) $fail = "Попал\n";
else {
    $fail = "Промах\n";
}

$time = number_format(microtime(true) - $start, 6);
try {
    $dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));
} catch (Exception $e) {
}
// Сохранение в сессию
$result = array('x' => $x, 'y' => $y, 'r' => $r, 'status' => $fail, 'dateTime' => ($dt->format('H:i:s')), 'time' => $time);
if (!isset($_SESSION['results'])) {
    $_SESSION['results'] = array();
}
array_push($_SESSION['results'], $result);
echo json_encode($result);
$fail = "Промах";
