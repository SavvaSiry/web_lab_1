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

        const data = {
            "x": x,
            "y": y,
            "r": r
        };
        if (send) {
            $.ajax({
                url: 'php/checkHitPoint.php',
                type: "POST",
                data: JSON.stringify(data),
                contentType: 'application/json',
                dataType: 'json',
                success: function (response) {
                    var status = response.status;
                    document.getElementById("status-table")
                        .insertAdjacentHTML('beforeend',
                            '<tr><td>'+i+'++</td><td>'+ status +'</td><td>'+ x +'</td><td>'+ y +'</td><td>'+ r +'</td></tr>');
                },

                error: function(response) { // Данные не отправлены
                    console.log("В ошибке" + response);
                }

            });
        }
    });
});

