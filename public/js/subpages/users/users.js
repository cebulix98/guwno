/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
function UsersModalRole(modal, button) {
    var form = document.getElementById('form_users_update_role');
    form.id.value = button.data('id');
    form.role.value = button.data('role');
}

/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
 function UsersModalUpdateFooter(modal, button) {
    var form = document.getElementById('form_users_update_footer');
    console.log(button.data('content'));
    form.content.innerHTML = button.data('content');
}

function SearchBoxUserFilters(event, form) {
    event.preventDefault();
    var url = "/users";

    if (form.keyword.value) url += '/search/' + form.keyword.value;

    window.location.href = url;
}