<!DOCTYPE html>
<?php
session_start();
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <title>PHP</title>

</head>
<body>
<table class="main-table" style="margin-bottom: 1%; height: 100%">
    <tr>
        <th class="header" colspan="4"><h1>Сирый Савва Игоревич P33312</h1></th>
    </tr>
    <tr style="height: 40px">
        <th style="width: 30%;" colspan="1"><h2>Выстрелы</h2></th>
        <th style="width: 70%"><h2>График</h2></th>
    </tr>
    <tr>
        <td class="inside-table">
            <div class="scroll-container">
                <table id="status-table">
                    <tr><th>№</th><th>Статус выстрела</th><th>X</th><th>Y</th><th>R</th><th>Data</th><th>Speed</th></tr>
                    <?php
                    $count = 1;
                    if (isset($_SESSION['results'])) {
                        foreach ($_SESSION['results'] as $result) { ?>
                            <tr>
                                <td><?php $count++; ?></td>
                                <td><?php echo $result[3] ?></td>
                                <td><?php echo $result[0] ?></td>
                                <td><?php echo $result[1] ?></td>
                                <td><?php echo $result[2] ?></td>
                                <td><?php echo $result[4] ?></td>
                                <td><?php echo $result[5] ?></td>
                            </tr>
                        <?php }} ?>
                </table>
            </div>
        </td>
        <td style="width: 80%">
            <div class="schedule-container" style="">
                <svg class="point"  style="margin-left: 92px; margin-top: 2px;" viewBox="0 0 10 10">
                    <circle cx="5" cy="5" r="2.5" fill="red"/>
                </svg>
                <svg class="point" style="margin-left: 0px; margin-top: 2px;"  viewBox="0 0 10 10">
                    <circle cx="5" cy="5" r="2.5" fill="red"/>
                </svg>
                <svg class="point"  style="margin-left: 0px; margin-top: 92px;" viewBox="0 0 10 10">
                    <circle cx="5" cy="5" r="2.5" fill="red"/>
                </svg>
                <svg class="point" style="margin-top: -92px;" viewBox="0 0 10 10">
                    <circle cx="5" cy="5" r="2.5" fill="red"/>
                </svg>
                <div class="img-container">
                    <img src="/img/schedule.jpg" alt="График не загрузился">

                </div>
            </div>
        </td>
    </tr>
    <tr>
        <th class="input-block" style="" colspan="3">
            <form id="post" name="myForm">
                <div style="margin-top: 10px">
                    Кордианта X
                    <button type="button" value="-2" onclick="valueX(this)">
                        -2
                    </button>
                    <button type="button" value="-1.5" onclick="valueX(this)">
                        -1.5
                    </button>
                    <button type="button" value="-1" onclick="valueX(this)">
                        -1
                    </button>
                    <button type="button" value="-0.5" onclick="valueX(this)">
                        -0.5
                    </button>
                    <button type="button" value="0" onclick="valueX(this)">
                        0
                    </button>
                    <button type="button" value="0.5" onclick="valueX(this)">
                        0.5
                    </button>
                    <button  type="button" value="1" onclick="valueX(this)">
                        1
                    </button>
                    <button type="button" value="1.5" onclick="valueX(this)">
                        1.5
                    </button>
                    <button type="button" value="2" onclick="valueX(this)">
                        2
                    </button>
                    <span id="x-eror" style="color: red"></span>
                </div>
                <div style="margin-top: 10px">
                    Кордината Y
                    <input type="text" name="Y" id="Y">
                    <span class="eror" style="color: red"></span>
                </div>
                <div style="margin-top: 10px">
                <span>
                    Радиус R
                    <button type="button" value="1" onclick="valueR(this)">1</button>
                    <button type="button" value="2" onclick="valueR(this)">2</button>
                    <button type="button" value="3" onclick="valueR(this)">3</button>
                    <button type="button" value="4" onclick="valueR(this)">4</button>
                    <button type="button" value="5" onclick="valueR(this)">5</button>
                    <span id="r-eror" style="color: red"></span>
                </span>
                <button type="submit">
                    Отправить
                </button>
                    <button type="button" onclick="localStorage.clear()">
                    ОЧИСТКА ЕБА!
                </button>
                </div>
            </form>
        </th>
    </tr>

</table>

</body>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="/js/post.js"></script>
</html>