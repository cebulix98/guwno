/**
* methods for handling html elements
 */


/**
 * fill element with text
 * @param {string} id element id
 * @param {string} inner element html inner
 */
function FillText(id, inner) {
    element = document.getElementById(id);
    element.innerHTML = inner;
}

/**
 * fill element value
 * @param {string} id element id
 * @param {var} value element value
 */
function FillValue(id, value) {
    element = document.getElementById(id);
    element.value = value;
}

/**
 * get element value
 * @param {string} id element id
 */
function GetValueById(id) {
    element = document.getElementById(id);
    return element.value;
}

/**
 * get element value
 * @param {string} id element id
 */
function GetElementValue(id) {
    el = document.getElementById(id);
    if (el == null) return "";
    return el.value;
}

/**
 * get element inner html
 * @param {string} id element id
 */
function GetElementText(id) {
    el = document.getElementById(id);
    if (el == null) return "";
    return el.innerHTML;
}

/**
 * is checkbox element checked
 * @param {string} check_id element id
 */
function IsCheckboxChecked(check_id) {
    el = document.getElementById(check_id);
    if (el != null) if (el.checked) return 1;
    return 0;
}

/**
 * which radio option is selected
 * @param {string} id element id
 * @param {*} min 
 * @param {*} max 
 */
function WhichRadioOption(id, min, max) {
    for (i = min; i <= max; i++) {
        el = document.getElementById(id + i);
        if (el != null) if (el.checked) return el.value;
    }
    return 0;
}

/**
 * toggle element 
 * @param {string} id element id
 * @param {boolean} toggle true -> on, false -> off
 */
function ToggleDivById(id, toggle) {
    if (!toggle) {
        document.getElementById(id).style.display = "none";
    } else {
        document.getElementById(id).style.display = "block";
    }
}

/**
 * toggle element by class
 * @param {string} name class name
 * @param {boolean} toggle true -> on, false -> off
 */
function ToggleDivByClass(name, toggle) {

    $(name).each(function () {
        if (toggle) {
            $(this).css('display', 'block');
        }
        else {
            $(this).css('display', 'none');
        }
    });
}

/**
 * toggle element by id, set chosen display type
 * @param {string} id element id
 * @param {boolean} toggle true -> on, false -> off
 * @param {string} display display type, ex. 'block'
 */
function ToggleDivByIdDisplay(id, toggle, display) {
    if (!toggle) {
        document.getElementById(id).style.display = "none";
    } else {
        document.getElementById(id).style.display = display;
    }
}

/**
 * toggle element by class, set chosen display type
 * @param {string} name class name
 * @param {boolean} toggle true -> on, false -> off
 * @param {string} display display type, ex. 'block'
 */
function ToggleDivByClassDisplay(name, toggle, display) {
    $(name).each(function () {
        if (toggle) {
            $(this).css('display', display);
        }
        else {
            $(this).css('display', 'none');
        }
    });
}

/**
 * toggle element, set it to flex
 * @param {string} name class name
 * @param {boolean} toggle true -> on, false -> off
 */
function ToggleDivByClassFlex(name, toggle) {
    $(name).each(function () {
        if (toggle) {
            $(this).css('display', 'flex');
        }
        else {
            $(this).css('display', 'none');
        }
    });
}

/**
 * set attribute of element
 * @param {string} id element id
 * @param {string} attribute_name attribute name
 * @param {var} value attribute value
 */
function ChangeAttribute(id, attribute_name, value) {
    document.getElementById(id).setAttribute(attribute_name, value);
}

/**
 * set element checked attribute
 * @param {string} id element id
 * @param {boolean} toggle true -> on, false -> off
 */
function CheckElement(id, toggle) {
    el = document.getElementById(id);
    el.checked = toggle;
}

/**
 * disable/enable element
 * @param {string} id element id
 * @param {boolean} toggle true -> on, false -> off
 */
function DisableElement(id, toggle) {
    el = document.getElementById(id);
    el.disabled = toggle;
}

/**
 * validate numerical input, check min max values, adjust value to them
 * @param {string} name element id
 */
function ValidateInput(name) {
    var val = parseFloat($(name).val(), 10);
    var min = parseFloat($(name).attr('min'), 10);
    var max = parseFloat($(name).attr('max'), 10);

    if ($(name).attr('step') == 1) {
        val = parseInt(val, 10);
        min = parseInt(min, 10);
        max = parseInt(max, 10);
    }

    if (val < min) val = min;
    if (val > max) val = max;

    $(name).val(val);
}

/**
 * validate all numerical inputs
 */
function ValidateAllInputs() {
    $('input[type=number]').each(function () {
        id = this.id;
        ValidateInput('#' + id);
    })
}

function GetCorrectInputValue(name) {
    var val = parseFloat($(name).val(), 10);
    var min = parseFloat($(name).attr('min'), 10);
    var max = parseFloat($(name).attr('max'), 10);

    if ($(name).attr('step') == 1) {
        val = parseInt(val, 10);
        min = parseInt(min, 10);
        max = parseInt(max, 10);
    }

    if (val < min) val = min;
    if (val > max) val = max;

    return val;
}

function FillValueEachOfClassname(classname, value) {
    $(classname).each(function () {
        $(this).val(value);
    });
}

/**
 * disable form input via checkbox
 * @param {*} toggle  checkbox checked state
 * @param {*} form_id form id
 * @param {*} input_name input name
 */
function DisableInputByCheckbox(toggle, form_id, input_name) {
    var form = document.getElementById(form_id);
    var inputs = form.elements;
    var input = inputs[input_name];

    if (toggle) {
        input.disabled = true;
        input.required = false;
        input.value = "";
    }
    else {
        input.disabled = false;
        input.required = true;
    }
}

/**
 * search array for needle
 * @param {*} needle 
 * @param {*} haystack 
 */
function IsInArray(needle, haystack) {
    if (Array.isArray(haystack)) {
        for (var k = 0; k < haystack.length; k++) {
            if (needle == haystack[k]) return true;
        }
    }

    return false;
}

function FindNeedleInCollection(needle, haystack) {
    if (Array.isArray(haystack)) {
        for (var k = 0; k < haystack.length; k++) {
            if (needle == haystack[k].id) return true;
        }
    }

    return false;
}

function FindNeedleInCollectionWithCallFunction(needle, haystack, callfunction) {
    if (Array.isArray(haystack)) {
        for (var k = 0; k < haystack.length; k++) {
            if (callfunction(needle, haystack[k])) return true;
        }
    }

    return false;
}

function DisableFormInputsByClassname(form, classname, toggle) {
    var inputs = form.elements;

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].classList.contains(classname)) {
            inputs[i].disabled = toggle;
        }
    }
}
