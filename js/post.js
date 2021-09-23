let x, y, r;

valueX = (btn) => {
    x = (btn.value);
}

valueR = (btn) => {
    r = (btn.value);
}

document.addEventListener('DOMContentLoaded', () => {
    'use strict';
    const form = document.querySelector("form");

    form.addEventListener('submit', (even) => {
        even.preventDefault();

        for (let elem of form.elements) {
            if (elem.tagName === "INPUT") {
                if (elem.value === "") {
                    elem.nextElementSibling.textContent = "Введите данные";
                } else if (elem.value <= -5 || elem.value >= 5
                || (/[a-zA-Z]/.test(elem.value))) {
                    elem.nextElementSibling.textContent = "Неверные данные";
                } else {
                    elem.nextElementSibling.textContent = "";
                }
            }
        }
        console.log(x);
        if (x === undefined) {
            document.getElementById("x-eror").textContent = "Выберите";
        } else {
            document.getElementById("x-eror").textContent = "";
        }
        if (r === undefined){
            document.getElementById("r-eror").textContent = "Выберите";
        } else {
            document.getElementById("r-eror").textContent = "";
        }
    });
});

// Создаем экземпляр класса XMLHttpRequest
const request = new XMLHttpRequest();

// Указываем путь до файла на сервере, который будет обрабатывать наш запрос
const url = "ajax_quest.php";

// Так же как и в GET составляем строку с данными, но уже без пути к файлу
const params = "x=" + x + "&y=" + y + "&r=" + r;

/* Указываем что соединение	у нас будет POST, говорим что путь к файлу в переменной url, и что запрос у нас
асинхронный, по умолчанию так и есть не стоит его указывать, еще есть 4-й параметр пароль авторизации, но этот
	параметр тоже необязателен.*/
request.open("POST", url, true);

//В заголовке говорим что тип передаваемых данных закодирован.
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

request.addEventListener("readystatechange", () => {
    if (request.readyState === 4 && request.status === 200) {
        console.log(request.responseText);
    }
});