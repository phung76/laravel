<?php

use Illuminate\Support\Facades\Route;



Route::get('/','Frontendcontroller@gethome');
Route::get('detail/{id}/{slug}.html','Frontendcontroller@getDetail');
Route::get('category/{id}/{slug}.html','Frontendcontroller@getcategory' );

Route::get('search','Frontendcontroller@getsearch');



Route::post('detail/{id}/{slug}.html','Frontendcontroller@postcommet' );


Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}','cartController@getAddcart');
    Route::get('show','cartController@getshowcart');
    Route::get('delete/{id}','cartController@getdeletecart');
    Route::get('update','cartController@getUpdateCart');
    Route::post('show','cartController@postComplete');

});

Route::get('complete','cartController@getComplete');




Route::group(['prefix' => 'admin'], function () {
    Route::get('use', function () {
        echo 'user';
    });
    Route::get('use/index', function () {
        echo 'index';
    });
});
Route::group(['namespace' => 'admin'], function () {
    Route::group(['prefix' => 'login','middleware'=>'checkLogedIn'], function () {
        Route::get('/','logincontroller@getlogin');
        Route::post('/','logincontroller@postlogin');

       
            
        });
Route::get('logout','homecontroller@getlogout');
    Route::group(['prefix' => 'admin','middleware'=>'checkLogedOut'], function () {
        Route::get('home','homecontroller@gethome');


    Route::group(['prefix' => 'category'], function () {
        Route::get('/','categorycontroller@getcate');
        Route::post('/','categorycontroller@postcate');

        Route::get('edit/{id}','categorycontroller@editcate');
        Route::post('edit/{id}','categorycontroller@posteditcate');

        
        Route::get('delete/{id}','categorycontroller@getdeletecate');

        });


        Route::group(['prefix' => 'product'], function () {
            Route::get('/','productcontroller@getproduct');
           

            Route::get('add','productcontroller@getaddproduct');
            Route::post('add','productcontroller@postaddproduct'); 

            Route::get('edit/{id}','productcontroller@geteditproduct');
            Route::post('edit/{id}','productcontroller@posteditproduct'); 

            Route::get('delete/{id}','productcontroller@getdeleteproduct');
    
            });
    });
    
});
