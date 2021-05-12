<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Providers\Config;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\StaffController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\SurgeryController;

/*
|--------------------------------------------------------------------------
| API Routes for surgery management system
|--------------------------------------------------------------------------
*/

//Unauthenticated route
Route::post('login', [AuthController::class, 'login']);



//Routes with api middleware is applied for authentication:

Route::group(['middleware' => ['auth:api']], function () {
    
    Route::get('/patients', [PatientController::class,'all_patients']); 
    Route::post('/patients', [PatientController::class,'store']); 
    Route::get('/patients/{patientId}', [PatientController::class,'show']); 
    Route::put('/patients/{patientId}', [PatientController::class,'update']); 
    Route::delete('/patients/{patientId}', [PatientController::class,'delete']); 
  
   
    Route::get('/surgeries/{surgeryId}', [SurgeryController::class,'fetch_surgery']); 
    Route::put('/surgeries/{surgeryId}', [SurgeryController::class,'update']);
    Route::post('/surgeries', [SurgeryController::class,'store']); 
    Route::get('/surgeries', [SurgeryController::class,'all_surgeries']); 
    Route::get('/surgeries/{surgeryId}/doctors', [SurgeryController::class,'doctors_for_surgery']); 


  
    Route::get('/doctors', [StaffController::class,'all_doctors']); 
    Route::get('/doctors/{doctorId}', [StaffController::class,'my_surgeries']); 
    Route::get('/doctors/available', [StaffController::class,'available_doctors']); 

    Route::post('/rooms', [RoomController::class,'store']); 
    Route::put('/rooms/{roomId}', [RoomController::class,'update']); 
    Route::delete('/rooms/{roomId}', [RoomController::class,'delete']); 
    Route::get('/rooms', [RoomController::class,'all_rooms']); 
    Route::get('/rooms/{roomId}/surgeries', [RoomController::class,'surgeries_for_room']); 
    Route::get('/rooms/available', [RoomController::class,'available_rooms']); 

    Route::post('/staff', [StaffController::class,'store']); 
    Route::get('/staff/{staffId}', [StaffController::class,'show']); 
    Route::put('/staff/{staffId}', [StaffController::class,'update']); 
    Route::delete('/staff/{staffId}', [StaffController::class,'delete']); 

    Route::post('logout', [AuthController::class, 'logout']); 
});







