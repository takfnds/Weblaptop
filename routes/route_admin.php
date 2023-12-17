<?php

Route::group(['namespace' => 'Backend','prefix' => 'admin'], function(){
    Route::group(['namespace' => 'Auth'], function(){
        Route::get('login','BackendLoginController@getLogin')->name('get_admin.login');
        Route::post('login','BackendLoginController@postLogin');
        Route::get('logout','BackendLoginController@logout')->name('get_admin.logout');
    });
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
//BACKEND
Route::group(['namespace' => 'Backend','prefix' => 'admin', 'middleware' => 'checkLoginAdmin'], function(){
	 // Trang chủ
	Route::get('','BackendHomeController@index')->name('get_backend.home');
	// Category
	Route::prefix('user')->group(function(){
		Route::get('','BackendUserController@index')->name('get_backend.user.index');

		Route::get('create','BackendUserController@create')->name('get_backend.user.create');
		Route::post('create','BackendUserController@store');

		Route::get('update/{id}','BackendUserController@edit')->name('get_backend.user.update');
		Route::post('update/{id}','BackendUserController@update');

		Route::get('delete/{id}','BackendUserController@delete')->name('get_backend.user.delete');

	});
	Route::prefix('category')->group(function(){
		Route::get('','BackendCategoryController@index')->name('get_backend.category.index');

		Route::get('create','BackendCategoryController@create')->name('get_backend.category.create');
		Route::post('create','BackendCategoryController@store')->name('get_backend.category.store');;

		Route::get('update/{id}','BackendCategoryController@edit')->name('get_backend.category.update');
		Route::post('update/{id}','BackendCategoryController@update');

		Route::get('delete/{id}','BackendCategoryController@delete')->name('get_backend.category.delete');

	});

	Route::prefix('manufacturer')->group(function(){
		Route::get('','BackendManufacturerController@index')->name('get_backend.manufacturer.index');

		Route::get('create','BackendManufacturerController@create')->name('get_backend.manufacturer.create');
		Route::post('create','BackendManufacturerController@store')->name('get_backend.manufacturer.store');;

		Route::get('update/{id}','BackendManufacturerController@edit')->name('get_backend.manufacturer.update');
		Route::post('update/{id}','BackendManufacturerController@update');

		Route::get('delete/{id}','BackendManufacturerController@delete')->name('get_backend.manufacturer.delete');

	});

	Route::prefix('keyword')->group(function(){
		Route::get('','BackendKeywordController@index')->name('get_backend.keyword.index');

		Route::get('create','BackendKeywordController@create')->name('get_backend.keyword.create');
		Route::post('create','BackendKeywordController@store')->name('get_backend.keyword.store');

		Route::get('update/{id}','BackendKeywordController@edit')->name('get_backend.keyword.update');
		Route::post('update/{id}','BackendKeywordController@update');

		Route::get('delete/{id}','BackendKeywordController@delete')->name('get_backend.keyword.delete');

	});

	Route::prefix('product')->group(function(){
		Route::get('','BackendProductController@index')->name('get_backend.product.index');

		Route::get('create','BackendProductController@create')->name('get_backend.product.create');
		Route::post('create','BackendProductController@store');

		Route::get('update/{id}','BackendProductController@edit')->name('get_backend.product.update');
		Route::post('update/{id}','BackendProductController@update');

		Route::get('delete/{id}','BackendProductController@delete')->name('get_backend.product.delete');
		Route::get('delete-image/{id}','BackendProductController@deleteImage')->name('admin.product.delete_image');

	});

	Route::prefix('menu')->group(function(){
		Route::get('','BackendMenuController@index')->name('get_backend.menu.index');

		Route::get('create','BackendMenuController@create')->name('get_backend.menu.create');
		Route::post('create','BackendMenuController@store')->name('get_backend.menu.store');

		Route::get('update/{id}','BackendMenuController@edit')->name('get_backend.menu.update');
		Route::post('update/{id}','BackendMenuController@update');

		Route::get('delete/{id}','BackendMenuController@delete')->name('get_backend.menu.delete');

	});

	Route::prefix('tag')->group(function(){
		Route::get('','BackendTagController@index')->name('get_backend.tag.index');

		Route::get('create','BackendTagController@create')->name('get_backend.tag.create');
		Route::post('create','BackendTagController@store')->name('get_backend.tag.store');

		Route::get('update/{id}','BackendTagController@edit')->name('get_backend.tag.update');
		Route::post('update/{id}','BackendTagController@update');

		Route::get('delete/{id}','BackendTagController@delete')->name('get_backend.tag.delete');

	});

	Route::prefix('article')->group(function(){
		Route::get('','BackendArticleController@index')->name('get_backend.article.index');

		Route::get('create','BackendArticleController@create')->name('get_backend.article.create');
		Route::post('create','BackendArticleController@store');

		Route::get('update/{id}','BackendArticleController@edit')->name('get_backend.article.update');
		Route::post('update/{id}','BackendArticleController@update');

		Route::get('delete/{id}','BackendArticleController@delete')->name('get_backend.article.delete');

	});

    Route::prefix('slide')->group(function(){
        Route::get('','BackendSlideController@index')->name('get_backend.slide.index');

        Route::get('create','BackendSlideController@create')->name('get_backend.slide.create');
        Route::post('create','BackendSlideController@store')->name('get_backend.slide.store');

        Route::get('update/{id}','BackendSlideController@edit')->name('get_backend.slide.update');
        Route::post('update/{id}','BackendSlideController@update');

        Route::get('delete/{id}','BackendSlideController@delete')->name('get_backend.slide.delete');

    });
    Route::prefix('transaction')->group(function(){
        Route::get('','BackendTransactionController@index')->name('get_backend.transaction.index');
        Route::get('view/{id}','BackendTransactionController@view')->name('get_backend.transaction.view');
        Route::get('success/{id}','BackendTransactionController@success')->name('get_backend.transaction.success');
        Route::get('cancel/{id}','BackendTransactionController@cancel')->name('get_backend.transaction.cancel');
        Route::get('delete/{id}','BackendTransactionController@delete')->name('get_backend.transaction.delete');
    });
    Route::prefix('order')->group(function(){
        Route::get('delete/{id}','BackendOrderController@delete')->name('get_backend.order.delete');
    });

	Route::get('setting','BackendSettingController@index')->name('get_backend.setting');
	Route::post('setting','BackendSettingController@createOrUpdate')->name('get_backend.setting.store');

	Route::get('profile','BackendProfileController@index')->name('get_backend.profile');
	Route::post('profile','BackendProfileController@createOrUpdate')->name('get_backend.profile.store');

	Route::get('get-char-day','BackendHomeController@ajaxGetChars')->name('ajax_admin.get_dashboard_char');
});
