/**
 * add contractor
 * @param {*} event 
 * @param {*} callfunction 
 */
function AjaxReadGusData(event, form_id) {
    event.preventDefault();
    var form = document.getElementById(form_id);
    form.message_gus.value = '';

    data = {
        'keyword': form.gus_keyword.value,
        'type': form.gus_type.value
    }

    console.log(data);

    AjaxCall("/contractors/get/gus", 'POST', 'JSON', data, function (result) {
        console.log(result);
        if (result.result) {
            form.fullname.value = result.data.name;
            form.regon.value = result.data.regon;
            form.nip.value = result.data.nip;
            form.city.value = result.data.city;
            form.street.value = result.data.address;
            form.postal_code.value = result.data.postal_code;
            GetShortname(result.data.name);

        } else {
            form.message_gus.value = MESSAGES.gus_not_found;
        }
    });
}