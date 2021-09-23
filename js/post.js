let x, y, r;

valueX = (btn) => {
    x = (btn.value);
}

valueR = (btn) => {
    r = (btn.value);
}

const i = 0;

document.addEventListener('DOMContentLoaded', () => {
    'use strict';
    const form = document.querySelector("form");
    let send = true;

    form.addEventListener('submit', (even) => {
        even.preventDefault();

        for (let elem of form.elements) {
            if (elem.tagName === "INPUT") {
                if (elem.value === "") {
                    elem.nextElementSibling.textContent = "Введите данные";
                } else if (elem.value <= -5 || elem.value >= 5
                || (/[a-zA-Z]/.test(elem.value)) || elem.value.length > 8) {
                    elem.nextElementSibling.textContent = "Неверные данные";
                    send = false;
                } else {
                    elem.nextElementSibling.textContent = "";
                    send = true;
                    y = elem.value;
                }
            }
        }
        if (x === undefined) {
            document.getElementById("x-eror").textContent = "Выберите";
            send = false;
        } else {
            document.getElementById("x-eror").textContent = "";
            send = true;
        }
        if (r === undefined){
            document.getElementById("r-eror").textContent = "Выберите";
            send = false

        } else {
            document.getElementById("r-eror").textContent = "";
            send = true;
        }

        if (send) {
            $.ajax({
                url: 'php/checkHitPoint.php',
                type: "POST",
                dataType : "json",
                data: {
                    x : x,
                    y : y,
                    r : r
                },
                success: function (response) {
                    let status = response.status;
                    let data = response.data;
                    let speed = response.speed;
                    document.getElementById("status-table")
                        .insertAdjacentHTML('beforeend',
                            '<tr><td>1</td><td>'+ status +'</td><td>'+ x +'</td><td>'+ y +'</td><td>'+ r +'</td><td>'+ data +'</td><td>'+ speed +'</td></tr>');
                },
                error: function(response) { // Данные не отправлены
                    console.log("В ошибке" + response);
                }
            });
        }
    });
});

