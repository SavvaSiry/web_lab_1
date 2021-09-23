<?php
session_start();
$start = microtime(true);
try {
    $dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));
} catch (Exception $e) {
}

if (isset($_POST['x'])) $x = $_POST['x'];
if (isset($_POST['y'])) $y = $_POST['y'];
if (isset($_POST['r'])) $r = $_POST['r'];

if (($x < -2 || $x > 2) || ($y < -5 || $y > 5) || ($r > 5 || $r < 0)) {
    echo "{\"status\": \"Нарушена валидация\"}";
} else if ($y < 0 & $x < 0) {
    if (($y < (-$x - $r))) {
        $time = number_format(microtime(true) - $start, 6);
        saveSession($time, "Промах");
        echo "{\"status\": \"Промах\", \"data\": \"" . $dt->format('H:i:s') . "\", \"speed\": \"".$time."\"}";
    }
} elseif ($x < 0 && $y > 0) {
    if ($x < ($r / 2) && $y > $r) {
        $time = number_format(microtime(true) - $start, 6);
        saveSession($time, "Промах");
        echo "{\"status\": \"Промах\", \"data\": \"" . $dt->format('H:i:s') . "\", \"speed\": \"".$time."\"}";
    }
} elseif ($x > 0 && $y > 0) {
    if ($r < pow($x, 2) + pow($y, 2)) {
        $time = number_format(microtime(true) - $start, 6);
        saveSession($time, "Промах");
        echo "{\"status\": \"Промах\", \"data\": \"" . $dt->format('H:i:s') . "\", \"speed\": \"".$time."\"}";
    }
} elseif ($x > 0 && $y < 0) {
    $time = number_format(microtime(true) - $start, 6);
    saveSession($time, "Промах");
    echo "{\"status\": \"Промах\", \"data\": \"" . $dt->format('H:i:s') . "\", \"speed\": \"".$time."\"}";
} elseif ($x === 0 && $y === 0) {
    $time = number_format(microtime(true) - $start, 6);
    saveSession($time, "Попал");
    echo "{\"status\": \"Попал\", \"data\": \"" . $dt->format('H:i:s') . "\", \"speed\": \"".$time."\"}";

} else {
    $time = number_format(microtime(true) - $start, 6);
    saveSession($time, "Попал");
    echo "{\"status\": \"Попал\", \"data\": \"" . $dt->format('H:i:s') . "\", \"speed\": \"".$time."\"}";
}

function saveSession($time, $status)
{
    global $dt, $x, $y, $r;
    $result = array($x, $y, $r, $status, $dt->format('H:i:s'), $time);
    if (!isset($_SESSION['results'])) {
        $_SESSION['results'] = array();
    }

    array_push($_SESSION['results'], $result);
}
