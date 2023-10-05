

function SearchBoxGlobal(event, form) {
    event.preventDefault();
    var url = '/global';

    if (form.keyword.value) {
        url += '/search/' + form.keyword.value;
    }

    url += GetFilters(form);

    window.location.href = url;
}

function GetFilters(form) {
    var filters = null;
    var fil = "";
    filters = ParseFilters(form, filters);

    if (filters != null && filters.length>0) {
        fil = '/filters/' + JSON.stringify(filters);
    }

    return fil;
}

function ParseFilters(form, filters) {
    if (form.filters && form.filters.value) {
        filters = JSON.parse(form.filters.value);
    } else filters = TranslateFilters(form);

    return filters;
}

function TranslateFilters(form) {
    var filters = new Array();

    var inputs = form.elements;

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "checkbox" && inputs[i].name == "tags[]") {
            if(inputs[i].checked) {
                filters.push(inputs[i].value);
            }
        }
    }

    return filters;
}

function FindZipCode(input, select_id) {
    var select = document.getElementById(select_id);
    data = {
        'postal_code': input.value,
    }

    console.log(data);

    AjaxCall("/global/fetch/postal_code", 'POST', 'JSON', data, function (result) {
        console.log(result);
        if (result.result) {
            if (Array.isArray(result.data)) {
                for (var i = 0; i < result.data.length; i++) {
                    var option = document.createElement("option");
                    option.setAttribute('value', result.data[i].city);
                    option.innerHTML = result.data[i].city;
                    if (i == 0) option.setAttribute('selected', "selected");
                    select.appendChild(option);

                }
            }
        } else {
            var div = document.getElementById('message_error');
            if (div) {
                div.innerHTML = MESSAGES.alert_error_wrong_postal_code;
            }

        }
    });
}

function FindCity(input_province_it, input_city_id, select_id) {
    var select = document.getElementById(select_id);
    var input_province = document.getElementById(input_province_it);
    var input_city = document.getElementById(input_city_id);
    select.innerHTML = "";

    data = {
        'province': input_province.value,
        'city': input_city.value
    }

    console.log(data);

    AjaxCall("/global/fetch/city", 'POST', 'JSON', data, function (result) {
        console.log(result);
        select.innerHTML = "";
        if (result.result) {
            if (Array.isArray(result.data)) {
                for (var i = 0; i < result.data.length; i++) {
                    var option = document.createElement("option");
                    option.setAttribute('value', result.data[i].name);
                    option.innerHTML = result.data[i].name;
                    if (i == 0) option.setAttribute('selected', "selected");
                    select.appendChild(option);
                }
            }
        }

        if (!result.result || !Array.isArray(result.data)) {
            var div = document.getElementById('message_error');
            if (div) {
                div.innerHTML = MESSAGES.alert_error_wrong_postal_code;
            }

        }
    });
}

function SetCity(input_id, value) {
    var input_city = document.getElementById(input_id);

    input_city.value = value;
}

function HideSelect(input_id, select_id, toggle) {
    var select = document.getElementById(select_id);
    console.log(toggle);


    console.log($(select_id));
    if ($("#"+select_id).is(":focus")) {
        anyActive = true;
        console.log('active');
    }

    select.disabled = toggle;
}