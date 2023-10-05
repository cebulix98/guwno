
/**
 *  handle modal related methods
 */

function ShowModal(id, callfunction) {
    var button = $(id);
    var title = button.data('title');

    var target = button.data('target');
    var modal = $(target);
    modal.find('.modal-title').text(title);

    callfunction(modal, button);
}

/**
 * fill modal element text
 * @param {string} data_name 
 * @param {string} element_id 
 * @param {*} modal 
 * @param {*} button 
 */
function FillModalElementText(data_name, element_id, modal, button) {
    var text = button.data(data_name);
    modal.find(element_id).text(text);
}

/**
 * fill modal element value
 * @param {string} data_name 
 * @param {string} element_id 
 * @param {*} modal 
 * @param {*} button 
 */
function FillModalElementValue(data_name, element_id, modal, button) {
    var value = button.data(data_name);
    modal.find(element_id).val(value);
}

/**
 * fill modal element inner html
 * @param {string} inner 
 * @param {string} element_id 
 * @param {*} modal 
 */
function FillModalElementHTML(inner, element_id, modal) {
    modal.find(element_id).html(inner);
}

/**
 * set modal element attribute
 * @param {*} attrName 
 * @param {*} attrValue 
 * @param {*} element_id 
 * @param {*} modal 
 */
function FillModalElementAttribute(attrName, attrValue, element_id, modal) {
    modal.find(element_id).attr(attrName, attrValue);
}

/**
 * set a type
 * @param {*} type 
 * @param {*} contact 
 */
function SetLinkType(type, contact) {
    var link = "";

    if (type == 3) link = " href='" + contact + "'";
    if (type == 4) link = " href='mailto:" + contact + "'";
    return link;
}

function CallFormEvent(form, event, callfunction) {
    var inputs = form.getElementsByTagName('input');
    var attributes = [];
    for (i = 0; i < inputs.length; i++) {
        attributes.push({ name: inputs[i].name, value: inputs[i].value });
    }
    var selects = form.getElementsByTagName('select');
    for (i = 0; i < selects.length; i++) {
        attributes.push({ name: selects[i].name, value: selects[i].value });
    }
    //form.get(0).reset();
    return callfunction(event, attributes);
}

function FindAttributeValue(array, name) {
    for (i = 0; i < array.length; i++) {
        if (array[i].name == name) return array[i].value;
    }
    return null;
}