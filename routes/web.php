<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Login
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login');

        // Forget and reset Password
        Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('forgot_password');
        Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}/{email?}', 'ResetPasswordController@showResetForm')->name('reset_password_link');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('reset_password');
    });

    // Logged in admin user required
    Route::group(['middleware' => 'auth:admin'], function () {
        // Dashboard
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

        Route::resource('impressoras', 'ImpressoraController');

        Route::resource('suprimentos', 'SuprimentoController');

        Route::resource('proprietarios', 'ProprietarioController');

        Route::resource('usuarios', 'UsuarioController');

        Route::resource('perfils', 'PerfilController');

        Route::resource('setors', 'SetorController');

        Route::resource('requisicaos', 'RequisicaoController');

        Route::resource('statuses', 'StatusController');

        Route::resource('contagems', 'ContagemController');

        Route::resource('servicos', 'ServicoController');

        // Profile
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::post('/profile', 'AdminController@profileUpdate');
        Route::post('/password', 'AdminController@passwordUpdate')->name('password_update');

        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});