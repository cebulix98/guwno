/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
function UsersModalPositions(modal, button) {
    var form = document.getElementById('form_users_positions');
    form.reset();
    form.id.value = button.data('id');
    UsersModalPositionsFillForm(form, button.data('positions'));
}

function UsersModalPositionsFillForm(form, models) {
    var inputs = form.elements;

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "checkbox") {
            if (FindNeedleInCollection(inputs[i].value, models)) {
                inputs[i].checked = true;
            } else {
                inputs[i].checked = false;
            }
        }
    }
}

