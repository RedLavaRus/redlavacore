
let open_modal = document.getElementById('open_modal');
let close_modal = document.getElementById('close_modal');
let modal = document.getElementById('modal');
let body = document.getElementsByTagName('body')[0];
open_modal.onclick = function() { // клик на открытие
    modal.classList.add('modal_vis'); // добавляем видимость окна
    modal.classList.remove('bounceOutDown'); // удаляем эффект закрытия
    body.classList.add('body_block'); // убираем прокрутку
};
close_modal.onclick = function() { // клик на закрытие
    modal.classList.add('bounceOutDown'); // добавляем эффект закрытия
    window.setTimeout(function() { // удаляем окно через полсекунды (чтобы увидеть эффект закрытия).
        modal.classList.remove('modal_vis'); 
        body.classList.remove('body_block'); // возвращаем прокрутку
    }, 500);
};
