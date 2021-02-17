<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Statuses
    Route::apiResource('statuses', 'StatusesApiController');

    // Priorities
    Route::apiResource('priorities', 'PrioritiesApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Tickets
    Route::post('tickets/media', 'TicketsApiController@storeMedia')->name('tickets.storeMedia');
    Route::apiResource('tickets', 'TicketsApiController');

    // Comments
    Route::apiResource('comments', 'CommentsApiController');
});

Route::post('validate', function(Request $request){
    \Log::info($request->getContent());
});

Route::post('confirm', function(Request $request){
    \Log::info($request->getContent());
});

Route::post('v1/access/token', 'MpesaController@generateAccessToken');
Route::get('v1/ticket/stk/push', 'MpesaController@customerMpesaSTKPush');
Route::post('v1/ticket/validation', 'MpesaController@mpesaValidation');
Route::post('v1/ticket/transaction/confirmation', 'MpesaController@mpesaConfirmation');
Route::get('v1/ticket/register/url', 'MpesaController@mpesaRegisterUrls');
