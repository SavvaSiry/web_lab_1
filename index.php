<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <title>PHP</title>

</head>
<body>
<table class="main-table" style=" height: 90%">
    <?php
    include('blocks/header.php');
    ?>
    <tr style="height: 30px">
        <th class="text" style="width: 40%;" colspan="1"><h2>Выстрелы</h2></th>
        <th class="text" style="width: 60%"><h2>График</h2></th>
    </tr>
    <tr>
        <td class="inside-table">
            <div class="scroll-container">
                <table id="status-table">
                    <tr>
                        <th width="130px">Статус выстрела</th>
                        <th>X</th>
                        <th>Y</th>
                        <th>R</th>
                        <th>Data</th>
                        <th>Speed</th>
                    </tr>
                    <?php
                    if (isset($_SESSION['results'])) {
                        foreach ($_SESSION['results'] as $result) { ?>
                            <tr>
                                <td><?php echo $result['status'] ?></td>
                                <td><?php echo $result['x'] ?></td>
                                <td><?php echo $result['y'] ?></td>
                                <td><?php echo $result['r'] ?></td>
                                <td><?php echo $result['dateTime'] ?></td>
                                <td><?php echo $result['time'] ?></td>
                            </tr>
                        <?php }
                    } ?>
                </table>
            </div>
        </td>
        <td style="width: 80%">
            <div class="schedule-container" style="">
                <div class="img-container">
                    <img src="/img/graf.png" alt="График не загрузился">

                </div>
            </div>
        </td>
    </tr>
    <tr>
        <th class="input-block" style="" colspan="3">
            <form id="post" name="myForm" style="margin-top: 20px">
                <span class="text" style="margin-top: 10px">
                    Кордианта X
                    <button style="margin-left: 10px" type="button" value="-2" onclick="valueX(this)">
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
                    <button type="button" value="1" onclick="valueX(this)">
                        1
                    </button>
                    <button type="button" value="1.5" onclick="valueX(this)">
                        1.5
                    </button>
                    <button type="button" value="2" onclick="valueX(this)">
                        2
                    </button>
                    <span id="x-eror" style="color: red"></span>
                </span>
                <span class="text" style="margin-top: 10px">
                    Кордината Y
                    <input type="text" name="Y" id="Y">
                    <span class="eror" style="color: red"></span>
                </span>
                <div class="box" style="margin-top: 10px">
                <span class="text">
                    Радиус R
                    <button style="margin-left: 33px" type="button" value="1" onclick="valueR(this)">1</button>
                    <button type="button" value="2" onclick="valueR(this)">2</button>
                    <button type="button" value="3" onclick="valueR(this)">3</button>
                    <button type="button" value="4" onclick="valueR(this)">4</button>
                    <button type="button" value="5" onclick="valueR(this)">5</button>
                    <span id="r-eror" style="color: red"></span>
                </span>
                    <button class="text" type="submit">
                        Отправить
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