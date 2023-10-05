function CreateDiv(id, classes) {
    var element = document.createElement("div");
    element.setAttribute("id", id);
    element.setAttribute('class', classes);

    return element;
}

function CreateA(id, href, classes) {
    var element = document.createElement("a");
    element.setAttribute("id", id);
    element.setAttribute('class', classes);
    element.setAttribute('href', href);

    return element;
}

/**
 * create input element
 * @param {string} id element id
 * @param {string} name element name
 * @param {*} value element value
 * @param {string} type input type
 * @param {string} classes input css classes string
 * @param {Array} attributes input attributes array of array(attribute name, attribute value)
 */
function CreateInput(id, name, value, type, classes, placeholder, callfunction, attributes, is_required) {
    var element = document.createElement("input");

    element.setAttribute("id", id);
    element.setAttribute("name", name);
    element.setAttribute("value", value);
    element.setAttribute("type", type);
    element.setAttribute('class', classes);
    element.setAttribute('placeholder', placeholder);
    element.setAttribute('onchange', callfunction);

    if (is_required == 1) element.setAttribute('required', 'required');

    if (Array.isArray(attributes)) {
        for (m = 0; m <= attributes.length; m++) {
            if (Array.isArray(attributes[m]))
                element.setAttribute(attributes[m][0], attributes[m][1]);
        }
    }

    return element;
}

function CreateTextArea(id, name, classes, placeholder, rows, is_required) {
    var element = document.createElement("textarea");

    element.setAttribute("id", id);
    element.setAttribute("name", name);
    element.setAttribute('class', classes);
    element.setAttribute('placeholder', placeholder);
    element.setAttribute('rows', rows);

    if (is_required == 1) element.setAttribute('required', 'required');

    return element;
}

/**
 * create button element
 * @param {string} classes css classes string
 * @param {string} callfunc call function name
 * @param {string} inner inner html
 */
function CreateButton(classes, callfunc, inner) {
    var element = document.createElement("Button");
    element.setAttribute('class', classes);
    element.setAttribute('type', "button");
    element.setAttribute("onclick", callfunc);
    element.innerHTML = inner;
    return element;
}

/**
 * create td element
 * @param {string} id element id
 * @param {string} classes css classes string
 */
function CreateTD(id, classes) {
    var element = document.createElement("TD");
    element.setAttribute("id", id);
    element.setAttribute('class', classes);
    return element;
}

/**
 * create tr element
 * @param {string} id element id
 * @param {string} name element name
 */
function CreateTR(id, name) {
    var element = document.createElement("TR");
    element.setAttribute("id", id);
    element.setAttribute("name", name);
    return element;
}

/**
 * create checkbox div
 * @param {string} id element id 
 * @param {string} name element name 
 * @param {string} classes input css classes string
 * @param {Array} attributes input attributes array of array(attribute name, attribute value)
 */
function AddCheckbox(parent, id, name, classes, attributes, callfunction, label_name) {
    var input = CreateCheckboxInput(id, name, classes, attributes, callfunction);
    var label = CreateLabel("custom-control-label", id, label_name);
    parent.appendChild(input);
    parent.appendChild(label);

    return parent;
}
/**
 * create checkbox div
 * @param {string} id element id 
 * @param {string} name element name 
 * @param {string} classes input css classes string
 * @param {Array} attributes input attributes array of array(attribute name, attribute value)
 */
function AddPrettyCheckbox(id, name, classes, attributes, callfunction) {
    var input = CreateCheckboxInput(id, name, classes, attributes, callfunction);
    var check = CreateCheckboxSign();
    var label = CreateLabel("form-check-label m-0 p-0 text-center d-flex justify-content-center", id, "");
    // label.setAttribute('style', 'display:table-cell;');
    var parent = document.createElement("div");
    parent.setAttribute('class', "form-check form-check-inline md-form input-group m-0 p-0 pt-2 pl-4");

    label.appendChild(input);
    label.appendChild(check);
    // parent.appendChild(label)
    parent = label;
    return parent;
}

/**
 * create checbox input element
 * @param {string} id element id 
 * @param {string} name element name 
 * @param {string} classes input css classes string
 * @param {Array} attributes input attributes array of array(attribute name, attribute value)
 */
function CreateCheckboxInput(id, name, classes, attributes, callfunction) {
    var input = CreateInput(id, name, 1, "checkbox", classes, "", callfunction, attributes, false);
    return input;
}

/**
 * create checboxc check sign
 */
function CreateCheckboxSign() {
    var element = document.createElement("span");
    element.setAttribute('class', "form-check-sign table-check-sign p-0 m-0");
    var check = document.createElement("span");
    check.setAttribute('class', "check");

    element.appendChild(check);

    return element;
}

/**
 * create label element
 * @param {string} classes input css classes string
 */
function CreateLabel(classes, for_id, text) {
    var element = document.createElement("label");
    element.setAttribute('class', classes);
    element.setAttribute('for', for_id);
    element.innerHTML = text;
    return element;
}

/**
 * create select element
 * @param {string} id element id 
 * @param {string} name element name 
 * @param {string} classes input css classes string
 * @param {string} callfunction call function name
 * @param {Array} sel_options select options
 */
function CreateSelect(id, name, classes, callfunction, sel_options, selected) {
    var element = document.createElement("select");
    element.setAttribute('id', id);
    element.setAttribute('name', name);
    element.setAttribute('class', classes);
    element.setAttribute('onchange', callfunction);

    if (Array.isArray(sel_options)) {
        for (var k = 0; k < sel_options.length; k++) {
            var option = document.createElement("option");
            option.setAttribute('value', sel_options[k][0]);
            option.innerHTML = sel_options[k][1];
            if (sel_options[k][0] == selected) option.setAttribute('selected', "selected");
            element.appendChild(option);
        }
    }

    return element;
}

/**
 * create radio element
 * @param {string} id radio id
 * @param {string} name radio name
 * @param {*} value radio value
 * @param {string} type input type
 * @param {string} classes string with css classes
 * @param {boolean} checked is radio checked
 * @param {string} callfunction call function name
 */
function CreateRadio(id, name, value, type, classes, checked, callfunction) {
    var input = CreateInput(id, name, value, "radio", classes, null);
    input.setAttribute('onchange', callfunction);
    if (checked) input.setAttribute('checked', "checked");

    var element = document.createElement("div");
    element.setAttribute('class', "custom-control custom-radio form-check input-group mb-0 mt-0 form-check-radio text-center d-flex justify-content-center");

    var label = document.createElement("label");
    label.setAttribute('class', "custom-control-label cursor table-check-sign");
    label.setAttribute('for', id);

    element.appendChild(input);
    element.appendChild(label);

    return element;
}

function CreateDropdown() {
    var navbar = CreateA('', "#", "dropdown-toggle btn btn-primary");
    navbar.setAttribute("role", "button");
    navbar.setAttribute("data-toggle", "dropdown");
    navbar.setAttribute("aria-haspopup", "true");
    navbar.setAttribute("aria-expanded", "false");
    navbar.innerHTML = "Opcje";

    return navbar;
}

function CreateDropdownInner() {
    var menu = CreateDiv('', 'dropdown-menu');
    menu.setAttribute('aria-labelledby', "navbarDropdown");


    return menu;
}

function CreateOptionLink(id, href, target, classes) {
    var option = CreateA(id, href, "dropdown-item cursor " + classes);
    option.setAttribute('target', target);
    return option
}

function CreateOptionModal(id, href, target, title, callfunction, inner) {
    var option = CreateA(id, href, "dropdown-item cursor");
    option.setAttribute('data-toggle', "modal");
    option.setAttribute('data-target', target);
    option.setAttribute('data-title', title);
    option.setAttribute('onclick', callfunction);
    option.innerHTML = inner;

    return option;
}

function CreateOptionForm(action, input_id, input_name, input_value, input_classes, submit_button_text) {
    var form = CreateForm(action);
    var label = CreateLabel('p-0 m-0', "", "");
    var token = $('meta[name="csrf-token"]').attr('content');
    var token_input = CreateInput('', '_token', token, 'hidden', '', '', '', [], false);

    form.appendChild(token_input);
    var input = CreateInput(input_id, input_name, input_value, 'hidden', input_classes, '', '', [], false);
    var button = CreateButton('btn btn-nobtn', "");
    button.setAttribute('type', 'submit');
    button.innerHTML = submit_button_text;

    label.appendChild(input);
    label.appendChild(button);

    form.appendChild(label);

    return form;
}

function CreateForm(action) {
    var form = document.createElement("form");
    form.setAttribute('method', 'POST');
    form.setAttribute('action', action);

    return form;
}

/**
 * process array from database and prepare it for select
 * @param {*} options array from database, should have property 'id' and 'name'
 * @param {*} default_name text for default option
 * @returns {Array} each row is [id, name] for select value and inner html 
 */
function PrepareOptionsForSelect(options) {
    options = JSON.parse(options);
    var proccessed = new Array();

    if (Array.isArray(options)) {
        for (var i = 0; i < options.length; i++) {
            var row = new Array(options[i].id, options[i].name);
            proccessed.push(row);
        }
    }


    return proccessed;
}

/**
 * process array from database and prepare it for select
 * @param {*} options array from database, should have property 'id' and 'name'
 * @param {*} default_name text for default option
 * @returns {Array} each row is [id, name] for select value and inner html 
 */
function PrepareBasicOptions(options, default_name) {
    options = JSON.parse(options);
    var proccessed = new Array();
    if (default_name) {
        var row = new Array("", default_name);
        proccessed.push(row);
    }

    if (Array.isArray(options)) {
        for (var i = 0; i < options.length; i++) {
            var row = new Array(options[i].id, options[i].name);
            proccessed.push(row);
        }
    }


    return proccessed;
}

function CreateSelectDiv(parent_id, container_id, container_class, select_id, select_name, select_classes, callfunction, options, selected) {
    var div = CreateDiv(container_id, container_class);
    var select = CreateSelect(select_id, select_name, select_classes, callfunction, options, selected);
    select.setAttribute('data-parent', parent_id);
    div.appendChild(select);

    return new Array(div, select);
}

function CreateH(h_type, classes, inner) {
    var h = document.createElement(h_type);
    h.innerHTML = inner;
    h.setAttribute('class', classes);

    return h;
}

/**
 * input with label inside div
 * @param {*} parent_id 
 * @param {*} id 
 * @param {*} inner 
 */
function CreateDivLabeledInput(value, name, step, label_text, classes, placeholder, callfunction, required, type, div_classes, label_classes) {
    var div = CreateDiv("", div_classes);
    var label = CreateLabel(label_classes, name, label_text);
    var input = CreateInput(name, name, value, type, classes, placeholder, callfunction, [], required);
    input.setAttribute('step', step);

    div.appendChild(label);
    div.appendChild(input);

    return div;
}

/**
 * input with label inside div
 * @param {*} parent_id 
 * @param {*} id 
 * @param {*} inner 
 */
function CreateDivInput(value, name, step, classes, placeholder, callfunction, required, type, div_classes) {
    var div = CreateDiv("", div_classes);
    var input = CreateInput(name, name, value, type, classes, placeholder, callfunction, [], required);
    input.setAttribute('step', step);

    div.appendChild(input);

    return div;
}

/**
 * select with label inside div
 * @param {*} data_container_id 
 * @param {*} data_name 
 * @param {*} name 
 * @param {*} selected 
 * @param {*} callfunction 
 * @param {*} input_classes 
 * @param {*} div_classes 
 * @param {*} label_classes 
 * @param {*} label_text 
 */
function CreateDivLabeledSelect(data_container_id, data_name, name, selected, callfunction, input_classes, div_classes, label_classes, label_text) {
    var div = CreateDiv("", div_classes);
    var select_options = document.getElementById(data_container_id).getAttribute(data_name);
    select_options = PrepareBasicOptions(select_options, null);
    var label = CreateLabel(label_classes, name, label_text);
    var select = CreateSelect(name, name, input_classes, callfunction, select_options, selected);

    div.appendChild(label);
    div.appendChild(select);

    return div;
}

function CreateHr() {
    var hr = document.createElement('hr');
    hr.setAttribute('class', 'col-md-12');
    return hr;
}

function CreateCollectionOptions(element, options, callfunction) {
    if (Array.isArray(options)) {
        for (var k = 0; k < options.length; k++) {
            var option = document.createElement("option");
            option.setAttribute('value', options[k].id);
            option.innerHTML = callfunction(options[k]);
            // if (options[k].id == selected) option.setAttribute('selected', "selected");
            element.appendChild(option);
        }
    }
}

function CreateDefaultOption(element, default_value, default_name) {
    var option = document.createElement("option");
    option.setAttribute('value', default_value);
    option.innerHTML = default_name;
    option.setAttribute('selected','selected');
    element.appendChild(option);
}