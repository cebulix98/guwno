
/** 
 * 
 *  Ajax handling methods
 * 
*/

/**
 * basic ajax call 
 * @param {string} url ajax call url, where to go
 * @param {string} method POST, GET etc.
 * @param {string} dataType JSON etc.
 * @param {Array} data data to pass
 * @param {string} callFunction call function name
 */
function AjaxCall(url, method, dataType, data, callFunction) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: url,
        method: method,
        dataType: dataType,
        data: data,
        success: function (result) {
            callFunction(result);
        },
        error: function (result) {
            console.log(result);
        }
    });
}

/**
 * basic ajax call with error callfunction
 * @param {string} url ajax call url, where to go
 * @param {string} method POST, GET etc.
 * @param {string} dataType JSON etc.
 * @param {Array} data data to pass
 * @param {string} callFunction call function name
 */
function AjaxCallWithError(url, method, dataType, data, callFunction, errorfunction) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: url,
        method: method,
        dataType: dataType,
        data: data,
        success: function (result) {
            callFunction(result);
        },
        error: function (result) {
            errorfunction(result);
        }
    });
}

function ButtonAjaxEvent(button, event, callfunction) {
    var value = button.value;
    return callfunction(event, value);
}

function AjaxEventWithAttributes(element, event, callfunction, data) {
    var value = element.value;
    return callfunction(event, value, data);
}

function StopEnter(event) {
    event.preventDefault();
}

function CheckRequired(form, callfunction, event) {
    // console.log('checking');
    // var inputs = form.getElementsByTagName('input');
    // for (i = 0; i < inputs.length; i++) {
    //     if(inputs[i].required) console.log(inputs[i].name);
    // }

    return callfunction(event);
}