<?php

use App\Http\Controllers\back\{adminController,panelUserController,statusController,pagesController,addFieldController,textController,fieldDataController,imageController,settingsController,pluginController,treeController};
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as'=>'admin.' , 'prefix' => 'admin' ], function () {
    Route::get('login', [adminController::class, 'login'])->name('login');
    Route::post('login', [adminController::class, 'postLogin'])->name('postlogin');
    Route::get('logout', [adminController::class, 'logout'])->name('logout');
});

Route::middleware(['adminUserAuth'])->group(function () {
    Route::group(['as'=>'admin.' , 'prefix' => 'admin' ], function () {
        Route::get('/', [adminController::class, 'get_index'])->name('index'); 


        //admin paneli kullanıcı işlemleri buradan yapılıyor.
        Route::resource('/panel-users', panelUserController::class)->names([
            'index' => 'panel_users.index',
            'create' => 'panel_users.create',
            'edit' => 'panel_users.edit',
            'store' => 'panel_users.store',
            'update' => 'panel_users.update',
            'destroy' => 'panel_users.destroy',
        ]);

        //sayfa işlemleri buradan yapılıyor.
        Route::resource('/pages', pagesController::class)->names([
            'index' => 'pages.index',
            'create' => 'pages.create',
            'edit' => 'pages.edit',
            'store' => 'pages.store',
            'update' => 'pages.update',
            'destroy' => 'pages.destroy',
        ]);

        // sadece yazıların yönetildiği düz text temasına sahip işlemler buradan yönetiliyor.
        Route::resource('text', textController::class)->names([
            'index' => 'text.index',
            'create' => 'text.create',
            'edit' => 'text.edit',
            'store' => 'text.store',
            'update' => 'text.update',
            'destroy' => 'text.destroy',
        ]); 

        // site ayarları buradan yönetiliyor.
        Route::resource('settings', settingsController::class)->names([
            'index' => 'settings.index',
            'create' => 'settings.create',
            'edit' => 'settings.edit',
            'store' => 'settings.store',
            'update' => 'settings.update',
            'destroy' => 'settings.destroy',
        ]); 
        
        // tree buradan yönetiliyor.

        Route::get('/tree/creatTree/{page_id?}', [treeController::class,'create'])->name('tree.creates');
        Route::get('/tree/{id?}/edit/{page_id?}', [treeController::class,'edit'])->name('tree.edits');
        Route::post('/treeSortable', [treeController::class,'sortable'])->name('tree.sortable');
        Route::post('/treeHidden', [treeController::class,'hidden'])->name('tree.hidden');
        Route::post('/treeUploadPictures', [treeController::class,'uploadPictures'])->name('tree.uploadPictures');

        Route::resource('tree', treeController::class)->names([
            'index' => 'tree.index', 
            'edit' => 'tree.edit',
            'store' => 'tree.store',
            'show' => 'tree.show',
            'update' => 'tree.update',
            'destroy' => 'tree.destroy',
        ]); 


        // eklentiler buradan yönetiliyor.
        Route::get('plugin', [pluginController::class, 'index'])->name('plugin.index'); 
        Route::post('plugin', [pluginController::class, 'update'])->name('plugin.update'); 



        
        Route::post('/uploadPictures', [textController::class,'uploadPictures'])->name('text.uploadPictures');
        Route::post('/imgsortable',[imageController::class,'sortableImage'])->name('img.sortable');

        /* ek alanlar */
        Route::post("/addfield", [addFieldController::class, 'setFields'])->name("setField");
        Route::post("/updateFields", [addFieldController::class, 'updateFields'] )->name("updateFields");
        Route::post("/getFieldWithPageId", [addFieldController::class, 'getFieldWithPageId'] )->name("getFieldWithPageId");
        Route::post("/getFieldWithId", [addFieldController::class, 'getFieldWithId'] )->name("getFieldWithId");
        Route::get('/deleteField/{id?}', [addFieldController::class, 'deleteField'])->name("deleteField");
        Route::post('/fieldSortable', [addFieldController::class, 'sortable'])->name('fieldSortable');

        /* ek alan dataları */
        Route::post("/setFieldData",[fieldDataController::class, 'setFieldData'] )->name("setFieldData");
        Route::post("/updateFieldData",[fieldDataController::class, 'updateFieldData'] )->name("updateFieldData");

        Route::post('/deleteImages', [imageController::class,'deleteImages'])->name('deleteImages');
        
        //status işlemleri buradan yapılıyor.
        Route::get('/status', [statusController::class,'index'])->name('statusIndex');
        Route::post('/addStatusListType', [statusController::class,'addStatusListType'])->name('addStatusListType');
        Route::post('/addStatusList', [statusController::class,'addStatusList'])->name('addStatusList');
    });
});
