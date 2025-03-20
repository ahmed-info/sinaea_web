<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\API\MobileAuthController;
use App\Http\Controllers\API\MobileBlogController;
use App\Http\Controllers\API\MobileDepartmentController;
use App\Http\Controllers\API\MobileOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => 'User',

    ], function(){
        Route::post('/login', [MobileAuthController::class,'login']);
        Route::post('/register', [MobileAuthController::class,'store']);
        Route::post('/changePassword', [MobileAuthController::class,'changePassword']);
        Route::put('/', [MobileAuthController::class,'update']);
        Route::put('/forgetPassword', [MobileAuthController::class,'updateForgetPassword']);
        Route::delete('/', [MobileAuthController::class,'destroy']);
        Route::post('/checkPhone', [MobileAuthController::class,'check_phone']);
        Route::post('/checkPhoneExist', [MobileAuthController::class,'check_phone_exist']);    }
);

Route::group(
    [
        'prefix' => 'Blogs',

    ], function(){
        Route::get('/', [MobileBlogController::class,'index']);
        Route::post('/{id}', [MobileBlogController::class,'store']);
        Route::get('/{id}', [MobileBlogController::class,'show']);
        Route::put('/{id}', [MobileBlogController::class,'update']);
        Route::delete('/{id}', [MobileBlogController::class,'destroy']);

    }
);

Route::group(
    [
        'prefix' => 'Orders',

    ], function(){
        Route::get('/', [MobileOrderController::class,'index']);
        Route::post('/', [MobileOrderController::class,'store']);
        Route::get('/{id}', [MobileOrderController::class,'show']);
        Route::get('/cancel/{id}', [MobileOrderController::class,'cancelOrder']);

    }
);

Route::get('/Departments', [MobileDepartmentController::class, 'indexDepartments']);
Route::get('/Category/{id}', [MobileDepartmentController::class, 'indexCatgories']);
Route::get('/Brands', [MobileDepartmentController::class, 'indexBrands']);
Route::get('/Call', [MobileDepartmentController::class, 'indexCallUs']);
Route::get('/External', [MobileDepartmentController::class, 'indexExternalCategories']);
Route::get('/External/{id}', [MobileDepartmentController::class, 'showExternalCategories']);
Route::get('/Privecy', [MobileDepartmentController::class, 'indexPrivecy']);
Route::get('/Question', [MobileDepartmentController::class, 'indexQuestions']);
Route::get('/Slide', [MobileDepartmentController::class, 'indexSlides']);
Route::get('/Social', [MobileDepartmentController::class, 'indexSocial']);

Route::fallback(function (Request $request) {
    return response()->json([
        'message' => 'الرابط المطلوب غير متوفر: ' . $request->url()
    ], 404);
});

