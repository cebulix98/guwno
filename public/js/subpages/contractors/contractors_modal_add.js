/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
function ContractorsModalAdd(modal, button) {
    var form = document.getElementById('form_contractors_add');
    ContractorsModalAddSwitchContractor(2);
}

function ContractorsModalAddSwitchContractor(value) {
    ContractorsModalAddDisableInputs(value);

    $('.contractor_switch').hide();
    $(".contractor_switch_" + value).show();
}

function ContractorsModalAddDisableInputs(type) {
    var form = document.getElementById('form_contractors_add');
    var classname_switcher = "input_contractor_switch";
    var classname = "contractor_type_" + type;

    var inputs = form.elements;

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].classList.contains(classname_switcher)) {
            if (inputs[i].classList.contains(classname)) {
                inputs[i].disabled = false;
            } else inputs[i].disabled = true;
        }
    }
}

function GetShortname(fullname) {
    var form = document.getElementById('form_contractors_add');
    var length_max = 21;

    if(fullname.length < length_max) form.shortname.value = fullname;
    else form.shortname.value = fullname.substring(0, length_max - 1);
}