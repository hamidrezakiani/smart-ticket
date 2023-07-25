<?php

use Hamiddj\SmartTicket\Controllers\User\TicketController;
use Hamiddj\SmartTicket\Controllers\Admin\TicketController as AdminTicketController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'],function(){
   Route::group(['prefix' => 'user','middleware' => ['auth:'.(config('smartticket.user_guard') ?? 'web')]],function(){
       Route::get('tickets',[TicketController::class,'index']);
       Route::get('tickets/create',[TicketController::class,'create']);
       Route::post('tickets',[TicketController::class,'store']);
       Route::get('tickets/show/{id}',[TicketController::class,'show']);
       Route::post('tickets/{id}/messages',[TicketController::class,'update']);
   });
   Route::group(['prefix' => 'admin','middleware' => ['auth:'.(config('smartticket.admin_guard') ?? 'web')]],function(){
    Route::get('tickets',[AdminTicketController::class,'index']);
    Route::get('tickets/show/{id}',[AdminTicketController::class,'show']);
    Route::post('tickets/{id}/messages',[AdminTicketController::class,'update']);
});
});