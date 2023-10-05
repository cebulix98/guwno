/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
function ContractorsModalContacts(modal, button) {
    var form = document.getElementById('form_contractors_contacts');

    form.reset();

    form.id.value = button.data('id');
    form.address_id.value = button.data('address_id');

    form.contact_person_id.innerHTML = "";
    CreateDefaultOption(form.contact_person_id, 0, MESSAGES["new person"]);
    CreateCollectionOptions(form.contact_person_id, button.data('employees'), ContractorsModalContactsFillSelectContactPersonName);

    ToggleAppendContactPerson(true, 'form_contractors_contacts');

    FillContractorContactCheckboxes(form, modal.find('.sample_checkbox_contact'), button.data('model_contacts'), document.getElementById('contractor_contacts_body'),button.data('address_contacts'));
}

/**
 * fill contact person select
 * @param {*} option 
 */
function ContractorsModalContactsFillSelectContactPersonName(option) {
    return option.lastname + ' ' + option.firstname;
}

/**
 * toggle contact person form inputs
 * @param {*} toggle 
 */
function ToggleAppendContactPerson(toggle, form_id) {
    var form = document.getElementById(form_id);
    DisableFormInputsByClassname(form, 'contact_person_input', toggle);
}

/**
 * switch contact person
 * @param {*} value 
 */
function SwitchContactPerson(value, form_id) {
    var form = document.getElementById(form_id);
    if (value == 0) {
        ToggleAppendContactPerson(false, form_id);
        $('.contact_person_input').show();
    }
    else {
        ToggleAppendContactPerson(true, form_id);
        $('.contact_person_input').hide();
    }

    $('.contact_person_select').show();
    DisableFormInputsByClassname(form, 'contact_person_select', false);
}

/**
 * fill div with checkboxes
 * @param {*} form 
 * @param {*} sample 
 * @param {*} models 
 * @param {*} parent 
 * @param {*} haystack 
 */
function FillContractorContactCheckboxes(form, sample, models, parent, haystack) {
    for (var i = 0; i < models.length; i++) {
        //input id
        var id = sample.data('id') + models[i].id;
        //label text
        var innerhtml = models[i].data;
        if (models[i].employee != null) innerhtml += ' (' + models[i].employee.lastname + " " + models[i].employee.firstname + ")";

        //create elements
        var div = CreateDiv('', sample.data('parent_class'));
        var input = CreateInput(id, sample.data('name'), models[i].id, sample.data('type'), sample.data('class'), null, null, [], false);
        var label = CreateLabel(sample.data('label'), id);

        label.innerHTML = innerhtml;

        //append elements
        div.appendChild(input);
        div.appendChild(label);
        parent.appendChild(div);

        //check or uncheck input
        if(FindNeedleInCollectionWithCallFunction(models[i],haystack, CompareContactInHaystack)) input.checked = true;
        else input.checked = false;
    }

}

/**
 * check if needle is in haystack
 * @param {*} needle 
 * @param {*} haystack_i 
 */
function CompareContactInHaystack(needle, haystack_i) {
    if(needle.id == haystack_i.id) return true;

    return false;
}