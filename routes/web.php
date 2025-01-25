<?php

use App\Http\Controllers\Admin\LangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('localization/{lang}', [
    App\Http\Controllers\LocalizationController::class, 'index'
])->name('front.locale');


Route::get('/', function () {
    return redirect()->route('front.index');

});
Route::group(['middleware' => ['set_locale']], function () {
    Route::get('/index', [\App\Http\Controllers\FrontController::class, 'index'])->name('front.index');
    Route::get('/coming-soon', [\App\Http\Controllers\FrontController::class, 'soon'])->name('front.coming_soon');
    Route::get('/register', [\App\Http\Controllers\FrontController::class, 'register'])->name('front.register');
    Route::get('/visa', [\App\Http\Controllers\FrontController::class, 'visa'])->name('front.visa');
    Route::post('/register', [\App\Http\Controllers\FrontController::class, 'register_send'])->name('front.register.send');
    Route::post('/feedback', [\App\Http\Controllers\FrontController::class, 'feedback_send'])->name('front.feedback.send');
    Route::post('/visa', [\App\Http\Controllers\FrontController::class, 'visa_send'])->name('front.visa.send');

});

//Route::get('/index', [\App\Http\Controllers\HomeController::class, 'index'])->name('front.index');
//Route::get('/service/{service}', [\App\Http\Controllers\HomeController::class, 'service'])->name('service.page');
//Route::post('/form1', [\App\Http\Controllers\HomeController::class, 'form1'])->name('form1.send');
//Route::post('/form2', [\App\Http\Controllers\HomeController::class, 'form2'])->name('form2.send');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin.auth'])->prefix('tif')->group(function () {
    Route::get('locale/{locale}', [LangController::class, 'langChange'])->name('locale');

    Route::group(['middleware' => ['set_locale']], function () {


        Route::get('/', function () {
            return redirect()->route('home');
        })->name('admin.home');

        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::get('/test', [App\Http\Controllers\Admin\HomeController::class, 'test'])->name('test');
        Route::get('/export', [App\Http\Controllers\Admin\HomeController::class, 'export'])->name('export');

        Route::get('/visas', [App\Http\Controllers\Admin\VisaController::class, 'index'])->name('visas.index');
        Route::get('/visas_excell', [App\Http\Controllers\Admin\VisaController::class, 'excell'])->name('visas.excell');
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);

        Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
        Route::resource('menus', \App\Http\Controllers\Admin\MenuController::class);
        Route::resource('translations', \App\Http\Controllers\TranslationController::class);


        // Role
        Route::get('/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{role:uuid}/show', [App\Http\Controllers\Admin\RoleController::class, 'show'])->name('roles.show');
        Route::get('/roles/{role:uuid}/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role:uuid}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role:uuid}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');
        Route::get('/roles/{role:uuid}/permission', [App\Http\Controllers\Admin\RoleController::class, 'showPermission'])->name('roles.permission-show');
        Route::put('/roles/{role:uuid}/permission', [App\Http\Controllers\Admin\RoleController::class, 'updatePermission'])->name('roles.permission-update');

        Route::get('/roles/{role:uuid}/menu', [App\Http\Controllers\Admin\RoleController::class, 'showMenu'])->name('roles.menu-show');
        Route::put('/roles/{role:uuid}/menu', [App\Http\Controllers\Admin\RoleController::class, 'updateMenu'])->name('roles.menu-update');

        // User
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/show', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

        Route::put('reset-password/{user}', [\App\Http\Controllers\Admin\UserController::class, 'resetPassword'])->name('users.reset-password');
        Route::put('change-password/', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('users.change-password');
        Route::put('change-language/', [App\Http\Controllers\Admin\UserController::class, 'changeLanguage'])->name('users.change-language');
        Route::get('change-role/{user}/{role}', [App\Http\Controllers\Admin\UserController::class, 'changeRole'])->name('users.change-role');
        Route::get('profile', [App\Http\Controllers\Admin\UserController::class, 'getProfile'])->name('users.profile');

        // myconfig
        Route::get('/myconfig', [App\Http\Controllers\MyConfigController::class, 'index'])->name('myconfigs.index');
        Route::get('/myconfig-restore', [App\Http\Controllers\MyConfigController::class, 'restore'])->name('myconfigs.restore');
        Route::post('/myconfig', [App\Http\Controllers\MyConfigController::class, 'store'])->name('myconfigs.store');
        Route::get('/clear-config', [App\Http\Controllers\MyConfigController::class, 'clearCache'])->name('myconfigs.clear-cache');

        //Information
        Route::get('information.edit', [App\Http\Controllers\Admin\InformationController::class, 'edit'])->name('informations.edit');
        Route::post('information.update', [App\Http\Controllers\Admin\InformationController::class, 'update'])->name('informations.update');

        //Activity Log
        Route::get('activity-log/{page?}', [App\Http\Controllers\ActivityLogController::class, 'index'])->name('activitylogs.index');
        Route::get('activity-log-property', [App\Http\Controllers\ActivityLogController::class, 'getActivityLogProperty'])->name('activitylogs.get-property');

        Route::get('api-log/{page?}', [App\Http\Controllers\Admin\ApiLogController::class, 'index'])->name('apilogs.index');
        Route::get('api-log-property', [App\Http\Controllers\Admin\ApiLogController::class, 'getActivityLogProperty'])->name('apilogs.get-property');

    });

});

Route::prefix('tmt')->group(function (){
    Auth::routes();

    Auth::routes(['register' => false, 'verify' => false, 'reset' => false]);
});
// Auth::routes();
