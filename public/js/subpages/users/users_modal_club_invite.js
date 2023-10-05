/**
 * fill modal
 * @param {*} modal 
 * @param {*} button 
 */
function UsersModalClubInvite(modal, button) {
    var form = document.getElementById('form_users_club_invite');

    form.id.value = button.data('id');
}