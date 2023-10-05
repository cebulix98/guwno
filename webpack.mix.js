const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.sass('resources/sass/buttons.scss', 'public/css')
    .sass('resources/sass/colors.scss', 'public/css')
    .sass('resources/sass/font-sizes.scss', 'public/css')
    .sass('resources/sass/footer.scss', 'public/css')
    .sass('resources/sass/form.scss', 'public/css')
    .sass('resources/sass/icons.scss', 'public/css')
    .sass('resources/sass/layout.scss', 'public/css')
    .sass('resources/sass/mail.scss', 'public/css')
    .sass('resources/sass/modal.scss', 'public/css')
    .sass('resources/sass/navbar.scss', 'public/css')
    .sass('resources/sass/pdf.scss', 'public/css')
    .sass('resources/sass/table.scss', 'public/css')
    .sass('resources/sass/tiles.scss', 'public/css')
    .sass('resources/sass/sizes.scss', 'public/css')
    .sass('resources/sass/tooltip-popover.scss', 'public/css')


mix.version(['public/css/colors.css',
    'public/css/font-sizes.css',
    'public/css/footer.css',
    'public/css/mail.css',
    'public/css/pdf.css',
    'public/css/buttons.css',
    'public/css/tiles.css',
    'public/css/form.css',
    'public/css/icons.css',
    'public/css/layout.css',
    'public/css/modal.css',
    'public/css/navbar.css',
    'public/css/table.css',
    'public/css/tooltip-popover.css',
    'public/css/sizes.css',
]);

mix.version(['public/js/element_creator.js',
    'public/js/ajax_handler.js',
    'public/js/html_element_handler.js',
    'public/js/modal_handler.js',
    'public/js/adder.js',
    'public/js/global.js',
    'public/js/messages/messages.js',
    'public/js/auth/register.js',
    'public/js/subpages/main.js',
    'public/js/subpages/login.js',
    'public/js/media_handler.js',
]);

mix.version(['public/js/subpages/users/users.js',
    'public/js/subpages/users/users_modal_add.js',
    'public/js/subpages/users/users_modal_details.js',
    'public/js/subpages/dictionary/dictionary.js',
    'public/js/subpages/files/files.js',
    'public/js/subpages/settings/settings_admin.js',
    'public/js/subpages/settings/settings_client.js',
    'public/js/subpages/contractors/contractors.js',
    'public/js/subpages/contractors/contractors_modal_add.js',
    'public/js/subpages/contractors/contractors_modal_details.js',
    'public/js/subpages/contractors/contractors_modal_contacts.js',
    'public/js/subpages/motions/motions.js',
    'public/js/subpages/cases/cases.js',
    'public/js/subpages/cases/cases_modal_add_lawyer.js',
    'public/js/subpages/cases/cases_modal_quick_response.js',
    'public/js/subpages/config/smtp.js',
    'public/js/subpages/config/smtp_create.js',
]);
