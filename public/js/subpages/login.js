function SwitchUser(id, button) {
    var form = document.getElementById('form_login');

    form.code.value = id;

    SelectButton(button);
}

function SelectButton(button) {
    var classname = "active";
    var buttons = document.getElementsByClassName(classname);

    for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].id != button.id) {
            buttons[i].classList.remove(classname);
        }
    }


    button.classList.add(classname);
}