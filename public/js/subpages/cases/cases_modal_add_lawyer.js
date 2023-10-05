/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
 function CasesModalAddLawyer(modal, button) {
    var form = document.getElementById('form_case_add_lawyer');
    form.id.value = button.data('id');
}

/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
 function CasesModalChangeLawyer(modal, button) {
    var form = document.getElementById('form_case_change_lawyer');
    form.id.value = button.data('id');
    form.user_id.value = button.data('user_id');
}