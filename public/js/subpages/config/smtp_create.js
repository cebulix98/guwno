/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
function ModalSmtpCreate(modal, button) {
    var form = document.getElementById('form_smtp_create');
}

/**
 * ajax add
 * @param {*} event 
 * @param {*} form 
 */
function AjaxSmtpCreate(event, form) {
    event.preventDefault();

    var data = {
        'host': form.host.value,
        'port': form.port.value,
        'username': form.username.value,
        'password': form.password.value,
        'encryption': form.encryption.value,
        'from_email': form.from_email.value,
        'from_name': form.from_name.value,
    }

    console.log(data);

    AjaxCall("/configs/smtp/add", 'POST', 'JSON', data, function (result) {
        console.log(result);
        location.reload();
    });
}