/* made by IT Engineering  https://iten.com.pl/ */
/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
 function SectionModalToggleCategories(modal, button) {
    var form = document.getElementById('form_section_toggle_categories');

    form.reset();

    form.id.value = button.data('id');

    SectionModalToggleCategoriesFillForm(form, button.data('categories'));
}

function SectionModalToggleCategoriesFillForm(form, models) {
    var inputs = form.elements;

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "checkbox" && inputs[i].name == "categories[]") {
            if (FindNeedleInCollection(inputs[i].value, models)) {
                inputs[i].checked = true;
            } else {
                inputs[i].checked = false;
            }
        }
    }
}
