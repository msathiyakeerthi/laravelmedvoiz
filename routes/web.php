<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSTTController;
use App\Http\Controllers\Admin\STTConfigController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\FinanceSubscriptionController;
use App\Http\Controllers\Admin\FinancePrepaidController;
use App\Http\Controllers\Admin\FinancePromocodeController;
use App\Http\Controllers\Admin\ReferralSystemController;
use App\Http\Controllers\Admin\FinanceSettingController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\InstallController;
use App\Http\Controllers\Admin\UpdateController;
use App\Http\Controllers\Admin\Settings\GlobalController;
use App\Http\Controllers\Admin\Settings\BackupController;
use App\Http\Controllers\Admin\Settings\OAuthController;
use App\Http\Controllers\Admin\Settings\ActivationController;
use App\Http\Controllers\Admin\Settings\SMTPController;
use App\Http\Controllers\Admin\Settings\RegistrationController;
use App\Http\Controllers\Admin\Settings\InvoiceController;
use App\Http\Controllers\Admin\Settings\AppearanceController;
use App\Http\Controllers\Admin\Settings\FrontendController;
use App\Http\Controllers\Admin\Settings\BlogController;
use App\Http\Controllers\Admin\Settings\FAQController;
use App\Http\Controllers\Admin\Settings\UpgradeController;
use App\Http\Controllers\Admin\Webhooks\PaypalWebhookController;
use App\Http\Controllers\Admin\Webhooks\StripeWebhookController;
use App\Http\Controllers\Admin\Webhooks\PaystackWebhookController;
use App\Http\Controllers\Admin\Webhooks\RazorpayWebhookController;
use App\Http\Controllers\Admin\Webhooks\MollieWebhookController;
use App\Http\Controllers\Admin\Webhooks\CoinbaseWebhookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestApiController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserPasswordController;
use App\Http\Controllers\User\STTController;
use App\Http\Controllers\User\STTResultController;
use App\Http\Controllers\User\PatientController;
use App\Http\Controllers\User\BalanceController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\User\PromocodeController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ReferralController;
use App\Http\Controllers\User\UserSupportController;
use App\Http\Controllers\User\UserNotificationController;
use App\Http\Controllers\User\SearchController;
use Illuminate\Support\Facades\Artisan;

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
//React page
// routes/web.php

Route::get('/react-app', function () {
    return view('reactapp');
});

Route::post('test', [TestApiController::class, 'index']);

// HOMEPAGE
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [HomeController::class, 'blogShow'])->name('blogs.show');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/contact', [HomeController::class, 'contactForm'])->name('contact.show');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');

// TERMS & CONDITION ROUTES
Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('terms');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy');

// LOCALE ROUTES
Route::get('/locale/{lang}', [LocaleController::class, 'language'])->name('locale');

// UPDATE ROUTE
Route::get('/update/now', [UpdateController::class, 'updateDatabase']);

// AUTH ROUTES
Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    require __DIR__.'/auth.php';
});

// PAYMENT GATEWAY WEBHOOKS ROUTES
Route::post('/webhooks/stripe', [StripeWebhookController::class, 'handleStripe'])->name('stripe.webhook');
Route::post('/webhooks/paypal', [PaypalWebhookController::class, 'handlePaypal']);
Route::post('/webhooks/paystack', [PaystackWebhookController::class, 'handlePaystack']);
Route::post('/webhooks/razorpay', [RazorpayWebhookController::class, 'handleRazorpay']);
Route::post('/webhooks/mollie', [MollieWebhookController::class, 'handleMollie'])->name('mollie.webhook');
Route::post('/webhooks/coinbase', [CoinbaseWebhookController::class, 'handleCoinbase']);

// INSTAL ROUTES
Route::group(['prefix' => 'install', 'middleware' => 'install'], function() {
    Route::get('/', [InstallController::class, 'index'])->name('install');
    Route::get('/requirements', [InstallController::class, 'requirements'])->name('install.requirements');
    Route::get('/permissions', [InstallController::class, 'permissions'])->name('install.permissions');
    Route::get('/database', [InstallController::class, 'database'])->name('install.database');
    Route::post('/database', [InstallController::class, 'storeDatabaseCredentials'])->name('install.database.store');
    Route::get('/activation', [InstallController::class, 'activation'])->name('install.activation');
    Route::post('/activation', [InstallController::class, 'activateApplication'])->name('install.activation.activate');
});

// ADMIN ROUTES
Route::group(['prefix' => 'admin', 'middleware' => ['verified', 'role:admin', 'PreventBackHistory']], function() {

        // ADMIN DASHBOARD ROUTES
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // ADMIN STT MANAGEMENT ROUTES
        Route::get('/stt/dashboard', [AdminSTTController::class, 'index'])->name('admin.stt.dashboard');
        Route::get('/stt/results/list', [AdminSTTController::class, 'listResults'])->name('admin.stt.results');
        Route::get('/stt/result/{id}/show', [AdminSTTController::class, 'show'])->name('admin.stt.result.show');
        Route::delete('/stt/result/{id}', [AdminSTTController::class, 'destroy'])->name('admin.stt.result.destroy');
        Route::get('/stt/result/{id}/delete', [AdminSTTController::class, 'delete'])->name('admin.stt.result.delete');
        Route::get('/stt/configs', [STTConfigController::class, 'index'])->name('admin.stt.configs');
        Route::post('/stt/configs', [STTConfigController::class, 'store'])->name('admin.stt.configs.store');


        // ADMIN USER MANAGEMENT ROUTES
        Route::get('/users/dashboard', [AdminUserController::class, 'index'])->name('admin.user.dashboard');
        Route::get('/users/activity', [AdminUserController::class, 'activity'])->name('admin.user.activity');
        Route::get('/users/list', [AdminUserController::class, 'listUsers'])->name('admin.user.list');
        Route::post('/users', [AdminUserController::class, 'store'])->name('admin.user.store');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::get('/users/{user}/show', [AdminUserController::class, 'show'])->name('admin.user.show');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::get('/users/{user}/minutes', [AdminUserController::class, 'minutes'])->name('admin.user.minutes');
        Route::post('/users/{user}/increase', [AdminUserController::class, 'increase'])->name('admin.user.increase');
        Route::put('/users/{user}/update', [AdminUserController::class, 'update'])->name('admin.user.update');
        Route::put('/users/{user}', [AdminUserController::class, 'change'])->name('admin.user.change');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('/users/{user}', [AdminUserController::class, 'delete'])->name('admin.user.delete');

        // ADMIN FINANCE - DASHBOARD & PAYMENTS LIST ROUTES
        Route::get('/finance/dashboard', [FinanceController::class, 'index'])->name('admin.finance.dashboard');
        Route::get('/finance/payments', [FinanceController::class, 'listPayments'])->name('admin.finance.payments');
        Route::get('/finance/payments/subscriptions', [FinanceController::class, 'listSubscriptions'])->name('admin.finance.payments.subscriptions');
        Route::get('/finance/payments/subscriptions/cancel/{id}', [FinanceController::class, 'cancelSubscription'])->name('admin.finance.payments.subscriptions.cancel');
        Route::put('/finance/payments/{id}/update', [FinanceController::class, 'update'])->name('admin.finance.payments.update');
        Route::get('/finance/payments/{id}/show', [FinanceController::class, 'show'])->name('admin.finance.payments.show');
        Route::get('/finance/payments/{id}/edit', [FinanceController::class, 'edit'])->name('admin.finance.payments.edit');
        Route::delete('/finance/payments/{id}', [FinanceController::class, 'destroy'])->name('admin.finance.payments.destroy');
        Route::get('/finance/payments/{id}', [FinanceController::class, 'delete'])->name('admin.finance.payments.delete');

        // ADMIN FINANCE - SUBSCRIPTION ROUTES
        Route::get('/finance/subscriptions', [FinanceSubscriptionController::class, 'index'])->name('admin.finance.subscriptions');
        Route::post('/finance/subscriptions', [FinanceSubscriptionController::class, 'store'])->name('admin.finance.subscriptions.store');
        Route::get('/finance/subscriptions/create', [FinanceSubscriptionController::class, 'create'])->name('admin.finance.subscriptions.create');
        Route::get('/finance/subscriptions/{id}/show', [FinanceSubscriptionController::class, 'show'])->name('admin.finance.subscriptions.show');
        Route::get('/finance/subscriptions/{id}/edit', [FinanceSubscriptionController::class, 'edit'])->name('admin.finance.subscriptions.edit');
        Route::put('/finance/subscriptions/{id}', [FinanceSubscriptionController::class, 'update'])->name('admin.finance.subscriptions.update');
        Route::delete('/finance/subscriptions/{id}', [FinanceSubscriptionController::class, 'destroy'])->name('admin.finance.subscriptions.destroy');
        Route::get('/finance/subscriptions/{id}', [FinanceSubscriptionController::class, 'delete'])->name('admin.finance.subscriptions.delete');

        // ADMIN FINANCE - PREPAID ROUTES
        Route::get('/finance/prepaid', [FinancePrepaidController::class, 'index'])->name('admin.finance.prepaid');
        Route::post('/finance/prepaid', [FinancePrepaidController::class, 'store'])->name('admin.finance.prepaid.store');
        Route::get('/finance/prepaid/create', [FinancePrepaidController::class, 'create'])->name('admin.finance.prepaid.create');
        Route::get('/finance/prepaid/{id}/show', [FinancePrepaidController::class, 'show'])->name('admin.finance.prepaid.show');
        Route::get('/finance/prepaid/{id}/edit', [FinancePrepaidController::class, 'edit'])->name('admin.finance.prepaid.edit');
        Route::put('/finance/prepaid/{id}', [FinancePrepaidController::class, 'update'])->name('admin.finance.prepaid.update');
        Route::delete('/finance/prepaid/{id}', [FinancePrepaidController::class, 'destroy'])->name('admin.finance.prepaid.destroy');
        Route::get('/finance/prepaid/{id}', [FinancePrepaidController::class, 'delete'])->name('admin.finance.prepaid.delete');

        // ADMIN FINANCE - PROMOCODES ROUTES
        Route::get('/finance/promocodes', [FinancePromocodeController::class, 'index'])->name('admin.finance.promocodes');
        Route::post('/finance/promocodes', [FinancePromocodeController::class, 'store'])->name('admin.finance.promocodes.store');
        Route::get('/finance/promocodes/create', [FinancePromocodeController::class, 'create'])->name('admin.finance.promocodes.create');
        Route::get('/finance/promocodes/clean', [FinancePromocodeController::class, 'clean'])->name('admin.finance.promocodes.clean');
        Route::get('/finance/promocodes/{id}/show', [FinancePromocodeController::class, 'show'])->name('admin.finance.promocodes.show');
        Route::get('/finance/promocodes/{id}/edit', [FinancePromocodeController::class, 'edit'])->name('admin.finance.promocodes.edit');
        Route::put('/finance/promocodes/{id}', [FinancePromocodeController::class, 'update'])->name('admin.finance.promocodes.update');
        Route::delete('/finance/promocodes/{id}', [FinancePromocodeController::class, 'destroy'])->name('admin.finance.promocodes.destroy');
        Route::get('/finance/promocodes/{id}', [FinancePromocodeController::class, 'delete'])->name('admin.finance.promocodes.delete');

        // ADMIN FINANCE - SETTINGS ROUTES
        Route::get('/finance/settings', [FinanceSettingController::class, 'index'])->name('admin.finance.settings');
        Route::post('/finance/settings', [FinanceSettingController::class, 'store'])->name('admin.finance.settings.store');

        // ADMIN FINANCE - REFERRAL ROUTES
        Route::get('/referral/settings', [ReferralSystemController::class, 'index'])->name('admin.referral.settings');
        Route::post('/referral/settings', [ReferralSystemController::class, 'store'])->name('admin.referral.settings.store');
        Route::get('/referral/{order_id}/show', [ReferralSystemController::class, 'paymentShow'])->name('admin.referral.show');
        Route::get('/referral/payouts', [ReferralSystemController::class, 'payouts'])->name('admin.referral.payouts');
        Route::get('/referral/payouts/{id}/show', [ReferralSystemController::class, 'payoutsShow'])->name('admin.referral.payouts.show');
        Route::put('/referral/payouts/{id}/store', [ReferralSystemController::class, 'payoutsUpdate'])->name('admin.referral.payouts.update');
        Route::get('/referral/payouts/{id}/cancel', [ReferralSystemController::class, 'payoutsCancel'])->name('admin.referral.payouts.cancel');
        Route::delete('/referral/payouts/{id}/decline', [ReferralSystemController::class, 'payoutsDecline'])->name('admin.referral.payouts.decline');
        Route::get('/referral/registration', [ReferralSystemController::class, 'registrationReferrals'])->name('admin.referral.registration');
        Route::get('/referral/top', [ReferralSystemController::class, 'topReferrers'])->name('admin.referral.top');

        // ADMIN SUPPORT ROUTES
        Route::get('/support', [SupportController::class, 'index'])->name('admin.support');
        Route::put('/support/{ticked_id}', [SupportController::class, 'update'])->name('admin.support.update');
        Route::get('/support/{ticket_id}/show', [SupportController::class, 'show'])->name('admin.support.show');
        Route::delete('/support/{id}', [SupportController::class, 'destroy'])->name('admin.support.destroy');
        Route::get('/support/{id}', [SupportController::class, 'delete'])->name('admin.support.delete');

        // ADMIN NOTIFICATION ROUTES
        Route::get('/notifications', [NotificationController::class, 'index'])->name('admin.notifications');
        Route::get('/notifications/sytem', [NotificationController::class, 'system'])->name('admin.notifications.system');
        Route::get('/notifications/create', [NotificationController::class, 'create'])->name('admin.notifications.create');
        Route::post('/notifications', [NotificationController::class, 'store'])->name('admin.notifications.store');
        Route::get('/notifications/{id}/show', [NotificationController::class, 'show'])->name('admin.notifications.show');
        Route::get('/notifications/system/{id}/show', [NotificationController::class, 'systemShow'])->name('admin.notifications.systemShow');
        Route::get('/notifications/mark-all', [NotificationController::class, 'markAllRead'])->name('admin.notifications.markAllRead');
        Route::get('/notifications/delete-all', [NotificationController::class, 'deleteAll'])->name('admin.notifications.deleteAll');
        Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('admin.notifications.destroy');
        Route::get('/notifications/{id}', [NotificationController::class, 'delete'])->name('admin.notifications.delete');
        Route::delete('/notifications/system/{id}', [NotificationController::class, 'systemDestroy'])->name('admin.notifications.systemDestroy');
        Route::get('/notifications/system/{id}', [NotificationController::class, 'systemDelete'])->name('admin.notifications.systemDelete');

        // ADMIN GENERAL SETTINGS - GLOBAL SETTINGS
        Route::get('/settings/global', [GlobalController::class, 'index'])->name('admin.settings.global');
        Route::post('/settings/global', [GlobalController::class, 'store'])->name('admin.settings.global.store');

        // ADMIN GENERAL SETTINGS - DATABASE BACKUP
        Route::get('/settings/backup', [BackupController::class, 'index'])->name('admin.settings.backup');
        Route::get('/settings/backup/create', [BackupController::class, 'create'])->name('admin.settings.backup.create');
        Route::get('/settings/backup/{file_name}', [BackupController::class, 'download'])->name('admin.settings.backup.download');
        Route::get('/settings/backup/{file_name}/delete', [BackupController::class, 'destroy'])->name('admin.settings.backup.delete');

        // ADMIN GENERAL SETTINGS - SMTP SETTINGS
        Route::post('/settings/smtp/test', [SMTPController::class, 'test'])->name('admin.settings.smtp.test');
        Route::get('/settings/smtp', [SMTPController::class, 'index'])->name('admin.settings.smtp');
        Route::post('/settings/smtp', [SMTPController::class, 'store'])->name('admin.settings.smtp.store');

        // ADMIN GENERAL SETTINGS - REGISTRATION SETTINGS
        Route::get('/settings/registration', [RegistrationController::class, 'index'])->name('admin.settings.registration');
        Route::post('/settings/registration', [RegistrationController::class, 'store'])->name('admin.settings.registration.store');

        // ADMIN GENERAL SETTINGS - OAUTH SETTINGS
        Route::get('/settings/oauth', [OAuthController::class, 'index'])->name('admin.settings.oauth');
        Route::post('/settings/oauth', [OAuthController::class, 'store'])->name('admin.settings.oauth.store');

        // ADMIN GENERAL SETTINGS - ACTIVATION SETTINGS
        Route::get('/settings/activation', [ActivationController::class, 'index'])->name('admin.settings.activation');
        Route::post('/settings/activation', [ActivationController::class, 'store'])->name('admin.settings.activation.store');
        Route::get('/settings/activation/remove', [ActivationController::class, 'remove'])->name('admin.settings.activation.remove');
        Route::delete('/settings/activation/destroy', [ActivationController::class, 'destroy'])->name('admin.settings.activation.destroy');
        Route::get('/settings/activation/manual', [ActivationController::class, 'showManualActivation'])->name('admin.settings.activation.manual');
        Route::post('/settings/activation/manual', [ActivationController::class, 'storeManualActivation'])->name('admin.settings.activation.manual.store');

        // ADMIN GENERAL SETTINGS - INVOICE SETTINGS
        Route::get('/settings/invoice', [InvoiceController::class, 'index'])->name('admin.settings.invoice');
        Route::post('/settings/invoice', [InvoiceController::class, 'store'])->name('admin.settings.invoice.store');

        // ADMIN GENERAL SETTINGS - APPEARANCE SETTINGS
        Route::get('/settings/appearance', [AppearanceController::class, 'index'])->name('admin.settings.appearance');
        Route::post('/settings/appearance', [AppearanceController::class, 'store'])->name('admin.settings.appearance.store');

        // ADMIN GENERAL SETTINGS - FRONTEND SETTINGS
        Route::get('/settings/frontend', [FrontendController::class, 'index'])->name('admin.settings.frontend');
        Route::post('/settings/frontend', [FrontendController::class, 'store'])->name('admin.settings.frontend.store');

        // ADMIN GENERAL SETTINGS - BLOG MANAGER
        Route::get('/settings/blog', [BlogController::class, 'index'])->name('admin.settings.blog');
        Route::get('/settings/blog/create', [BlogController::class, 'create'])->name('admin.settings.blog.create');
        Route::post('/settings/blog', [BlogController::class, 'store'])->name('admin.settings.blog.store');
		Route::put('/settings/blogs/{id}', [BlogController::class, 'update'])->name('admin.settings.blog.update');
        Route::get('/settings/blogs/{id}/edit', [BlogController::class, 'edit'])->name('admin.settings.blog.edit');
        Route::delete('/settings/blog/{id}', [BlogController::class, 'destroy'])->name('admin.settings.blog.destroy');
        Route::get('/settings/blog/{id}', [BlogController::class, 'delete'])->name('admin.settings.blog.delete');

        // ADMIN GENERAL SETTINGS - FAQ MANAGER
        Route::get('/settings/faq', [FAQController::class, 'index'])->name('admin.settings.faq');
        Route::get('/settings/faq/create', [FAQController::class, 'create'])->name('admin.settings.faq.create');
        Route::post('/settings/faq', [FAQController::class, 'store'])->name('admin.settings.faq.store');
        Route::post('/settings/faq/category', [FAQController::class, 'storeCategory'])->name('admin.settings.faq.category.store');
		Route::put('/settings/faqs/{id}', [FAQController::class, 'update'])->name('admin.settings.faq.update');
        Route::get('/settings/faqs/{id}/edit', [FAQController::class, 'edit'])->name('admin.settings.faq.edit');
        Route::delete('/settings/faq/{id}', [FAQController::class, 'destroy'])->name('admin.settings.faq.destroy');
        Route::get('/settings/faq/{id}', [FAQController::class, 'delete'])->name('admin.settings.faq.delete');

        // ADMIN GENERAL SETTINGS - UPGRADE SOFTWARE
        Route::get('/settings/upgrade', [UpgradeController::class, 'index'])->name('admin.settings.upgrade');
        Route::post('/settings/upgrade', [UpgradeController::class, 'upgrade'])->name('admin.settings.upgrade.start');


Route::prefix('reports')->name('reports.')->group(function () {
    Route::get('/', [TestApiController::class, 'index'])->name('index');
    Route::post('store', [TestApiController::class, 'store'])->name('store');
    Route::get('show/{id}', [TestApiController::class, 'show'])->name('show');
});

        Route::get('/clear', function() {
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
			Artisan::call('view:clear');
        });

});


// REGISTERED USER ROUTES
Route::group(['prefix' => 'user', 'middleware' => ['verified', 'role:user|admin|subscriber', 'PreventBackHistory']], function() {

        // CHANGE USER PASSWORD ROUTES
        Route::get('/profile/password', [UserPasswordController::class, 'index'])->name('user.password');
        Route::post('/profile/password/{id}', [UserPasswordController::class, 'update'])->name('user.password.update');
        Route::get('/stt/settings', [STTController::class, 'settings']);

        // USER PROFILE ROUTES
        Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
        Route::put('/profile/{user}', [UserController::class, 'update'])->name('user.profile.update');
        Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');

        // USER STT RESULTS ROUTES
        Route::get('/stt/results', [STTResultController::class, 'index'])->name('user.stt.results');
        Route::get('/stt/results/{id}/show', [STTResultController::class, 'show'])->name('user.stt.results.show');
        Route::get('/stt/results/{id}/report', [TestApiController::class, 'showReport'])->name('user.stt.results.report');
        Route::post('/stt/results/{id}/report-update', [TestApiController::class, 'updateReport'])->name('user.stt.results.report-update');
        Route::delete('/stt/result/{id}', [STTResultController::class, 'destroy'])->name('user.stt.result.destroy');
        Route::get('/stt/result/{id}', [STTResultController::class, 'delete'])->name('user.stt.result.delete');

        // USER STT CASES ROUTES
        Route::get('/stt/case', [PatientController::class, 'index'])->name('user.cases');
        Route::post('/stt/case', [PatientController::class, 'store'])->name('user.case.store');
        Route::get('/stt/case/change', [PatientController::class, 'change'])->name('user.cases.change');
        Route::get('/stt/case/change/stats', [PatientController::class, 'changeStatus'])->name('user.cases.change.stats');
        Route::put('/stt/case', [PatientController::class, 'update'])->name('user.case.update');
        Route::get('/stt/case/result/{id}/show', [PatientController::class, 'show'])->name('user.case.result.show');
        Route::delete('/stt/case', [PatientController::class, 'destroy'])->name('user.case.delete');
        Route::delete('/stt/case/result/{id}', [PatientController::class, 'destroyResult'])->name('user.case.result.destroy');
        Route::get('/stt/case/result/{id}', [PatientController::class, 'deleteResult'])->name('user.case.result.delete');

        // USER STT ROUTES
        Route::get('/stt/file', [STTController::class, 'fileTranscribe'])->name('user.stt.file');
        Route::get('/stt/record', [STTController::class, 'recordTranscribe'])->name('user.stt.record');
        Route::post('/stt', [STTController::class, 'transcribe'])->name('user.stt.transcribe');
        Route::get('/stt/{id}/show/file', [STTController::class, 'showFile'])->name('user.stt.show.file');
        Route::get('/stt/{id}/show/report', [TestApiController::class, 'showReport'])->name('user.stt.show.report');
        Route::get('/stt/{id}/show/record', [STTController::class, 'showRecord'])->name('user.stt.show.record');
        Route::delete('/stt/{id}', [STTController::class, 'destroy'])->name('user.stt.destroy');
        Route::get('/stt/{id}', [STTController::class, 'delete'])->name('user.stt.delete');


        // USER BALANCE ROUTES
        Route::get('/balance', [BalanceController::class, 'index'])->name('user.balance');
        Route::get('/balance/payments', [BalanceController::class, 'listPayments'])->name('user.balance.payments');
        Route::get('/balance/subscriptions', [BalanceController::class, 'listSubscriptions'])->name('user.balance.subscriptions');
        Route::get('/balance/subscriptions/cancel/{id}', [BalanceController::class, 'cancelSubscription'])->name('user.balance.subscriptions.cancel');
        Route::get('/balance/payments/{id}/show', [BalanceController::class, 'show'])->name('user.balance.payments.show');
        Route::delete('/balance/payments/{id}', [BalanceController::class, 'destroy'])->name('user.balance.payments.destroy');
        Route::get('/balance/payments/{id}', [BalanceController::class, 'delete'])->name('user.balance.payments.delete');

        // USER SUBSCRIPTION & PREPAID PAYMENT ROUTES
        Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('user.subscriptions');
        Route::get('/subscriptions/subscribe/{id}', [SubscriptionController::class, 'subscribe'])->name('user.subscriptions.subscribe')->middleware('unsubscribed');
        Route::get('/prepaid/checkout/{id}', [SubscriptionController::class, 'checkout'])->name('user.prepaid.checkout');

        // USER PAYMENT ROUTES
        Route::post('/payments/pay/{id}', [PaymentController::class, 'pay'])->name('user.payments.pay')->middleware('unsubscribed');
        Route::post('/payments/pay/prepaid/{id}', [PaymentController::class, 'payPrePaid'])->name('user.payments.pay.prepaid');
        Route::post('/payments/approved/razorpay', [PaymentController::class, 'approvedRazorpayPrepaid'])->name('user.payments.approved.razorpay');
        Route::get('/payments/success/braintree', [PaymentController::class, 'braintreeSuccess'])->name('user.payments.approved.braintree');
        Route::get('/payments/approved', [PaymentController::class, 'approved'])->name('user.payments.approved');
        Route::get('/payments/cancelled', [PaymentController::class, 'cancelled'])->name('user.payments.cancelled');
        Route::post('/payments/subscription/razorpay', [PaymentController::class, 'approvedRazorpaySubscription'])->name('user.payments.subscription.razorpay');
        Route::get('/payments/subscription/approved', [PaymentController::class, 'approvedSubscription'])->name('user.payments.subscription.approved');
        Route::get('/payments/subscription/cancelled', [PaymentController::class, 'cancelledSubscription'])->name('user.payments.subscription.cancelled')->middleware('unsubscribed');
        Route::get('/payments/subscription/stop/{id}', [PaymentController::class, 'stopSubscription'])->name('user.payments.subscription.stop');
        Route::post('/payments/pay/promocode/prepaid/{id}', [PromocodeController::class, 'applyPromocodesPrepaid'])->name('user.payments.promocodes.prepaid');
        Route::post('/payments/pay/promocode/subscription/{id}', [PromocodeController::class, 'applyPromocodesSubscription'])->name('user.payments.promocodes.subscription');

        // USER REFERRAL ROUTES
        Route::get('/referral', [ReferralController::class, 'index'])->name('user.referral');
        Route::post('/referral/settings', [ReferralController::class, 'store'])->name('user.referral.store');
        Route::get('/referral/gateway', [ReferralController::class, 'gateway'])->name('user.referral.gateway');
        Route::post('/referral/gateway', [ReferralController::class, 'gatewayStore'])->name('user.referral.gateway.store');
        Route::get('/referral/payouts', [ReferralController::class, 'payouts'])->name('user.referral.payout');
        Route::post('/referral/email', [ReferralController::class, 'email'])->name('user.referral.email');
        Route::get('/referral/payouts/create', [ReferralController::class, 'payoutsCreate'])->name('user.referral.payout.create');
        Route::post('/referral/payouts/store', [ReferralController::class, 'payoutsStore'])->name('user.referral.payout.store');
        Route::get('/referral/all', [ReferralController::class, 'referrals'])->name('user.referral.referrals');
        Route::get('/referral/payouts/{id}/show', [ReferralController::class, 'payoutsShow'])->name('user.referral.payout.show');
        Route::get('/referral/payouts/{id}/cancel', [ReferralController::class, 'payoutsCancel'])->name('user.referral.payout.cancel');
        Route::delete('/referral/payouts/{id}/decline', [ReferralController::class, 'payoutsDecline'])->name('user.referral.payout.decline');

        // USER INVOICE ROUTES
        Route::get('/payments/invoice/{order_id}/generate', [PaymentController::class, 'generatePaymentInvoice'])->name('user.payments.invoice');
        Route::get('/payments/invoice/{id}/show', [PaymentController::class, 'showPaymentInvoice'])->name('user.payments.invoice.show');
        Route::get('/payments/invoice/{order_id}/transfer', [PaymentController::class, 'bankTransferPaymentInvoice'])->name('user.payments.invoice.transfer');

        // USER SUPPORT REQUEST ROUTES
        Route::get('/support', [UserSupportController::class, 'index'])->name('user.support');
        Route::post('/support', [UserSupportController::class, 'store'])->name('user.support.store');
        Route::get('/support/create', [UserSupportController::class, 'create'])->name('user.support.create');
        Route::get('/support/{ticket_id}/show', [UserSupportController::class, 'show'])->name('user.support.show');
        Route::delete('/support/{id}', [UserSupportController::class, 'destroy'])->name('user.support.destroy');
        Route::get('/support/{id}', [UserSupportController::class, 'delete'])->name('user.support.delete');

        // USER NOTIFICATION ROUTES
        Route::get('/notification', [UserNotificationController::class, 'index'])->name('user.notifications');
        Route::get('/notification/{id}/show', [UserNotificationController::class, 'show'])->name('user.notifications.show');
        Route::delete('/notification/{id}', [UserNotificationController::class, 'destroy'])->name('user.notifications.destroy');
        Route::get('/notification/{id}', [UserNotificationController::class, 'delete'])->name('user.notifications.delete');
        Route::get('/notifications/mark-all', [UserNotificationController::class, 'markAllRead'])->name('user.notifications.markAllRead');
        Route::get('/notifications/delete-all', [UserNotificationController::class, 'deleteAll'])->name('user.notifications.deleteAll');
        Route::post('/notifications/mark-as-read', [UserNotificationController::class, 'markNotification'])->name('user.notifications.mark');

        // USER SEARCH ROUTES
        Route::any('/search', [SearchController::class, 'index'])->name('search');

        //AI Live Transcribe
        Route::get('/ai-live-transcribe', function () {
            return view('ai-live-transcribe'); // This should be the view that contains the iframe and other content
        })->name('ai.live.transcribe');

});



