function FindLawyer(form_id) {
    var form = document.getElementById(form_id);
    var select = form.lawyer_id;
    var input = form.lawyer_search;

    select.innerHTML = "";

    data = {
        keyword: input.value,
    };

    console.log(data);

    AjaxCall("/find/lawyers", "POST", "JSON", data, function (result) {
        console.log(result);
        select.innerHTML = "";
        if (result.result) {
            if (result.data) {
                for (var i = 0; i < result.data.length; i++) {
                    var option = document.createElement("option");
                    option.setAttribute("value", result.data[i].id);
                    option.innerHTML = result.data[i].name;
                    if (i == 0) option.setAttribute("selected", "selected");
                    select.appendChild(option);
                }
            }
        }
    });
}

function ConfirmChangeLawyer() {
    $txt = MESSAGES.confirm_change_lawyer;
    if (window.confirm($txt)) {
        return true;
    }
    return false;
}

function FilterCases(event, form, prefix_url) {
    event.preventDefault();

    if(form) {
        var url = prefix_url + "/filters";

        if (form.status_id && form.status_id.value) url += "/status/" + form.status_id.value;
        if (form.name && form.name.value) {
            var name = form.name.value;
            name = name.replaceAll('/','.');
            url += "/name/" + name;
        }
        if (form.motion_id && form.motion_id.value) url += "/motion/" + form.motion_id.value;
        if (form.petitioner && form.petitioner.value) url += "/petitioner/" + form.petitioner.value;
        if (form.lawyer && form.lawyer.value) url += "/lawyer/" + form.lawyer.value;

        console.log(url);
    }

    window.location.href = url;
}
