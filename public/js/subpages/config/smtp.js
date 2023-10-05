/**
 * test smtp connection
 * @param {*} id 
 */
function TestConnection(id) {
    var data = {
        'id': id,
    }

    console.log(data);

    AjaxCall("/system/smtp/test/connection", 'POST', 'JSON', data, function (result) {
        console.log(result);
        location.reload();
    });
}

function CheckAllSmtp(toggle) {
    var form = document.getElementById('form_group_test');

    var inputs = form.elements;

    for (var i = 0; i < inputs.length; i++) {
       if(inputs[i].type == 'checkbox') {
           inputs[i].checked = toggle;
       }
    }
}