/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
 function CasesModalQuickResponse(modal, button) {
    var form = document.getElementById('form_cases_quick_response');
    form.id.value = button.data('id');
}