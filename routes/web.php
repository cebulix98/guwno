<?php

use App\Http\Controllers\Cases\View\CaseAdminSingleViewController;
use App\Http\Controllers\Cases\Create\CaseCreateController;
use App\Http\Controllers\Cases\Manage\CaseManageController;
use App\Http\Controllers\Cases\Manage\CaseUpdateController;
use App\Http\Controllers\Cases\View\CaseAdminAllViewController;
use App\Http\Controllers\Cases\View\CaseOwnedAllViewController;
use App\Http\Controllers\Cases\View\CaseOwnedSingleViewController;
use App\Http\Controllers\Config\ConfigController;
use App\Http\Controllers\Config\SmtpController;
use App\Http\Controllers\Dictionary\DictionaryCreateController;
use App\Http\Controllers\Dictionary\DictionaryManageController;
use App\Http\Controllers\Dictionary\DictionaryUpdateController;
use App\Http\Controllers\Dictionary\DictionaryViewController;
use App\Http\Controllers\Files\FilesController;
use App\Http\Controllers\Files\MotionFileController;
use App\Http\Controllers\Find\FindController;
use App\Http\Controllers\Guest\Motion\View\MotionCustomFormViewController;
use App\Http\Controllers\Guest\Motion\View\MotionFormController;
use App\Http\Controllers\Guest\Motion\View\MotionFormEndController;
use App\Http\Controllers\Guest\Motion\View\MotionFormPayEndController;
use App\Http\Controllers\Guest\Motion\View\MotionFormThankYouController;
use App\Http\Controllers\Motion\View\MotionAllViewController;
use App\Http\Controllers\Payment\TestController;
use App\Http\Controllers\Payment\TpayController;
use App\Http\Controllers\Prices\Manage\MotionPricesManageController;
use App\Http\Controllers\Prices\View\MotionPricesSingleViewController;
use App\Http\Controllers\Prices\View\MotionPricesViewController;
use App\Http\Controllers\Stats\StatsLawyerViewController;
use App\Http\Controllers\System\Manage\SystemUpdateController;
use App\Http\Controllers\User\UserCreateController;
use App\Http\Controllers\User\UserGlobalViewController;
use App\Http\Controllers\User\UserManageController;
use App\Http\Controllers\User\UserUpdateController;
use App\Http\Controllers\User\UserViewController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// config

Route::get('/admin/db/reset', [ConfigController::class, 'RefreshDatabase'])->name('admin.db.reset');
Route::get('/admin/storage/link', [ConfigController::class, 'LinkStorage'])->name('admin.storage.link');
Route::get('/admin/cache/clear', [ConfigController::class, 'ClearCache'])->name('admin.cache.clear');
Route::get('/admin/db/migrate', [ConfigController::class, 'SynchronizeNew'])->name('admin.db.migrate');

//files

Route::get('/file/download/id/{id?}', [FilesController::class, 'DownloadFile'])->name('file.download');
Route::post('/file/delete', [FilesController::class, 'DeleteFile'])->name('file.delete');

//users

Route::get('/admin/users', [UserViewController::class, 'index'])->name('admin.users')->middleware('permissions:musers,can_read');
Route::get('/admin/users/id/{id}', [UserViewController::class, 'index'])->name('admin.users.expanded')->middleware('permissions:musers,can_read');
Route::post('/admin/users/add', [UserCreateController::class, 'Add'])->name('admin.users.add')->middleware('permissions:musers,can_add');
// Route::post('/admin/users/manage/update/all', [UserManageController::class,'UpdateAll'])->name('admin.users.manage.update.all');
Route::post('/admin/users/manage/update/role', [UserManageController::class, 'UpdateRole'])->name('admin.users.manage.update.role')->middleware('permissions:musers,can_edit');
Route::get('/users', [UserGlobalViewController::class, 'index'])->name('users');
Route::any('/users/search/{keyword?}', [UserGlobalViewController::class, 'index']);
Route::any('/users/search', [UserGlobalViewController::class, 'index'])->name('users.search');

Route::post('/admin/users/update/auto_assign', [UserManageController::class, 'UpdateAutoAssign'])->name('users.update.user.auto_assign')->middleware('permissions:musers,can_edit');
Route::post('/admin/users/delete/user', [UserManageController::class, 'DeleteUser'])->name('users.delete.user')->middleware('permissions:musers,can_edit');

Route::post('/admin/users/update/firstname', [UserUpdateController::class, 'UpdateFirstname'])->name('users.update.user.firstname')->middleware('permissions:musers,can_edit');
Route::post('/admin/users/update/lastname', [UserUpdateController::class, 'UpdateLastname'])->name('users.update.user.lastname')->middleware('permissions:musers,can_edit');
Route::post('/admin/users/update/phone', [UserUpdateController::class, 'UpdatePhone'])->name('users.update.user.phone')->middleware('permissions:musers,can_edit');
Route::post('/admin/users/update/note', [UserUpdateController::class, 'UpdateNote'])->name('users.update.user.note')->middleware('permissions:musers,can_edit');
Route::post('/admin/users/update/email', [UserManageController::class, 'UpdateEmail'])->name('users.update.user.email')->middleware('permissions:musers,can_edit');
Route::post('/admin/users/update/password', [UserManageController::class, 'UpdatePassword'])->name('users.update.user.password')->middleware('permissions:musers,can_edit');

//dictionary

Route::get('/admin/dictionary', [DictionaryViewController::class, 'index'])->name('admin.dictionary');
Route::get('/admin/dictionary/id/{id?}', [DictionaryViewController::class, 'index'])->name('admin.dictionary.expanded');
Route::post('/admin/dictionary/add', [DictionaryCreateController::class, 'Add'])->name('admin.dictionary.add');
Route::post('/admin/dictionary/section/categoty/add', [DictionaryCreateController::class, 'AddSectionCategory'])->name('admin.dictionary.section.category.add');

Route::post('/admin/dictionary/quick/add', [DictionaryCreateController::class, 'QuickAdd'])->name('admin.dictionary.quick.add');

Route::post('/admin/dictionary/manage/remove', [DictionaryManageController::class, 'Remove'])->name('admin.dictionary.manage.remove');
Route::post('/admin/dictionary/manage/section/toggle/categories', [DictionaryManageController::class, 'ToggleSectionCategories'])->name('admin.dictionary.manage.section.toggle.categories');

Route::post('/admin/dictionary/update/name', [DictionaryUpdateController::class, 'UpdateName'])->name('admin.dictionary.update.name');
Route::post('/admin/dictionary/update/category', [DictionaryUpdateController::class, 'UpdateCategory'])->name('admin.dictionary.update.category');
Route::post('/admin/dictionary/update/path', [DictionaryUpdateController::class, 'UpdatePath'])->name('admin.dictionary.update.path');
Route::post('/admin/dictionary/update/order', [DictionaryUpdateController::class, 'UpdateOrder'])->name('admin.dictionary.update.order');
Route::post('/admin/dictionary/update/description', [DictionaryUpdateController::class, 'UpdateDescription'])->name('admin.dictionary.update.description');
Route::post('/admin/dictionary/update/description_short', [DictionaryUpdateController::class, 'UpdateDescriptionShort'])->name('admin.dictionary.update.description_short');
Route::post('/admin/dictionary/update/icon_filename', [DictionaryUpdateController::class, 'UpdateIconFilename'])->name('admin.dictionary.update.icon_filename');
Route::post('/admin/dictionary/update/type', [DictionaryUpdateController::class, 'UpdateType'])->name('admin.dictionary.update.type');
Route::post('/admin/dictionary/update/agreement', [DictionaryUpdateController::class, 'UpdateAgreement'])->name('admin.dictionary.update.agreement');
Route::post('/admin/dictionary/update/section', [DictionaryUpdateController::class, 'UpdateSection'])->name('admin.dictionary.update.section');
Route::post('/admin/dictionary/update/tag', [DictionaryUpdateController::class, 'UpdateTag'])->name('admin.dictionary.update.tag');
Route::post('/admin/dictionary/update/filename', [DictionaryUpdateController::class, 'UpdateFilename'])->name('admin.dictionary.update.filename');
Route::post('/admin/dictionary/update/module', [DictionaryUpdateController::class, 'UpdateModule'])->name('admin.dictionary.update.module');
Route::post('/admin/dictionary/update/color', [DictionaryUpdateController::class, 'UpdateColor'])->name('admin.dictionary.update.color');
Route::post('/admin/dictionary/update/is_required', [DictionaryUpdateController::class, 'UpdateIsRequired'])->name('admin.dictionary.update.is_required');
Route::post('/admin/dictionary/update/icon', [DictionaryUpdateController::class, 'UpdateIcon'])->name('admin.dictionary.update.icon');
Route::post('/admin/dictionary/update/upload/icon', [DictionaryUpdateController::class, 'UploadIcon'])->name('admin.dictionary.update.upload.icon');
Route::post('/admin/dictionary/update/url', [DictionaryUpdateController::class, 'UpdateUrl'])->name('admin.dictionary.update.url');
Route::post('/admin/dictionary/update/smrp', [DictionaryUpdateController::class, 'UpdateSmtp'])->name('admin.dictionary.update.smtp');

// MOTIONS

Route::get('/motions/form/{id}', [MotionFormController::class, 'index'])->name('motions.form.id');
Route::get('/motions/form/{id}/origin/{origin?}', [MotionFormController::class, 'index'])->name('motions.form.origin');
Route::get('/motions/form/end', [MotionFormEndController::class, 'index'])->name('motions.form.end');
Route::get('/motions/form/payment/{transaction_id}', [MotionFormEndController::class, 'index'])->name('motions.form.payment');
Route::get('/motions/form/end/payment/{id}/origin/{origin?}', [MotionFormPayEndController::class, 'index'])->name('motions.form.origin.pay.end');
Route::get('/motions/form/end/thankyou/{id}/origin/{origin?}', [MotionFormThankYouController::class, 'index'])->name('motions.form.origin.thankyou');

Route::get('/motions/code/{code}/origin/{origin?}', [MotionCustomFormViewController::class, 'index'])->name('motions.form.origin.code');

//view
Route::get('/admin/motions', [MotionAllViewController::class, 'index'])->name('admin.motions');
Route::get('/admin/motions/id/{id}', [MotionAllViewController::class, 'index'])->name('admin.motions.expanded');

// MOTIONS PRICES

Route::get('/admin/motions/prices', [MotionPricesViewController::class, 'index'])->name('admin.motions.prices');
Route::get('/admin/motions/prices/id/{id}', [MotionPricesSingleViewController::class, 'index'])->name('admin.motions.prices.single');

Route::post('/admin/motions/prices/manage/fill', [MotionPricesManageController::class, 'FillPriceListWithMotions'])->name('admin.motions.prices.manage.fill');
Route::post('/admin/motions/prices/update/price', [MotionPricesManageController::class, 'UpdatePrice'])->name('admin.motions.prices.update.price');
Route::post('/admin/motions/prices/update/all', [MotionPricesManageController::class, 'UpdateAllPrices'])->name('admin.motions.prices.update.all');

// CASES

//add
Route::post('/motion/cases/add', [CaseCreateController::class, 'AddThroughForm'])->name('motion.cases.add');
Route::post('/cases/add', [CaseCreateController::class, 'Add'])->name('cases.add');

//view
Route::get('/admin/cases', [CaseAdminAllViewController::class, 'index'])->name('admin.cases');
Route::get('/admin/cases/id/{id}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded');
Route::get('/admin/cases/single/id/{id}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.single');

Route::get('/admin/cases/id/{id}/lawyers/{lawyer_id?}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded.lawyers.id');
Route::get('/admin/cases/id/{id}/attachements/{attachement_id?}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded.attachements.id');
Route::get('/admin/cases/id/{id}/notes/{note_id?}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded.notes.id');
Route::get('/admin/cases/id/{id}/history/{history_id?}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded.history.id');
Route::get('/admin/cases/id/{id}/responses/{response_id?}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded.responses.id');
Route::get('/admin/cases/id/{id}/tab_motions/{tab_motion_id?}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded.tab_motions.id');
Route::get('/admin/cases/id/{id}/fields/{field_id?}', [CaseAdminSingleViewController::class, 'index'])->name('admin.cases.expanded.fields.id');

Route::get('/admin/cases/filters', [CaseAdminAllViewController::class, 'index']);
Route::get('/admin/cases/filters/status/{status_id?}', [CaseAdminAllViewController::class, 'index'])->name('admin.cases.filters.status');
Route::get('/admin/cases/filters/name/{name?}', [CaseAdminAllViewController::class, 'index'])->name('admin.cases.filters.name');
Route::get('/admin/cases/filters/motion/{motion_id?}', [CaseAdminAllViewController::class, 'index'])->name('admin.cases.filters.motion');
Route::get('/admin/cases/filters/petitioner/{petitioner?}', [CaseAdminAllViewController::class, 'index'])->name('admin.cases.filters.petitioner');
Route::get('/admin/cases/filters/lawyer/{lawyer?}', [CaseAdminAllViewController::class, 'index'])->name('admin.cases.filters.lawyer');
Route::get('/admin/cases/filters/archive/{is_archived?}', [CaseAdminAllViewController::class, 'index'])->name('admin.cases.filters.archive');


Route::get('/cases', [CaseOwnedAllViewController::class, 'index'])->name('cases');
Route::get('/cases/id/{id}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded');
Route::get('/cases/single/id/{id}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.single');

Route::get('/cases/id/{id}/lawyers/{lawyer_id?}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded.lawyers.id');
Route::get('/cases/id/{id}/attachements/{attachement_id?}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded.attachements.id');
Route::get('/cases/id/{id}/notes/{note_id?}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded.notes.id');
Route::get('/cases/id/{id}/history/{history_id?}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded.history.id');
Route::get('/cases/id/{id}/responses/{response_id?}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded.responses.id');
Route::get('/cases/id/{id}/tab_motions/{tab_motion_id?}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded.tab_motions.id');
Route::get('/cases/id/{id}/fields/{field_id?}', [CaseOwnedSingleViewController::class, 'index'])->name('cases.expanded.fields.id');

Route::get('/cases/filters', [CaseOwnedAllViewController::class, 'index']);
Route::get('/cases/filters/status/{status_id?}', [CaseOwnedAllViewController::class, 'index'])->name('cases.filters.status');
Route::get('/cases/filters/name/{name?}', [CaseOwnedAllViewController::class, 'index'])->name('cases.filters.name');
Route::get('/cases/filters/motion/{motion_id?}', [CaseOwnedAllViewController::class, 'index'])->name('cases.filters.motion');
Route::get('/cases/filters/petitioner/{petitioner?}', [CaseOwnedAllViewController::class, 'index'])->name('cases.filters.petitioner');
Route::get('/cases/filters/lawyer/{lawyer?}', [CaseOwnedAllViewController::class, 'index'])->name('cases.filters.lawyer');
Route::get('/cases/filters/archive/{is_archived?}', [CaseOwnedAllViewController::class, 'index'])->name('cases.filters.archive');

//delete

Route::post('/cases/delete/selected', [CaseManageController::class, 'DeleteSelected'])->name('cases.delete.selected');
Route::post('/cases/delete/case', [CaseManageController::class, 'DeleteCase'])->name('cases.delete.case');
Route::post('/cases/delete/case/lawyer', [CaseManageController::class, 'DeleteLawyer'])->name('cases.delete.case.lawyer');
Route::post('/cases/delete/case/note', [CaseManageController::class, 'DeleteNote'])->name('cases.delete.case.note');

//manage

Route::post('/cases/manage/add/attachement', [CaseManageController::class, 'AddAttachement'])->name('cases.manage.add.attachement');
Route::post('/cases/manage/remove/attachement', [CaseManageController::class, 'RemoveAttachement'])->name('cases.manage.remove.attachement');
Route::post('/cases/manage/add/note', [CaseCreateController::class, 'AddNote'])->name('cases.manage.add.note');
Route::post('/cases/manage/add/lawyer', [CaseCreateController::class, 'AddLawyer'])->name('cases.manage.add.lawyer');
Route::post('/cases/manage/change/lawyer', [CaseManageController::class, 'ChangeLawyer'])->name('cases.manage.change.lawyer');
Route::post('/cases/manage/swap/motion/rtf', [CaseManageController::class, 'SwapMotionVersionRtf'])->name('cases.manage.swap.motion.rtf');
Route::post('/cases/manage/swap/motion/pdf', [CaseManageController::class, 'SwapMotionVersionPdf'])->name('cases.manage.swap.motion.pdf');
Route::post('/cases/manage/swap/motion/txt', [CaseManageController::class, 'SwapMotionVersionTxt'])->name('cases.manage.swap.motion.txt');

//update

Route::post('/cases/update/case/name', [CaseUpdateController::class, 'UpdateCaseName'])->name('cases.update.case.name')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/motion', [CaseUpdateController::class, 'UpdateCaseMotion'])->name('cases.update.case.motion')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/status', [CaseUpdateController::class, 'UpdateCaseStatus'])->name('cases.update.case.status')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/firstname', [CaseUpdateController::class, 'UpdateCaseFirstname'])->name('cases.update.case.firstname')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/lastname', [CaseUpdateController::class, 'UpdateCaseLastname'])->name('cases.update.case.lastname')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/active', [CaseUpdateController::class, 'UpdateCaseActive'])->name('cases.update.case.active')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/verify', [CaseUpdateController::class, 'UpdateCaseVerify'])->name('cases.update.case.verify')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/start', [CaseUpdateController::class, 'UpdateCaseStart'])->name('cases.update.case.start')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/complete', [CaseUpdateController::class, 'UpdateCaseComplete'])->name('cases.update.case.complete')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/contact/type', [CaseUpdateController::class, 'UpdateCaseContactType'])->name('cases.update.case.contact.type')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/contact/data', [CaseUpdateController::class, 'UpdateCaseContactData'])->name('cases.update.case.contact.data')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/contact/primary', [CaseUpdateController::class, 'UpdateCaseContactPrimary'])->name('cases.update.case.contact.primary')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/contact/note', [CaseUpdateController::class, 'UpdateCaseContactNote'])->name('cases.update.case.contact.note')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/lawyer/active', [CaseUpdateController::class, 'UpdateCaseLawyerActive'])->name('cases.update.case.lawyer.active')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/note/note', [CaseUpdateController::class, 'UpdateCaseNoteNote'])->name('cases.update.case.note.note')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/person/name', [CaseUpdateController::class, 'UpdateCasePersonName'])->name('cases.update.case.person.name')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/person/firstname', [CaseUpdateController::class, 'UpdateCasePersonFirstname'])->name('cases.update.case.person.firstname')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/person/lastname', [CaseUpdateController::class, 'UpdateCasePersonLastname'])->name('cases.update.case.person.lastname')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/person/phone', [CaseUpdateController::class, 'UpdateCasePersonPhone'])->name('cases.update.case.person.phone')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/person/email', [CaseUpdateController::class, 'UpdateCasePersonEmail'])->name('cases.update.case.person.email')->middleware('permissions:mcases,can_edit');
Route::post('/cases/update/case/response/note', [CaseUpdateController::class, 'UpdateCaseResponseNote'])->name('cases.update.case.response.note')->middleware('permissions:mcases,can_edit');

//find


Route::any('/find/lawyers', [FindController::class, 'FindLawyers'])->name('find.lawyers');

//responses

Route::post('/cases/add/response/quick', [CaseCreateController::class, 'AddQuickResponse'])->name('cases.add.response.quick')->middleware('permissions:mcases,can_edit');
Route::post('/cases/add/response', [CaseCreateController::class, 'AddResponse'])->name('cases.add.response')->middleware('permissions:mcases,can_edit');

//stats

Route::get('/stats/lawyers', [StatsLawyerViewController::class, 'index'])->name('stats.lawyers');

//smtp

Route::get('/system/smtp', [SmtpController::class, 'index'])->name('system.smtp');
Route::post('/system/smtp/test/connection', [SmtpController::class, 'TestConnection'])->name('system.smtp.test.connection');
Route::post('/system/smtp/add', [SmtpController::class, 'Add'])->name('system.smtp.add');
Route::post('/system/smtp/update', [SmtpController::class, 'Update'])->name('system.smtp.update');
Route::post('/system/smtp/delete', [SmtpController::class, 'Delete'])->name('system.smtp.delete');
Route::post('/system/update/response/footer', [SystemUpdateController::class, 'UpdateSystemResponseFooter'])->name('system.update.response.footer');

//payment

Route::get('/payment/order/pay/id/{transaction_id}', [TpayController::class, "PayOrder"])->name('payment.order.pay.transaction');
Route::post('/payment/order/pay', [TpayController::class, "PayOrder"])->name('payment.order.pay');
Route::any('/payment/tpay/result', [TpayController::class, "Receive"])->name('payment.tpay.result');




//test


Route::any('/pdf/test', [MotionFileController::class, 'index']);
Route::any('/test/pay', [TpayController::class, "Pay"])->name('pay');
Route::get('/test', [TestController::class,'index'])->name('test');
