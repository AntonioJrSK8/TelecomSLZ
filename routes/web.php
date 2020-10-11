<?php

use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->group(function () {

    Auth::routes();

    Route::group(['prefix' => 'users', 'as' => 'admin.users.'], function () {
        Route::name('settings.edit')->get('settings', 'Admin\UserSettingsController@edit');
        Route::name('settings.update')->put('settings', 'Admin\UserSettingsController@update');
    });
    
    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => ['auth'] //usado can para o middleware dentro de \middlerare\karnel.php

    ], function () {
        Route::name('dashboard')->get('/dashboard', 'Dashboard@index');
        
        Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
            Route::name('show_details')->get('show_details', 'UserController@show_details');

            Route::group(['prefix' => '/{user}/profile'], function () {
                Route::name('profile.edit')->get('', 'UserProfileController@edit');
                Route::name('profile.update')->put('', 'UserProfileController@update');
            });
            
        });

        Route::resource('user', 'UserController');
        Route::resource('empresa', 'EmpresaController');
        Route::resource('cliente', 'ClienteController');
        Route::resource('produto', 'ProdutoController');
        Route::get('visita/{id}', 'VisitaController@visitaConfirmada')->name('visita.visitaConfirmada');
        Route::resource('visita', 'VisitaController');
        
        //Route::get('visitatecnica', 'VisitaTecnicaController@index')->name('visitatecnica.index');
        //Route::post('visitatecnica.update', 'VisitaTecnicaController@update')->name('visitatecnica.update');
        //Route::get('visitatecnica/{id}', 'VisitaTecnicaController@visitaConfirmada')->name('visitatecnica.visitaConfirmada');

    });
});

/* Publica Links */
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'Admin\paginaController@index')->name('principal');

Route::post('/', 'Admin\paginaController@store')->name('admin.paginaController.store');

Route::get('/produto', 'Admin\paginaController@listaProduto')->name('produto.lista');

Route::post('/produto/busca', 'Admin\paginaController@buscaProduto')->name('produto.busca');

Route::get('/produto/detalhes/{id}', 'Admin\ProdutoController@detalheProduto')->name('produto.detalhes');
Route::get('/orcamento', 'Admin\ProdutoController@orcamento')->name('produto.orcamento');
Route::post('/orcamento', 'Admin\ProdutoController@gravaOrcamento')->name('produto.gravaorcamento');
