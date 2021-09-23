<?php
session_start();
$start = microtime(true);
$data = file_get_contents('php://input');
$array = json_decode($data, true);

$x = (int)$array['x'];
$y = (int)$array['y'];
$r = (int)$array['r'];

if (($x < -2 || $x > 2) || ($y < -5 || $y > 5) || ($r > 5 || $r < 0)) {
    echo "{\"status\": \"Нарушена валидация\"}";
} else if ($y < 0 & $x < 0) {
    if (($y < (-$x - $r))) {
        saveSession("Промах");
        echo "{\"status\": \"Промах\"}";
    }
} elseif ($x < 0 && $y > 0) {
    if ($x < ($r / 2) && $y > $r)
        saveSession("Промах");
        echo "{\"status\": \"Промах\"}";
} elseif ($x > 0 && $y > 0) {
    if ($r < pow($x, 2) + pow($y, 2)) {
        saveSession("Промах");
        echo "{\"status\": \"Промах\"}";
    }
} elseif ($x > 0 && $y < 0) {
    saveSession("Промах");
    echo "{\"status\": \"Промах\"}";
} elseif ($x === 0 && $y === 0) {
    saveSession("Попал");
    echo "{\"status\": \"Попал\"}";
} else {
    saveSession("Попал");
    echo "{\"status\": \"Попал\"}";
}

function saveSession($status)
{
    global $start, $x, $y, $r;
    $time = number_format(microtime(true) - $start, 6);

    $dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));
    $result = array($x, $y, $r, $status, $dt->format('H:i:s'), $time);
    if (!isset($_SESSION['results'])) {
        $_SESSION['results'] = array();
    }

    array_push($_SESSION['results'], $result);
}
