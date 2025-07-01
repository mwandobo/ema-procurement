<?php

//use Illuminate\Support\Facades\Route;

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

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\AzamPesa\IntegrationDepositController;

use App\Http\Controllers\accounting\ReportController;

Route::get('/', function () {
    //return view('dashboard.dashboard1');
    return view('auth.login');
});

Route::group(['prefix' => 'v2'], function () {
    Route::group(['middleware' => 'auth', 'prefix' => 'sales'], function () {
        Route::resource('pre-quotations', 'Sales\SalePreQuotationController');
        Route::resource('quotation-price-approval', 'Sales\SalePriceQuotationController');
        Route::resource('quotations', 'Sales\SaleQuotationController');
        Route::get('item', 'Sales\SalePreQuotationController@findItem');
        Route::post('quotations/add-payment/{id}', 'Sales\SaleQuotationController@add_payment');
        Route::post('quotations/make-payment/{id}', 'Sales\SaleQuotationController@make_payment');
    });
});


Route::group(['prefix' => 'visitors'], function () {
    Route::resource('dashboard', 'Visitors\HomeController');
});


Route::get('display_modal', 'Bar\POS\PurchaseOrderTrackingController@discountModal')
->name('gymkhana_test');

Route::post('/clearing_tracking/assign', 'Bar\POS\PurchaseOrderTrackingController@assignAgentSupplier')
->name('clearing_tracking.assign_supplier');


Route::get('purchase_tracking_import', 'Bar\POS\ImportController@purchase_order_sample')
    ->name('purchase_tracking_sample.import');


Route::get('purchase_tracking_import', 'Bar\POS\ImportController@purchase_order_sample')
    ->name('purchase_tracking_sample.import');




Route::get('purchase_tracking_sample_new', 'Bar\POS\ImportController@purchase_order_sample')
    ->name('purchase_tracking_sample_new.import');

Route::get('diy_purchase_tracking_sample_g', 'Bar\POS\ImportController@purchase_order_sample_g')
    ->name('diy_purchase_tracking_sample_g.import');


Route::get('clearing_tracking_sample', 'Bar\POS\ImportController@clearing_sample')
    ->name('clearing_tracking_sample.import');

Route::post('clearing_tracking_import', 'Bar\POS\ImportController@clearing_tracking_import')
    ->name('clearing_tracking.import');

Route::post('/purchase_order/import', 'Bar\POS\ImportController@purchase_order_import')
    ->name('purchase_order.import');


//------********* start AzamPesa routes ****------------------------------

Route::any('/index', [IntegrationDepositController::class, 'index'])->name('azampay.index');
Route::any('/store', [IntegrationDepositController::class, 'store'])->name('azampesa.store');


//------********* end AzamPesa routes ****------------------------------

Route::group(['prefix' => 'members'], function () {
    Route::resource('dashboard', 'Members\HomeController');
    Route::resource('register', 'Members\MembersController');

    Route::get('gymkhana_test', 'Members\MembersController@gymkhana_test')->name('gymkhana_test');
    Route::get('gymkhana_test2', 'Members\MembersController@gymkhana_test2')->name('gymkhana_test2');

    // member
    Route::get('member_reg_admin_view', 'Members\MembersController@member_reg_admin_view')->name('member_reg_admin_view');
    Route::post('member_reg_admin', 'Members\MembersController@member_reg_admin')->name('member_reg_admin');
    Route::get('member_reg_admin/{id}/edit', 'Members\MembersController@member_reg_admin_edit')->name('member_reg_admin_edit');
    Route::put('member_reg_admin/{id}/update', 'Members\MembersController@member_reg_admin_updates')->name('member_reg_admin_updates');

    // business

    Route::get('member_business/{member_id}/index', 'Members\MembersController@member_business_index')->name('member_business_index');
    Route::post('member_business_insert', 'Members\MembersController@member_business_insert')->name('member_business_insert');
    Route::get('member_business/{member_id}/{id}/edit', 'Members\MembersController@member_business_edit')->name('member_business_edit');
    Route::post('member_business/{id}/update', 'Members\MembersController@member_business_updates')->name('member_business_updates');

    //

    // sports

    Route::get('member_sports/{member_id}/index', 'Members\MembersController@member_sports_index')->name('member_sports_index');
    Route::post('member_sports_insert', 'Members\MembersController@member_sports_insert')->name('member_sports_insert');
    Route::get('member_sports/{member_id}/{id}/edit', 'Members\MembersController@member_business_edit')->name('member_business_edit');
    Route::post('member_sports/{id}/update', 'Members\MembersController@member_sports_update')->name('member_sports_update');

    // sports

    Route::get('member_deposit_index', 'Members\ChargesController@member_deposit_index')->name('member_deposit_index.index');
    Route::post('member_deposit_insert', 'Members\ChargesController@member_deposit_store')->name('member_deposit_index.store');

    //

    //dependent
    Route::get('member_dependent/{id}', 'Members\MembersController@add_dependant')->name('member_dependent_index');
    Route::post('member_dependent_insert', 'Members\MembersController@save_dependant')->name('member_dependent_insert');
    Route::get('member_dependent/{id}/edit', 'Members\MembersController@edit_dependant')->name('member_dependent_edit');
    Route::put('member_dependent/{id}/update', 'Members\MembersController@update_dependant')->name('member_dependent_update');

    Route::post('register2', 'Members\CompanyController@store')->name('register2.store');
    Route::any('member_type', 'Members\MembersController@reg_type')->name('member_type');
    Route::any('member_class', 'Members\MembersController@member_class')->name('member_class');
    Route::any('member_cooperate', 'Members\CompanyController@member_cooperate')->name('member_cooperate');
    Route::any('non_cooperate', 'Members\MembersController@non_cooperate')->name('non_cooperate');
    Route::get('findEmail', 'Members\MembersController@findEmail');
    Route::resource('membership_type', 'Members\MembershipTypeController');
    Route::resource('manage_charge', 'Members\ChargesController');
    Route::any('order_summary', 'Members\MembersController@order_summary')->name('member_order');
});

Route::group(['prefix' => 'staffs'], function () {
    Route::resource('dashboard', 'DashboardController');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('dashboard1', function () {
        return view('dashboard.dashboard1');
    });
    Route::get('dashboard2', function () {
        return view('dashboard.dashboard2');
    });
    Route::get('dashboard3', function () {
        return view('dashboard.dashboard3');
    });
    Route::get('dashboard4', function () {
        return view('dashboard.dashboard4');
    });
    Route::get('dashboard5', function () {
        return view('dashboard.dashboard5');
    });
    Route::get('dashboard-social', function () {
        return view('dashboard.dashboard-social');
    });
});

Route::group(['prefix' => 'apps'], function () {
    Route::get('calendar', function () {
        return view('apps.calendar');
    });
    Route::get('chat', function () {
        return view('apps.chat');
    });
    Route::group(['prefix' => 'companies'], function () {
        Route::get('lists', function () {
            return view('apps.companies.lists');
        });
        Route::get('company-details', function () {
            return view('apps.companies.company-details');
        });
    });
    Route::get('contacts', function () {
        return view('apps.contacts');
    });
    Route::group(['prefix' => 'ecommerce'], function () {
        Route::get('dashboard', function () {
            return view('apps.ecommerce.dashboard');
        });
        Route::get('products', function () {
            return view('apps.ecommerce.products');
        });
        Route::get('product-details', function () {
            return view('apps.ecommerce.product-details');
        });
        Route::get('add-product', function () {
            return view('apps.ecommerce.add-product');
        });
        Route::get('orders', function () {
            return view('apps.ecommerce.orders');
        });
        Route::get('order-details', function () {
            return view('apps.ecommerce.order-details');
        });
        Route::get('customers', function () {
            return view('apps.ecommerce.customers');
        });
        Route::get('sellers', function () {
            return view('apps.ecommerce.sellers');
        });
        Route::get('cart', function () {
            return view('apps.ecommerce.cart');
        });
        Route::get('checkout', function () {
            return view('apps.ecommerce.checkout');
        });
    });
    Route::group(['prefix' => 'email'], function () {
        Route::get('inbox', function () {
            return view('apps.email.inbox');
        });
        Route::get('details', function () {
            return view('apps.email.details');
        });
        Route::get('compose', function () {
            return view('apps.email.compose');
        });
    });
    Route::get('file-manager', function () {
        return view('apps.file-manager');
    });
    Route::get('invoice-list', function () {
        return view('apps.invoice-list');
    });
    Route::group(['prefix' => 'notes'], function () {
        Route::get('list', function () {
            return view('apps.notes.list');
        });
        Route::get('details', function () {
            return view('apps.notes.details');
        });
        Route::get('create', function () {
            return view('apps.notes.create');
        });
    });
    Route::get('social', function () {
        return view('apps.social');
    });
    Route::get('task-list', function () {
        return view('apps.task-list');
    });
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('list', function () {
            return view('apps.tickets.list');
        });
        Route::get('details', function () {
            return view('apps.tickets.details');
        });
    });
});

Route::group(['prefix' => 'authentications'], function () {
    Route::group(['prefix' => 'style1'], function () {
        Route::get('login', function () {
            return view('authentications.style1.login');
        });
        Route::get('signup', function () {
            return view('authentications.style1.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style1.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style1.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style1.confirm-email');
        });
    });
    Route::group(['prefix' => 'style2'], function () {
        Route::get('login', function () {
            return view('authentications.style2.login');
        });
        Route::get('signup', function () {
            return view('authentications.style2.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style2.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style2.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style2.confirm-email');
        });
    });
    Route::group(['prefix' => 'style3'], function () {
        Route::get('login', function () {
            return view('authentications.style3.login');
        });
        Route::get('signup', function () {
            return view('authentications.style3.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style3.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style3.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style3.confirm-email');
        });
    });
});

Route::group(['prefix' => 'pages'], function () {
    Route::get('coming-soon', function () {
        return view('pages.coming-soon');
    });
    Route::get('coming-soon2', function () {
        return view('pages.coming-soon2');
    });
    Route::get('contact-us', function () {
        return view('pages.contact-us');
    });
    Route::get('contact-us2', function () {
        return view('pages.contact-us2');
    });
    Route::group(['prefix' => 'error'], function () {
        Route::get('error404', function () {
            return view('pages.error.error404');
        });
        Route::get('error500', function () {
            return view('pages.error.error500');
        });
        Route::get('error503', function () {
            return view('pages.error.error503');
        });
        Route::get('error419', function () {
            return view('errors.419');
        });
        Route::get('maintenance', function () {
            return view('pages.error.maintenance');
        });
        Route::get('error404-two', function () {
            return view('pages.error.error404-two');
        });
        Route::get('error500-two', function () {
            return view('pages.error.error500-two');
        });
        Route::get('error503-two', function () {
            return view('pages.error.error503-two');
        });
        Route::get('maintenance-two', function () {
            return view('pages.error.maintenance-two');
        });
    });
    Route::get('faq', function () {
        return view('pages.faq');
    });
    Route::get('faq2', function () {
        return view('pages.faq2');
    });
    Route::get('faq3', function () {
        return view('pages.faq3');
    });
    Route::get('helpdesk', function () {
        return view('pages.helpdesk');
    });
    Route::get('notifications', function () {
        return view('pages.notifications');
    });
    Route::get('pricing', function () {
        return view('pages.pricing');
    });
    Route::get('pricing2', function () {
        return view('pages.pricing2');
    });
    Route::get('privacy-policy', function () {
        return view('pages.privacy-policy');
    });
    Route::get('profile', function () {
        return view('pages.profile');
    });
    Route::get('profile-edit', function () {
        return view('pages.profile-edit');
    });
    Route::get('search-result', function () {
        return view('pages.search-result');
    });
    Route::get('search-result2', function () {
        return view('pages.search-result2');
    });
    Route::get('sitemap', function () {
        return view('pages.sitemap');
    });
    Route::get('timeline', function () {
        return view('pages.timeline');
    });
});

Route::group(['prefix' => 'basic-ui'], function () {
    Route::get('accordions', function () {
        return view('basic-ui.accordions');
    });
    Route::get('animation', function () {
        return view('basic-ui.animation');
    });
    Route::get('cards', function () {
        return view('basic-ui.cards');
    });
    Route::get('carousel', function () {
        return view('basic-ui.carousel');
    });
    Route::get('countdown', function () {
        return view('basic-ui.countdown');
    });
    Route::get('counter', function () {
        return view('basic-ui.counter');
    });
    Route::get('dragitems', function () {
        return view('basic-ui.dragitems');
    });
    Route::get('lightbox', function () {
        return view('basic-ui.lightbox');
    });
    Route::get('lightbox-sideopen', function () {
        return view('basic-ui.lightbox-sideopen');
    });
    Route::get('list-groups', function () {
        return view('basic-ui.list-groups');
    });
    Route::get('media-object', function () {
        return view('basic-ui.media-object');
    });
    Route::get('modals', function () {
        return view('basic-ui.modals');
    });
    Route::get('notifications', function () {
        return view('basic-ui.notifications');
    });
    Route::get('scrollspy', function () {
        return view('basic-ui.scrollspy');
    });
    Route::get('session-timeout', function () {
        return view('basic-ui.session-timeout');
    });
    Route::get('sweet-alerts', function () {
        return view('basic-ui.sweet-alerts');
    });
    Route::get('tabs', function () {
        return view('basic-ui.tabs');
    });
    Route::get('tour-tutorial', function () {
        return view('basic-ui.tour-tutorial');
    });
});

Route::group(['prefix' => 'ui-elements'], function () {
    Route::get('alerts', function () {
        return view('ui-elements.alerts');
    });
    Route::get('avatar', function () {
        return view('ui-elements.avatar');
    });
    Route::get('badges', function () {
        return view('ui-elements.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('ui-elements.breadcrumbs');
    });
    Route::get('buttons', function () {
        return view('ui-elements.buttons');
    });
    Route::get('colors', function () {
        return view('ui-elements.colors');
    });
    Route::get('dropdown', function () {
        return view('ui-elements.dropdown');
    });
    Route::get('grid', function () {
        return view('ui-elements.grid');
    });
    Route::get('jumbotron', function () {
        return view('ui-elements.jumbotron');
    });
    Route::get('list-group', function () {
        return view('ui-elements.list-group');
    });
    Route::get('loading-spinners', function () {
        return view('ui-elements.loading-spinners');
    });
    Route::get('paging', function () {
        return view('ui-elements.paging');
    });
    Route::get('popovers', function () {
        return view('ui-elements.popovers');
    });
    Route::get('progress-bar', function () {
        return view('ui-elements.progress-bar');
    });
    Route::get('ribbons', function () {
        return view('ui-elements.ribbons');
    });
    Route::get('tooltips', function () {
        return view('ui-elements.tooltips');
    });
    Route::get('typography', function () {
        return view('ui-elements.typography');
    });
    Route::get('video', function () {
        return view('ui-elements.video');
    });
});

Route::get('widgets', function () {
    return view('widgets');
});

Route::get('tables', function () {
    return view('tables');
});

Route::get('data-tables', function () {
    return view('data-tables');
});

Route::group(['prefix' => 'forms'], function () {
    Route::group(['prefix' => 'controls'], function () {
        Route::get('base-inputs', function () {
            return view('forms.controls.base-inputs');
        });
        Route::get('input-groups', function () {
            return view('forms.controls.input-groups');
        });
        Route::get('checkbox', function () {
            return view('forms.controls.checkbox');
        });
        Route::get('radio', function () {
            return view('forms.controls.radio');
        });
        Route::get('switch', function () {
            return view('forms.controls.switch');
        });
    });
    Route::group(['prefix' => 'widgets'], function () {
        Route::get('picker', function () {
            return view('forms.widgets.picker');
        });
        Route::get('tagify', function () {
            return view('forms.widgets.tagify');
        });
        Route::get('touch-spin', function () {
            return view('forms.widgets.touch-spin');
        });
        Route::get('maxlength', function () {
            return view('forms.widgets.maxlength');
        });
        Route::get('switch', function () {
            return view('forms.widgets.switch');
        });
        Route::get('select-splitter', function () {
            return view('forms.widgets.select-splitter');
        });
        Route::get('bootstrap-select', function () {
            return view('forms.widgets.bootstrap-select');
        });
        Route::get('select2', function () {
            return view('forms.widgets.select2');
        });
        Route::get('input-masks', function () {
            return view('forms.widgets.input-masks');
        });
        Route::get('autogrow', function () {
            return view('forms.widgets.autogrow');
        });
        Route::get('range-slider', function () {
            return view('forms.widgets.range-slider');
        });
        Route::get('clipboard', function () {
            return view('forms.widgets.clipboard');
        });
        Route::get('typeahead', function () {
            return view('forms.widgets.typeahead');
        });
        Route::get('captcha', function () {
            return view('forms.widgets.captcha');
        });
    });
    Route::get('validation', function () {
        return view('forms.validation');
    });
    Route::get('layouts', function () {
        return view('forms.layouts');
    });
    Route::get('text-editor', function () {
        return view('forms.text-editor');
    });
    Route::get('file-upload', function () {
        return view('forms.file-upload');
    });
    Route::get('multiple-step', function () {
        return view('forms.multiple-step');
    });
});

Route::group(['prefix' => 'maps'], function () {
    Route::get('leaflet-map', function () {
        return view('maps.leaflet-map');
    });
    Route::get('vector-map', function () {
        return view('maps.vector-map');
    });
});

Route::group(['prefix' => 'charts'], function () {
    Route::get('apex-chart', function () {
        return view('charts.apex-chart');
    });
    Route::get('chartlist-chart', function () {
        return view('charts.chartlist-chart');
    });
    Route::get('chartjs', function () {
        return view('charts.chartjs');
    });
    Route::get('morris-chart', function () {
        return view('charts.morris-chart');
    });
});

Route::group(['prefix' => 'starter'], function () {
    Route::get('blank-page', function () {
        return view('starter.blank-page');
    });
    Route::get('breadcrumbs', function () {
        return view('starter.breadcrumbs');
    });
});

// For Clear cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//change password

Route::get('change_password', 'HomeController@showChangePswd');

Route::post('change_password_store', 'HomeController@changePswd')->name('changePswdPost');
Route::get('format_number', "HomeController@format_number")->name('format_number')->middleware('auth');

Route::group(['prefix' => 'authorization'], function () {
    Route::resource('permissions', 'authorization\PermissionController');
    Route::resource('roles', 'authorization\RoleController');
    Route::resource('users', 'authorization\UsersController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('designations', 'DesignationController');
    Route::get('findDepartment', 'authorization\UsersController@findDepartment');
    Route::get('user_disable/{id}', 'authorization\UsersController@save_disable')->name('user.disable')->middleware('auth');
    Route::get('user_details/{id}', 'authorization\UsersController@details')->name('user.details')->middleware('auth');
    //user Details
    Route::resource('details', 'authorization\UserDetailsController')->middleware('auth');
    Route::any('user_import', 'authorization\UsersController@user_import')->name('user.import')->middleware('auth');
    Route::post('user_sample', 'authorization\UsersController@user_sample')->name('user.sample')->middleware('auth');
    Route::any('user_details_import', 'authorization\UsersController@details_import')->name('details.import')->middleware('auth');
    Route::post('user_details_sample', 'authorization\UsersController@details_sample')->name('details.sample')->middleware('auth');
});

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {

    Route::get('/', 'Setting\SettingController@index')->name('index');
    Route::post('/', 'Setting\SettingController@siteSettingUpdate')->name('site-update');
    Route::get('sms', 'Setting\SettingController@smsSetting')->name('sms');
    Route::post('sms', 'Setting\SettingController@smsSettingUpdate')->name('sms-update');
    Route::get('email', 'Setting\SettingController@emailSetting')->name('email');
    Route::post('email', 'Setting\SettingController@emailSettingUpdate')->name('email-update');
    Route::get('notification', 'Setting\SettingController@notificationSetting')->name('notification');
    Route::post('notification', 'Setting\SettingController@notificationSettingUpdate')->name('notification-update');
    Route::get('emailtemplate', 'Setting\SettingController@emailTemplateSetting')->name('email-template');
    Route::post('emailtemplate', 'Setting\SettingController@mailTemplateSettingUpdate')->name('email-template-update');
    Route::get('homepage', 'Setting\SettingController@homepageSetting')->name('homepage');
    Route::post('homepage', 'Setting\SettingController@homepageSettingUpdate')->name('homepage-update');
});

Route::group(['prefix' => 'pesapal', 'as' => 'pesapal.'], function () {

    Route::any('makepayment', 'PesapalController@store')->name('makepayment');
    Route::any('customer_makepayment', 'PesapalController@customer_makepayment')->name('customer_makepayment');
});



Route::get('visitor/assignCard/{id}', 'Visitors\VisitorController@assignCard')->name('visitors.assignCard');
Route::get('visitor/check-out/{visitingDetail}', 'Visitors\VisitorController@checkout')->name('visitors.checkout');
Route::get('visitor/change-status/{id}/{status}',  'Visitors\VisitorController@changeStatus')->name('visitor.change-status');
Route::get('visitor_deposit/{id}', 'Visitors\VisitorController@deposit')->name('visitor.deposit');

Route::group(['prefix' => 'visitors', 'as' => 'visitors.'], function () {

    //visitors
    Route::resource('/', 'Visitors\VisitorController');

    Route::get('{id}/show', 'Visitors\VisitorController@show')->name('visitor_show');
    Route::get('{id}/edit', 'Visitors\VisitorController@visitor_edit')->name('visitor_edit');
    Route::post('update', 'Visitors\VisitorController@visitor_update')->name('visitor_update');
    Route::get('{id}/remove', 'Visitors\VisitorController@visitor_remove')->name('visitor_remove');

    Route::post('visitor/search', 'Visitors\VisitorController@search')->name('visitor.search');
    Route::get('visitor/check-out/{visitingDetail}', 'Visitors\VisitorController@checkout')->name('visitors.checkout');
    Route::get('visitor/change-status/{id}/{status}',  'Visitors\VisitorController@changeStatus')->name('visitor.change-status');
    Route::get('get-visitors', 'Visitors\VisitorController@getVisitor')->name('get-visitors');

    //report
    Route::get('admin-visitor-report', 'VisitorReportController@index')->name('admin-visitor-report.index');
    Route::post('admin-visitor-report', 'VisitorReportController@index')->name('admin-visitor-report.post');
});


Route::resource('supplier', 'SupplierController')->middleware('auth');





//route for pos
Route::group(['prefix' => 'pos'], function () {

    Route::any('activity', 'POS\PurchaseController@summary');

    Route::group(['prefix' => 'purchases'], function () {
        Route::resource('pos_supplier', 'POS\SupplierController')->middleware('auth');
        Route::resource('items', 'POS\ItemsController')->middleware('auth');
        Route::post('item_import', 'POS\ImportItemsController@import')->name('item.import');
        Route::post('item_sample', 'POS\ImportItemsController@sample')->name('item.sample');

        Route::get('purchase_requisition', 'POS\PurchaseController@purchase_requisition')->name('purchase.requisition')->middleware('auth');
        Route::get('purchase_quotation', 'POS\PurchaseController@purchase_order')->name('purchase.order')->middleware('auth');
        Route::resource('purchase', 'POS\PurchaseController')->middleware('auth');
        Route::get('purchase_first_approval/{id}', 'POS\PurchaseController@first_approval')->name('purchase.first_approval')->middleware('auth');
        Route::get('purchase_second_approval/{id}', 'POS\PurchaseController@second_approval')->name('purchase.second_approval')->middleware('auth');
        Route::get('purchase_final_approval/{id}', 'POS\PurchaseController@final_approval')->name('purchase.final_approval')->middleware('auth');
        Route::get('purchase_second_disapproval/{id}', 'POS\PurchaseController@second_disapproval')->name('purchase.second_disapproval')->middleware('auth');
        Route::get('purchase_final_disapproval/{id}', 'POS\PurchaseController@final_disapproval')->name('purchase.final_disapproval')->middleware('auth');
        Route::post('grn', 'POS\PurchaseController@grn')->name('purchase.grn')->middleware('auth');
        Route::get('issue_supplier/{id}', 'POS\PurchaseController@issue')->name('purchase.issue')->middleware('auth');
        Route::post('grn', 'POS\PurchaseController@grn')->name('purchase.grn')->middleware('auth');
        Route::post('save_order', 'POS\PurchaseController@save_order')->name('purchase.save_order')->middleware('auth');
        Route::post('save_supplier', 'POS\PurchaseController@save_supplier')->name('purchase.save_supplier')->middleware('auth');
        Route::get('confirm_order/{id}', 'POS\PurchaseController@confirm_order')->name('purchase.confirm_order')->middleware('auth');
        Route::get('order_pdfview', array('as' => 'order_pdfview', 'uses' => 'POS\PurchaseController@order_pdfview'))->middleware('auth');
        Route::get('issue_pdfview', array('as' => 'issue_pdfview', 'uses' => 'POS\PurchaseController@issue_pdfview'))->middleware('auth');

        Route::get('findInvPrice', 'POS\PurchaseController@findPrice')->middleware('auth');
        Route::get('invModal', 'POS\PurchaseController@discountModal')->middleware('auth');
        Route::get('approve_purchase/{id}', 'POS\PurchaseController@approve')->name('purchase.approve')->middleware('auth');
        Route::get('cancel/{id}', 'POS\PurchaseController@cancel')->name('purchase.cancel')->middleware('auth');
        Route::get('receive/{id}', 'POS\PurchaseController@receive')->name('purchase.receive')->middleware('auth');
        Route::get('make_payment/{id}', 'POS\PurchaseController@make_payment')->name('purchase.pay')->middleware('auth');
        Route::get('purchase_pdfview', array('as' => 'purchase_pdfview', 'uses' => 'POS\PurchaseController@inv_pdfview'))->middleware('auth');
        Route::get('order_payment/{id}', 'orders\OrdersController@order_payment')->name('purchase_order.pay')->middleware('auth');
        Route::resource('purchase_payment', 'POS\PurchasePaymentController')->middleware('auth');
        Route::get('purchase_payment_first_approval/{id}', 'POS\PurchasePaymentController@first_approval')->name('purchase_payment.first_approval')->middleware('auth');
        Route::get('purchase_payment_final_approval/{id}', 'POS\PurchasePaymentController@final_approval')->name('purchase_payment.final_approval')->middleware('auth');
        Route::get('purchase_payment_first_disapproval/{id}', 'POS\PurchasePaymentController@first_disapproval')->name('purchase_payment.first_disapproval')->middleware('auth');
        Route::get('purchase_payment_confirm/{id}', 'POS\PurchasePaymentController@confirm')->name('purchase_payment.confirm')->middleware('auth');
        Route::get('purchase_payment_pdfview', array('as' => 'purchase_payment_pdfview', 'uses' => 'POS\PurchasePaymentController@inv_pdfview'))->middleware('auth');
        Route::any('creditors_report', 'POS\PurchaseController@creditors_report')->middleware('auth');
        Route::resource('pos_issue', 'POS\GoodIssueController')->middleware('auth');
        Route::get('findQuantity', 'POS\GoodIssueController@findQuantity');
        Route::get('issue_approve/{id}', 'POS\GoodIssueController@approve')->name('pos_issue.approve')->middleware('auth');
        Route::get('purchaseModal', 'POS\GoodIssueController@discountModal');


        //serial_routes-purchase
        Route::resource('purchase_serial', 'POS\PurchaseSerialController')->middleware('auth');
        Route::get('findSerialInvPrice', 'POS\PurchaseSerialController@findPrice')->middleware('auth');
        Route::get('invSerialModal', 'POS\PurchaseSerialController@discountModal')->middleware('auth');
        Route::get('approve_purchase_serial/{id}', 'POS\PurchaseSerialController@approve')->name('purchase_serial.approve')->middleware('auth');
        Route::get('cancel_serial/{id}', 'POS\PurchaseSerialController@cancel')->name('purchase_serial.cancel')->middleware('auth');
        Route::get('receive_serial/{id}', 'POS\PurchaseSerialController@receive')->name('purchase_serial.receive')->middleware('auth');
        Route::get('make_serial_payment/{id}', 'POS\PurchaseSerialController@make_payment')->name('purchase_serial.pay')->middleware('auth');
        Route::get('purchase_serial_pdfview', array('as' => 'purchase_serial_pdfview', 'uses' => 'POS\PurchaseSerialController@inv_pdfview'))->middleware('auth');
        Route::resource('purchase_serial_payment', 'POS\PurchaseSerialPaymentController')->middleware('auth');
        Route::get('list', 'POS\PurchaseSerialController@list')->name('pos.list')->middleware('auth');
        Route::post('save_pos_reference', 'POS\PurchaseSerialController@save_reference')->name('pos.reference')->middleware('auth');

        Route::resource('debit_note', 'POS\ReturnPurchasesController')->middleware('auth');
        Route::get('findinvoice', 'POS\ReturnPurchasesController@findPrice')->middleware('auth');
        Route::get('showInvoice', 'POS\ReturnPurchasesController@showInvoice')->middleware('auth');
        Route::get('editshowInvoice', 'POS\ReturnPurchasesController@editshowInvoice')->middleware('auth');
        Route::get('findinvQty', 'POS\ReturnPurchasesController@findQty')->middleware('auth');
        Route::get('approve_debit_note/{id}', 'POS\ReturnPurchasesController@approve')->name('debit_note.approve')->middleware('auth');
        Route::get('cancel_debit_note/{id}', 'POS\ReturnPurchasesController@cancel')->name('debit_note.cancel')->middleware('auth');
        Route::get('receive_debit_note/{id}', 'POS\ReturnPurchasesController@receive')->name('debit_note.receive')->middleware('auth');
        Route::get('make_debit_note_payment/{id}', 'POS\ReturnPurchasesController@make_payment')->name('debit_note.pay')->middleware('auth');
        Route::resource('debit_note_payment', 'POS\ReturnPurchasesPaymentController')->middleware('auth');
        Route::get('debit_note_pdfview', array('as' => 'debit_note_pdfview', 'uses' => 'POS\ReturnPurchasesController@debit_note_pdfview'))->middleware('auth');
    });


    Route::group(['prefix' => 'sales'], function () {



       Route::resource('profoma/invoice', 'Bar\POS\SalesProfomaInvoiceController')->middleware('auth');

       Route::resource('invoices', 'Bar\POS\SalesInvoiceController')->middleware('auth');



        Route::resource('invoice', 'Bar\POS\InvoiceController')->middleware('auth');
        Route::resource('client', 'Bar\POS\ClientController')->middleware('auth');

        Route::resource('profoma_invoice', 'Bar\POS\ProfomaInvoiceController')->middleware('auth');
        Route::get('convert_to_invoice/{id}', 'Bar\POS\ProfomaInvoiceController@convert_to_invoice')->name('invoice.convert_to_invoice')->middleware('auth');
        Route::any('debtors_report', 'POS\InvoiceController@debtors_report')->middleware('auth');

        Route::get('findInvPrice', 'POS\InvoiceController@findPrice')->middleware('auth');
        Route::get('findInvQuantity', 'POS\InvoiceController@findQuantity');
        Route::get('invModal', 'POS\InvoiceController@discountModal')->middleware('auth');
        Route::get('approve_purchase/{id}', 'POS\InvoiceController@approve')->name('invoice.approve')->middleware('auth');
        Route::get('cancel/{id}', 'POS\InvoiceController@cancel')->name('invoice.cancel')->middleware('auth');
        Route::get('receive/{id}', 'POS\InvoiceController@receive')->name('invoice.receive')->middleware('auth');
        Route::get('make_payment/{id}', 'POS\InvoiceController@make_payment')->name('pos_invoice.pay')->middleware('auth');

        Route::get('pos_profoma_pdfview', array('as' => 'pos_profoma_pdfview', 'uses' => 'POS\ProfomaInvoiceController@invoice_pdfview'))->middleware('auth');
        Route::get('pos_invoice_pdfview', array('as' => 'pos_invoice_pdfview', 'uses' => 'POS\InvoiceController@invoice_pdfview'))->middleware('auth');
        Route::get('order_payment/{id}', 'orders\OrdersController@order_payment')->name('purchase_order.pay')->middleware('auth');
        Route::resource('pos_invoice_payment', 'POS\InvoicePaymentController')->middleware('auth');

        //serial_routes-invoice
        Route::resource('invoice_serial', 'POS\InvoiceSerialController')->middleware('auth');
        Route::get('findInvSalesPrice', 'POS\InvoiceSerialController@findPrice')->middleware('auth');
        Route::get('invSalesModal', 'POS\InvoiceSerialController@discountModal')->middleware('auth');
        Route::get('approve_invoice_serial/{id}', 'POS\InvoiceSerialController@approve')->name('invoice_serial.approve')->middleware('auth');
        Route::get('cancel_invoice_serial/{id}', 'POS\InvoiceSerialController@cancel')->name('invoice_serial.cancel')->middleware('auth');
        Route::get('receive_invoice_serial/{id}', 'POS\InvoiceSerialController@receive')->name('invoice_serial.receive')->middleware('auth');
        Route::get('make_invoice_serial_payment/{id}', 'POS\InvoiceSerialController@make_payment')->name('invoice_serial.pay')->middleware('auth');
        Route::get('invoice_serial_pdfview', array('as' => 'invoice_serial_pdfview', 'uses' => 'POS\InvoiceSerialController@invoice_pdfview'))->middleware('auth');
        Route::resource('invoice_serial_payment', 'POS\InvoiceSerialPaymentController')->middleware('auth');

        Route::resource('credit_note', 'POS\ReturnInvoiceController')->middleware('auth');
        Route::get('findinvoice', 'POS\ReturnInvoiceController@findPrice')->middleware('auth');
        Route::get('showInvoice', 'POS\ReturnInvoiceController@showInvoice')->middleware('auth');
        Route::get('editshowInvoice', 'POS\ReturnInvoiceController@editshowInvoice')->middleware('auth');
        Route::get('findinvQty', 'POS\ReturnInvoiceController@findQty')->middleware('auth');
        Route::get('approve_credit_note/{id}', 'POS\ReturnInvoiceController@approve')->name('credit_note.approve')->middleware('auth');
        Route::get('cancel_credit_note/{id}', 'POS\ReturnInvoiceController@cancel')->name('credit_note.cancel')->middleware('auth');
        Route::get('receive_credit_note/{id}', 'POS\ReturnInvoiceController@receive')->name('credit_note.receive')->middleware('auth');
        Route::get('make_credit_note_payment/{id}', 'POS\ReturnInvoiceController@make_payment')->name('credit_note.pay')->middleware('auth');
        Route::resource('credit_note_payment', 'POS\ReturnInvoicePaymentController')->middleware('auth');
        Route::get('credit_note_pdfview', array('as' => 'credit_note_pdfview', 'uses' => 'POS\ReturnInvoiceController@credit_note_pdfview'))->middleware('auth');
    });
});




//route for payroll
Route::group(['prefix' => 'payroll'], function () {

    Route::resource('salary_template', 'Payroll\SalaryTemplateController');
    Route::any('salary_template_import', 'Payroll\SalaryTemplateController@import')->name('salary_template.import')->middleware('auth');
    Route::post('salary_template_sample', 'Payroll\SalaryTemplateController@sample')->name('salary_template.sample')->middleware('auth');
    Route::any('manage_salary', 'Payroll\ManageSalaryController@getDetails');
    Route::get('addTemplate', 'Payroll\ManageSalaryController@addTemplate');
    Route::get('manage_salary_edit/{id}', 'Payroll\ManageSalaryController@edit')->name('employee.edit');;;;
    Route::delete('manage_salary_delete/{id}', 'Payroll\ManageSalaryController@destroy')->name('employee.destroy');;;;
    Route::get('employee_salary_list', 'Payroll\ManageSalaryController@salary_list')->name('employee.salary');;;
    Route::resource('make_payment', 'Payroll\MakePaymentsController')->middleware('auth');
    Route::get('make_payment/{user_id}/{departments_id}/{payment_month}', 'Payroll\MakePaymentsController@getPayment')->name('payment')->middleware('auth');
    Route::get('edit_make_payment/{user_id}/{departments_id}/{payment_month}', 'Payroll\MakePaymentsController@editPayment')->name('payment.edit')->middleware('auth');
    Route::post('save_payment', 'Payroll\MakePaymentsController@save_payment')->name('save_payment')->middleware('auth');;;;
    Route::post('edit_payment', 'Payroll\MakePaymentsController@edit_payment')->name('edit_payment')->middleware('auth');;;;
    Route::get('make_payment/{departments_id}/{payment_month}', 'Payroll\MakePaymentsController@viewPayment')->name('view.payment')->middleware('auth');
    Route::resource('multiple_payment', 'Payroll\MultiplePaymentsController')->middleware('auth');
    Route::post('save_multiple_payment', 'Payroll\MultiplePaymentsController@save_payment')->name('multiple_save.payment')->middleware('auth');;;;
    Route::get('multiple_payment/{departments_id}/{payment_month}', 'Payroll\MultiplePaymentsController@viewPayment')->name('multiple_view.payment')->middleware('auth');
    Route::resource('advance_salary', 'Payroll\AdvanceController');
    Route::get('findAmount', 'Payroll\AdvanceController@findAmount');
    Route::get('findMonth', 'Payroll\AdvanceController@findMonth');
    Route::get('advance_approve/{id}', 'Payroll\AdvanceController@approve')->name('advance.approve');
    Route::get('advance_reject/{id}', 'Payroll\AdvanceController@reject')->name('advance.reject');
    Route::resource('employee_loan', 'Payroll\EmployeeLoanController');
    Route::get('findLoan', 'Payroll\EmployeeLoanController@findLoan');
    Route::get('employee_loan_approve/{id}', 'Payroll\EmployeeLoanController@approve')->name('employee_loan.approve');
    Route::get('employee_loan_reject/{id}', 'Payroll\EmployeeLoanController@reject')->name('employee_loan.reject');
    Route::resource('overtime', 'Payroll\OvertimeController');
    Route::get('overtime_approve/{id}', 'Payroll\OvertimeController@approve')->name('overtime.approve');
    Route::get('overtime_reject/{id}', 'Payroll\OvertimeController@reject')->name('overtime.reject');
    Route::get('findOvertime', 'Payroll\OvertimeController@findAmount');
    Route::any('nssf', 'Payroll\GetPaymentController@nssf');
    Route::any('tax', 'Payroll\GetPaymentController@tax');
    Route::any('nhif', 'Payroll\GetPaymentController@nhif');
    Route::any('wcf', 'Payroll\GetPaymentController@wcf');
    Route::any('sdl', 'Payroll\GetPaymentController@sdl')->middleware('auth');
    Route::any('payroll_summary', 'Payroll\GetPaymentController@payroll_summary')->name('payroll_summary')->middleware('auth');
    Route::any('salary_control', 'Payroll\GetPaymentController@salary_control')->name('salary_control')->middleware('auth');
    Route::any('generate_payslip', 'Payroll\GetPaymentController@generate_payslip');
    Route::any('received_payslip/{id}', 'Payroll\GetPaymentController@received_payslip')->name('payslip.generate');
    Route::get('payslip_pdfview', array('as' => 'payslip_pdfview', 'uses' => 'Payroll\GetPaymentController@payslip_pdfview'));

    Route::post('save_salary_details', array('as' => 'save_salary_details', 'uses' => 'Payroll\ManageSalaryController@save_salary_details'));
    Route::get('employee_salary_list', array('as' => 'employee_salary_list', 'uses' => 'Payroll\ManageSalaryController@employee_salary_list'));

    //Route::post('make_payment/store{user_id}{departments_id}{payment_month}', 'Payroll\MakePaymentsController@store')->name('make_payment.store');

});


//leave
Route::resource('leave', 'Leave\LeaveController')->middleware('auth');
Route::resource('leave_category', 'Leave\LeaveCategoryController')->middleware('auth');
Route::post('addCategory', 'Leave\LeaveController@category')->middleware('auth');
Route::get('findPaid', 'Leave\LeaveController@findPaid')->middleware('auth');
Route::get('findDays', 'Leave\LeaveController@findDays')->middleware('auth');
Route::get('leave_approve/{id}', 'Leave\LeaveController@approve')->name('leave.approve')->middleware('auth');
Route::get('leave_reject/{id}', 'Leave\LeaveController@reject')->name('leave.reject')->middleware('auth');


//training
Route::resource('training', 'Training\TrainingController');
Route::get('training_start/{id}', 'Training\TrainingController@start')->name('training.start');
Route::get('training_approve/{id}', 'Training\TrainingController@approve')->name('training.approve');
Route::get('training_reject/{id}', 'Training\TrainingController@reject')->name('training.reject');

//route for reports
Route::group(['prefix' => 'accounting'], function () {

    //Route::any('trial_balance', 'accounting\AccountingController@trial_balance');
    Route::any('ledger', 'accounting\AccountingController@ledger');
    Route::any('journal', 'accounting\AccountingController@journal');
    Route::get('add_journal_item', 'accounting\AccountingController@add_item')->middleware('auth');
    Route::get('journal_modal', 'accounting\AccountingController@discountModal')->middleware('auth');
    Route::get('manual_entry', 'accounting\AccountingController@create_manual_entry')->name('journal.manual')->middleware('auth');
    Route::post('manual_entry/store', 'accounting\AccountingController@store_manual_entry');
    Route::post('journal_import', 'accounting\JournalImportController@import')->name('journal.import');
    Route::post('journal_sample', 'accounting\JournalImportController@sample')->name('journal.sample');
    Route::any('bank_statement', 'accounting\AccountingController@bank_statement');
    Route::any('bank_reconciliation', 'accounting\AccountingController@bank_reconciliation')->name('reconciliation.view');
    Route::any('reconciliation_report', 'accounting\AccountingController@reconciliation_report')->name('reconciliation.report');
    Route::post('save_reconcile', 'accounting\AccountingController@save_reconcile')->name('reconcile.save');
});

//route for Card Management
//Route::group(['prefix' => 'cards.'], function () {
//GL SETUP
Route::resource('manage_cards', 'Cards\ManageCardsController');
Route::get('member_deposit/{id}', 'Members\ManageMemberController@deposit')->name('member.deposit');
Route::get('member_change_password/{id}', 'Members\ManageMemberController@change_password')->name('member.change_password');

Route::post('member_change_password/update', 'Members\ManageMemberController@change_password_updates')->name('member_change_password_updates');

Route::resource('card_deposit', 'Cards\DepositController');
Route::any('mandatory_preview', 'Members\CooperateMemberController@mandatory_preview')->name('mandatory.preview');
Route::any('file_preview', 'Members\MemberPaymentsController@file_preview')->name('file.preview');
Route::any('image_update', 'Members\MembersController@image_update_model')->name('image.update');
Route::any('image_save/{id}', 'Members\MembersController@image_update')->name('image.save');
Route::resource('member_card_deposit', 'Cards\MemberDepositController');
Route::any('member_card_list', 'Members\CardPrintingController@member_card_list')->name('member_card_list');
Route::get('member_deposit_receipt', array('as' => 'member_deposit_receipt', 'uses' => 'Cards\MemberDepositController@deposit_receipt'))->middleware('auth');
Route::resource('manage_member', 'Members\ManageMemberController');
Route::any('member_list', 'Members\ManageMemberController@member_list')->name('member_list');
Route::get('member_disable/{id}', 'Members\ManageMemberController@disable')->name('member.disable')->middleware('auth');
Route::any('member_deposit_list', 'Members\ManageMemberController@member_deposit_list')->name('member_deposit_list');
Route::get('transaction_list/{id}', 'Members\ManageMemberController@transaction_list')->name('transaction_list');
Route::any('transaction_report', 'Members\ManageMemberController@transaction_report')->name('transaction_report');
Route::any('registration_report', 'Members\ManageMemberController@registration_report')->name('registration_report');
Route::any('fee_report', 'Members\ManageMemberController@fee_report')->name('fee_report');
Route::put('update_member_id/{id}/update', 'Members\ManageMemberController@updateMemberId')->name('member_list.updateMemberId');
Route::get('memberModal', 'Members\ManageMemberController@discountModal')->middleware('auth');
Route::post('save_date', 'Members\ManageMemberController@save_date')->name('member.save_date')->middleware('auth');
Route::get('approve_date/{id}', 'Members\ManageMemberController@approve_date')->name('member.approve_date')->middleware('auth');
Route::resource('manage_cooperate', 'Members\CooperateMemberController');
Route::resource('member_payments', 'Members\MemberPaymentsController');
Route::get('member_payments_approve/{id}', 'Members\MemberPaymentsController@approve')->name('member_payments.approve')->middleware('auth');
Route::get('findMemberAmount', 'Members\MemberPaymentsController@findAmount')->middleware('auth');
Route::get('member_payments_receipt', array('as' => 'member_payments_receipt', 'uses' => 'Members\MemberPaymentsController@payment_receipt'))->middleware('auth');
Route::any('expired_members', 'Members\ManageMemberController@expired_members')->name('expired_members');
Route::any('active_members', 'Members\ManageMemberController@active_members')->name('active_members');
Route::get('cooperate_payments', 'Members\MemberPaymentsController@index1')->name('member_payments.index1');
Route::get('cooperate_payments/{id}/edit1', 'Members\MemberPaymentsController@edit1')->name('member_payments.edit1');
Route::resource('card_printing', 'Members\CardPrintingController');
Route::get('findCard', 'Members\CardPrintingController@findCard')->middleware('auth');
Route::any('print_front/{id}', 'Members\CardPrintingController@print_front')->name('print.front');
Route::any('print_back/{id}', 'Members\CardPrintingController@print_back')->name('print.back');
Route::any('print', 'Members\CardPrintingController@print');

Route::post('import', 'Members\ImportMemberController@import')->name('import');
Route::post('sample', 'Members\ImportMemberController@sample')->name('sample');
//   });

// Route::group(['prefix' => 'bar'], function () {


// });


//route for bar
Route::group(['prefix' => 'bar'], function () {
    Route::resource('manage_bar', 'Bar\ManageBarController');
    Route::any('pos_activity', 'Bar\POS\ReportController@summary');

    Route::group(['prefix' => 'purchases'], function () {
        Route::resource('bar_pos_supplier', 'Bar\POS\SupplierController')->middleware('auth');
        Route::resource('bar_items', 'Bar\POS\ItemsController')->middleware('auth');

        //Route::get('bar_batch_items', 'Bar\POS\ItemsController@batch_items')
        //->name('bar_batch_items.get_purchase_order_tracking')->middleware('auth');


        Route::resource('purchase_order_tracking', 'Bar\POS\PurchaseOrderTrackingController');

        Route::resource('clearing_tracking', 'Bar\POS\ClearingTrackingController');


        Route::resource('category', 'Bar\POS\CategoryController')->middleware('auth');
        Route::post('item_import', 'Bar\POS\ImportItemsController@import')->name('bar_item.import');
        Route::post('item_sample', 'Bar\POS\ImportItemsController@sample')->name('bar_item.sample');
        Route::post('bar_update_quantity', 'Bar\POS\ItemsController@update_quantity')->name('bar_items.update_quantity');


        Route::get('bar_purchase_order_tracking/{purchase_order_id}', 'Bar\POS\PurchaseController@get_purchase_order_tracking')->name('bar_purchase.get_purchase_order_tracking')->middleware('auth');

        Route::get('bar_purchase_create_order_tracking/{purchase_order_id}', 'Bar\POS\PurchaseController@create_purchase_order_tracking')->name('bar_purchase.create_purchase_order_tracking')->middleware('auth');

        Route::post('bar_purchase_store_order_tracking', 'Bar\POS\PurchaseController@store_purchase_order_tracking')->name('bar_purchase.store_purchase_order_tracking')->middleware('auth');


        Route::get('bar_purchase_requisition', 'Bar\POS\PurchaseController@purchase_requisition')->name('bar_purchase.requisition')->middleware('auth');
        Route::get('bar_purchase_quotation', 'Bar\POS\PurchaseController@purchase_order')->name('bar_purchase.order')->middleware('auth');

        Route::resource('bar_purchase', 'Bar\POS\PurchaseController')->middleware('auth');

        Route::get('supplier/invoice', 'Bar\POS\PurchaseController@supplier_invoice')->name('supplier_invoice')->middleware('auth');

        Route::get('items/costing', 'Bar\POS\PurchaseController@item_costing_invoice')->name('item_costing_invoice')->middleware('auth');

        Route::post('costing/{item_id}/update_sales_price', 'Bar\POS\PurchaseController@update_sales_price')->name('costing.update_sales_price');

       Route::get('supplier/payment/{reference_no}', 'Bar\POS\PurchaseController@supplier_invoice_payment')
            ->name('payment.supplier')
            ->middleware('auth');

        Route::get('supplier/payment/{reference_no}/pdf/{id}', 'Bar\POS\PurchaseController@download_supplier_payment_pdf')
                ->name('payment.supplier_invoice.pdf')
                ->middleware('auth');

        Route::get('supplier/agent_payment/{reference_no}', 'Bar\POS\PurchaseController@supplier_agent_payment')
            ->name('payment.clearing_agent')
            ->middleware('auth');

        Route::post('supplier/agent_payment/{reference_no}', 'Bar\POS\PurchaseController@process_clearing_payment')
            ->name('process.clearing_payment')
            ->middleware('auth');

        Route::get('supplier/agent_payment/pdf/{reference_no}/{id}', 'Bar\POS\PurchaseController@download_clearing_payment_pdf')
            ->name('download.clearing_payment_pdf')
            ->middleware('auth');

       Route::get('supplier/invoices/{reference_no}', 'Bar\POS\PurchaseController@supplier_invoice_show')
                ->name('invoice.supplier_invoice_show')
                ->middleware('auth');

        Route::get('supplier/invoices/{reference_no}/pdf', 'Bar\POS\PurchaseController@supplier_invoice_show_pdf')->name('supplier_invoice_show_pdf');

        Route::get('bar/purchases/supplier/payment/{reference_no?}', 'Bar\POS\PurchaseController@supplier_invoice_payment')
            ->name('supplier.payment')
            ->middleware('auth');

        Route::post('supplier/payment/{reference_no}/process', 'Bar\POS\PurchaseController@process_supplier_payment')
            ->name('supplier_payment_process')
            ->middleware('auth');

       Route::get('clearing/tracking/{reference_no}', 'Bar\POS\PurchaseController@clearing_tracking_reference')
                ->name('clearing.tracking')
                ->middleware('auth');

        Route::get('clearing/tracking/{reference_no}/download', 'Bar\POS\PurchaseController@download_clearing_tracking_pdf')
                ->name('clearing.tracking.download')
                ->middleware('auth');

        Route::get('clearing/tracking/{reference_no}/add', 'Bar\POS\PurchaseController@clearing_tracking_reference_add')
            ->name('clearing.expense.add')
            ->middleware('auth');

        Route::post('clearing/tracking/{reference_no}/save', 'Bar\POS\PurchaseController@clearing_tracking_reference_save')
            ->name('clearing.expense.save')
            ->middleware('auth');

        Route::get('clearing/tracking/{reference_no}/edit/{id}', 'Bar\POS\PurchaseController@clearing_tracking_reference_edit')
            ->name('clearing.expense.edit')
            ->middleware('auth');

        Route::post('clearing/tracking/{reference_no}/update/{id}', 'Bar\POS\PurchaseController@clearing_tracking_reference_update')
            ->name('clearing.expense.update')
            ->middleware('auth');

        Route::get('bar_purchase_first_approval/{id}', 'Bar\POS\PurchaseController@first_approval')->name('bar_purchase.first_approval')->middleware('auth');
        Route::get('bar_purchase_second_approval/{id}', 'Bar\POS\PurchaseController@second_approval')->name('bar_purchase.second_approval')->middleware('auth');
        Route::get('bar_purchase_final_approval/{id}', 'Bar\POS\PurchaseController@final_approval')->name('bar_purchase.final_approval')->middleware('auth');
        Route::get('bar_purchase_second_disapproval/{id}', 'Bar\POS\PurchaseController@second_disapproval')->name('bar_purchase.second_disapproval')->middleware('auth');
        Route::get('bar_purchase_final_disapproval/{id}', 'Bar\POS\PurchaseController@final_disapproval')->name('bar_purchase.final_disapproval')->middleware('auth');
        Route::post('bar_grn', 'Bar\POS\PurchaseController@grn')->name('bar_purchase.grn')->middleware('auth');

         Route::post('bar_purchase_supplier_invoice', 'Bar\POS\PurchaseController@purchase_supplier_invoice')->name('bar_purchase.supplier_invoice')->middleware('auth');

        Route::get('bar_purchase_supplier_invoice_modal/{reference_no}', 'Bar\POS\PurchaseController@supplier_invoice_modal_show')->name('bar_purchase.supplier_invoice_modal')->middleware('auth');


        Route::post('purchase_costing', 'Bar\POS\PurchaseController@store_costing_items_batches')->name('bar_purchase.costing')->middleware('auth');

        Route::get('bar_issue_supplier/{id}', 'Bar\POS\PurchaseController@issue')->name('bar_purchase.issue')->middleware('auth');
        Route::post('bar_save_order', 'Bar\POS\PurchaseController@save_order')->name('bar_purchase.save_order')->middleware('auth');
        Route::post('bar_save_supplier', 'Bar\POS\PurchaseController@save_supplier')->name('bar_purchase.save_supplier')->middleware('auth');
        Route::get('bar_confirm_order/{id}', 'Bar\POS\PurchaseController@confirm_order')->name('bar_purchase.confirm_order')->middleware('auth');

        Route::put('bar_confirm_order_store/{id}', 'Bar\POS\PurchaseController@confirm_order_store')->name('bar_purchase.confirm_order_store')->middleware('auth');

        Route::get('bar_order_pdfview', array('as' => 'bar_order_pdfview', 'uses' => 'Bar\POS\PurchaseController@order_pdfview'))->middleware('auth');
        Route::get('bar_issue_pdfview', array('as' => 'bar_issue_pdfview', 'uses' => 'Bar\POS\PurchaseController@issue_pdfview'))->middleware('auth');

        Route::get('findInvPrice', 'Bar\POS\PurchaseController@findPrice')->middleware('auth');
        Route::get('invModal', 'Bar\POS\PurchaseController@discountModal')->middleware('auth');
        Route::get('approve_purchase/{id}', 'Bar\POS\PurchaseController@approve')->name('bar_purchase.approve')->middleware('auth');
        Route::get('cancel/{id}', 'Bar\POS\PurchaseController@cancel')->name('bar_purchase.cancel')->middleware('auth');
        Route::get('receive/{id}', 'Bar\POS\PurchaseController@receive')->name('bar_purchase.receive')->middleware('auth');
        Route::get('make_payment/{id}', 'Bar\POS\PurchaseController@make_payment')->name('bar_purchase.pay')->middleware('auth');
        Route::get('bar_purchase_pdfview', array('as' => 'bar_purchase_pdfview', 'uses' => 'Bar\POS\PurchaseController@inv_pdfview'))->middleware('auth');
        Route::get('order_payment/{id}', 'orders\OrdersController@order_payment')->name('bar_purchase_order.pay')->middleware('auth');
        Route::resource('bar_purchase_payment', 'Bar\POS\PurchasePaymentController')->middleware('auth');
        Route::get('bar_purchase_payment_first_approval/{id}', 'Bar\POS\PurchasePaymentController@first_approval')->name('bar_purchase_payment.first_approval')->middleware('auth');
        Route::get('bar_purchase_payment_final_approval/{id}', 'Bar\POS\PurchasePaymentController@final_approval')->name('bar_purchase_payment.final_approval')->middleware('auth');
        Route::get('bar_purchase_payment_first_disapproval/{id}', 'Bar\POS\PurchasePaymentController@first_disapproval')->name('bar_purchase_payment.first_disapproval')->middleware('auth');
        Route::get('bar_purchase_payment_confirm/{id}', 'Bar\POS\PurchasePaymentController@confirm')->name('bar_purchase_payment.confirm')->middleware('auth');
        Route::get('bar_purchase_payment_pdfview', array('as' => 'bar_purchase_payment_pdfview', 'uses' => 'Bar\POS\PurchasePaymentController@inv_pdfview'))->middleware('auth');
        Route::any('creditors_report', 'Bar\POS\PurchaseController@creditors_report')->middleware('auth');
        Route::resource('bar_pos_issue', 'Bar\POS\GoodIssueController')->middleware('auth');
        Route::get('findQuantity', 'Bar\POS\GoodIssueController@findQuantity');
        Route::get('issue_approve/{id}', 'Bar\POS\GoodIssueController@approve')->name('bar_pos_issue.approve')->middleware('auth');
        Route::get('purchaseModal', 'Bar\POS\GoodIssueController@discountModal');


        Route::resource('bar_debit_note', 'Bar\POS\ReturnPurchasesController')->middleware('auth');
        Route::get('findinvoice', 'Bar\POS\ReturnPurchasesController@findPrice')->middleware('auth');
        Route::get('showInvoice', 'Bar\POS\ReturnPurchasesController@showInvoice')->middleware('auth');
        Route::get('editshowInvoice', 'Bar\POS\ReturnPurchasesController@editshowInvoice')->middleware('auth');
        Route::get('findinvQty', 'Bar\POS\ReturnPurchasesController@findQty')->middleware('auth');
        Route::get('approve_debit_note/{id}', 'Bar\POS\ReturnPurchasesController@approve')->name('bar_debit_note.approve')->middleware('auth');
        Route::get('cancel_debit_note/{id}', 'Bar\POS\ReturnPurchasesController@cancel')->name('bar_debit_note.cancel')->middleware('auth');
        Route::get('receive_debit_note/{id}', 'Bar\POS\ReturnPurchasesController@receive')->name('bar_debit_note.receive')->middleware('auth');
        Route::get('make_debit_note_payment/{id}', 'Bar\POS\ReturnPurchasesController@make_payment')->name('bar_debit_note.pay')->middleware('auth');
        Route::resource('bar_debit_note_payment', 'Bar\POS\ReturnPurchasesPaymentController')->middleware('auth');
        Route::get('bar_debit_note_pdfview', array('as' => 'bar_debit_note_pdfview', 'uses' => 'Bar\POS\ReturnPurchasesController@debit_note_pdfview'))->middleware('auth');
    });

    Route::group(['prefix' => 'sales'], function () {

        Route::resource('bar_pos_client', 'Bar\POS\ClientController')->middleware('auth');

        Route::resource('sales-quotations', 'POS\SaleQuotationController')->middleware('auth');

        Route::resource('agents', 'Bar\POS\AgentController')->middleware('auth');

        Route::any('debtors_report', 'Bar\POS\InvoiceController@debtors_report')->middleware('auth');

        Route::resource('bar_profoma_invoice', 'Bar\POS\ProfomaInvoiceController')->middleware('auth');


        Route::resource('bar_invoice', 'Bar\POS\InvoiceController')->middleware('auth');

       // Route::get('credibility', 'Bar\POS\InvoiceController@customer_credibility')->middleware('auth');

        Route::get('credibility', 'Bar\POS\InvoicePaymentController@credibility_index')->middleware('auth')->name('customer_credibilities.credibility_index');
        Route::get('credibility/create', 'Bar\POS\InvoicePaymentController@credibility_create')->middleware('auth')->name('customer_credibilities.credibility_create');
        Route::post('credibility', 'Bar\POS\InvoicePaymentController@credibility_store')->middleware('auth')->name('customer_credibilities.credibility_store');
        Route::get('credibility/{customerCredibility}/edit', 'Bar\POS\InvoicePaymentController@credibility_edit')->middleware('auth')->name('customer_credibilities.credibility_edit');
        Route::put('credibility/{customerCredibility}', 'Bar\POS\InvoicePaymentController@credibility_update')->middleware('auth')->name('customer_credibilities.credibility_update');
        Route::delete('credibility/{customerCredibility}', 'Bar\POS\InvoicePaymentController@credibility_destroy')->middleware('auth')->name('customer_credibilities.credibility_destroy');

        Route::get('findInvPrice', 'Bar\POS\InvoiceController@findPrice')->middleware('auth');

        Route::get('findStoreSales', 'Bar\POS\InvoiceController@findStoreSales')->middleware('auth');

        Route::get('findInvQuantity', 'Bar\POS\InvoiceController@findQuantity');
        Route::get('invModal', 'Bar\POS\InvoiceController@discountModal')->middleware('auth');
        Route::get('approve_purchase/{id}', 'Bar\POS\InvoiceController@approve')->name('bar_invoice.approve')->middleware('auth');
        Route::get('cancel/{id}', 'Bar\POS\InvoiceController@cancel')->name('bar_invoice.cancel')->middleware('auth');
        Route::get('receive/{id}', 'Bar\POS\InvoiceController@receive')->name('bar_invoice.receive')->middleware('auth');
        Route::get('make_payment/{id}', 'Bar\POS\InvoiceController@make_payment')->name('bar_invoice.pay')->middleware('auth');


        Route::get('bar_invoice_pdfview', array('as' => 'bar_invoice_pdfview', 'uses' => 'Bar\POS\InvoiceController@invoice_pdfview'))->middleware('auth');
        Route::get('order_payment/{id}', 'orders\OrdersController@order_payment')->name('bar_purchase_order.pay')->middleware('auth');
        Route::resource('bar_invoice_payment', 'Bar\POS\InvoicePaymentController')->middleware('auth');

        Route::resource('bar_credit_note', 'Bar\POS\ReturnInvoiceController')->middleware('auth');
        Route::get('findinvoice', 'Bar\POS\ReturnInvoiceController@findPrice')->middleware('auth');
        Route::get('showInvoice', 'Bar\POS\ReturnInvoiceController@showInvoice')->middleware('auth');
        Route::get('editshowInvoice', 'Bar\POS\ReturnInvoiceController@editshowInvoice')->middleware('auth');
        Route::get('findinvQty', 'Bar\POS\ReturnInvoiceController@findQty')->middleware('auth');
        Route::get('approve_credit_note/{id}', 'Bar\POS\ReturnInvoiceController@approve')->name('bar_credit_note.approve')->middleware('auth');
        Route::get('cancel_credit_note/{id}', 'Bar\POS\ReturnInvoiceController@cancel')->name('bar_credit_note.cancel')->middleware('auth');
        Route::get('receive_credit_note/{id}', 'Bar\POS\ReturnInvoiceController@receive')->name('bar_credit_note.receive')->middleware('auth');
        Route::get('make_credit_note_payment/{id}', 'Bar\POS\ReturnInvoiceController@make_payment')->name('bar_credit_note.pay')->middleware('auth');
        Route::resource('bar_credit_note_payment', 'Bar\POS\ReturnInvoicePaymentController')->middleware('auth');
        Route::get('credit_note_pdfview', array('as' => 'credit_note_pdfview', 'uses' => 'Bar\POS\ReturnInvoiceController@credit_note_pdfview'))->middleware('auth');
    });
});


Route::resource('truck', 'Truck\TruckController');
Route::any('tracking', 'Truck\TruckController@tracking');
Route::any('tracking_history', 'Truck\TruckController@tracking_history');
Route::get('assign_device', 'Truck\TruckController@assign_device')->name('truck.assign_device');
Route::get('device_list', 'Truck\TruckController@device_list')->name('truck.device_list');
Route::post('assign_device_store', 'Truck\TruckController@assign_device_store')->name('truck.assign_device_store')->middleware('auth');







//route for restaurant
Route::group(['prefix' => 'restaurant'], function () {
    //GL SETUP
    Route::get('dashboard', 'restaurant\DashboardController@index')->name('dashboard.index');
    Route::post('day-wise-income-order', 'restaurant\DashboardController@dayWiseIncomeOrder')->name('dashboard.day-wise-income-order');
    Route::resource('restaurants', 'restaurant\RestaurantBackendController');
    Route::get('file-import-export', 'restaurant\RestaurantBackendController@fileImportExport')->name('import-restaurant');
    Route::post('file-import', 'restaurant\RestaurantBackendController@fileImport')->name('file-import');
    Route::get('restaurant-sample', 'restaurant\RestaurantBackendController@fileExport')->name('restaurant-sample');
    Route::get('get-restaurant', 'restaurant\RestaurantBackendController@getRestaurant')->name('restaurant.get-restaurant');
    Route::get('get-menu-item', 'restaurant\RestaurantBackendController@getMenuItem')->name('restaurant.get-menu-items');

    Route::resource('menu-items', 'restaurant\MenuItemController');
    Route::get('menu-items/change/{id}', 'restaurant\MenuItemController@change_status')->name('menu-items.change')->middleware('auth');
    Route::resource('food-menu', 'restaurant\OrdersMenuItemController');
    // Route::get('restauranthome', 'restaurant\WebController@index')->name('restauranthome');
    Route::get('restauranthome', 'restaurant\RestaurantController@show')->name('restauranthome');
    Route::get('restaurant/{restaurant}', 'restaurant\RestaurantController@show')->name('restaurant.show');
    Route::get('reservation/booking', 'restaurant\ReservationController@booking')->name('restaurant.reservation')->middleware('auth');
    Route::post('reservation/check', 'restaurant\ReservationController@check')->name('reservation.check');
    Route::get('checkout', 'restaurant\CheckoutController@index')->name('checkout.index')->middleware('auth');
    Route::post('checkout', 'restaurant\CheckoutController@store')->name('checkout.store')->middleware('auth');
    Route::get('account/order/{id}', 'restaurant\AccountController@orderShow')->name('account.order.show')->middleware('auth');
    Route::get('account/order-cancel/{id}', 'restaurant\AccountController@orderCancel')->name('account.order.cancel')->middleware('auth');

    //orders
    Route::resource('orders', 'restaurant\OrderController');
    Route::get('findPrice', 'restaurant\OrderController@findPrice');
    Route::get('findQuantity', 'restaurant\OrderController@findQuantity');
    Route::get('findAmount', 'restaurant\OrderController@findAmount')->middleware('auth');
    Route::get('findUser', 'restaurant\OrderController@findUser');
    Route::get('showType', 'restaurant\OrderController@showType');
    Route::get('invModal', 'restaurant\OrderController@discountModal')->middleware('auth');
    Route::post('add_order', 'restaurant\OrderController@add_order')->name('orders.add_order')->middleware('auth');
    Route::get('orders_cancel/{id}', 'restaurant\OrderController@cancel')->name('orders.cancel')->middleware('auth');
    Route::get('orders_receive/{id}', 'restaurant\OrderController@receive')->name('orders.receive')->middleware('auth');
    Route::get('orders_pdfview', array('as' => 'orders_pdfview', 'uses' => 'restaurant\OrderController@orders_pdfview'))->middleware('auth');
    Route::get('orders_receipt', array('as' => 'orders_receipt', 'uses' => 'restaurant\OrderController@orders_receipt'))->middleware('auth');
    Route::get('add_order_item', 'restaurant\OrderController@add_item')->middleware('auth');

    Route::get('orders/{order}/delivery', 'restaurant\OrderController@delivery')->name('orders.delivery');
    Route::get('orders/order-file/{id}', 'restaurant\OrderController@getDownloadFile')->name('orders.order-file');
    Route::get('get-orders', 'restaurant\OrderController@getOrder')->name('orders.get-orders');
    Route::post('orders/{order}/product-receive', 'restaurant\OrderController@productReceive')->name('orders.product-receive');
    Route::get('orders/product-receive/{id}/{status}', 'restaurant\OrderController@productReceiveIndex')->name('orders.product-receive-index');
    Route::get('order/change-status/{id}/{status}', 'restaurant\OrderController@changeStatus')->name('order.change-status');

    Route::get('profile', 'ProfileController@index')->name('profile');
    //Route::resource('category', 'restaurant\CategoryController');
    Route::resource('cuisine', 'restaurant\CuisineController');
    //tables
    Route::resource('tables', 'restaurant\TableController');
    Route::get('get-tables', 'TableController@getTable')->name('tables.get-tables');
    //frontend
    Route::get('restaurantfrontendhome', 'restaurant\Frontend\WebController@index')->name('restaurantfrontendhome');
    Route::get('/search', 'restaurant\Frontend\SearchController@filter')->name('search');
    // Route::get('restaurant/{restaurant}', 'restaurant\Frontend\RestaurantController@show')->name('restaurant.show');
    Route::get('account/profile', 'restaurant\Frontend\AccountController@index')->name('account.profile')->middleware('auth');
    Route::get('account/order', 'restaurant\Frontend\AccountController@getOrder')->name('account.order')->middleware('auth');
    Route::get('account/reservations', 'restaurant\Frontend\AccountController@getReservation')->name('account.reservations')->middleware('auth');
    Route::get('account/password', 'restaurant\Frontend\AccountController@getPassword')->name('account.password')->middleware('auth');
    Route::put('account/password', 'restaurant\Frontend\AccountController@password_update')->name('account.password.update')->middleware('auth');
    Route::get('account/transaction', 'restaurant\Frontend\AccountController@getTransactions')->name('account.transaction')->middleware('auth');
    Route::get('account/update', 'restaurant\Frontend\AccountController@profileUpdate')->name('account.profile.index')->middleware('auth');
    Route::put('account/update/{profile}', 'restaurant\Frontend\AccountController@update')->name('account.profile.update')->middleware('auth');
    //restaurant reports
    Route::get('customer-report', 'restaurant\CustomerReportController@index')->name('customer-report.index');
    Route::post('customer-report', 'restaurant\CustomerReportController@index')->name('customer-report.index');
    Route::get('restaurant-owner-sales-report', 'restaurant\RestaurantOwnerSalesReportController@index')->name('restaurant-owner-sales-report.index');
    Route::post('restaurant-owner-sales-report', 'restaurant\RestaurantOwnerSalesReportController@index')->name('restaurant-owner-sales-report.index');
    Route::get('reservation-report', 'restaurant\ReservationReportController@index')->name('reservation-report.index');
    Route::post('reservation-report', 'restaurant\ReservationReportController@index')->name('reservation-report.index');
});





// starting inventory routes
Route::resource('location', 'Inventory\LocationController');


Route::prefix('inventory')->name('inventory.')->group(function () {
    Route::resource('adjustments', 'Inventory\InventoryAdjustmentController');
    Route::get('adjustments-modal', 'Inventory\InventoryAdjustmentController@getAdjustmentModal')->name('adjustments.modal');

    Route::get('discounts', 'discounts\DiscountController@index')->name('discounts.index');
    Route::post('discounts', 'discounts\DiscountController@store')->name('discounts.store');
    Route::get('discounts/{id}/edit', 'discounts\DiscountController@edit')->name('discounts.edit');
    Route::put('discounts/{id}', 'discounts\DiscountController@update')->name('discounts.update');
    Route::delete('discounts/{id}', 'discounts\DiscountController@destroy')->name('discounts.destroy');
});



Route::resource('fieldstaff', 'Inventory\FieldStaffController');

Route::resource('purchase_inventory', 'Inventory\PurchaseInventoryController');
Route::get('findInvPrice', 'Inventory\PurchaseInventoryController@findPrice');
Route::get('approve/{id}', 'Inventory\PurchaseInventoryController@approve')->name('inventory.approve');
Route::get('cancel/{id}', 'Inventory\PurchaseInventoryController@cancel')->name('inventory.cancel');
Route::get('receive/{id}', 'Inventory\PurchaseInventoryController@receive')->name('inventory.receive');
Route::get('make_payment/{id}', 'Inventory\PurchaseInventoryController@make_payment')->name('inventory.pay');
Route::get('inv_pdfview', array('as' => 'inv_pdfview', 'uses' => 'Inventory\PurchaseInventoryController@inv_pdfview'));
Route::get('order_payment/{id}', 'orders\OrdersController@order_payment')->name('order.pay');
Route::get('inventory_list', 'Inventory\PurchaseInventoryController@inventory_list');
Route::resource('inventory_payment', 'Inventory\InventoryPaymentController');
Route::resource('order_payment', 'orders\OrderPaymentController');

Route::resource('maintainance', 'Inventory\MaintainanceController');
Route::get('change_m_status/{id}', 'Inventory\MaintainanceController@approve')->name('maintainance.approve');
Route::get('maintainModal', 'Inventory\MaintainanceController@discountModal');
Route::post('save_report', 'Inventory\MaintainanceController@save_report')->name('maintainance.report');
Route::resource('service', 'Inventory\ServiceController');
Route::get('change_s_status/{id}', 'Inventory\ServiceController@approve')->name('service.approve');

Route::resource('good_issue', 'Inventory\GoodIssueController');
Route::get('findIssueService', 'Inventory\GoodIssueController@findService');

Route::resource('good_movement', 'Inventory\GoodMovementController');
Route::resource('good_reallocation', 'Inventory\GoodReallocationController');
Route::resource('good_disposal', 'Inventory\GoodDisposalController');

Route::resource('good_return', 'Inventory\GoodReturnController');
Route::get('findReturnService', 'Inventory\GoodReturnController@findService');

Route::get('addSupp', 'Inventory\PurchaseInventoryController@addSupp');
// end inventory routes

Route::resource('service', 'Inventory\ServiceController');

//end inventory routes
Route::resource('facility', 'Facility\FacilityController');
Route::resource('facility_items', 'Facility\FacilityItemsController');
Route::get('getMaintenance/{id}', 'Facility\FacilityController@getMaintainance')->name('facility.getMaintenance');
Route::get('getService/{id}', 'Facility\FacilityController@getService')->name('facility.getService');

Route::resource('facility_sales', 'Facility\InvoiceController')->middleware('auth');
Route::get('findFacilityPrice', 'Facility\InvoiceController@findPrice')->middleware('auth');
Route::get('facilityModal', 'Facility\InvoiceController@discountModal')->middleware('auth');
Route::get('facility_approve/{id}', 'Facility\InvoiceController@approve')->name('facility_sales.approve')->middleware('auth');
Route::get('facility_cancel/{id}', 'Facility\InvoiceController@cancel')->name('facility_sales.cancel')->middleware('auth');
Route::get('facility_receive/{id}', 'Facility\InvoiceController@receive')->name('facility_sales.receive')->middleware('auth');
Route::get('facility_make_payment/{id}', 'Facility\InvoiceController@make_payment')->name('facility_sales.pay')->middleware('auth');
Route::get('facility_sales_pdfview', array('as' => 'facility_sales_pdfview', 'uses' => 'Facility\InvoiceController@invoice_pdfview'))->middleware('auth');
Route::get('facility_sales_receipt', array('as' => 'facility_sales_receipt', 'uses' => 'Facility\InvoiceController@invoice_receipt'))->middleware('auth');
Route::resource('facility_payment', 'Facility\InvoicePaymentController')->middleware('auth');
Route::get('add_facility_item', 'Facility\InvoiceController@add_item')->middleware('auth');

Route::group(['prefix' => 'financial_report'], function () {
    Route::any('trial_balance', 'accounting\ReportController@trial_balance');
    Route::any('trial_balance_summary', 'accounting\ReportController@trial_balance_summary');
    Route::any('trial_balance/pdf', 'accounting\ReportController@trial_balance_pdf');
    Route::any('trial_balance/excel', 'accounting\ReportController@trial_balance_excel');
    Route::any('trial_balance/csv', 'accounting\ReportController@trial_balance_csv');
    Route::any('ledger', 'accounting\ReportController@ledger');
    Route::any('journal', 'accounting\ReportController@journal')->middleware('auth');
    Route::any('income_statement', 'accounting\ReportController@income_statement');
    Route::any('income_statement_summary', 'accounting\ReportController@income_statement_summary');
    // Route::any('income_statement/pdf', 'accounting\ReportController@income_statement_pdf');
    // Route::any('income_statement/excel', 'accounting\ReportController@income_statement_excel');

    Route::any('income_statement/pdf', [ReportController::class, 'income_statement_pdf']);
Route::any('income_statement/excel', [ReportController::class, 'income_statement_excel']);


    Route::any('income_statement/csv', 'accounting\ReportController@income_statement_csv');
    Route::any('balance_sheet', 'accounting\ReportController@balance_sheet');
    Route::any('balance_sheet_summary', 'accounting\ReportController@balance_sheet_summary');
    Route::any('balance_sheet/pdf', 'accounting\ReportController@balance_sheet_pdf');
    Route::any('balance_sheet/excel', 'accounting\ReportController@balance_sheet_excel');
    Route::any('balance_sheet/csv', 'accounting\ReportController@balance_sheet_csv');
    Route::any('summary', 'accounting\ReportController@summary');
    Route::any('summary/pdf', 'accounting\ReportController@summary_pdf');
    Route::any('summary/excel', 'accounting\ReportController@summary');
    Route::any('summary/csv', 'accounting\ReportController@summary');
    Route::any('cash_flow', 'accounting\ReportController@cash_flow');
    Route::any('provisioning', 'accounting\ReportController@provisioning');
    Route::any('provisioning/pdf', 'accounting\ReportController@provisioning_pdf');
    Route::any('provisioning/excel', 'accounting\ReportController@provisioning_excel');
    Route::any('provisioning/csv', 'accounting\ReportController@provisioning_csv');
});

//START GL SETUP
Route::resource('class_account', 'accounting\ClassAccountController');
Route::resource('group_account', 'accounting\GroupAccountController');
Route::resource('sub_group_account', 'accounting\SubGroupAccountController');
Route::resource('account_codes', 'accounting\AccountCodesController');
Route::get('findSub', 'accounting\AccountCodesController@findSub')->middleware('auth');
Route::resource('system', 'SystemController');
Route::resource('chart_of_account', 'accounting\ChartOfAccountController');
Route::resource('expenses', 'accounting\ExpensesController');
Route::get('expenses_first_approval/{id}', 'accounting\ExpensesController@first_approval')->name('expenses.first_approval')->middleware('auth');
Route::get('expenses_second_approval/{id}', 'accounting\ExpensesController@second_approval')->name('expenses.second_approval')->middleware('auth');
Route::get('expenses_approve/{id}', 'accounting\ExpensesController@approve')->name('expenses.approve');
Route::get('expenses_second_disapproval/{id}', 'accounting\ExpensesController@second_disapproval')->name('expenses.second_disapproval')->middleware('auth');
Route::get('expenses_final_disapproval/{id}', 'accounting\ExpensesController@final_disapproval')->name('expenses.final_disapproval')->middleware('auth');
Route::get('expenses_delete/{id}', 'accounting\ExpensesController@delete_list')->name('expenses.delete')->middleware('auth');
Route::post('multiple_approve', 'accounting\ExpensesController@multiple_approve')->name('multiple_expenses.approve')->middleware('auth');
Route::post('multiple_disapproval', 'accounting\ExpensesController@multiple_disapproval')->name('multiple_expenses.disapproval')->middleware('auth');
Route::get('multiple_pdfview', array('as' => 'multiple_pdfview', 'uses' => 'accounting\ExpensesController@multiple_pdfview'))->middleware('auth');
Route::get('findList', 'accounting\ExpensesController@findList')->middleware('auth');
Route::resource('deposit', 'accounting\DepositController');
Route::get('deposit_approve/{id}', 'accounting\DepositController@approve')->name('deposit.approve');
Route::resource('transfer', 'accounting\TransferController');
Route::get('transfer_approve/{id}', 'accounting\TransferController@approve')->name('transfer.approve')->middleware('auth');
Route::resource('account', 'accounting\AccountController')->middleware('auth');




//END GL SETUP

//reports
Route::group(['prefix' => 'reports'], function () {

    Route::group(['prefix' => 'bar'], function () {
        Route::any('purchase_report', 'Bar\POS\ReportController@purchase_report')->name('bar.purchase_report')->middleware('auth');
        Route::any('sales_report', 'Bar\POS\ReportController@sales_report')->name('bar.sales_report')->middleware('auth');
        Route::any('balance_report', 'Bar\POS\ReportController@balance_report')->name('bar.balance_report')->middleware('auth');
        Route::any('crate_report', 'Bar\POS\ReportController@crate_report')->name('bar.crate_report')->middleware('auth');
        Route::any('bottle_report', 'Bar\POS\ReportController@bottle_report')->name('bar.bottle_report')->middleware('auth');
        Route::any('kitchen_report', 'Bar\POS\ReportController@kitchen_report')->name('bar.kitchen_report')->middleware('auth');
        Route::any('stock_movement_report', 'Bar\POS\ReportController@stock_movement_report')->name('bar.stock_movement_report')->middleware('auth');
        Route::get('viewModal', 'Bar\POS\ReportController@discountModal')->middleware('auth');
    });

    Route::group(['prefix' => 'section'], function () {


        Route::any('sales_report', 'Facility\InvoiceController@section_report')->name('section.sales_report')->middleware('auth');



        Route::any('realtime_stock_report', 'Bar\POS\GoodIssueController@realtime_stock_report')->name('realtime_stock_report')->middleware('auth');

        Route::any('sections_report', 'Facility\InvoiceController@all_sections_report')->name('all_sections_report')->middleware('auth');
        Route::any('sale_report', 'restaurant\OrderController@all_sale_report')->name('all_sale_report')->middleware('auth');

        Route::any('products_report', 'Bar\POS\ItemsController@products_report')->name('products_report')->middleware('auth');


        Route::get('viewModal', 'Facility\InvoiceController@discountModal')->middleware('auth');
    });



    Route::group(['prefix' => 'pos'], function () {
        Route::any('inventory_report', 'POS\ReportController@inventory_report')->middleware('auth');

        Route::any('good_issue_report', 'POS\ReportController@good_issue_report')->middleware('auth');
    });
});

//Route for Mailing
Route::get('/email', function () {
    Mail::to('cielonovatus95@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

Route::get("test-email", [MailerController::class, "email"])->name("email");

Route::post("send-email", [MailerController::class, "composeEmail"])->name("send-email");


// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('error-404');
})->where('page', '.*');


// mwandobo routes


