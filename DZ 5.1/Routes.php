<?php

    Route::get('index.php', function () {
        IndexController::CreateView('IndexView');
    });

    Route::get('posts',[PostController::class, 'index']);
    Route::get('posts_create',[PostController::class, 'create']);
    Route::get('posts_edit',[PostController::class, 'edit']);

    Route::post('posts',[PostController::class, 'store']);

    Route::put('posts_update',[PostController::class, 'update']);

    Route::delete('posts_delete',[PostController::class, 'delete']);

    Route::get('groups',[GroupController::class, 'index']);
    Route::get('groups_create',[GroupController::class, 'create']);
    Route::get('groups_edit',[GroupController::class, 'edit']);

    Route::post('groups',[GroupController::class, 'store']);

    Route::put('groups_update',[GroupController::class, 'update']);

    Route::delete('groups_delete',[GroupController::class, 'delete']);



